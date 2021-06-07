<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\DocumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IController extends AbstractController
{

    public function index(DocumentRepository $documentRepository)
    {
        $userRole = $this->getUser()->getRoles();
        if (in_array("ROLE_ADMIN", $userRole)) {
            return $this->render('home/index_a.html.twig', [
                "documents" => $documentRepository->findAll()
            ]);
        } else {
            return $this->render('home/index_c.html.twig', [
                "documents" => $documentRepository->findAll()
            ]);
        }

    }


    public function stats (UserRepository $userRepository)
    {

        return $this->render('home/admin_stats.html.twig', [
            "users" => $userRepository->findAll()]);
    }
    public function itest(DocumentRepository $documentRepository, $info)
    {

        return $this->render('home/index_c.html.twig', [
            "documents" => $documentRepository->findBy(
                ["Titre" => $info]
            )
        ]);
    }
}
