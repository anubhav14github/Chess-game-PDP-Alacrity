<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    //
    public function index(Request $request)
    {

        $query = Game::with(['playerWhite', 'playerBlack', 'tournament']);

        // Use the defined scopes if filters are present in the request
        if ($request->has('player_id')) {
            $query->byPlayer($request->player_id);
        }

        if ($request->has('tournament_id')) {
            $query->byTournament($request->tournament_id);
        }

        if ($request->has(['start_date', 'end_date'])) {
            $query->byDateRange($request->start_date, $request->end_date);
        }

        // return response()->json($query->get());

        $games = $query->get();

        return Inertia::render('GameList', [
            'games' => $games,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pgn' => 'required|string',
            'player_white_id' => 'required|exists:players,id',
            'player_black_id' => 'required|exists:players,id',
            'tournament_id' => 'nullable|exists:tournaments,id',
            'date' => 'nullable|date',
        ], [
            'pgn.required' => 'PGN notation is required for each game.',
            'player_white_id.required' => 'Please select a white player for this game.',
            'player_black_id.required' => 'Please select a black player for this game.',
        ]);

        $game = Game::create($validatedData);

        return response()->json($game, 201);
    }
}
