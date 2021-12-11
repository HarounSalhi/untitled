<?php

namespace App\Controller;

use App\Entity\Examen;
use App\Form\AddExamenForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class PasserExamenController extends AbstractController
{

    /**
     * @Route("/ExamenList", name="ExamenList")
     */
    public function examenList(): Response
    {
        $em= $this->getDoctrine()->getManager();
        $examen = $em->getRepository("App\Entity\Examen")->findAll();
        return $this->render("examen/list.html.twig",["examen"=>$examen]);
    }


    /**
     * @Route("/addExamen", name="addExamen",methods={"GET","POST"})
     */
    public function addExamen(Request $request): Response
    {
        $examen=new Examen();
        $form = $this->createForm(AddExamenForm::class,$examen);

        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($examen);
            $em->flush();

            return $this->redirectToRoute("ExamenList");
        }

        return $this->render("examen/add.html.twig",
            ["examen"=>$form->createView()]);
    }



    /**
     * @Route("/modifierPasserExamen/{id}", name="modifierPasserExamen")
     */
    public function modifierPasserExamen(Request $request,$id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $examen=$em->getRepository("App\Entity\Examen")->find($id);

        $editform=$this->createForm(AddExamenForm::class,$examen);
        $editform->handleRequest($request);

        if($editform->isSubmitted() and $editform->isValid()){
            $em->persist($examen);
            $em->flush();

            return $this->redirectToRoute("ExamenList");
        }


        return $this->render("examen/add.html.twig",
            ["examen"=>$editform->createView()]);
    }

    /**
     * @Route("/deleteExamen/{id}", name="deleteExamen")
     */
    public function deleteExamen(Request $request,$id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $examen=$em->getRepository("App\Entity\Examen")->find($id);

        if($examen!==null){
            $em->remove($examen);
            $em->flush();
        }else{
            throw new NotFoundHttpException("le examen ".$id."est introuvable!");
        }

        return $this->redirectToRoute("ExamenList");
    }
}
