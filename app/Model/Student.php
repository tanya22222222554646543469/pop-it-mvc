<?php

namespace Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'students';

    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'gender',
        'date_of_birth',
        'address',
        'student_group'
    ];
}