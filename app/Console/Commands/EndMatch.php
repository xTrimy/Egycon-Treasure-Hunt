<?php

namespace App\Console\Commands;

use App\Models\TournamentMatch;
use Illuminate\Console\Command;

class EndMatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tournamentMatch:end {tournamentMatch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ends a tournament match';

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
        $tournamentMatch = TournamentMatch::find($tournamentMatchId);
        $this->info("Ending tournament match {$tournamentMatchId}");
        $this->info('Players Count: ' . $tournamentMatch->players->count());
        $this->info('Tie Exists?: ' . ($tournamentMatch->tie_exists ? 'Yes' : 'No'));
        $this->info('Rounds Count: ' . $tournamentMatch->matchRounds->count());
        $this->info('Tournament Players Per Match: ' . $tournamentMatch->tournament->players_per_match);
        if (!$tournamentMatch) {
            $this->error('Tournament match not found');
            return 1;
        }
        if (!$tournamentMatch->start_time) {
            $this->error('Tournament match not started');
            return 1;
        }
        if ($tournamentMatch->end_time) {
            $this->error('Tournament match already ended');
            return 1;
        }
        if ($tournamentMatch->endMatch()) {
            $this->info('Tournament match ended');
            $this->info('Tournament match Winner: ' . $tournamentMatch->winner->name);
            return 0;
        }
        $this->error('Failed to end tournament match');
        return 1;
    }
}
