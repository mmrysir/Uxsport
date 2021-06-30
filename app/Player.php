<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected  $table ='players';
    protected $fillable = [
        'image',
        'name',
        'weight',
        'height',
        'age',
        'position',
        'club_id'

        ];
    public function club()
    {
        return $this->belongsTo(Club::class,'clubs');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'events');
    }
}
