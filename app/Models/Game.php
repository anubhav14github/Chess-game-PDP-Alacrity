<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    use HasFactory;

    public function playerWhite(){
        return $this->belongsTo(Player::class, 'player_white_id');
    }

    public function playerBlack(){
        return $this->belongsTo(Player::class, 'player_black_id');
    }

    public function tournament(){
        return $this->belongsTo(Tournament::class);
    }
}
