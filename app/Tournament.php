<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected  $table='tournaments';
    protected $fillable = [

        'name',
        'club_id'
    ];

public function club()
{
    return $this->hasMany(Club::class, 'clubs');
}
}
