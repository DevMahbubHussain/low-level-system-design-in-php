<?php 

namespace App\CarRental\Contracts;

interface SearchableInterface{
    public function search(string $query):array;
}