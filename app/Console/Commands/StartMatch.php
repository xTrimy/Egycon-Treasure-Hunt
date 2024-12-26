<?php

namespace App\Console\Commands;

use App\Models\TournamentMatch;
use Illuminate\Console\Command;

class StartMatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tournamentMatch:start {tournamentMatch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starts a tournament match';

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
        $this->info("Starting tournament match {$tournamentMatchId}");
        $this->info('Players Count: ' . $tournamentMatch->players->count());
        $this->info('Rounds Count: ' . $tournamentMatch->matchRounds->count());
        $this->info('Tournament Players Per Match: ' . $tournamentMatch->tournament->players_per_match);
        if (!$tournamentMatch) {
            $this->error('Tournament match not found');
            return 1;
        }
        if ($tournamentMatch->start_time) {
            $this->error('Tournament match already started');
            return 1;
        }
        if ($tournamentMatch->startMatch()) {
            $this->info('Tournament match started');
            return 0;
        }
        $this->error('Failed to start tournament match');
        return 1;
    }
}
