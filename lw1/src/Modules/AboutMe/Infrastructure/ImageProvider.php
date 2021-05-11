<?php


namespace App\Modules\AboutMe\Infrastructure;

use App\Modules\AboutMe\App\ImageProviderInterface;
use IvanUskov\ImageSpider\ImageSpider;

class ImageProvider implements ImageProviderInterface
{
    private const IMAGES_COUNT = 5;

    public function getImageUrls(string $keyword): array
    {
        $initGallery = ImageSpider::find($keyword);
        $chosenKeys = array_rand($initGallery, self::IMAGES_COUNT);
        foreach ($chosenKeys as $chosenKey)
        {
            $chosenGallery[] = $initGallery[$chosenKey];
        }
        return $chosenGallery;
    }
}