<?php

namespace App\Controller;

use App\proj\StatsUtility;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class ControllerProj extends AbstractController
{


    #[Route('/proj', name: 'proj', methods: ['GET', 'POST'])]
    public function proj(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $statsUtility = new StatsUtility();
        //$statsUtility->generateData($doctrine);
        $data = $statsUtility->getData($doctrine);
        dd($data);


        $stats = [
            ['year' => 2020, 'value' => 60, 'value_raw' => 789],
            ['year' => 2021, 'value' => 80, 'value_raw' => 11457887],
            ['year' => 2022, 'value' => 50, 'value_raw' => 14785],
            ['year' => 2023, 'value' => 90, 'value_raw' => 11478],
            ['year' => 2024, 'value' => 100, 'value_raw' => 7899]
        ];
        return $this->render('/proj/page/index.html.twig', [
            'title' => 'Home',
            'stats' =>  $stats
        ]);
    }

    #[Route('/proj/about', name: 'about', methods: ['GET', 'POST'])]
    public function about(Request $request, SessionInterface $session): Response
    {

        return $this->render('/proj/page/about.html.twig', [
            'title' => 'Proj',
        ]);
    }
}
