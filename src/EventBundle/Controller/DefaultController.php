<?php

namespace EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction( $name = "Stranger" )
    {   
        // Simple Response with static text
        //return new Response("Hello from Response !!");

        // Response that takes a view file to render
        //return $this->render('EventBundle:Default:index.html.twig', array('name' => $name));

        // Send a Json as a response, setting the Content-Type accordingly
        // $message = "Hello from Response !!";
        // $data = array(
        //     'name' => $name,
        //     'message' => $message 
        // );
        // $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ;
        // //echo "<pre>".$json."</pre>";
        // //die;
        // $response = new Response($json);
        // $response->headers->set("Content-Type", "application/json");
        // return $response;

        // Get Doctrine Entity Manager, and get the repository for Bundle Events
        //$em = $this->container->get('doctrine')->getManager();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('EventBundle:Event');

        // Find an event by name in the repository
        $event = $repo->findOneBy(array(    
            'name' => 'John\'s suprise birthday party' 
        ));

        // Render the index view for EventBundle sending data for event
        return $this->render( 'EventBundle:Default:index.html.twig',array(
            'name' => $name,
            'event' => $event
        ));

        
    }
}
