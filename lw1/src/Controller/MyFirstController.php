<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Modules\ImageProvider;

class MyFirstController extends AbstractController
{
    public function simple_answer()
    {
        return $this->render('main/main.html.twig', [
            'about' => ucwords('Ермаков Павел Константинович'),
        ]);
    }

    public function about()
    {
        $galleryTitles = ['buran', 'ISS', 'space'];
        foreach ($galleryTitles as $galleryTitle)
            $galleryHobbies[$galleryTitle] = new ImageProvider($galleryTitle);
        foreach ($galleryHobbies as $title => $galleryHobby)
            $imagesLists[$title] = $galleryHobby->gatherChosenImages();
        return $this->render('about/about.html.twig', [
            'about' => ucwords('Ермаков Павел Константинович'),
            'titles' => $galleryTitles,
            'imagesLists' => $imagesLists,
        ]);
    }
}