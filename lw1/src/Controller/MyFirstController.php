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
        $galleryFirstTitle = 'buran';
        $gallerySecondTitle = 'ISS';
        $galleryThirdTitle = 'space';
        $galleryFirst = new ImageList($galleryFirstTitle);
        $gallerySecond = new ImageList($gallerySecondTitle);
        $galleryThird = new ImageList($galleryThirdTitle);
        $galleryFirstArray = $galleryFirst->getImagesArray();
        $gallerySecondArray = $gallerySecond->getImagesArray();
        $galleryThirdArray = $galleryThird->getImagesArray();
        $galleryFirstArrayIndex = $galleryFirst->chooseFiveImages();
        $gallerySecondArrayIndex = $gallerySecond->chooseFiveImages();
        $galleryThirdArrayIndex = $galleryThird->chooseFiveImages();
        return $this->render('about/about.html.twig', [
            'about' => ucwords('Ермаков Павел Константинович'),
            'galleryFirstTitle' => ucwords($galleryFirstTitle),
            'gallerySecondTitle' => ucwords($gallerySecondTitle),
            'galleryThirdTitle' => ucwords($galleryThirdTitle),
            'galleryFirstArray' => $galleryFirstArray,
            'gallerySecondArray' => $gallerySecondArray,
            'galleryThirdArray' => $galleryThirdArray,
            'galleryFirstArrayIndex' => $galleryFirstArrayIndex,
            'gallerySecondArrayIndex' => $gallerySecondArrayIndex,
            'galleryThirdArrayIndex' => $galleryThirdArrayIndex,
        ]);
    }
}