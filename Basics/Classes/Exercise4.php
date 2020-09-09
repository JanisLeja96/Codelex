<?php
//TODO

Class Movie {
    public string $title;
    public string $studio;
    public string $rating;

    public function __construct($title, $rating, $studio) {
        $this->title = $title;
        $this->rating = $rating;
        $this->studio = $studio;
    }

    public static function newPG($title, $rating) {

    }
}