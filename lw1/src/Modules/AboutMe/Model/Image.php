<?php


namespace App\Modules\AboutMe\Model;


class Image
{
    private int $id;
    private string $keyword;
    private string $url;

    public function getId(): int
    {
        return $this->id;
    }
    public function getKeyword(): string
    {
        return $this->keyword;
    }
    public function getUrl(): string
    {
        return $this->url;
    }
}