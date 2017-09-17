<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaSize extends Model
{
    public $fillable = ['tag', 'width', 'height', 'enabled'];
    
    protected $casts = [ 'enabled' => 'boolean' ];
}
