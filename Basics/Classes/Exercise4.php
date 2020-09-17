<?php
//TODO

Class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct($title, $studio, $rating)
    {
        $this->title = $title;
        $this->rating = $rating;
        $this->studio = $studio;
    }

    public function getTitle()
    {
        return $this->title;
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
    echo $movie->getTitle();
}
