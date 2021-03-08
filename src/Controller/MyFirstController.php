<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyFirstController
{
    /**
     * @Route("/")
     */
    public function simpleanswer()
    {
        return new Response('I would like to say hello to everybody!');
    }

    /**
     * @Route("/pages/first")
     */
    public function smthnew()
    {
        return new Response("That's a new page!");
    }
}