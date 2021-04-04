<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Modules\ImageList;

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
        $images = new ImageList('buran');
        $image = $images->chooseOne();
        return $this->render('about/about.html.twig', [
            'about' => ucwords('Ермаков Павел Константинович'),
            'image' => $image,
        ]);
    }
}