<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['parent_id', 'name', 'display_name', 'description'];
    
    public function products(){
        return $this->belongsToMany('App\Product');
    }
    
}
