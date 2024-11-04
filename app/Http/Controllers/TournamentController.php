<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    //
    public function index()
    {
        return response()->json(Tournament::all());
    }

    public function show($id)
    {
        return response()->json(Tournament::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ]);

        $tournament = Tournament::create($request->all());
        return response()->json($tournament, 201);
    }

    public function update(Request $request, $id)
    {
        $tournament = Tournament::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ]);

        $tournament->update($request->all());
        return response()->json($tournament);
    }

    public function destroy($id)
    {
        Tournament::destroy($id);
        return response()->json(['message' => 'Tournament deleted successfully.']);
    }
}
