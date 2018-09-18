<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 13.05.2018
 * Time: 15:34
 */

namespace App\Controller;

use App\Entity\Pages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FilmsController extends DefaultController
{
    /**
     * @Route("/films",name="films")
     */
    public function index($_route)
    {
        $url = $this->generateUrl($_route);
        $page = $this->getDoctrine()
            ->getRepository(Pages::class)
            ->findOneBy(['url' => $url]);

        return $this->render('base.html.twig', ['content' => $page->getContent(),
            'title' => $page->getTitle(),'menu' => $this->getMenu(),]);
    }

}