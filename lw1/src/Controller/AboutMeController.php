<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Modules\AboutMe\App\HobbieService;
use App\View\AboutMe\AboutMePageView;

class AboutMeController extends AbstractController
{
    public function aboutMePage(HobbieService $hs): Response
    {
        $hobbies = $hs->getHobbies();
        $pageView = new AboutMePageView($hobbies);
        $pageParams = $pageView->buildParams();
        return $this->render('about_me/about_me.html.twig', $pageParams);
    }

    public function updateOneHobby(HobbieService $hs, Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $keyword = $data['keyword'];
        $hs->updateHobby($keyword);
        return $this->redirectToRoute('about_me');
    }

    public function updateAllHobbies(HobbieService $hs): Response
    {
        $hs->updateHobbies();
        return $this->redirectToRoute('about_me');
    }
}