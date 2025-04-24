<?php


namespace App\Controller;


use App\cards\CardsHandler;
use App\game\CardsUtility;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class ControllPage extends AbstractController
{
    private CardsHandler $cardsHandler;
    private CardsUtility $cardsUtility;

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

    #[Route('/luck', name: 'luck')]
    public function luck(): Response
    {
        return $this->render('./page/luck.html.twig', [
            'title' => 'Luck',
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
        echo json_encode($some[$rand],true);
        return $this->render('./page/api-blank.html.twig', [
            'title' => 'Quote',
            'routes' => json_encode($some[$rand], true),
        ]);
    }

    #[Route('/api/game', name: 'game-stats', methods: ['GET', 'POST'])]
    public function gameStats(Request $request, SessionInterface $session): Response
    {
        $cardsUtility = $this->cardsUtility = new CardsUtility($session);
        $toJson[] = null;
        foreach ($cardsUtility->getPlayerData() as $value) {
            if ($value != null)
                $toJson[] = "{$value->getHtmlData()}  value= {$value->getAmount()}";
        }
        echo json_encode($toJson, true);
        return $this->render('./page/api-blank.html.twig', [
            'title' => 'Quote',
            'routes' => null,
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

    #[Route('cards/deck/draw/:number', name: 'draw-amount', methods: ['GET', 'POST'])]
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

    #[Route('session/delete', name: 'session-delete', methods: ['GET', 'POST'])]
    public function sessionDelete(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $session->set("cards", null);

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null
        ]);
    }

    #[Route('/session', name: 'session', methods: ['GET', 'POST'])]
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

    #[Route('/game', name: 'game', methods: ['GET', 'POST'])]
    public function game(Request $request, SessionInterface $session): Response
    {
        $cardsUtility = $this->cardsUtility = new CardsUtility($session);
        $cards = null;
        echo $request->request->has('start');
        if ($request->request->has('start')) {
            $cardsUtility->start();
        }

        if ($request->request->has('draw')) {
            $cards = $cardsUtility->drawCard();
        }

        if ($request->request->has('reset')) {
            $cardsUtility->reset();
        }

        if ($request->request->has('stop')) {
            $cards = $cardsUtility->endRound();
        }

        if ($cards == null)
            $cards = $cardsUtility->getPlayerCards();

        return $this->render('./page/game.html.twig', [
            'title' => 'Game',
            'cards' => $cards ?? null
        ]);
    }
}
