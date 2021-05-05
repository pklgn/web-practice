<?php
namespace App\Modules;
use IvanUskov\ImageSpider\ImageSpider;

class ImageProvider
{
    private string $hobby;
    private const IMAGES_COUNT = 5;

    public function __construct(string $keyWord)
    {
        $this->hobby = $keyWord;
    }

    public function getImagesArray(): array
    {
        $initGallery = ImageSpider::find($this->hobby);
        $chosenKeys = array_rand($initGallery, self::IMAGES_COUNT);
        foreach ($chosenKeys as $chosenKey)
        {
            $chosenGallery[] = $initGallery[$chosenKey];
        }
        return $chosenGallery;
    }
}