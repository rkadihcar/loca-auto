<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {

   /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }

    // public function admin()
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');
    //     // $articles = $this->getDoctrine()->getRepository(Article::class)->findBy(
    //     //     [],
    //     //     ['lastUpdateDate' => 'DESC']
    //     // );

    //     $users = $this->getDoctrine()->getRepository(User::class)->findAll();

    //     return $this->render('admin.html.twig', [
    //         // 'articles' => $articles,
    //         'users' => $users
    //     ]);
    // }
        


}






