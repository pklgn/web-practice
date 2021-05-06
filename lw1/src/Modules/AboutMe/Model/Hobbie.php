<?php


namespace App\Modules\AboutMe\Model;
use App\Modules\AboutMe\App\HobbieConfigurationInterface;
use App\Modules\AboutMe\App\ImageProviderInterface;

class Hobbie
{
    public string $keyword;
    public string $name;
    public array $images;

    public function __construct(string $keyword,
                                string $name,
                                array $images)

    {
        $this->keyword = $keyword;
        $this->name = $name;
        $this->images =$images;
    }

    public function setName($name): string
    {
        return ucwords($name);
    }

    public function getHobbie(): array
    {
        return [
            'keyword' => $this->keyword,
            'name' => $this->setName($this->name),
            'images' => $this->images,
        ];
    }

}