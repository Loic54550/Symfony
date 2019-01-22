<?php
// src/Controller/IndexController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Utilisateur;
use App\Entity\Categorie;
use App\Entity\Subcat;
use App\Entity\Message;
use App\Entity\Topic;
use App\Form\UtilisateurType;
use App\Form\UtilisateurInscriptionType;
use App\Form\MessageType;
use App\Repository\CategorieRepository;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/acc", name="acc")
     */
    public function index(Request $request)
    {
        $utilisateur = new Utilisateur();

        $formConnection = $this->createForm(UtilisateurType::class, $utilisateur);

        $formInscription = $this->createForm(UtilisateurInscriptionType::class, $utilisateur);

        if ($request->isMethod('POST')) 
        {
            $formConnection->submit($request->request->get($formConnection->getName()));
            if ($formConnection->isSubmitted() && $formConnection->isValid()) 
            {
                $utilisateurD = $formConnection->getData();

                $repository = $this->getDoctrine()->getRepository(Utilisateur::class);
                $utilisateur = $repository->findOneBy([
                    'mail' => $utilisateurD->getMail(),
                    'password' => $utilisateurD->getPassword(),
                ]);

                if(!is_null($utilisateur)) {
                    
                }
                //return $this->redirectToRoute('user');
            }

            $formInscription->submit($request->request->get($formInscription->getName()));
            if ($formInscription->isSubmitted() && $formInscription->isValid()) 
            {
                $utilisateurD = $formInscription->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($utilisateurD);
                $entityManager->flush();
                
                return $this->redirectToRoute('acc');
            }
        }
        
        return $this->render('index/index.html.twig', [
            'formConnection' => $formConnection->createView(),
            'formInscription' => $formInscription->createView(),

        ]);
    }

    /**
     * @Route("/forum", name="forum")
     */
    public function forum(Request $request)
    {
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll()
        ;
        
        return $this->render('forum/forum.html.twig', [
            'categories' => $categories,
        ]);
    }
    
    /**
     * @Route("/subcat", name="subcat")
     */
    public function subcat(Request $request)
    {
        $subcats = $this->getDoctrine()
            ->getRepository(Subcat::class)
            ->findAll()
        ;
        
        return $this->render('subcat/subcat.html.twig', [
            'subcats' => $subcats,
        ]);
    }

    /**
     * @Route("/topic/{topic}", name="topic")
     */
    public function topic(Request $request, $topic)
    {
        ///////////////////////////// SESSION id
        $utilisateur = $this->getDoctrine()
            ->getRepository(Utilisateur::class)
            ->find(1) //// REMPLACER PAR SESSION _ID
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
        ]);
    }
}





