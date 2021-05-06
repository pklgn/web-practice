<?php


namespace App\Modules\AboutMe\Infrastructure;

use App\Modules\AboutMe\App\ImageProviderInterface;
use IvanUskov\ImageSpider\ImageSpider;

class ImageProvider implements ImageProviderInterface
{
    private string $hobby;
    private const IMAGES_COUNT = 5;

    public function __construct(string $keyword)
    {
        $this->hobby = $keyword;
    }

    public function getImageUrls(string $keyword): array
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