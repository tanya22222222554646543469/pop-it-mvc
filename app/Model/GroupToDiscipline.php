<?php

namespace Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class GroupToDiscipline extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'discipline_group';

    protected $fillable = [
        'group_id',
        'discipline_id'
    ];
}