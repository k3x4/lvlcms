<?php

namespace App\Libraries;

use Illuminate\Database\Eloquent\Model;
use App\MediaSize;
use MediaUploader;
use Storage;
use App\Libraries\ImageUtils;

class MediaConverter {
    
    private $model;
    private $disk;
    private $tempFolder;

    public function __construct(Model $model) {
        $this->model = $model;
        $this->disk = 'photos';
        $this->tempFolder = 'temp';
    }
    
    public function manipulateImage($path){
        if($path){
            $this->saveImage( env('APP_URL') . $path );
        } else {
            $this->removeAll();
            $this->model->media()->delete();
        }
    }
    
    private function mediaExists($path){
        if ($this->model->hasMedia('original')) {
            $basename = basename($path);
            $basename = $this->model->id . '_' . $basename;
            $exists = basename($this->model->firstMedia('original')->getUrl());
            if ($basename == $exists){
                return true;
            }
        }

        return false;
    }
    
    public function saveImage($path){
        if( ! $this->mediaExists($path) ){
            $this->generateSizes($path);
        }   
    }
    
    public function generateSizes($path) {
        $mediaSizes = MediaSize::where('enabled', true)->get();

        $filename = $this->generateFilename($path);
        $image = $this->uploadMedia($path, $filename);      
        $this->model->attachMedia($image, 'original');

        foreach ($mediaSizes as $mediaSize) {
            $image = $this->makeSize($path, $mediaSize->width, $mediaSize->height);
            $filename = $this->generateFilename($path, $mediaSize->width, $mediaSize->height, true);
            $this->saveImageToDisk($image, $filename);
            
            $tag = $this->getTag($this->getName($filename));
            
            $filenamePath = $this->getFullTempPath($filename);
            $media = $this->uploadMedia($filenamePath, $filename);  
            $this->model->attachMedia($media, $tag);
            
            $this->deleteImageFromDisk($this->tempFolder . '/' . $filename);
        }
    }
    
    private function makeSize($path, $width, $height){
        $image = new ImageUtils($path);
        $image->resize($width, $height);
        return $image->get();
    }

    private function removeAll(Model $model) {
        $modelMedia = $model->media()->get();

        foreach ($modelMedia as $media) {
            $basename = basename($media->getUrl());
            Storage::disk('photos')->delete('sizes/' . $basename);
        }
    }

    private function getImageName($image){
        $core = $image->getCore();
        $name = pathinfo($core, PATHINFO_FILENAME);

        return $name;
    }
    
    private function getName($filename){
        $filename = basename($filename);
        $name = pathinfo($filename, PATHINFO_FILENAME);

        return $name;
    }
    
    private function getExtension($filename){
        $filename = basename($filename);
        $name = pathinfo($filename, PATHINFO_EXTENSION);

        return $name;
    }
    
    private function getTag($filename){
        $parts = explode('-', $filename);
        return end($parts);
    }
    
    private function getFullTempPath($filename){
        return env('APP_URL') . '/' . $this->disk. '/' . $this->tempFolder . '/' . $filename;
    }
    
    private function uploadMedia($source, $filename, $toDirectory = 'sizes'){
        $media = MediaUploader::fromSource($source)
                ->useFilename($filename)
                ->toDirectory($toDirectory)
                ->upload();
        
        return $media;
    }
    
    private function generateFilename($path, $width = 0, $height = 0, $withExtension = false){
        $filename  = $this->model->id . '_';
        $filename .= $this->getName($path);
        
        if($width && $height){
            $filename .= '-' . $width . 'x' . $height;
        }
        
        if($withExtension){
             $filename .= '.' . $this->getExtension($path);
        }
        
        return $filename;
    }
    
    private function saveImageToDisk($image, $filename, $disk = 'photos', $tempPath = 'temp'){
        Storage::disk($disk)->put($tempPath . DIRECTORY_SEPARATOR . $filename, (string) $image->encode());
    }
    
    private function deleteImageFromDisk($filename, $disk = 'photos'){
        Storage::disk($disk)->delete($filename);
    }

}
