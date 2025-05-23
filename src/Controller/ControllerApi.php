<?php

namespace App\Controller;

use App\Entity\Books;
use App\game\CardsUtility;
use App\cards\CardsShuffleGame;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class ControllerApi extends AbstractController
{

    private CardsUtility $cardsUtility;



    public function getParameter(string $name): array|bool|string|int|float|\UnitEnum|null
    {
        return parent::getParameter($name);
    }


    #[Route('/api', name: 'api')]
    public function api(): Response
    {
        $some = [
            "api" => "api",
            "about" => "about",
            "report" => "report",
            "index" => "/",
            "quote" => "api/quote",
            "cards" => "cards"
        ];
        return $this->render('./page/api.html.twig', [
            'title' => 'Api',
            'routes' => json_encode($some,  JSON_UNESCAPED_SLASHES),
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

        $rand = array_rand($some);
        /*   return $this->render('./page/api-blank.html.twig', [
            'title' => 'Quote',
            'routes' => json_encode($some[$rand], 1),
        ]);
        ]); */

        $response = new Response();
        $response->setContent(json_encode(['Quote' => $some[$rand]], JSON_UNESCAPED_SLASHES));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    #[Route('/api/game', name: 'game-stats', methods: ['GET', 'POST'])]
    public function gameStats(Request $request, SessionInterface $session): Response
    {
        $cardsUtility = $this->cardsUtility = new CardsUtility($session);
        $toJson[] = null;
        if ($cardsUtility->getPlayerData() != null) {
            foreach ($cardsUtility->getPlayerData() as $value) {
                if ($value != null)
                    $toJson[] = ["{$value->getHtmlData()}  " => "{$value->getAmount()}"];
            }
        } else {
            $toJson = ['data' => 'no data set'];
        }
        echo json_encode($toJson,        JSON_UNESCAPED_SLASHES);
        return $this->render('./page/api-blank.html.twig', [
            'title' => 'Quote',
            'routes' => null,
        ]);
    }

    #[Route('/api/deck', name: 'deck-stats', methods: ['GET', 'POST'])]
    public function deckStats(Request $request, SessionInterface $session): Response
    {
        $cards = $session->get("cards");
        $toJson[] = [];
        if ($cards != null) {
            $index = 0;
            foreach ($cards as $value) {
                if ($value != null) {
                    $toJson[] = ["{$index}" => "{$value}"];
                    $index++;
                }
            }
        } else {
            $toJson = ['data' => 'no data set'];
        }
        $response = new Response();
        $response->setContent(json_encode($toJson, 0));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    #[Route('api/library/books', name: 'books-list', methods: ['GET', 'POST'])]
    public function booksList(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $bookData = $entityManager->getRepository(Books::class)->findAll();
        $books = [];
        foreach ($bookData as $data) {
            $books[] = [$data->getIsbn() => $data->__toString()];
        }

        $response = new Response();
        $response->setContent(json_encode($books, 0));

        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    #[Route('api/library/book/<isbn>', name: 'one-book', methods: ['GET', 'POST'])]
    public function book(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $bookid =  $request->query->get("bookid");
        $bookData = $entityManager->getRepository(Books::class)->findOneBy(['isbn' => $bookid]);

        $response = new Response();
        if ($bookData)
            $response->setContent(json_encode([$bookData->getIsbn() =>  $bookData->__toString()], 0));
        else
            $response->setContent(json_encode(["blank" =>  "Found nothing"], 0));

        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
