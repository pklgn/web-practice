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
            foreach ($hobbieMap as $keyword => $name) {
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

    public function updateHobbies()
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
}