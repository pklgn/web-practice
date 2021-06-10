<?php


namespace App\Modules\AboutMe\Infrastructure;


use App\Modules\AboutMe\Model\Image;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use App\Modules\AboutMe\App\ImageRepositoryInterface;

class ImageRepository implements ImageRepositoryInterface
{
    private EntityManagerInterface $entityManager;
    private ObjectRepository $repository;

    /**
     * ImageRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Image::class);
    }

    /**
     * @param string $keyword
     * @param array $urls
     */
    public function addImages(string $keyword, array $urls): void
    {
        foreach ($urls as $url)
        {
            $newImage = new Image($keyword, $url);
            $this->entityManager->persist($newImage);
        }
        $this->entityManager->flush();
    }

    /**
     * @param string $keyword
     * @return array
     */
    public function getImages(string $keyword): ?array
    {
        return $this->repository->findBy([
            'keyword' => $keyword
        ]);
    }

    public function removeAllImages(): void
    {
        $images = $this->repository->findAll();
        foreach ($images as $image)
        {
            $this->entityManager->remove($image);
        }
        $this->entityManager->flush();
    }

    private function zip(array $indexes, $values): array
    {
        $result = [];

        $arrayLength = count($indexes);
        for ($i = 0; $i < $arrayLength; $i++)
        {
            $result[$indexes[$i]] = $values[$i];
        }

        return $result;
    }

    public function updateAllImages(array $newImages): void
    {
        $this->removeAllImages();
        foreach ($newImages as $keyword => $imagesUrls)
        {
            $this->addImages($keyword, $imagesUrls);
        }
    }

}