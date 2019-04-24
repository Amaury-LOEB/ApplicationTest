<?php

namespace App\Controller;

use App\Entity\Societe;
use App\Form\SocieteForm;
use App\Repository\SocieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class AppliController extends Controller
{
    /**
     * @Route("/application/societe", name="societe")
     */
    public function indexAction(Request $request, SocieteRepository $repo)
    {
        $societe2 = $repo->findAll();
        $societe = new Societe();
        $form = $this->createForm(SocieteForm::class, $societe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirectToRoute('societe');
        }
        return $this->render('societe/index.html.twig', [
            'allSociete' => $societe2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="societeraccourci")
     */
    public function indexRaccourciAction(Request $request,SocieteRepository $repo)
    {
        $societe2 = $repo->findAll();
        $societe = new Societe();
        $form = $this->createForm(SocieteForm::class, $societe);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $task = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($task);
                $entityManager->flush();
                return $this->redirectToRoute('societe');
            }
        return $this->render('societe/index.html.twig', [
            'allSociete' => $societe2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/application/{id}/societe", name="UneSociete")
     * @ParamConverter("societe", class="App:Societe")
     */
    public function oneSocieteAction(Request $request, $societe)
    {
        $form = $this->createForm(SocieteForm::class, $societe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirectToRoute('UneSociete');
        }
        return $this->render('societe/uneSociete.html.twig', [
            'societe' => $societe,
            'form' => $form->createView(),
        ]);
    }
}

