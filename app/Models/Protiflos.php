<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Protiflos extends Model{
    
    protected $table = 'protiflos';
    

   protected $fillable = [
       'profile',
       'covers',
       'About',
       'Edu',
       'hobbies', 'skils'
   ];

    
}