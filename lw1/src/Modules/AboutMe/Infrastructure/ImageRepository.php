<?php


namespace App\Modules\AboutMe\Infrastructure;


use App\Modules\AboutMe\App\ImageRepositoryInterface;
use App\Modules\AboutMe\Model\Image;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class ImageRepository implements ImageRepositoryInterface
{
    private EntityManagerInterface $entityManager;
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Image::class);
    }

    public function addImages(string $keyword, array $urls): void
    {
        foreach($urls as $url)
        {
            $newImage = new Image($keyword, $url);
            $this->entityManager->persist($newImage);
        }
        $this->entityManager->flush();
    }

    public function getImages(string $keyword): array
    {
        // TODO: Implement getImages() method.
    }

    public function removeImages(string $keyword): void
    {
        // TODO: Implement removeImages() method.
    }
}