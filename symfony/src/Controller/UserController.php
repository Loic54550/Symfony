<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(Request $request)
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll()
        ;

        $user = new User();
        $user->setName('Loïc');
        $user->setMail('linda@hotmail.fr');
        $user->setPassword('123456789');

        $form = $this->createForm(UserType::class, $user);

        if ($request->isMethod('POST')) 
        {
            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) 
            {
                $user = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                $ok = 'Profil UPDATED';

                return $this->redirectToRoute('user');
            }
        }


        return $this->render('test/test.html.twig', [
            'controller_name' => 'ProductController',
            'form' => $form->createView(),
            'users'=>$users,

        ]);
    } 
    /**
     * @Route("/editProfil/{id}", name="editProfil")
     */  
    public function editProfil(Request $request, $id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id)
        ;

        $form = $this->createForm(UserType::class, $user);

        if ($request->isMethod('POST')) 
        {
            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) 
            {
                $user = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                $ok = 'Profil UPDATED';

                return $this->redirectToRoute('user');
            }
        }


        return $this->render('test/test.html.twig', [
            'controller_name' => 'ProductController',
            'form' => $form->createView(),

        ]);
    }


    /**
     * @Route("/supprProfil/{id}", name="supprProfil")
     */  

    public function supprProfil(Request $request, $id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id)
        ;

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();


        return $this->redirectToRoute('user');
    }






}




