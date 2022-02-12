<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FounderController extends AbstractController
{
    /**
     * @Route("/founder", name="founder")
     */
    public function index(): Response
    {
        return $this->render('founder/index.html.twig');
    }
}
