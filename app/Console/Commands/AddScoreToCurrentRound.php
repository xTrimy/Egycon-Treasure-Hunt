<?php

namespace App\Console\Commands;

use App\Models\PlayerUser;
use App\Models\TournamentMatch;
use Illuminate\Console\Command;

class AddScoreToCurrentRound extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tournamentMatch:addScore {tournamentMatch} {player} {score}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a score to the current round of a tournament match';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tournamentMatchId = $this->argument('tournamentMatch');
        $playerId = $this->argument('player');
        $score = $this->argument('score');
        $tournamentMatch = TournamentMatch::find($tournamentMatchId);
        $player = PlayerUser::find($playerId);

        if (!$tournamentMatch) {
            $this->error('Tournament match not found');
            return 1;
        }
        $this->info("Adding score to tournament match {$tournamentMatchId}");
        $this->info('Players Count: ' . $tournamentMatch->players->count());
        $this->info('Rounds Count: ' . $tournamentMatch->matchRounds->count());
        if (!$tournamentMatch->currentRound) {
            $this->error('No round is currently active');
            return 1;
        }
        $this->info('Current Round: ' . $tournamentMatch->currentRound->round_number);
        $this->info('Tournament Players Per Match: ' . $tournamentMatch->tournament->players_per_match);
        if (!$player) {
            $this->error('Player not found');
            return 1;
        }
        $this->info("Adding score to player {$player->id}");
        $this->info("Player Name: " . $player->name);

        if (!$tournamentMatch->start_time) {
            $this->error('Tournament match not started');
            return 1;
        }
        if ($tournamentMatch->end_time) {
            $this->error('Tournament match already ended');
            return 1;
        }
        if ($tournamentMatch->addScoreToCurrentRound($playerId, $score)) {
            $this->info('Score added to tournament match');
            return 0;
        }
        $this->error('Failed to add score to tournament match');
        return 1;
    }
}
