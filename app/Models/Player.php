<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    use HasFactory;

    public function gamesAsWhite(){
        return $this->hasMany(Game::class, 'player_white_id');
    }

    public function gamesAsBlack(){
        return $this->hasMany(Game::class, 'player_black_id');
    }
}
