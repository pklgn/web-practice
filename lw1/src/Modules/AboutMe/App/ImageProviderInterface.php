<?php

namespace App\Modules\AboutMe\App;

interface ImageProviderInterface
{
    public function getImageUrls(string $keyword): array;
}