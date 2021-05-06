<?php


namespace App\Modules\AboutMe\App;

use App\Modules\AboutMe\Model\Hobbie;
class HobbieService
{
    private ImageProviderInterface $imageProvider;
    private HobbieConfigurationInterface $configuration;

    public function __construct(ImageProviderInterface $imageProvider,
                                HobbieConfigurationInterface $configuration)
    {
        $this->imageProvider = $imageProvider;
        $this->configuration = $configuration;
    }

    public function getHobbies(): array
    {
        $hobbieMap = $this->configuration->getHobbieMap();
        foreach ($hobbieMap as $keyword => $name)
        {
            $images = $this->imageProvider->getImageUrls($name);
            $Hobbies[] = new Hobbie($keyword, $name, $images);
        }
        return $Hobbies;
    }
}