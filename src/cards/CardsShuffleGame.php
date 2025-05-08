<?php

namespace App\cards;

use App\cards\CardsHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CardsShuffleGame
{
    private SessionInterface $session;
    private  Request  $request;
    private CardsHandler $cardsHandler;

    public function __construct(Request $request, SessionInterface $session)
    {
        $this->cardsHandler = new CardsHandler();
        $this->request = $request;
        $this->session = $session;
    }


    function handleCards(): ?string
    {
        $cards = null;
        /*    if (!$session->get("cards")) {
        $session->set("cards", $this->cardsHandler->getCards());
    } */
        $cardsList = $this->session->get("cards");

        if ($cardsList && $this->request->request->has('deck')) {
            $cards = implode("", array_values($cardsList));
        }
        if ($cardsList && $this->request->request->has('shuffel')) {
            shuffle($cardsList);
            $cards = implode("", array_values($cardsList));
        }
        if ($this->request->request->has('draw')) {
            if ($cardsList) {
                $index = array_rand($cardsList);
                $cards = $cardsList[$index];
                unset($cardsList[$index]);
                $this->session->set("cards", $cardsList);
            } else {
                $cards = "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must reset to draw new cards.</div>";
            }
        }

        if ($cardsList && $this->request->request->has('draw-amount') && $this->request->request->has('draw-amount-min') && $this->request->request->has('draw-amount-max')) {
            shuffle($cardsList);
            $length = count($cardsList);
            $min = $this->request->request->get('draw-amount-min');
            $max = min($length, $this->request->request->get('draw-amount-max'));

            if ($max == null)
                $max = $length;
            if ($min == null)
                $min =  0;
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
            $this->session->set("cards", $cardsList);
        }

        if ($this->request->request->has('reset')) {
            $this->session->set("cards", $this->cardsHandler->getCards());
            $cardsList = $this->session->get("cards");
            if ($cardsList != null) {
                $cards = implode("", array_values($cardsList));
            }
        }

        if ($cards == null && $cardsList != null)
            $cards = implode("", array_values($cardsList));
        
        return $cards ??  null;
    }
}
