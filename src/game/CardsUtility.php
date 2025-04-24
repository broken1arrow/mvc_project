<?php

namespace App\game;

use App\game\CardsData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use function PHPUnit\Framework\returnSelf;

class CardsUtility
{

    private string $sessionKey = "card-game";
    private string $sessionKeyDataPlayer = "card-game_data_player";
    private string $sessionKeyDataBank = "card-game_data_bank";

    private SessionInterface $session;


    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function start(): ?string
    {
        $session = $this->session;
        $cardsList = $session->get($this->sessionKey);
        $cardsListPlayer = $session->get($this->sessionKeyDataPlayer);

        if ($cardsList == null && $cardsListPlayer == null) {
            $session->set($this->sessionKey, $this->getCards());

            $cardsList = $session->get($this->sessionKey);
            if ($cardsList != null) {
                $playerCard = $this->getRandomCard($cardsList);
                $this->addToPlayerCache($playerCard);

                $this->addToBankCache($this->getRandomCard($cardsList));

                return $playerCard->getHtmlData();
            }
        }
        return "nothing set";
    }

    public function getPlayerCards(): ?string
    {
        $session = $this->session;
        $playersDrawnCards = $session->get($this->sessionKeyDataPlayer);

        if ($playersDrawnCards != null) {
            $cardDiv = [];
            foreach ($playersDrawnCards as $card) {

                $cardDiv[] = $card->getHtmlData();
            }
            $retrivePlayerCards = implode("", $cardDiv);
            return $retrivePlayerCards;
        }
        return "<div class=\"card_item\" style=\"grid-column: 1/-1;text-align: center;\">Game rules:</div><div class=\"card_item\" style=\"grid-column: 1/-1;font-size: 1.5rem;\">Click 'start' to start the game and 'draw' to add new card to your hand. Reset and stop both stop the game and reset. But only stop tells how won. How you win is you get score of exacly 21 and ace is worth 1. So the range is from 1 to 13. Good luck!!!</div>";
    }

    public function getPlayerData(): ?array
    {
        $session = $this->session;
        $playersDrawnCards = $session->get($this->sessionKeyDataPlayer);

        if ($playersDrawnCards != null) {

            return $playersDrawnCards;
        }
        return null;
    }


    public function drawCard(): ?string
    {
        $session = $this->session;

        $cards = null;
        $cardsList = $session->get($this->sessionKey);

        if (!$cardsList || count($cardsList) < 2)
            return "<div class=\"card_item\" style=\"grid-column: 1/-1;\">No more cards to draw.</div>";


        $deck = $session->get($this->sessionKey);
        if ($deck) {
            $cards = $this->getRandomCard($deck);
            $cardBank = $this->getRandomCard($deck);


            $session->set($this->sessionKey, $deck);
            $this->addToPlayerCache($cards);
            $this->addToBankCache($cardBank);
        } else {
            $cards = "<div class=\"card_item\" style=\"grid-column: 1/-1;\">You must reset to draw new cards.</div>";
        }

        $playersDrawnCards = $session->get($this->sessionKeyDataPlayer);
        if ($playersDrawnCards) {
            $cardDiv = [];
            foreach ($playersDrawnCards as $card) {
                $cardDiv[] = $card->getHtmlData();
            }
            $retrivePlayerCards = implode("", $cardDiv);
            return $retrivePlayerCards;
        }
        if ($cards)
            return "<div class=\"card_item\" style=\"grid-column: 1/-1;\">Nothing to display yet, You must draw a card.</div>";
        return $cards;
    }

    public function reset()
    {
        $this->session->remove($this->sessionKey);
        $this->session->remove($this->sessionKeyDataPlayer);
        $this->session->remove($this->sessionKeyDataBank);
    }


    public function endRound(): ?string
    {

        $session = $this->session;

        $cardsListPlayer = $session->get($this->sessionKeyDataPlayer);
        $cardsListBank = $session->get($this->sessionKeyDataBank);

        if ($cardsListPlayer == null || $cardsListBank == null)
            return "<div class=\"card_item\" style=\"grid-column: 1/-1;\">No cards drawn null.</div>";

        if (count($cardsListPlayer) < 1 || count($cardsListBank) < 1)
            return "<div class=\"card_item\" style=\"grid-column: 1/-1;\">No cards drawn.</div>";


        $cardValuePlayer = 0;
        $cardValueBank = 0;

        foreach ($cardsListPlayer as $cardPlayer) {
            $cardValuePlayer += $cardPlayer->getAmount();
        }

        foreach ($cardsListBank as  $cardBank) {
            $cardValueBank += $cardBank->getAmount();
        }

        $session->remove($this->sessionKey);
        $session->remove($this->sessionKeyDataPlayer);
        $session->remove($this->sessionKeyDataBank);

        if ($cardValuePlayer > 21)
            return "<div class=\"card_item\" style=\"grid-column: 1/-1;\">The bank wins. Click reset to start over or start.</div>";

        if ($cardValuePlayer == 21 && $cardValuePlayer == $cardValueBank)
            return "<div class=\"card_item\" style=\"grid-column: 1/-1;\">The bank wins. Click reset to start over or start.</div>";

        if ($cardValueBank >= 21)
            return "<div class=\"card_item\" style=\"grid-column: 1/-1;\">The bank wins. Click reset to start over or start.</div>";

        if ($cardValuePlayer == 21)
            return "<div class=\"card_item\" style=\"grid-column: 1/-1;\">The player wins. Click reset to start over or start.</div>";


        return "<div class=\"card_item\" style=\"grid-column: 1/-1;\">The bank wins. Click reset to start over or start.</div>";
    }

    public function getRandomCard(array $deck)
    {
        $index = array_rand($deck);
        $cards = $deck[$index];
        unset($deck[$index]);
        return $cards;
    }

    public function addToPlayerCache(CardsData $card)
    {
        $playersDrawnCards = $this->session->get($this->sessionKeyDataPlayer, []);
        $playersDrawnCards[] = $card;
        $this->session->set($this->sessionKeyDataPlayer,  $playersDrawnCards);
    }

    public function addToBankCache(CardsData $card)
    {
        $playersDrawnCards = $this->session->get($this->sessionKeyDataBank, []);
        $playersDrawnCards[] = $card;
        $this->session->set($this->sessionKeyDataBank,  $playersDrawnCards);
    }


    public function getCards(): array
    {
        return  [
            "1" => new CardsData("<div class=\"card_item\">🂡</div>", 1),
            "2" => new CardsData("<div class=\"card_item\">🂢</div>", 2),
            "3" => new CardsData("<div class=\"card_item\">🂣</div>", 3),
            "4" => new CardsData("<div class=\"card_item\">🂤</div>", 4),
            "5" => new CardsData("<div class=\"card_item\">🂥</div>", 5),
            "6" => new CardsData("<div class=\"card_item\">🂦</div>", 6),
            "7" => new CardsData("<div class=\"card_item\">🂧</div>", 7),
            "8" => new CardsData("<div class=\"card_item\">🂨</div>", 8),
            "9" => new CardsData("<div class=\"card_item\">🂩</div>", 9),
            "10" => new CardsData("<div class=\"card_item\">🂪</div>", 10),
            "11" => new CardsData("<div class=\"card_item\">🂫</div>", 11),
            "12" => new CardsData("<div class=\"card_item\">🂭</div>", 12),
            "13" => new CardsData("<div class=\"card_item\">🂮</div>", 13),
            "14" => new CardsData("<div class=\"card_item\">🃑</div>", 1),
            "15" => new CardsData("<div class=\"card_item\">🃒</div>", 2),
            "16" => new CardsData("<div class=\"card_item\">🃓</div>", 3),
            "17" => new CardsData("<div class=\"card_item\">🃔</div>", 4),
            "18" => new CardsData("<div class=\"card_item\">🃕</div>", 5),
            "19" => new CardsData("<div class=\"card_item\">🃖</div>", 6),
            "20" => new CardsData("<div class=\"card_item\">🃗</div>", 7),
            "21" => new CardsData("<div class=\"card_item\">🃘</div>", 8),
            "22" => new CardsData("<div class=\"card_item\">🃙</div>", 9),
            "23" => new CardsData("<div class=\"card_item\">🃚</div>", 10),
            "24" => new CardsData("<div class=\"card_item\">🃛</div>", 11),
            "25" => new CardsData("<div class=\"card_item\">🃝</div>", 12),
            "26" => new CardsData("<div class=\"card_item\">🃞</div>", 13),
            "27" => new CardsData("<div class=\"card_item_red\">🂱</div>", 1),
            "28" => new CardsData("<div class=\"card_item_red\">🂲</div>", 2),
            "29" => new CardsData("<div class=\"card_item_red\">🂳</div>", 3),
            "30" => new CardsData("<div class=\"card_item_red\">🂴</div>", 4),
            "31" => new CardsData("<div class=\"card_item_red\">🂵</div>", 5),
            "32" => new CardsData("<div class=\"card_item_red\">🂶</div>", 6),
            "33" => new CardsData("<div class=\"card_item_red\">🂷</div>", 7),
            "34" => new CardsData("<div class=\"card_item_red\">🂸</div>", 8),
            "35" => new CardsData("<div class=\"card_item_red\">🂹</div>", 9),
            "36" => new CardsData("<div class=\"card_item_red\">🂺</div>", 10),
            "37" => new CardsData("<div class=\"card_item_red\">🂻</div>", 11),
            "38" => new CardsData("<div class=\"card_item_red\">🂽</div>", 12),
            "39" => new CardsData("<div class=\"card_item_red\">🂾</div>", 13),
            "40" => new CardsData("<div class=\"card_item_red\">🃁</div>", 1),
            "41" => new CardsData("<div class=\"card_item_red\">🃂</div>", 2),
            "42" => new CardsData("<div class=\"card_item_red\">🃃</div>", 3),
            "43" => new CardsData("<div class=\"card_item_red\">🃄</div>", 4),
            "44" => new CardsData("<div class=\"card_item_red\">🃅</div>", 5),
            "45" => new CardsData("<div class=\"card_item_red\">🃆</div>", 6),
            "46" => new CardsData("<div class=\"card_item_red\">🃇</div>", 7),
            "47" => new CardsData("<div class=\"card_item_red\">🃈</div>", 8),
            "48" => new CardsData("<div class=\"card_item_red\">🃉</div>", 9),
            "49" => new CardsData("<div class=\"card_item_red\">🃊</div>", 10),
            "50" => new CardsData("<div class=\"card_item_red\">🃋</div>", 11),
            "51" => new CardsData("<div class=\"card_item_red\">🃍</div>", 12),
            "52" => new CardsData("<div class=\"card_item_red\">🃎</div>", 13)
        ];
    }
}
