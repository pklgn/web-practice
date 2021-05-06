<?php


namespace App\Modules\AboutMe\Infrastructure;

use App\Modules\AboutMe\App\HobbieConfigurationInterface;

class ConstHobbieConfiguration implements HobbieConfigurationInterface
{
    public function getHobbieMap(): array
    {
        return [
            'rockets' => 'Buran',
            'exploration' => 'ISS',
            'space' => 'Space',
        ];
    }
}