<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControllPage extends AbstractController
{

    #[Route('/', name: 'index')]
    public function home(): Response
    {
        return $this->render('./page/report.html.twig', [
            'title' => 'Home alone',
        ]);
    }


    #[Route('/report', name: 'report')]
    public function raport(): Response
    {
        return $this->render('./page/report.html.twig', [
            'title' => 'Report',
        ]);
    }




    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('./page/about.html.twig', [
            'title' => 'About',

        ]);
    }

    #[Route('/api', name: 'api')]
    public function api(): Response
    {
        $some = ["api" => "api", "about" => "about", "report" => "report", "index" => "/", "quote" => "api/quote"];
        return $this->render('./page/api.html.twig', [
            'title' => 'Api',
            'routes' => json_encode( $some, true),
        ]);
    }
    #[Route('/api/quote', name: 'quote')]
    public function quote(): Response
    {
        $datee = date(DATE_RFC2822);
        $some = [
            "quote1" => "$datee what goes up must come down.",
            "quote2" => "$datee ropa inte hej nar du ar over an.",
            "quote3" => "$datee efter regn kommer solsken.",
            "quote4" => "$datee man saknar inte kon forran baset ar tomt."
        ];

        $rand = array_rand($some, 1);

        return $this->render('./page/api.html.twig', [
            'title' => 'Quote',
            'routes' => json_encode($some[$rand], true),
        ]);
    }
}