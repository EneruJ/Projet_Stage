<?php

namespace App\Controller;

use App\Entity\Document;
use App\Form\AddDocType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AddController extends AbstractController
{
    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request): Response
    {
        $doc = new Document();
        $doc->setdocSize('200');
        $doc->setIdUser($this->getUser());
        $doc->setDatePoste(new \DateTime());
        $form = $this->createForm(AddDocType::class, $doc);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager();

            $em->persist($doc);
            $em->flush();
        }
        return $this->render('home/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
