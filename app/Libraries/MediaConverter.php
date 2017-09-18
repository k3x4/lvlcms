<?php

namespace App\Libraries;

use Illuminate\Database\Eloquent\Model;
use App\MediaSize;
use MediaUploader;
use Image;
use Storage;

class MediaConverter {

    public static function generateSizes(Model $model, $imagePath) {

        $DS = '/';
        
        $baseName = basename($imagePath);
        $baseName = MediaConverter::splitFilename($baseName);

        $mediaSizes = MediaSize::where('enabled', true)->get();

        $media = MediaConverter::uploadMedia($imagePath, $baseName->name);      
        $model->attachMedia($media, 'original');
        
        $disk = 'photos';
        $tempFolder = 'temp';

        foreach ($mediaSizes as $mediaSize) {
            $image = MediaConverter::generateImage($imagePath, $mediaSize->width, $mediaSize->height);
            MediaConverter::saveImage($image);
            
            $filenamePath = env('APP_URL') . $DS . $disk. $DS . $tempFolder . $DS . $image->filename;
            $imageName = MediaConverter::splitFilename($image->filename);
            $media = MediaConverter::uploadMedia($filenamePath, $imageName->name);  
            $model->attachMedia($media, $image->tag);
            
            MediaConverter::deleteImage($tempFolder . $DS . $image->filename);
        }
    }

    public static function removeAll(Model $model, $imagePath) {
        $modelMedia = $model->media()->get();

        foreach ($modelMedia as $media) {
            $basename = basename($media->getUrl());
            Storage::disk('photos')->delete('sizes/' . $basename);
        }
    }

    public static function splitFilename($filename) {
        $name = pathinfo($filename, PATHINFO_FILENAME);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $obj = [
            'name' => $name,
            'extension' => $extension
        ];

        return (object) $obj;
    }
    
    public static function uploadMedia($source, $filename, $toDirectory = 'sizes'){
        $media = MediaUploader::fromSource($source)
                ->useFilename($filename)
                ->toDirectory($toDirectory)
                ->upload();
        
        return $media;
    }
    
    public static function resizeImg($imagePath, $width, $height) {
        $img = Image::make($imagePath);
        $img->resize($width, $height);
        return $img;
    }
    
    public static function generateImage($imagePath, $width, $height) {
        $img = MediaConverter::resizeImg($imagePath, $width, $height);
        $tag = $width . 'x' . $height;
        
        $baseName = basename($imagePath);
        $baseName = MediaConverter::splitFilename($baseName);
        
        $filename = $baseName->name . '-' . $tag . '.' . $baseName->extension;
        
        $obj = [
            'img' => $img,
            'tag' => $tag,
            'filename' => $filename
        ];

        return (object) $obj;
    }
    
    public static function saveImage($image, $disk = 'photos', $tempPath = 'temp'){
        Storage::disk($disk)->put($tempPath . DIRECTORY_SEPARATOR . $image->filename, (string) $image->img->encode());
    }
    
    public static function deleteImage($filename, $disk = 'photos'){
        Storage::disk($disk)->delete($filename);
    }

}
