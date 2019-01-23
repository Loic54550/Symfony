<?php

// src/Controller/ForumController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use App\Entity\Utilisateur;
use App\Entity\Categorie;
use App\Entity\Subcat;
use App\Entity\Message;
use App\Entity\Topic;
use App\Form\UtilisateurType;
use App\Form\UtilisateurInscriptionType;
use App\Form\MessageType;
use App\Repository\CategorieRepository;

class ForumController extends AbstractController
{
    /**
     * @Route("/forum", name="forum")
     */
    public function forum(Request $request, SessionInterface $session)
    {
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll()
        ;
        
        return $this->render('forum/forum.html.twig', [
            'categories' => $categories,
            'pseudo' => $session->get('pseudo'),
        ]);
    }
    
    /**
     * @Route("/subcat/{categorie}", name="subcat")
     */
    public function subcat(Request $request, SessionInterface $session, $categorie)
    {
        $subcat = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->find($categorie)
        ;
        
        return $this->render('subcat/subcat.html.twig', [
            'subcat' => $subcat,
            'pseudo' => $session->get('pseudo'),
        ]);
    }

    /**
     * @Route("/topic/{topic}", name="topic")
     */
    public function topic(Request $request, SessionInterface $session, $topic)
    {
        ///////////////////////////// SESSION id
        $utilisateur = $this->getDoctrine()
            ->getRepository(Utilisateur::class)
            ->find($session->get('id'))
        ;

        $topic = $this->getDoctrine()
            ->getRepository(Topic::class)
            ->find($topic)
        ;

        $messages = $this->getDoctrine()
            ->getRepository(Message::class)
            ->findAll()
        ;

        $message = new Message();

        $formMessage = $this->createForm(MessageType::class, $message);

        if ($request->isMethod('POST')) 
        {
            $formMessage->submit($request->request->get($formMessage->getName()));
            if ($formMessage->isSubmitted() && $formMessage->isValid()) 
            {
                $message = $formMessage->getData();

                
                $message->setDateEdition(new \DateTime('today'));
                $message->setTopic($topic);

                $message->setUtilisateur($utilisateur);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($message);
                $entityManager->flush();

            }
        }

        $topic = $this->getDoctrine()
            ->getRepository(Topic::class)
            ->find($topic)
        ;

        return $this->render('topic/topic.html.twig', [
            'formMessage' => $formMessage->createView(),
            'topic' => $topic,
            'messages' => $messages,
            'pseudo' => $session->get('pseudo'),
            'utilisateur' => $utilisateur,
        ]);
    }
}





