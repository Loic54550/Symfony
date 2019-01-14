<?php

// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
    /**
     * Matches /blog exactly
     *
     * @Route("/blog", name="blog_list")
     */
    public function list()
    {
        $number=5;
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
        // ...
    }

    /**
     * Matches /blog/*
     *
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function show($slug)
    {
        return new Response(
            '<html><body>Lucky number: '.$slug.'</body></html>'
        );
        // $slug will equal the dynamic part of the URL
        // e.g. at /blog/yay-routing, then $slug='yay-routing'

        // ...
    }
}
