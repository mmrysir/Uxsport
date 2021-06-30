<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [

        'goal',
        'penality',
        'freekick',
        'shot',
        'assit',
        'pass',
        'interception',
        'position',
        'tackle',
        'drible',
        'yellow',
        'red',
        'player_id'


    ];

    public function player()
    {
        return $this->belongsToMany(Player::class , 'players');
    }
}
