<?php

// src/Controller/ProgramController.php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;


class ProgramShowController extends AbstractController

{
    #[Route('/program/{id<\d+>}', methods: ['GET'], name: 'program_show')]
    
    public function show(int $id): Response

    {
         
         return $this->render('program/show.html.twig', ['id' => $id]);

     }   

    

    
}





   