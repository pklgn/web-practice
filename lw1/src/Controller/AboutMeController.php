<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\PageView\AboutMePageView;

class AboutMeController extends AbstractController
{
    public function simple_answer(): Response
    {
        return $this->render('main/main.html.twig', [
            'about' => ucwords('Ермаков Павел Константинович'),
        ]);
    }

    public function about(): Response
    {
        $args = new AboutMePageView();
        $arrayInfo = $args->getAboutMeInfo();
        return $this->render('about/about.html.twig', $arrayInfo);
    }
}