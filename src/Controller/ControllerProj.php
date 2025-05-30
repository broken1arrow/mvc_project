<?php

namespace App\Controller;

use App\Form\ProjForm;
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

    #[Route('/proj/about', name: 'about_proj', methods: ['GET', 'POST'])]
    public function about(Request $request, SessionInterface $session): Response
    {

        return $this->render('/proj/page/about.html.twig', [
            'title' => 'About',
        ]);
    }


    #[Route('proj/about/database', name: 'database', methods: ['GET', 'POST'])]
    public function database(Request $request, SessionInterface $session): Response
    {

        return $this->render('/proj/page/database.html.twig', [
            'title' => 'Database',
        ]);
    }


    #[Route('/proj/api', name: 'api_proj', methods: ['GET', 'POST'])]
    public function api(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(ProjForm::class);
        $form ->handleRequest($request);
      
        if($form->isSubmitted()){
            $statsUtility = new StatsUtility();
      
           if($form->get('all_data')->isClicked()){
                $response = new Response(null,303);
                $response->setContent(json_encode($statsUtility->getData($doctrine)));
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            } 

            if($form->get('wild_data')->isClicked()){
                $response = new Response(null,303);
                $data = $statsUtility->getData($doctrine);
                $dataValues= [];
                foreach($data as $value){
                    $dataValues []= ["wildfires"=>$value['wildfires']];
                }
                $response->setContent(json_encode( $dataValues) );
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }

            if($form->get('emissions')->isClicked()){
                $response = new Response(null,303);
                $data = $statsUtility->getData($doctrine);
                $dataValues= [];
                foreach($data as $value){
                    $dataValues []= ["emissions"=>$value['emission']];
                }
                $response->setContent(json_encode( $dataValues) );
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }

            if($form->get('temp')->isClicked()){
                $response = new Response(null,303);
                $data = $statsUtility->getData($doctrine);
                $dataValues= [];
                foreach($data as $value){
                    $dataValues []= ["average-temp"=>$value['temp_n']];
                }
                $response->setContent(json_encode( $dataValues) );
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }

            if($form->get('temp_with_year')->isClicked()){
                $response = new Response(null,303);
                $data = $statsUtility->getData($doctrine);
                $dataValues= [];
                foreach($data as $value){
                    $dataValues []= ['year'=> $value['year'],"average-temp"=>$value['temp_n']];
                }
                $response->setContent(json_encode( $dataValues) );
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }

            if($form->get('wildfires_with_year')->isClicked()){
                $response = new Response(null,303);
                $data = $statsUtility->getData($doctrine);
                $dataValues= [];
                foreach($data as $value){
                    $dataValues []= ['year'=> $value['year'],"wildfires"=>$value['wildfires']];
                }
                $response->setContent(json_encode( $dataValues) );
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }


            if($form->get('emission_with_year')->isClicked()){
                $response = new Response(null,303);
                $data = $statsUtility->getData($doctrine);
                $dataValues= [];
                foreach($data as $value){
                    $dataValues []= ['year'=> $value['year'],"emissions"=>$value['emission']];
                }
                $response->setContent(json_encode( $dataValues) );
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }


            return $this->redirectToRoute('api_proj');
        }
        $respons = new Response(null,$form->isSubmitted() ? 303: 200);
       
        return $this->render('/proj/page/api.html.twig', [
            'title' => 'Api',
            'form' => $form->createView()
        ],$respons);
    }
}
