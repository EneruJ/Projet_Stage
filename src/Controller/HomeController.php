<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;




class HomeController extends AbstractController
{

    public function index()
    {
        return $this->render('home/index.html.twig');
    }

    public function connected()
    {
        $userRole = $this->getUser()->getRoles();
        if (in_array("ROLE_ADMIN", $userRole)) {
            return $this->render('home/index_a.html.twig');
        } else {
            return $this->render('home/index_c.html.twig');
        }
    }
    public function show($name)
    {
        $projectRoot = $this->getParameter('kernel.project_dir');
        return $this->file($projectRoot.'/public/documents/pdf/'.$name, null, ResponseHeaderBag::DISPOSITION_INLINE);
    }


}
