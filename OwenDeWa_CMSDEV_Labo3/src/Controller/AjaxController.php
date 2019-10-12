<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax", name="ajax")
     */
    public function index()
    {

        return new Response('test');
    }
    /**
     * @Route("/like", name="ajax-like" , methods={"GET"})
     */
    public function like(Request $request)
    {


        return new Response('test');
    }


}
