<?php

namespace App\cards;

class CardsHandler extends CardLogic
{

    //In Java I using: @Override but apparently it is #[\Override] in PHP according to docs.
    #[\Override]
    public function getCards(): array
    {
        return $this->cards;
    }

    private array $cards = [
        "1" => "<div class=\"card_item\">🂡</div>",
        "2" => "<div class=\"card_item\">🂢</div>",
        "3" => "<div class=\"card_item\">🂣</div>",
        "4" => "<div class=\"card_item\">🂤</div>",
        "5" => "<div class=\"card_item\">🂥</div>",
        "6" => "<div class=\"card_item\">🂦</div>",
        "7" => "<div class=\"card_item\">🂧</div>",
        "8" => "<div class=\"card_item\">🂨</div>",
        "9" => "<div class=\"card_item\">🂩</div>",
        "10" => "<div class=\"card_item\">🂪</div>",
        "11" => "<div class=\"card_item\">🂫</div>",
        "12" => "<div class=\"card_item\">🂭</div>",
        "13" => "<div class=\"card_item\">🂮</div>",
        "14" => "<div class=\"card_item\">🃑</div>",
        "15" => "<div class=\"card_item\">🃒</div>",
        "16" => "<div class=\"card_item\">🃓</div>",
        "17" => "<div class=\"card_item\">🃔</div>",
        "18" => "<div class=\"card_item\">🃕</div>",
        "19" => "<div class=\"card_item\">🃖</div>",
        "20" => "<div class=\"card_item\">🃗</div>",
        "21" => "<div class=\"card_item\">🃘</div>",
        "22" => "<div class=\"card_item\">🃙</div>",
        "23" => "<div class=\"card_item\">🃚</div>",
        "24" => "<div class=\"card_item\">🃛</div>",
        "25" => "<div class=\"card_item\">🃝</div>",
        "26" => "<div class=\"card_item\">🃞</div>",
        "27" => "<div class=\"card_item_red\">🂱</div>",
        "28" => "<div class=\"card_item_red\">🂲</div>",
        "29" => "<div class=\"card_item_red\">🂳</div>",
        "30" => "<div class=\"card_item_red\">🂴</div>",
        "31" => "<div class=\"card_item_red\">🂵</div>",
        "32" => "<div class=\"card_item_red\">🂶</div>",
        "33" => "<div class=\"card_item_red\">🂷</div>",
        "34" => "<div class=\"card_item_red\">🂸</div>",
        "35" => "<div class=\"card_item_red\">🂹</div>",
        "36" => "<div class=\"card_item_red\">🂺</div>",
        "37" => "<div class=\"card_item_red\">🂻</div>",
        "38" => "<div class=\"card_item_red\">🂽</div>",
        "39" => "<div class=\"card_item_red\">🂾</div>",
        "40" => "<div class=\"card_item_red\">🃁</div>",
        "41" => "<div class=\"card_item_red\">🃂</div>",
        "42" => "<div class=\"card_item_red\">🃃</div>",
        "43" => "<div class=\"card_item_red\">🃄</div>",
        "44" => "<div class=\"card_item_red\">🃅</div>",
        "45" => "<div class=\"card_item_red\">🃆</div>",
        "46" => "<div class=\"card_item_red\">🃇</div>",
        "47" => "<div class=\"card_item_red\">🃈</div>",
        "48" => "<div class=\"card_item_red\">🃉</div>",
        "49" => "<div class=\"card_item_red\">🃊</div>",
        "50" => "<div class=\"card_item_red\">🃋</div>",
        "51" => "<div class=\"card_item_red\">🃍</div>",
        "52" => "<div class=\"card_item_red\">🃎</div>"

    ];
}
