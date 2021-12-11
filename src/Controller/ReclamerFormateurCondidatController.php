<?php

namespace App\Controller;

use App\Entity\CondidatFormateur;
use App\Form\ReclamerFormateurForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ReclamerFormateurCondidatController extends AbstractController
{

    /**
     * @Route("/ListFormateur", name="ListFormateur")
     */
    public function ListFormateur(): Response
    {
        $em=$this->getDoctrine()->getManager();
        $formateur=$em->getRepository("App\Entity\Formateur")->findAll();

        return $this->render('reclamer_formateur_condidat\list.html.twig',[
            "formateur"=>$formateur
        ]);
    }



    /**
     * @Route("/reclamerFormateur/{$id}", name="reclamerFormateur")
     */
    public function reclamerFormateur(Request $request): Response
    {
        $reclamer=new CondidatFormateur();
        /*$form = $this->createForm(ReclamerFormateurForm::class,$reclamer);

        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($reclamer);
            $em->flush();

            return $this->redirectToRoute("reclamerFormateur");
        }
        */
        $reclamer->setCondidatId(5);
        $reclamer->setFormateurId($request->attributes->get('id'));

        $em= $this->getDoctrine()->getManager();
        $em->persist($reclamer);
        $em->flush();
        return $this->redirectToRoute("reclamerFormateur");
    }


    /**
     * @Route("/UpdateReclamationFormateur/{id}", name="UpdateReclamationFormateur")
     */
    public function UpdateReclamationFormateur(Request $request,$id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $reclamer=$em->getRepository("App`\Entity\CondidatFormateur")->find($id);

        $editform=$this->createForm(ReclamerFormateurForm::class,$reclamer);
        $editform->handleRequest($request);

        if($editform->isSubmitted() and $editform->isValid()){
            $em->persist($reclamer);
            $em->flush();

            return $this->redirectToRoute("ListReclamationFormateur");
        }

        return $this->render("reclamer_formateur_condidat/reclamerFormateur.html.twig",
            ["reclamer"=>$editform->createView()]);
    }

    /**
     * @Route("/deleteReclamationFormateur", name="deleteReclamationFormateur")
     */
    public function deleteReclamationFormateur(Request $request,$id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $reclamer=$em->getRepository("App`\Entity\CondidatFormateur")->find($id);

        if($reclamer!==null){
            $em->remove($request);
            $em->flush();
        }else{
            throw new NotFoundHttpException("la reclamtion ".$id."est introuvable!");
        }

        return $this->redirectToRoute("ListReclamationFormateur");
    }


}
