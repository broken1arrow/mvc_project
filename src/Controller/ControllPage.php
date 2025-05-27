<?php


namespace App\Controller;


use App\Entity\Books;
use Random\Randomizer;
use App\game\CardsUtility;
use App\cards\CardsHandler;
use App\cards\CardsShuffleGame;
use App\database\DatabaseLogic;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
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

    public function getParameter(string $name): array|bool|string|int|float|\UnitEnum|null
    {
        return parent::getParameter($name);
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

    #[Route('/library', name: 'library', methods: ['GET', 'POST'])]
    public function library(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        if ($request->request->has('add-book')) {
            return $this->render('/page/library-edit.html.twig', [
                'title' => 'Edit book',
                'book' => new Books()
            ]);
        }

        $entityManager = $doctrine->getManager();

        if ($request->request->has('save-book')) {
            $isbn = $request->request->get('isbn');
            if ($isbn == null) {
                return $this->render('/messagePage/save.html.twig', [
                    'title' => 'Failure',
                    'data_info' => "You must set isbn on your book",
                    'path' => "/library",
                    'sub_title' => "Failed",
                    'time' => "5",
                    "info" => "You get redirected in 5 seconds"
                ]);
            }

            $book =  $this->setData($request, $entityManager);

            return $this->render('/messagePage/save.html.twig', [
                'title' => 'Save',
                'data_info' => "Saved data: $book",
                'path' => "/library",
                'sub_title' => "Save",
                'time' => "5",
                "info" => "You get redirected in 5 seconds"
            ]);
        }
        $bookId = $request->request->get('book-id');
        if ($bookId != null) {

            if ($request->request->has('edit-book')) {

                $book = $entityManager->getRepository(Books::class)->findOneBy(['isbn' => $bookId]);
                return $this->render('/page/library-edit.html.twig', [
                    'title' => 'Edit book',
                    'book' => $book
                ]);
            }

            if ($request->request->has('remove-book')) {

                $book = $entityManager->getRepository(Books::class)->findOneBy(['isbn' => $bookId]);

                if ($book == null) {
                    return $this->render('/messagePage/save.html.twig', [
                        'title' => 'Remove',
                        'data_info' => "Could not remove: $bookId]",
                        'path' => "/library",
                        'sub_title' => "Remove",
                        'time' => "5",
                        "info" => "You get redirected in 5 seconds"
                    ]);
                }
                $entityManager->remove($book);
                $entityManager->flush();

                return $this->render('/messagePage/save.html.twig', [
                    'title' => 'Remove',
                    'data_info' => "Removed data: $book",
                    'path' => "/library",
                    'sub_title' => "Remove",
                    'time' => "5",
                    "info" => "You get redirected in 5 seconds"
                ]);
            }
        }


        $bookid =  $request->query->get("bookid");
        if ($bookid != null) {
            $book = $entityManager->getRepository(Books::class)->findOneBy(['isbn' => $bookid]);
            return $this->render('/page/bookinfo.html.twig', [
                'title' => 'Library',
                'book' => $book
            ]);
        }

        $books = $entityManager->getRepository(Books::class)->findAll();

        return $this->render('./page/library.html.twig', [
            'title' => 'Library',
            'books' => $books
        ]);
    }

    #[Route('/metrics', name: 'metrics', methods: ['GET', 'POST'])]
    public function metrics(): Response
    {
        return $this->render('./page/metrics.html.twig', [
            'title' => 'Introduktion'
        ]);
    }

    public function setData(Request $request, ObjectManager $entityManager): Books
    {
        $databaseLogic = new DatabaseLogic($request, $this); 
        
            $isbn = $request->request->get('isbn');
            $title = $request->request->get('title');
            $author = $request->request->get('author');
            $summary = $request->request->get('summary');
            $plot = $request->request->get('plot');
        
        $imageName = $databaseLogic->saveImage();

        $bookData = $entityManager->getRepository(Books::class)->findOneBy(['isbn' => $isbn]);
        if ($bookData == null)
            $book = new Books();
        else
            $book = $bookData;

        if ($isbn != null && $bookData == null)
            $book->setIsbn($isbn);

        if ($title != null)
            $book->setTitle($title);
        else {
            if ($bookData == null)
                $book->setTitle("untitled");
        }

        if ($imageName != null)
            $book->setImage($imageName);
        else {
            if ($bookData == null)
                $book->setImage("");
        }

        if ($author != null)
            $book->setAuthor($author);
        else {
            if ($bookData == null)
                $book->setAuthor("Unknown");
        }

        if ($summary != null)
            $book->setDescription($summary);
        else {
            if ($bookData == null)
                $book->setDescription("No summary provided for the book");
        }

        if ($plot != null)
            $book->setPlot($plot);
        else {
            if ($bookData == null)
                $book->setPlot("No plot provided for the book");
        }

        if ($bookData == null)
            $entityManager->persist($book);
        $entityManager->flush();

        return $book;
    }
}
