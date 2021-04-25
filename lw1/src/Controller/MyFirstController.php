<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Modules\ImageProvider;
use Symfony\Component\HttpFoundation\Response;

class MyFirstController extends AbstractController
{
    public function simple_answer(): Response
    {
        return $this->render('main/main.html.twig', [
            'about' => ucwords('Ермаков Павел Константинович'),
        ]);
    }

    public function about(): Response
    {
        $galleryTitles = ['Buran', 'ISS', 'Space'];
        foreach ($galleryTitles as $galleryTitle)
            $galleryHobbies[$galleryTitle] = new ImageProvider($galleryTitle);
        foreach ($galleryHobbies as $title => $galleryHobby)
            $imagesLists[$title] = $galleryHobby->gatherChosenImages();
        if (isset($imagesLists)) {
            return $this->render('about/about.html.twig', [
                'about' => ucwords('Ермаков Павел Константинович'),
                'titles' => $galleryTitles,
                'imagesLists' => $imagesLists,
            ]);
        }
    }
}