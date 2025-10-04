<?php

namespace App;

class MovieBooking
{
    private array $movies = [];
    private array $theaters  = [];
    private array $users  = [];
    private array $shows  = [];

    public function searchMovie(Movie $movie): array
    {

        return [];
    }

    public function addMovie(Movie $movie): void
    {
        $this->movies[] = $movie;
    }

    public function addTheater(Theater $theater): void
    {
        $this->theaters[] = $theater;
    }

    public function addUser(Registeruser $user): void
    {
        $this->users[] = $user;
    }

    public function addShow(Show $show): void
    {
        $this->shows[] = $show;
    }

    // Getters
    public function getMovies(): array
    {
        return $this->movies;
    }

    public function getTheaters(): array
    {
        return $this->theaters;
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    public function getShows(): array
    {
        return $this->shows;
    }
}
