<?php

namespace App\PageView;

use App\Modules\ImageProvider;

class AboutMePageView
{
    private array $galleryTitles = ['Buran', 'ISS', 'Space'];
    private string $name = 'Ермаков Павел Константинович';

    private function getImagesArrays($galleryTitles): array
    {
        foreach ($galleryTitles as $galleryTitle)
        {
            $galleryHobbies[$galleryTitle] = new ImageProvider($galleryTitle);
        }
        foreach ($galleryHobbies as $title => $galleryHobby)
        {
            $imagesLists[$title] = $galleryHobby->getImagesArray();
        }

        return $imagesLists;
    }

    public function getAboutMeInfo(): array
    {
        return [
            'about' => ucwords($this->name),
            'titles' => $this->galleryTitles,
            'imagesLists' => self::getImagesArrays($this->galleryTitles),
        ];
    }
}