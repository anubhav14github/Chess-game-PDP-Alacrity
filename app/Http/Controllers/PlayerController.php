<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //
    public function index(){
        return response()->json(Player::all());
    }

    public function show($id){
        return response()->json(Player::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'nullable|integer|min:1000|max:2800',
        ]);

        $player = Player::create($request->all());
        return response()->json($player, 201);
    }

    public function update(Request $request, $id){
        $player = Player::findOrFail($id);
        $player->update($request->all());

        return response()->json($player);
    }

    public function destroy($id){
        Player::destroy($id);
        return response()->json(['message' => 'Player deleted successfully.']);
    }
}
