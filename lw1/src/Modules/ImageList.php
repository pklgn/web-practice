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

    public function getImagesArray($hobby)
    {
        $array = ImageSpider::find($hobby);
        return $array;
    }

    public function chooseOne()
    {
        $images = $this->getImagesArray($this->hobby);
        return $images;
    }
}