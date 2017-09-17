<?php

namespace App\Libraries;

use Illuminate\Database\Eloquent\Model;
use App\MediaSize;
use MediaUploader;
use Image;
use Storage;

class MediaConverter {

    public static function generateSizes(Model $model, $imagePath) {

        $baseName = basename($imagePath);
        $baseNameWithoutExt = pathinfo($baseName, PATHINFO_FILENAME);
        $ext = pathinfo($baseName, PATHINFO_EXTENSION);

        $mediaSizes = MediaSize::all();
        
        $media = MediaUploader::fromSource($imagePath)->useFilename($baseNameWithoutExt)
                                                       ->toDirectory('sizes')
                                                       ->upload();
        $model->attachMedia($media, 'original');

        foreach ($mediaSizes as $mediaSize) {
            $img = Image::make($imagePath);
            $img->resize($mediaSize->width, $mediaSize->height);
            $tag = $mediaSize->width . 'x' . $mediaSize->height;
            $filename = $baseNameWithoutExt . '-' . $tag . '.' . $ext;
            Storage::disk('photos')->put('temp/' . $filename, (string) $img->encode());
            $media = MediaUploader::fromSource(env('APP_URL') . '/photos/temp/' . $filename)
                    ->useFilename($filename)
                    ->toDirectory('sizes')
                    ->upload();
            $model->attachMedia($media, $tag);
            Storage::disk('photos')->delete('temp/' . $filename);
        }
    }
    
    public static function removeAll(Model $model, $imagePath) {
        $modelMedia = $model->media()->get();
        
        foreach($modelMedia as $media){
            $basename = basename($media->getUrl());
            Storage::disk('photos')->delete('sizes/' . $basename);
        }
        
    }

}
