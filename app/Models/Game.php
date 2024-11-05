<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    use HasFactory;

    public function playerWhite(){
        return $this->belongsTo(User::class, 'player_white_id');
    }

    public function playerBlack(){
        return $this->belongsTo(User::class, 'player_black_id');
    }

    public function tournament(){
        return $this->belongsTo(Tournament::class);
    }

    // Define scope for filtering by player
    public function scopeByPlayer(Builder $query, $playerId): Builder
    {
        return $query->where(function ($q) use ($playerId) {
            $q->where('player_white_id', $playerId)
                ->orWhere('player_black_id', $playerId);
        });
    }

    // Define scope for filtering by tournament
    public function scopeByTournament(Builder $query, $tournamentId): Builder
    {
        return $query->where('tournament_id', $tournamentId);
    }

    // Define scope for filtering by date range
    public function scopeByDateRange(Builder $query, $startDate, $endDate): Builder
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }
}
