<?php
// src/Controller/IndexController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Form\UtilisateurInscriptionType;


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


        


        
        return $this->render('index/forum.html.twig', [


        ]);
    }
}





