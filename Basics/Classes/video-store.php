<?php

class Application
{
    public VideoStore $videoStore;

    public function __construct()
    {
        $this->videoStore = new VideoStore();
    }

    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to rate video\n";
            echo "Choose 5 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->add_movies();
                    break;
                case 2:
                    $this->rent_video();
                    break;
                case 3:
                    $this->return_video();
                    break;
                case 4:
                    $this->rateVideo();
                    break;
                case 5:
                    $this->list_inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function add_movies()
    {

        $this->videoStore->addVideo(readline("Enter movie title: "));
    }

    private function rent_video()
    {
        $this->videoStore->checkOut(readline("Enter movie title: "));
    }

    private function return_video()
    {
        $this->videoStore->return(readline("Enter movie title: "));
    }

    private function rateVideo()
    {
        $this->videoStore->rate((readline('Enter movie title: ')),
            (readline('Enter rating (1-10): ')));
    }

    private function list_inventory()
    {
        $this->videoStore->listInventory();
    }
}

class VideoStore
{
    public array $videos;

    public function addVideo(string $title)
    {
        $this->videos[] = new Video($title);
    }

    public function checkOut(string $title)
    {
        foreach ($this->videos as $video) {
            if ($title == $video->title) {
                $video->checkOut();
                break;
            }
        }
    }

    public function return(string $title) {
        foreach ($this->videos as $video) {
            if ($title == $video->title) {
                $video->return();
                break;
            }
        }
    }

    public function rate($title, $rating) {
        foreach ($this->videos as $video) {
            if ($title == $video->title) {
                $video->rate($rating);
                break;
            }
        }
    }

    public function listInventory() {
        echo "\n\n";
        foreach($this->videos as $video) {
            echo "Title: {$video->title} Rating: {$video->averageRating} ";
            if (count($video->ratings) > 1) {
                echo (count(array_filter
                    ($video->ratings, fn($rating) =>
                        $rating >= 4)) / count($video->ratings)) * 100 . "% of people liked it";
            }
            echo " In store:";
            echo $video->isCheckedOut ? ' No' : ' Yes';
            echo "\n";
        }
        echo "\n\n";
    }


}

class Video
{
    public string $title;
    public bool $isCheckedOut = false;
    public array $ratings;
    public float $averageRating = 0;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function checkOut()
    {
        $this->isCheckedOut = true;
    }

    public function return()
    {
        $this->isCheckedOut = false;
    }

    public function rate(float $rating)
    {
        $this->ratings[] = $rating;
        $this->averageRating = (array_sum($this->ratings)) / count($this->ratings);
    }
}

$app = new Application();
$app->run();

/*$videoStore = new VideoStore();
$videoStore->addVideo('The Matrix');
$videoStore->addVideo('Godfather II');
$videoStore->addVideo("Star Wars");

$videoStore->rate('The Matrix', 10);
$videoStore->rate('The Matrix', 8);
$videoStore->rate('Godfather II', 10);
$videoStore->rate('Godfather II', 8);
$videoStore->rate('Star Wars', 10);
$videoStore->rate('Star Wars', 8);

$videoStore->checkOut('Godfather II');

$videoStore->listInventory();*/
