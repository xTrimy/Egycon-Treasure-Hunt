import { Match, Tournament } from "./tournament";

export interface Player {
    id: number,
    name: string,
    email: string,
    avatar: string,
    tournaments: Tournament[],
    matches: Match[]
}