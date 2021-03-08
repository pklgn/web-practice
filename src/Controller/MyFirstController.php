<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyFirstController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function simpleanswer()
    {
        return $this->render('main/showmain.html.twig', [
            'about' => ucwords('Ермаков Павел Константинович')
        ]);
    }

    /**
     * @Route("/pages/first")
     */
    public function smthnew()
    {
        return $this->render('about/show.html.twig', [
            'about' => ucwords('Ермаков Павел Константинович')
        ]);
    }
}