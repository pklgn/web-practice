<?php


namespace App\Modules\AboutMe\App;


interface ImageRepositoryInterface
{
    /**
     * @param string $keyword
     * @return array
     */
    public function getImages(string $keyword): ?array;

    /**
     * @param string $keyword
     * @param array $urls
     */
    public function addImages(string $keyword, array $urls): void;

    public function removeAllImages(): void;

    public function updateAllImages(array $newImages): void;
}