<?php

namespace App\Controller;

use App\Entity\AvisFormation;
use App\Entity\Formation;
use App\Form\AvisForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisFormationController extends AbstractController
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }
    /*
    /**
     * @Route("/avisFormation", name="avisFormation")
     */
    /*public function avisFormation(): Response
    {
        $avis=new AvisFormation();
        $form = $this->createForm(AvisForm::class,$avis);

        return $this->render("avis_formation/donnerAvisFormation.html.twig",["avis"=>$form->createView()]);
    }*/

    /*
    /**
     * @Route("/avisFormation", name="avisFormationRequest")
     */
    /*public function avisFormationRequest(Request $request): Response
    {
        $avis=new AvisForm();
        $form = $this->createForm(AvisForm::class,$avis);

        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($avis);
            $em->flush();

            return $this->redirectToRoute("avisFormation");
        }

        return $this->render("avis_formation/donnerAvisFormation.html.twig",["avis"=>$form->createView()]);
    }*/

    /**
     * @Route("/formationList", name="formationList")
     */
    public function formationList(): Response
    {
        $em= $this->getDoctrine()->getManager();
        $formation = $em->getRepository("App\Entity\Formation")->findAll();
        return $this->render("avis_formation/list.html.twig",["formation"=>$formation]);
    }

    /**
     * @Route("/avisFormationList", name="avisFormationList")
     */
    public function avisFormationList(): Response
    {
        $em= $this->getDoctrine()->getManager();
        $avis = $em->getRepository("App\Entity\AvisFormation")->findAll();
        return $this->render("avis_formation/listAvis.html.twig",["avis"=>$avis]);
    }




    /**
     * @Route("/AddAvisformation/{id}/{note}", name="AddAvisformation")
     */
    public function AddAvisformation(Request $request,$id,$note): Response
    {
        $em=$this->getDoctrine()->getManager();
        $formation=$em->getRepository("App\Entity\Formation")->find($id);

        /*
        $editform=$this->createForm(AddCondidatForm::class,$condidat);
        $editform->handleRequest($request);



        if($editform->isSubmitted() and $editform->isValid()){
            $em->persist($condidat);
            $em->flush();

            return $this->redirectToRoute("condidatList");
        }*/


        $avis=new AvisFormation();
        $session = $this->requestStack->getSession();
        $avis->setCondidatId($session->get('Condidat_id'));
        $avis->setFormationId($id);
        $avis->setAvis($note);

        $em->persist($avis);
        $em->flush();

        return $this->redirectToRoute("avisFormationList");
    }

    /*
    /**
     * @Route("/deleteCondidat", name="deleteCondidat")
     */
    /*public function deleteCondidat(Request $request,$id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $condidat=$em->getRepository("App`\Entity\Condidat")->find($id);

        if($condidat!==null){
            $em->remove($condidat);
            $em->flush();
        }else{
            throw new NotFoundHttpException("le condidat ".$id."est introuvable!");
        }

        return $this->redirectToRoute("condidatList");
    }*/

}
