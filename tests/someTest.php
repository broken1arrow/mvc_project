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
        $this-> client = static::createClient();  
    }

    public function testProj()
    {
        $crawler =$this->client->request('GET', '/proj'); 
        $this->assertResponseIsSuccessful(); 
        $this->assertSelectorTextContains('title', 'Home'); 
    }

    public function testAPI()
    {
        $crawler = $this->client->request('GET', '/proj/api'); 
        $this->assertResponseIsSuccessful(); 
        $this->assertSelectorTextContains('title', 'Api'); 
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
}



class SetupMangerReg extends TestCase
{
    private $entityManager;
    private $managerRegistry;

    protected function setUp(): void
    {
        $paths = [__DIR__ . '/path/to/your/entities'];
        $isDevMode = true;
        $dbParams = [
            'driver'   => 'pdo_sqlite',
            'path'   => "sqlite:///%kernel.project_dir%/var/data.db"
        ];

        $conector = new Connection($dbParams, new Driver(['driverOptions'   => 'pdo_sqlite']));
        $this->entityManager = new EntityManager($conector, new Configuration());


        $this->managerRegistry = new class($this->entityManager) implements ManagerRegistry {
            private $entityManager;

            public function __construct(EntityManager $entityManager)
            {
                $this->entityManager = $entityManager;
            }

            public function getManager($name = null): EntityManager
            {
                return $this->entityManager;
            }

            public function getConnection($name = null)
            {
                return $this->entityManager->getConnection();
            }

            public function getRepository($persistentObjectName, $entityManagerName = null)
            {
                return $this->entityManager->getRepository($persistentObjectName);
            }
        };
    }

    protected function closeManger(): void
    {
        $this->entityManager->close();
        $this->entityManager = null;
    }

    public function testProj()
    {
        // Create a real session
        $session = new Session(new MockArraySessionStorage());
        $request = new Request();
        $request->setSession($session);
        $controller = new ControllerProj();

        $response =  $controller->proj($request, $session, $this->managerRegistry);
        $this->closeManger();
        $this->assertNotNull($response);
    }
}
