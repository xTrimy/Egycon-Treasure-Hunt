<?php

namespace Database\Factories;

use App\Models\TournamentRound;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentRoundFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TournamentRound::class;
    protected $fillable = [
        'tournament_id',
        'round_number',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tournament_id' => 1,
            'round_number' => 1,
        ];
    }

    public function roundNumber($roundNumber)
    {
        return $this->state(function (array $attributes) use ($roundNumber) {
            return [
                'round_number' => $roundNumber,
            ];
        });
    }

    public function withMatches($matches)
    {
        return $this->afterCreating(function (TournamentRound $tournamentRound) use ($matches) {
            $tournamentRound->matches()->createMany($matches);
        });
    }
}
