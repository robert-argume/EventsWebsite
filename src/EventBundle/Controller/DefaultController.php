<?php

namespace EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction( $name = "Stranger" )
    {
        //return $this->render('EventBundle:Default:index.html.twig', array('name' => $name));
        //return new Response("Hello from Response !!");

        $message = "Hello from Response !!";
        $data = array(
            'name' => $name,
            'message' => $message 
        );

        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ;
        //echo "<pre>".$json."</pre>";
        //die;
        $response = new Response("<pre>".$json."</pre>");
        $response->headers->set("Content-Type", "application/json");
        return $response;

        
        
    }
}
