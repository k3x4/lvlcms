<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Product extends Model
{
    use Mediable;
    
    public $fillable = ['title','description'];
    
    public function categories(){
        return $this->hasMany('App\Category');
    }
    
}
