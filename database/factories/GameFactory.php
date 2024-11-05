<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pgnSamples = [
            '[Event "Casual Game"] 1. e4 e5 2. Nf3 Nc6 3. Bb5 a6',
            '[Event "Casual Game"] 1. d4 d5 2. c4 e6 3. Nc3 Nf6',
            '[Event "Casual Game"] 1. e4 c5 2. Nf3 d6 3. d4 cxd4 4. Nxd4',
            '[Event "Tournament"] 1. Nf3 d5 2. g3 Bg4 3. Bg2 Nc6',
        ];

        return [
            //
            'pgn' => $this->faker->randomElement($pgnSamples),
            'player_white_id' => User::factory(),                        
            'player_black_id' => User::factory(),                       
            'tournament_id' => Tournament::factory(),                      
            'date' => $this->faker->date,
        ];
    }
}
