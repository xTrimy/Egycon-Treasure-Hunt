<?php

namespace App\Console\Commands;

use App\Models\TournamentMatch;
use Illuminate\Console\Command;

class ShowTournamentMatchScores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tournamentMatch:showScores {tournamentMatch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shows the scores of a tournament match';

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
        // Get the tournament match ID from the command argument
        $tournamentMatchId = $this->argument('tournamentMatch');
        // Find the tournament match
        $tournamentMatch = TournamentMatch::find($tournamentMatchId);
        // Output the tournament match ID
        $this->info("Showing scores of tournament match {$tournamentMatchId}");
        // Output the number of players in the tournament match
        $this->info('Players Count: ' . $tournamentMatch->players->count());
        // Output the number of rounds in the tournament match
        $this->info('Rounds Count: ' . $tournamentMatch->matchRounds->count());
        // Output the number of players per match in the tournament
        $this->info('Tournament Players Per Match: ' . $tournamentMatch->tournament->players_per_match);
        // Check if the tournament match was found
        if (!$tournamentMatch) {
            // Output an error message
            $this->error('Tournament match not found');
            // Return an error code
            return 1;
        }
        // Check if the tournament match has not started
        if (!$tournamentMatch->start_time) {
            // Output an error message
            $this->error('Tournament match not started');
            // Return an error code
            return 1;
        }
        // Check if the tournament match has ended
        if ($tournamentMatch->end_time) {
            // Output an error message
            $this->error('Tournament match already ended');
            // Return an error code
            return 1;
        }
        // Output the scores of the tournament match
        $this->info('Scores:');
        // Loop through the players in the tournament match
        foreach ($tournamentMatch->players_scores as $player_id => $score) {
            // Output the player's name and score
            $player = $tournamentMatch->players->where('id', $player_id)->first();
            $this->info("{$player->name}({$player->id}): {$score}");
        }
        // Return a success code
        return 0;
    }
}
