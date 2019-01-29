<?php

// src/Controller/NavbarController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

class NavbarController extends AbstractController
{
    /**
     * @Route("/deconnection", name="deconnection")
     */
    public function deconnection(Request $request, SessionInterface $session)
    {
        $session->clear();
        
        return $this->redirectToRoute('index');
    }

    /**
     * @Route("/return", name="return")
     */
    public function return(Request $request, SessionInterface $session)
    {
        return $this->redirectToRoute('forum');
    }

}

/*

public function topic(Request $request, SessionInterface $session, $topic)

$topic = $this->getDoctrine()
            ->getRepository(Topic::class)
            ->find($topic)
        ;

$topic = new Topic();

        $formTopic = $this->createForm(Topic::class, $topic);

        if ($request->isMethod('POST')) 
        {
            $formTopic->submit($request->request->get($formTopic->getName()));
            if ($formTopic->isSubmitted() && $formTopic->isValid()) 
            {
                $topic = $formTopic->getData();

                
                $topic->setDateEdition(new \DateTime('today'));
                $topic->setTopic($topic);

                $topic->setUtilisateur($utilisateur);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($topic);
                $entityManager->flush();

            }
        }

        $topic = $this->getDoctrine()
            ->getRepository(Topic::class)
            ->find($topic)
        ;

return $this->render('topic/subcat.html.twig', [
            'formTopic' => $formTopic->createView(),

        */