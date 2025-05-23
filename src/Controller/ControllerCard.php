<?php
namespace App\Controller;

use App\cards\CardsShuffleGame;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ControllerCard  extends AbstractController
{
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
}
