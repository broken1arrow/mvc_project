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
        //$statsUtility-> generateData($doctrine);
        $data = $statsUtility->getData($doctrine);
        
        return $this->render('/proj/page/index.html.twig', [
            'title' => 'Home',
            'stats' => $data
        ]);
    }

    #[Route('/proj/about', name: 'about', methods: ['GET', 'POST'])]
    public function about(Request $request, SessionInterface $session): Response
    {

        return $this->render('/proj/page/about.html.twig', [
            'title' => 'About',
        ]);
    }

    #[Route('/proj/api', name: 'api', methods: ['GET', 'POST'])]
    public function api(Request $request, SessionInterface $session): Response
    {

        return $this->render('/proj/page/about.html.twig', [
            'title' => 'Api',
        ]);
    }


}
