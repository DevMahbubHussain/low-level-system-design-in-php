<?php

namespace App;

use App\enums\Genre;
use App\enums\Language;

class Movie{
    private string $name;
    private float $ratings;
    private  $genre;
    private  $language;

    public function __construct(string $name,float $ratings )
    {
        $this->name = $name;
        $this->ratings = $ratings;
    }

        // Getters and setters
    public function getName() {
        return $this->name;
    }
    
    public function getRatings() {
        return $this->ratings;
    }

    public function getGenre():Genre{
        return $this->genre;
    }
    public function getLanguage(): Language {
        return $this->language;
    }

    public function setGenre(Genre $genre):void{
        $this->genre = $genre;
    }

    public function setLanguge(Language $language):void{
        $this->language = $language;
    }
    


}