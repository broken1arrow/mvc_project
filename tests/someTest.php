<?php

namespace tests\test;

use App\game\CardsUtility;
use App\cards\CardsShuffleGame;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

class someTest extends TestCase
{



    public function testCardGame()
    {
        $session = new Session(new MockArraySessionStorage());
        $session->set("cards", ["1" => "<div class=\"card_item\">🂡</div>"]);
        $request = new Request();
        ///Request|MockObject $request = $this->createMock(Request::class);
        //$session = $this->createMock(SessionInterface::class);
        $request->setSession($session);

        $cards = new CardsShuffleGame($request, $session);
        $this->assertEquals($cards->handleCards(), "<div class=\"card_item\">🂡</div>");
        $session->set("cards", [
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
        ]);
        $request->request->set('draw', 5);
        $request->request->set('draw-amount', 1);
        $request->request->set('draw-amount-min', 1);
        $request->request->set('draw-amount-max', 2);
        $request->request->set('reset', 1);
        $request->request->set('shuffle', 1);
        $cards = new CardsShuffleGame($request, $session);
        $this->assertEquals($cards->handleCards(), '<div class="card_item">🂡</div><div class="card_item">🂢</div><div class="card_item">🂣</div><div class="card_item">🂤</div><div class="card_item">🂥</div><div class="card_item">🂦</div><div class="card_item">🂧</div><div class="card_item">🂨</div><div class="card_item">🂩</div><div class="card_item">🂪</div><div class="card_item">🂫</div><div class="card_item">🂭</div><div class="card_item">🂮</div><div class="card_item">🃑</div><div class="card_item">🃒</div><div class="card_item">🃓</div><div class="card_item">🃔</div><div class="card_item">🃕</div><div class="card_item">🃖</div><div class="card_item">🃗</div><div class="card_item">🃘</div><div class="card_item">🃙</div><div class="card_item">🃚</div><div class="card_item">🃛</div><div class="card_item">🃝</div><div class="card_item">🃞</div><div class="card_item_red">🂱</div><div class="card_item_red">🂲</div><div class="card_item_red">🂳</div><div class="card_item_red">🂴</div><div class="card_item_red">🂵</div><div class="card_item_red">🂶</div><div class="card_item_red">🂷</div><div class="card_item_red">🂸</div><div class="card_item_red">🂹</div><div class="card_item_red">🂺</div><div class="card_item_red">🂻</div><div class="card_item_red">🂽</div><div class="card_item_red">🂾</div><div class="card_item_red">🃁</div><div class="card_item_red">🃂</div><div class="card_item_red">🃃</div><div class="card_item_red">🃄</div><div class="card_item_red">🃅</div><div class="card_item_red">🃆</div><div class="card_item_red">🃇</div><div class="card_item_red">🃈</div><div class="card_item_red">🃉</div><div class="card_item_red">🃊</div><div class="card_item_red">🃋</div><div class="card_item_red">🃍</div><div class="card_item_red">🃎</div>');
    }

    public function testGameGame()
    {
        $session = new Session(new MockArraySessionStorage());

        $cards = new CardsUtility($session);

        $this->assertNotEquals($cards->start(), "nothing set");
        $this->assertNotEquals($cards->drawCard(), null);
        $this->assertNotEquals($cards->endRound(), null);
        $cards->reset();

        $this->assertNotEquals($cards->start(), "nothing set");
        $this->assertNotEquals($cards->drawCard(), null);
        $cards->reset();
        $this->assertEquals($cards->drawCard(), "<div class=\"card_item\" style=\"grid-column: 1/-1;\">No more cards to draw.</div>");
    }
}
