<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NotFoundController extends AbstractController
{
    #[Route('/not/found', name: 'app_not_found')]
    public function index(): Response
    {
        return $this->render('not_found/index.html.twig', [
            'controller_name' => 'NotFoundController',
        ]);
    }
}
