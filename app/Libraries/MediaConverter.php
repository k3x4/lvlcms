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

        $media = MediaConverter::uploadMedia($imagePath, $model->id . '_' . $baseName->name);      
        $model->attachMedia($media, 'original');
        
        $disk = 'photos';
        $tempFolder = 'temp';

        foreach ($mediaSizes as $mediaSize) {
            $image = MediaConverter::generateImage($model->id, $imagePath, $mediaSize->width, $mediaSize->height, $mediaSizes->crop);
            
            if( ! $image )
                continue;
            
            MediaConverter::saveImage($image);
            
            $filenamePath = env('APP_URL') . $DS . $disk. $DS . $tempFolder . $DS . $image->filename;
            $imageName = MediaConverter::splitFilename($image->filename);
            $media = MediaConverter::uploadMedia($filenamePath, $imageName->name);  
            $model->attachMedia($media, $image->tag);
            
            MediaConverter::deleteImage($tempFolder . $DS . $image->filename);
        }
    }

    public static function removeAll(Model $model) {
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
    
    public static function resizeImg($imagePath, $newWidth, $newHeight, $crop = true) {
        $img = Image::make($imagePath)->orientate();
        
        $width = $img->width();
        $height = $img->height();
        
        if( ($newWidth > $width) || ($newHeight > $height))
            return null;
        
        $widthVal = null;
        $heightVal = null;
        
        if($width > $height){
            $widthVal = $newWidth;
        } else {
            $heightVal = $newHeight;
        }
        
        //$img->resize($newWidth, $newHeight);
        $img->resize($widthVal, $heightVal, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        
        if($crop){
            $img->crop($widthVal, $heightVal);
        }
        
        return $img;
    }
    
    public static function generateImage($id, $imagePath, $width, $height, $crop = true) {
        $img = MediaConverter::resizeImg($imagePath, $width, $height, $crop);
        
        if( ! $img )
            return null;
        
        $tag = $img->width() . 'x' . $img->height();
        
        $baseName = basename($imagePath);
        $baseName = MediaConverter::splitFilename($baseName);
        
        $filename = $id . '_' . $baseName->name . '-' . $tag . '.' . $baseName->extension;
        
        $tag = $width . 'x' . $height;
        
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
