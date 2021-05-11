<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Modules\AboutMe\App\HobbieService;
use App\View\AboutMe\AboutMePageView;

class AboutMeController extends AbstractController
{
    public function simple_answer(): Response
    {
        return $this->render('main/main.html.twig', [
            'about' => ucwords('Ермаков Павел Константинович'),
        ]);
    }

    public function aboutMePage(HobbieService $hs): Response
    {
        $hobbies = $hs->getHobbies();
        $pageView = new AboutMePageView($hobbies);
        $pageParams = $pageView->buildParams();
        return $this->render('about_me/about_me.html.twig', $pageParams);
    }

}