<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyFirstController extends AbstractController
{
    public function simple_answer()
    {
        return $this->render('main/main.html.twig', [
            'about' => ucwords('Ермаков Павел Константинович')
        ]);
    }

    public function about()
    {
        return $this->render('about/about.html.twig', [
            'about' => ucwords('Ермаков Павел Константинович')
        ]);
    }
}