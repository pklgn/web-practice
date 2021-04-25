<?php
namespace App\Modules;
use IvanUskov\ImageSpider\ImageSpider;

class ImageProvider
{
    public string $hobby;

    public function __construct(string $keyWord)
    {
        $this->hobby = $keyWord;
    }

    public function getImagesArray(): array
    {
        return ImageSpider::find($this->hobby);
    }

    public function chooseFiveIndexes(): array
    {
        $imagesNumber = count($this->getImagesArray());
        $minIndexVal = 0;
        $maxIndexVal = $imagesNumber - 1;
        for($i = 0; $i < 5; $i++)
            $chosenIndexes[] = random_int($minIndexVal, $maxIndexVal);
        return $chosenIndexes;
    }

    public function gatherChosenImages(): array
    {
        $initGallery = $this->getImagesArray();
        $indexes = $this->chooseFiveIndexes();
        foreach ($indexes as $index)
            $chosenGallery[] = $initGallery[$index];
        return $chosenGallery;
    }
}