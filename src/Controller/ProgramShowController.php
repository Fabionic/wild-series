<?php

// src/Controller/ProgramShowController.php

namespace App\Controller;

use App\Repository\ProgramRepository;
use Doctrine\Common\Proxy\Proxy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;

#[Route('/program', name: 'program_')]
class ProgramShowController extends AbstractController

{
    
     #[Route('/show/{id<^[0-9]+$>}', name: 'show')]

     public function show(int $id, ProgramRepository $programRepository):Response
     
     {
     
         $program = $programRepository->findOneBy(['id' => $id]);
     
         // same as $program = $programRepository->find($id);
     
     
         if (!$program) {
     
             throw $this->createNotFoundException(
     
                 'No program with id : '.$id.' found in program\'s table.'
     
             );
     
         }
     
         return $this->render('program/show.html.twig', [
     
             'program' => $program,
     
         ]);
     
     }

    
}





   