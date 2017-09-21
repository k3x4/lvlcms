<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaSize extends Model
{
    public $fillable = ['tag', 'width', 'height', 'crop', 'enabled'];
    
    protected $casts = [ 'crop' => 'boolean', 'enabled' => 'boolean' ];
}
