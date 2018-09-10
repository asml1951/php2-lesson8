<?php


namespace App\Controller;

use App\Entity\Pages;
use App\Entity\Work;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PoemsController extends DefaultController
{
    /**
     * @Route("/poems",name="poems")
     */
    public function index($_route )
    {
        $url = $this->generateUrl($_route);
        $page = $this->getDoctrine()
            ->getRepository(Pages::class)
            ->findOneBy(['url' => $url]);

        $poems = $this->getDoctrine()
            ->getRepository(Work::class)
            ->findBy(['sort' => 'стихи']);

        return $this->render('all_poems.html.twig', ['poems' => $poems,
               'title' =>$page->getTitle(), 'menu' => $this->getMenu(),]);
    }
    /**
     * @Route("/poems/{id}",name="poem_text")
     */
    public function show($id)
    {

        $work = $this->getDoctrine()
            ->getRepository(Work::class)
            ->find($id);

        return $this->render('poem.html.twig', ['text' => $work->getText(),
            'name' => $work->getName(),'year' => $work->getYear(),'menu' => $this->getMenu(),]);


    }

}