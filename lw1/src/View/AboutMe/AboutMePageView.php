<?php


namespace App\View\AboutMe;


class AboutMePageView
{
    private array $hobbies;

    public function __construct(array $hobbies)
    {
        $this->hobbies = $hobbies;
    }

    public function buildParams(): array
    {
        $hobbiesTitles = [];
        $hobbiesImages = [];
        foreach ($this->hobbies as $hobby)
        {
            $hobbiesTitles[] = $hobby->getName();
            $hobbiesImages[$hobby->getName()] = $hobby->getImages();
        }

        return [
            'titles' => $hobbiesTitles,
            'imagesLists' => $hobbiesImages,
        ];
    }
}