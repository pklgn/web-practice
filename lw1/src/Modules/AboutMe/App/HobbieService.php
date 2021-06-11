<?php


namespace App\Modules\AboutMe\App;

use App\Modules\AboutMe\Model\Image;
use App\Modules\AboutMe\Model\Hobbie;
use phpDocumentor\Reflection\Types\Boolean;


class HobbieService
{
    private ImageProviderInterface $imageProvider;
    private ImageRepositoryInterface $imageRepository;
    private HobbieConfigurationInterface $configuration;

    public function __construct(ImageProviderInterface $imageProvider,
                                ImageRepositoryInterface $imageRepository,
                                HobbieConfigurationInterface $configuration)
    {
        $this->imageProvider = $imageProvider;
        $this->imageRepository = $imageRepository;
        $this->configuration = $configuration;
    }

    public function getHobbies(): array
    {
        $hobbies = [];

        $hobbieMap = $this->configuration->getHobbieMap();
        foreach ($hobbieMap as $keyword => $name)
        {
            $images[] = $this->imageRepository->getImages($keyword);
        }

        if (empty($images))
        {
            $newUrls = [];
            foreach ($hobbieMap as $keyword => $name)
            {
                $newUrls[$keyword] = $this->imageProvider->getImageUrls($name);
            }
            $this->imageRepository->updateAllImages($newUrls);
        }
        else
        {
            foreach ($hobbieMap as $keyword => $name)
            {
                $images = [];
                $imageObjects = $this->imageRepository->getImages($keyword);
                foreach ($imageObjects as $imageObject) {
                    $images[] = $imageObject->getUrl();
                }
                $hobbies[] = new Hobbie($keyword, $name, $images);
            }
        }
        return $hobbies;
    }

    public function getUpdatedHobby(string $keyword): array
    {
        return $this->imageRepository->getImages($keyword);
    }

    public function updateHobbies(): array
    {
        $newUrls = [];
        $hobbies = [];
        $hobbieMap = $this->configuration->getHobbieMap();
        foreach ($hobbieMap as $keyword => $name)
        {
            $newUrls[$keyword] = $this->imageProvider->getImageUrls($name);
        }
        $this->imageRepository->updateAllImages($newUrls);
        foreach ($hobbieMap as $keyword => $name) {
            $images = [];
            $imageObjects = $this->imageRepository->getImages($keyword);
            foreach ($imageObjects as $imageObject) {
                $images[] = $imageObject->getUrl();
            }
            $hobbies[] = new Hobbie($keyword, $name, $images);
        }
        return $hobbies;
    }

    public function updateHobby(string $keyword): array
    {
        $hobby = [];
        $newUrls = [];
        $hobbieMap = $this->configuration->getHobbieMap();
        foreach ($hobbieMap as $hobbieKeyword => $name)
        {
            $images = [];
            if ($hobbieKeyword === $keyword)
            {
                $newUrls = $this->imageProvider->getImageUrls($name);
                $this->imageRepository->updateImages($keyword, $newUrls);
                $imageObjects = $this->imageRepository->getImages($keyword);
                foreach ($imageObjects as $imageObject)
                {
                    $images[] = $imageObject->getUrl();
                }
            }
            $hobby[] = new Hobbie($hobbieKeyword, $name, $images);
        }
        return $hobby;
    }
}