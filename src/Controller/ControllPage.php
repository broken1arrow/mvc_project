<?php


namespace App\Controller;


use App\game\CardsUtility;
use App\cards\CardsHandler;
use App\cards\CardsShuffleGame;
use Random\Randomizer;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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
    #[Route('/index', name: 'index_empty')]
    public function homeEmpty(): Response
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
        $randomizer = new Randomizer();
        $random = $randomizer->getInt(0, 10000000);
        return $this->render('./page/luck.html.twig', [
            'title' => 'Luck',
            'ran' => $random
        ]);
    }

    #[Route('/lucky', name: 'lucky_two')]
    public function luckSecond(): Response
    {
        $randomizer = new Randomizer();
        $random = $randomizer->getInt(0, 10000000);
        return $this->render('/page/luck.html.twig', [
            'title' => 'Luck',
            'ran' => $random
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
        /*   return $this->render('./page/api-blank.html.twig', [
            'title' => 'Quote',
            'routes' => json_encode($some[$rand], true),
        ]);
        ]); */
        $response = new Response();
        $response->setContent(json_encode(['Quote' => $some[$rand]], false));
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
        echo json_encode($toJson, true);
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
        $response->setContent(json_encode($toJson, false));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    #[Route('/cards', name: 'cards', methods: ['GET', 'POST'])]
    public function cards(Request $request, SessionInterface $session): Response
    {
        $cardsShuffleGame = new CardsShuffleGame($request, $session);
        $cards =  $cardsShuffleGame->handleCards();

        return $this->render('/page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must click on reset to set new cards.</div>",
            'sub_title' => "Deck options:"
        ]);
    }

    #[Route('/card', name: 'card', methods: ['GET', 'POST'])]
    public function card(Request $request, SessionInterface $session): Response
    {
        $cardsShuffleGame = new CardsShuffleGame($request, $session);
        $cards =  $cardsShuffleGame->handleCards();
        return $this->render('/page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must click on reset to set new cards.</div>",
            'sub_title' => "Deck options:"
        ]);
    }


    #[Route('/cards/deck/shuffle', name: 'shuffle', methods: ['GET', 'POST'])]
    public function shuffle(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $cardsList = $session->get("cards");

        shuffle($cardsList);
        $cards = implode("", array_values($cardsList));

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null,
            'sub_title' => "Deck options:"
        ]);
    }

    #[Route('/cards/deck', name: 'deck', methods: ['GET', 'POST'])]
    public function deck(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $cardsList = $session->get("cards");
        if ($cardsList != null) {
            $cards = implode("", array_values($cardsList));
        } else {
            $cards = "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must reset to draw new cards.</div>";
        }

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null,
            'sub_title' => "Deck options:"
        ]);
    }


    #[Route('/cards/deck/draw', name: 'draw', methods: ['GET', 'POST'])]
    public function draw(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $deck = $session->get("cards");
        if ($deck != null) {
            $index = array_rand($deck);
            $cards = $deck[$index];
            unset($deck[$index]);
            $session->set("cards", $deck);
        } else {
            $cards = "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must reset to draw new cards.</div>";
        }

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null,
            'sub_title' => "Deck options:"
        ]);
    }

    #[Route('/cards/deck/card', name: 'card-one', methods: ['GET', 'POST'])]
    public function drawCard(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $deck = $session->get("cards");
        if ($deck != null) {
            $index = array_rand($deck);
            $cards = $deck[$index];
            unset($deck[$index]);
            $session->set("cards", $deck);
        } else {
            $cards = "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must reset to draw new cards.</div>";
        }

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null,
            'sub_title' => "Deck options:"
        ]);
    }

    #[Route('cards/deck/draw/:number', name: 'draw-amount', methods: ['GET', 'POST'])]
    public function drawAmount(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $cardsList = $session->get("cards");
        if ($cardsList != null) {
            $cards = implode("", array_values($cardsList));
        } else {
            $cards = "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must reset to draw new cards.</div>";
        }

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null,
            'sub_title' => "Deck options:"
        ]);
    }

    #[Route('cards/deck/card/:number', name: 'draw-amount-two', methods: ['GET', 'POST'])]
    public function drawAmountCard(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $cardsList = $session->get("cards");
        if ($cardsList != null) {
            $cards = implode("", array_values($cardsList));
        } else {
            $cards = "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must reset to draw new cards.</div>";
        }

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null,
            'sub_title' => "Deck options:"
        ]);
    }

    #[Route('session/delete', name: 'session-delete', methods: ['GET', 'POST'])]
    public function sessionDelete(Request $request, SessionInterface $session): Response
    {
        $cards = "<div class=\"card_item\" style=\"grid-column: 1/-1;\">Removed cache. You must click on reset to set new cards.</div>";
        $session->set("cards", null);

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? null,
            'sub_title' => "Removed"
        ]);
    }

    #[Route('/session', name: 'session', methods: ['GET', 'POST'])]
    public function session(Request $request, SessionInterface $session): Response
    {
        $cards = null;
        $cardsList = $session->get("cards");
        if ($cardsList != null)
            $cards = implode("", array_values($cardsList));

        return $this->render('./page/cards.html.twig', [
            'title' => 'Cards',
            'cards' => $cards ?? "No values in cache",
            'sub_title' => "Session"
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


    #[Route('/game/doc', name: 'game-doc', methods: ['GET', 'POST'])]
    public function gameDoc(Request $request, SessionInterface $session): Response
    {
        return $this->render('./page/doc.html.twig', [
            'title' => 'Game doc'
        ]);
    }
}
