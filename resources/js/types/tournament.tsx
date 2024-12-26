interface Player {
    id: number,
    name: string,
    email: string,
    avatar: string,
    phone: string,
}

interface MatchRoundScore {
    id: number,
    match_round_id: number,
    player_id: number,
    score: number
}

interface MatchRound {
    id: number,
    tournament_match_id: number,
    scores: MatchRoundScore[]
}

interface TournamentRoom {
    id: number,
    number: string,
    tournament_id: number,
    available_slots: number,
}


interface Match {
    id: number,
    room?: TournamentRoom,
    winner_id: number,
    start_time: Date,
    end_time: Date,
    match_rounds: MatchRound[],
    tournament_id: number,
    match_number: number,
    players: Player[]
}

interface TournamentRound {
    id: number,
    tournament_id: number,
    round_number: number,
    matches: Match[]
}

interface Tournament {
    id: number,
    name: string,
    registration_start_time: string,
    registration_end_time: string,
    started_at: string,
    ended_at: string,
    description: string,
    winner_id: number,
    players_per_match: number,
    rounds_per_match: number,
    max_players: number,
    min_players: number,
    rounds: TournamentRound[],
    rooms: TournamentRoom[]
}

export {
    Player,
    MatchRoundScore,
    MatchRound,
    TournamentRoom,
    Match,
    TournamentRound,
    Tournament
}