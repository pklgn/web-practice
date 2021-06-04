<?php


namespace App\Modules\AboutMe\App;


interface ImageRepositoryInterface
{
    public function getImages(string $keyword): array;
    public function addImages(string $keyword, array $urls): void;
    public function removeImages(string $keyword): void;
}