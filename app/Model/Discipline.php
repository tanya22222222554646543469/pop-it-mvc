<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Discipline extends Model 
{
   use HasFactory;

   public $timestamps = false;
   protected $fillable = [
       'title'
   ];
   protected $table = 'discipline';
   
}