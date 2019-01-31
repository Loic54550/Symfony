<?php
// src/Controller/IndexController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
use App\Form\TopicType;
use App\Repository\CategorieRepository;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(Request $request, SessionInterface $session)
    {
        $utilisateur = new Utilisateur();

        $formConnection = $this->createForm(UtilisateurType::class, $utilisateur);

        $formInscription = $this->createForm(UtilisateurInscriptionType::class, $utilisateur);

        $connection = false;

        if ($request->isMethod('POST')) 
        {
            $formConnection->submit($request->request->get($formConnection->getName()));
            if ($formConnection->isSubmitted() && $formConnection->isValid()) 
            {
                $utilisateur = $formConnection->getData();

                $repository = $this->getDoctrine()->getRepository(Utilisateur::class);
                
                $utilisateur = $repository->findOneBy([
                    'mail' => $utilisateur->getMail(),
                    'password' => $utilisateur->getPassword(),
                    
                ]);
                
                if(!is_null($utilisateur)) {
                    $session->set('id', $utilisateur->getId());
                    $session->set('pseudo', $utilisateur->getPseudo());
                    return $this->redirectToRoute('forum');
                } else {
                    return $this->redirectToRoute('index');
                }
                
                
            }

            if (!$connection)
            {
                $formInscription->submit($request->request->get($formInscription->getName()));
                if ($formInscription->isSubmitted() && $formInscription->isValid()) 
                { 
                    
                    $utilisateur = $formInscription->getData();

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($utilisateur);
                    $entityManager->flush();
                    
                    return $this->redirectToRoute('forum');
                }
            }
        }
        
        return $this->render('index/index.html.twig', [
            'formConnection' => $formConnection->createView(),
            'formInscription' => $formInscription->createView(),
            'pseudo' => $session->get('pseudo'),
        ]);
    }
}





