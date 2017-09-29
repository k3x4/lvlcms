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
        $this->disk = 'images';
        $this->tempFolder = 'temp';
    }
    
    public function manipulateImage($path){
        if($path){
            $this->saveImage($path);
        } else {
            $this->removeAll($this->model);
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
        $path = env('APP_URL') . '/' . $this->disk . '/' . $path;
        if( ! $this->mediaExists($path) ){
            $this->generateSizes($path);
        }   
    }
    
    public function generateSizes($path) {
        $mediaSizes = MediaSize::where('enabled', true)->get();

        $filename = $this->generateFilename($path);
        $image = $this->uploadMedia($path, $filename);      
        $this->model->attachMedia($image, 'original');

        $mediaSizes = $this->cleanMediaSizes($path, $mediaSizes);
        
        foreach ($mediaSizes as $mediaSize) {
            $filename = $this->saveImageTemp($path, $mediaSize);
            $this->attachMedia($filename);
            $this->deleteImageFromDisk($this->tempFolder . '/' . $filename);
        }
    }
    
    private function makeSize($path, $mediaSize){
        $image = new ImageUtils($path);
        
        $width = $mediaSize->width;
        $height = $mediaSize->height;
        $crop = $mediaSize->crop;
        $cropPosition = $mediaSize->crop_position;
        
        if($crop){
            $image->fit($width, $height, $cropPosition);
        } else {
            $image->resize($width, $height);
        }
        
        return $image->get();
    }

    private function removeAll(Model $model) {
        $modelMedia = $model->media()->get();

        foreach ($modelMedia as $media) {
            $basename = basename($media->getUrl());
            Storage::disk($this->disk)->delete('sizes/' . $basename);
        }
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
    
    private function generateFilename($path, $width = 0, $height = 0){
        $filename  = $this->model->id . '_';
        $filename .= $this->getName($path);
        
        if($width && $height){
            $filename .= '-' . $width . 'x' . $height;
        }
              
        return $filename;
    }
    
    private function generateFilenameWithExtension($path, $width = 0, $height = 0){
        $filename = $this->generateFilename($path, $width, $height);
        $filename .= '.' . $this->getExtension($path);
        
        return $filename;
    }
    
    private function saveImageTemp($path, $mediaSize) {
        $image = $this->makeSize($path, $mediaSize);
        $newWidth = $image->width();
        $newHeight = $image->height();
        
        $filename = $this->generateFilenameWithExtension($path, $newWidth, $newHeight);
        $this->saveImageToDisk($image, $this->tempFolder . '/' . $filename);
        
        return $filename;
    }
    
    private function cleanMediaSizes($path, $mediaSizes){
        $image = new ImageUtils($path);
        $width = $image->width();
        $height = $image->height();
        
        $index = 0;
        foreach ($mediaSizes as $mediaSize){
            if( ($mediaSize->width > $width) || ($mediaSize->height > $height) ){
                unset($mediaSizes[$index]);
            }
            $index++;
        }
        
        return $mediaSizes;
    }
    
    private function attachMedia($filename) {
        $tag = $this->getTag($this->getName($filename));

        $filenamePath = $this->getFullTempPath($filename);
        $media = $this->uploadMedia($filenamePath, $this->getName($filename));
        $this->model->attachMedia($media, $tag);
    }

    private function saveImageToDisk($image, $filename, $disk = 'images'){
        Storage::disk($disk)->put($filename, (string) $image->encode());
    }
    
    private function deleteImageFromDisk($filename, $disk = 'images'){
        Storage::disk($disk)->delete($filename);
    }

}
