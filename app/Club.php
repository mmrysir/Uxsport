<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Club extends Model
{

    use HasFactory;
    protected  $table ="clubs";
    protected $fillable = [

        'name',
        'area'
    ];

    public  function  player()
    {
        return $this->hasMany(Player::class , 'players');
    }
    public  function  coach()
    {
        return $this->hasOne(Coach::class , 'coaches');
    }

    public  function tournament()
    {
        return $this->hasMany(Tournament::class, 'tournaments');
    }
}
