<?php

namespace App\Controller;

use App\Repository\DocumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class IController extends AbstractController
{



    public function index(DocumentRepository $documentRepository)
    {

        return $this->render('home/index_c.html.twig', [
            "documents" => $documentRepository->findAll()
        ]);
    }
}
