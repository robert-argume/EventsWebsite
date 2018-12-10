<?php

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;
use EventBundle\Entity\Event;

require __DIR__.'/app/autoload.php';
Debug::enable();

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$kernel->boot();

// Get container and set request
$container = $kernel->getContainer();
$container->enterScope('request');
$container->set('request', $request);

// Get templating service and render a template, passing parameter accordingly
// $templating = $container->get('templating');
// echo $templating->render(
//     'EventBundle:Default:index.html.twig',
//     array( 'name' => 'Vader')
// );

// Create an event 
$event = new Event();
$event->setName('John\'s suprise birthday party');
$event->setLocation('941 Progress Ave, Scarborough, ON M1G 3T8');
$birthdayDateTime = new DateTime('2018-12-23 23:00:00');
$birthdayDateTime->format('Y-m-d H:i:s');
$event->setTime($birthdayDateTime);
$event->setDetails("John HATES surprises!");

// Save it using Doctrine Entity Manager
$em = $container->get('doctrine')->getManager();
$em->persist($event);
$em->flush();




