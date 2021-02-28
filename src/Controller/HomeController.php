<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {    
    
    /**
     * @Route("/", name="home", methods={"GET", "HEAD"})
     * @param Request $request
     * @return Response
     */

     public function index(Request $request) : Response {    

        // dump($request->server->get("REQUEST_METHOD")); die;

        return $this->render('Home/index.html.twig');

    }


}
