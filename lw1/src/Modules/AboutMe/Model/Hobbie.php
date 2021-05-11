<?php


namespace App\Modules\AboutMe\Model;
use App\Modules\AboutMe\App\HobbieConfigurationInterface;
use App\Modules\AboutMe\App\ImageProviderInterface;

class Hobbie
{
    private string $keyword;
    private string $name;
    private array $images;

    public function __construct(string $keyword, string $name, array $images)
    {
        $this->keyword = $keyword;
        $this->name = $name;
        $this->images =$images;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImages(): array
    {
        return $this->images;
    }

    public function getHobbie(): array
    {
        return [
            'keyword' => $this->keyword,
            'name' => $this->name,
            'images' => $this->images,
        ];
    }

}