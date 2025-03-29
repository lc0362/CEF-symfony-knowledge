<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LessonController extends AbstractController
{
    #[Route('/lesson', name: 'app_lesson')]
    public function index(): Response
    {
        return $this->render('lesson/index.html.twig', [
            'controller_name' => 'LessonController',
        ]);
    }
}
