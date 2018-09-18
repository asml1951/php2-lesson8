<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 12.09.2018
 * Time: 15:24
 */

namespace App\Controller;


use App\Entity\Books;
use App\Entity\Pages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends DefaultController
{
    /**
     * @Route("/books", name="books")
     */
    public function index($_route )
    {
        $url = $this->generateUrl($_route);

       $books = $this->getDoctrine()
            ->getRepository(Books::class)
            ->findAll();

       $url = $this->generateUrl($_route);
       $page = $this->getDoctrine()
            ->getRepository(Pages::class)
            ->findOneBy(['url' => $url]);

       return $this->render('all_books.html.twig', ['books' => $books,
            'title' =>$page->getTitle(),'content' =>$page->getContent(),
            'menu' =>  $this->getMenu(),]);
    }

    /**
     * @Route("/books/{id}",name="book_content")
     */
    public function show($id)
    {
        $book = $this->getDoctrine()
            ->getRepository(Books::class)
            ->find($id);

        $works = $book->getWorkId();

        return $this->render('one_book.html.twig', ['book' => $book,
               'works' => $works,
               'menu' => $this->getMenu(),
               'title' => 'Cодержание книги']);

    }

}