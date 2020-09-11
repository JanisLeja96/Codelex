<?php
//TODO

Class Movie
{
    public string $title;
    public string $studio;
    public string $rating;

    public function __construct($title, $studio, $rating)
    {
        $this->title = $title;
        $this->rating = $rating;
        $this->studio = $studio;
    }

    public static function newPG($title, $studio)
    {
        $instance = new self($title, $studio, 'PG');
        return $instance;
    }

    public static function getPG(array $movies)
    {
        return array_filter($movies, fn($movie) => $movie->rating == 'PG');
    }

}

$casinoRoyale = new Movie('Casino Royale', 'Eon Productions', 'PG13');
$glass = new Movie('Glass', 'Buena Vista International', 'PG13');
$spiderman = new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG');

$movies = [$casinoRoyale, $glass, $spiderman];

foreach (Movie::getPG($movies) as $movie) {
    echo $movie->title;
}
