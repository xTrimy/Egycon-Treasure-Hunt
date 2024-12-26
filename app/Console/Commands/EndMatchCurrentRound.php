<?php

namespace App\Console\Commands;

use App\Models\TournamentMatch;
use Illuminate\Console\Command;

class EndMatchCurrentRound extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tournamentMatch:endCurrentRound {tournamentMatch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ends the current round of a tournament match';

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
        $this->info("Ending current round of tournament match {$tournamentMatchId}");
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
        // Check if the current round of the tournament match was ended
        if ($tournamentMatch->endCurrentRound()) {
            // Output a success message
            $this->info('Current round of tournament match ended');
            // Return a success code
            return 0;
        }
        // Output an error message
        $this->error('Failed to end current round of tournament match');
        // Return an error code
        return 1;
    }
}
