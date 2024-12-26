<?php

namespace Database\Factories;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tournament::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'registration_start_time' => now(),
            'registration_end_time' => now()->addDays(2),
            'location' => $this->faker->address(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'is_public' => 1,
            'is_active' => 1,
            'cancellation_reason' => $this->faker->text(),
            'max_players' => 256,
            'min_players' => 64,
            'players_per_match' => 4,
            'rounds_per_match' => 4,
            'api_key' => $this->faker->uuid(),
            'api_secret' => $this->faker->uuid(),
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => 0,
            ];
        });
    }

    public function cancelled()
    {
        return $this->state(function (array $attributes) {
            return [
                'cancelled_at' => now(),
                'cancelled_by' => 1,
            ];
        });
    }

    public function started()
    {
        return $this->state(function (array $attributes) {
            return [
                'started_at' => now(),
            ];
        });
    }

    public function ended()
    {
        return $this->state(function (array $attributes) {
            return [
                'ended_at' => now(),
            ];
        });
    }

    public function withWinner()
    {
        return $this->state(function (array $attributes) {
            return [
                'winner_id' => 1,
            ];
        });
    }

    public function withCreatedBy()
    {
        return $this->state(function (array $attributes) {
            return [
                'created_by' => 1,
            ];
        });
    }

    public function withCancelledBy()
    {
        return $this->state(function (array $attributes) {
            return [
                'cancelled_by' => 1,
            ];
        });
    }

    public function withRounds($rounds)
    {
        return $this->afterCreating(function (Tournament $tournament) use ($rounds) {
            $tournament->rounds()->saveMany(\App\Models\TournamentRound::factory()->count($rounds)->make());
        });
    }

    public function withRoundsWithMatches($rounds, $matches)
    {
        return $this->afterCreating(function (Tournament $tournament) use ($rounds, $matches) {
            $tournament->rounds()->saveMany(\App\Models\TournamentRound::factory()->count($rounds)->make());
            $tournament->rounds->each(function ($round) use ($matches) {
                $round->matches()->saveMany(\App\Models\TournamentMatch::factory()->count($matches)->make());
            });
        });
    }
}
