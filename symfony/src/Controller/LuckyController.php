<?php

// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/loic/tamere")
     */
    public function tagrossemaire() {
        $number = random_int(0, 1000);
        return $this->render('test/test.html.twig', [
            'number' => $number,
        ]);
    }
}
