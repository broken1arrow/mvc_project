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
