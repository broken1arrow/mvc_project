<?php


namespace App\Controller;


use App\cards\CardsHandler;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Constraints\Length;

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
            } else {
                $cards = "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must reset to draw new cards.</div>";
            }
        }

        if ($cardsList && $request->request->has('draw-amount') && $request->request->has('draw-amount-min') && $request->request->has('draw-amount-max')) {
            shuffle($cardsList);
            $length = count($cardsList);
            $min = $request->get('draw-amount-min');
            $max = min($length, $request->get('draw-amount-max'));
            if ($min >= $max)
                $min = max(0, $max - 1);
            $cardsToAdd = array_slice($cardsList, $min, $max - $min);
           
            $cardToSelect = [];
            foreach ($cardsToAdd as $card) {
                $cardToSelect[] = $card;
            }

            $cards = implode("", array_values($cardToSelect));
            
            array_splice($cardsList, $min, $max - $min);
            sort($cardsList);
            $session->set("cards", $cardsList);
        }

        if ($request->request->has('reset')) {
            $session->set("cards", $this->cardsHandler->getCards());
        }

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null
        ]);
    }

    #[Route('/cards/deck/shuffle', name: 'shuffle', methods: ['GET', 'POST'])]
    public function shuffle(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $cardsList = $this->cardsHandler->getCards();

        shuffle($cardsList);
        $cards = implode("", array_values($cardsList));

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null
        ]);
    }

    #[Route('/cards/deck', name: 'deck', methods: ['GET', 'POST'])]
    public function deck(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $cardsList = $this->cardsHandler->getCards();
        $cards = implode("", array_values($cardsList));

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null
        ]);
    }


    #[Route('/cards/deck/draw', name: 'draw', methods: ['GET', 'POST'])]
    public function draw(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $deck = $this->cardsHandler->getCards();
        if ($deck) {
            $index = array_rand($deck);
            $cards = $deck[$index];
            unset($deck[$index]);
            $session->set("cards", $deck);
        } else {
            $cards = "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must reset to draw new cards.</div>";
        }

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null
        ]);
    }

    #[Route('card/deck/draw/:number', name: 'draw-amount', methods: ['GET', 'POST'])]
    public function drawAmount(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $cardsList = $session->get("cards");
        $cards = implode("", array_values($cardsList));

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null
        ]);
    }

    #[Route('/cards/session/delete', name: 'session-delete', methods: ['GET', 'POST'])]
    public function sessionDelete(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $session->set("cards", null);

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null
        ]);
    }

    #[Route('/cards/session', name: 'session', methods: ['GET', 'POST'])]
    public function session(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $cardsList = $session->get("cards");
        $cards = implode("", array_values($cardsList));

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null
        ]);
    }
}
