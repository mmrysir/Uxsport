<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{

    use HasFactory;
    protected  $table = "coaches";
    protected $fillable = [
        'image',
        'name',
        'club_id'

    ];

    public function club()
    {
        return $this->hasOne(Club::class, 'clubs');

    }

}
