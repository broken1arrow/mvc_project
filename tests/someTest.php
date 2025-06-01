<?php

namespace tests\test;

use App\game\CardsUtility;
use Doctrine\DBAL\Connection;
use App\cards\CardsShuffleGame;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;


use App\Controller\ControllerProj;
use Doctrine\DBAL\Driver\IBMDB2\Driver;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser;
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

    public function testProj()
    {
        $controllerProj = new ControllerProjTest();
        $controllerProj->testProj();
        $controllerProj->testAPI();
        $controllerProj->testAbout();
        $controllerProj->testDatabase();
    }
}
class ControllerProjTest extends WebTestCase
{
    private KernelBrowser $client;
    function __construct()
    {
        $this->client = static::createClient();
    }

    public function testProj()
    {
        $crawler = $this->client->request('GET', '/proj');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('title', 'Home');
    }

    public function testAPI()
    {
        $crawler = $this->client->request('GET', '/proj/api');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('title', 'Api');

        $buttons = ['all_data', 'wild_data', 'emissions', 'temp', 'temp_with_year', 'wildfires_with_year', 'emission_with_year'];
        foreach ($buttons as $button) {
            $this->submitForm($crawler, $button);
        }
        /*   $this->assertResponseRedirects('/proj/api');
        $this->client->followRedirect(); */
    }

    public function testAbout()
    {
        $crawler = $this->client->request('GET', '/proj/about');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('title', 'About');
    }
    public function testDatabase()
    {
        $crawler = $this->client->request('GET', '/proj/about/database');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('title', 'Database');
    }


    private function submitForm($crawler, $buttonName)
    {

        $buttonCrawlerNode = $crawler->selectButton("proj_form[$buttonName]");
        $form = $buttonCrawlerNode->form();

        $this->assertArrayHasKey($buttonName, $form->getPhpValues()['proj_form'], "The field $buttonName does not exist in the form.");


        $this->client->submit($form, [
            "proj_form[$buttonName]" => '',
        ]);

        $responseContent = $this->client->getResponse()->getContent();
        $data = json_decode($responseContent, true);
        $this->assertNotEmpty($data);
        $this->assertEquals(count($data),15);
    }
}



/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractExtension;
use Symfony\Component\Form\FormTypeGuesserInterface;

class DoctrineOrmExtension extends AbstractExtension
{
    public function __construct(
        protected ManagerRegistry $registry,
    ) {}

    protected function loadTypes(): array
    {
        return [
            new EntityType($this->registry),
        ];
    }

    protected function loadTypeGuesser(): ?FormTypeGuesserInterface
    {
        return new DoctrineOrmTypeGuesser($this->registry);
    }
}
