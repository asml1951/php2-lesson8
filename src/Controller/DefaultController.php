<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 10.05.2018
 * Time: 16:07
 */

namespace App\Controller;


use App\Entity\Pages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="index")
     * @Route("/byography", name="byography")
     * @Route("/poems", name="poems")
     */

    public function index($_route )
    {
        $url = $this->generateUrl($_route);
        $page = $this->getDoctrine()
            ->getRepository(Pages::class)
            ->findOneBy(['url' => $url]);

         return $this->render('base.html.twig', ['content' => $page->getContent(),

                               'title' =>$page->getTitle(), 'menu' => $this->getMenu(),]);
    }

    public function getMenu()
    {
        $menu = [];
        $all_pages = $this->getDoctrine()
            ->getRepository(Pages::class)
            ->findAll();
        foreach ($all_pages as $p) {
            $menu[] = [$p->getUrl(), $p->getMenutitle()];
        }

        return $menu;
    }

}