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
        foreach ($this->hobbies as $hobbie)
        {
            $hobbiesTitles[] = $hobbie->getName();
            $hobbiesImages[$hobbie->getName()] = $hobbie->getImages();
        }

        return [
            'titles' => $hobbiesTitles,
            'imagesLists' => $hobbiesImages,
        ];
    }
}