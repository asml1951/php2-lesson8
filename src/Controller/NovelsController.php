<?php


namespace App\Controller;

use App\Entity\Pages;
use App\Entity\Work;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class NovelsController extends DefaultController
{
    /**
     * @Route("/novels", name="novels")
     */
    public function index($_route )
    {
        $url = $this->generateUrl($_route);
        $page = $this->getDoctrine()
            ->getRepository(Pages::class)
            ->findOneBy(['url' => $url]);

        $novels = $this->getDoctrine()
            ->getRepository(Work::class)
            ->findBy(['sort' => 'проза']);

        return $this->render('all_novels.html.twig', ['novels' => $novels,

            'title' =>$page->getTitle(), 'menu' => $this->getMenu(),]);
    }

    /**
     * @Route("/novels/{id}",name="novel_text")
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