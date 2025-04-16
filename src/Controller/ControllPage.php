<?php


namespace App\Controller;


use App\cards\CardsHandler;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ControllPage extends AbstractController
{
    private CardsHandler $cardsHandler;

    public function __construct()
    {
        $this->cardsHandler = new CardsHandler();
    }

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
            'routes' => json_encode($some, true),
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

    #[Route('/cards', name: 'cards', methods: ['GET', 'POST'])]
    public function cards(Request $request, SessionInterface $session): Response
    {
        $cards = null;
     /*    if (!$session->get("cards")) {
            $session->set("cards", $this->cardsHandler->getCards());
        } */
        $cardsList = $session->get("cards");

        if ($cardsList && $request->request->has('deck')) {
            $cards = implode("", array_values($cardsList));
        }
        if ($cardsList && $request->request->has('shuffel')) {
            shuffle($cardsList);
            $cards = implode("", array_values($cardsList));
        }
        if ($request->request->has('draw')) {
            $deck = $session->get("cards");
            if ($deck) {
                $index = array_rand($deck);
                $cards = $deck[$index];
                unset($deck[$index]);
                $session->set("cards", $deck);
    
            }else{
                $cards = "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must reset to draw new cards.</div>"; 
            }
        }

        if ($request->request->has('reset')) {
            $session->set("cards", $this->cardsHandler->getCards());
        }

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null
        ]);
    }
}
