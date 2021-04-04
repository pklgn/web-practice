<?php
namespace App\Modules;
use IvanUskov\ImageSpider\ImageSpider;

class ImageList extends ImageSpider
{
    public string $hobby;

    public function __construct($keyWord)
    {
        $this->hobby = $keyWord;
    }

    public function getImagesArray()
    {
        $array = ImageSpider::find($this->hobby);
        return $array;
    }

    public function chooseFiveImages()
    {
        $imagesArray = $this->getImagesArray();
        $output = array_rand($imagesArray,5);
        return $output;
    }
}