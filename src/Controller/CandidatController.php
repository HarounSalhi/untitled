<?php

namespace App\Controller;

use App\Entity\AvisFormation;
use App\Entity\Condidat;
use App\Form\AddCondidatForm;
use App\Form\AvisForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class CandidatController extends AbstractController
{

    /**
     * @Route("/condidatList", name="condidatList")
     */
    public function condidatList(): Response
    {
        $em= $this->getDoctrine()->getManager();
        $condidats = $em->getRepository("App\Entity\Condidat")->findAll();
        return $this->render("condidat/list.html.twig",["condidats"=>$condidats]);
    }


    /**
     * @Route("/addCondidat", name="addCondidat",methods={"GET","POST"})
     */
    public function addCondidat(Request $request,UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $condidat=new Condidat();
        $form = $this->createForm(AddCondidatForm::class,$condidat);

        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $condidat->setPassword(
                $userPasswordHasher->hashPassword(
                    $condidat,
                    $form->get('password')->getData()
                )
            );

            $em= $this->getDoctrine()->getManager();
            $em->persist($condidat);
            $em->flush();

            return $this->redirectToRoute("condidatList");
        }

        return $this->render("condidat/addCondidat.html.twig",
            ["condidat"=>$form->createView()]);
    }

    /**
     * @Route("/UpdateCondidat/{id}", name="updateCondidat")
     */
    public function updateCondidat(Request $request,$id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $condidat=$em->getRepository("App\Entity\Condidat")->find($id);

        $editform=$this->createForm(AddCondidatForm::class,$condidat);
        $editform->handleRequest($request);

        if($editform->isSubmitted() and $editform->isValid()){
            $em->persist($condidat);
            $em->flush();

            return $this->redirectToRoute("condidatList");
        }

        return $this->render("condidat/addCondidat.html.twig",
            ["condidat"=>$editform->createView()]);
    }

    /**
     * @Route("/deleteCondidat/{id}", name="deleteCondidat")
     */
    public function deleteCondidat(Request $request,$id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $condidat=$em->getRepository("App\Entity\Condidat")->find($id);

        if($condidat!==null){
            $em->remove($condidat);
            $em->flush();
        }else{
            throw new NotFoundHttpException("le condidat ".$id."est introuvable!");
        }

        return $this->redirectToRoute("condidatList");
    }
}

