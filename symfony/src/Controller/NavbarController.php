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
        
        return $this->redirectToRoute('acc');
    }

    

}
