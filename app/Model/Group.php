<?php

namespace Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'group of student';

    protected $fillable = [
        'title',
        'course',
        'semester',
    ];

}