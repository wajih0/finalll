<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livraisonuser;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\LivraisonRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\LivraisonUserFormType;
use App\Repository\ManagerRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LivraisonUserController extends AbstractController
{
    #[Route('/livraison/user', name: 'app_livraison_user')]
    public function index(): Response
    {
        return $this->render('livraison_user/index.html.twig', [
            'controller_name' => 'LivraisonUserController',
        ]);
    }
  //Ajout de livraison  
  #[Route('/ajout', name: 'app_ajout')]
  public function addC(ManagerRegistry $doctrine, Request $request)
  {
      $livraisonuser= new Livraisonuser();
      $form=$this->createForm(LivraisonUserFormType::class,$livraisonuser);
      $form->handleRequest($request);
           if($form->isSubmitted()){
                  //Action d'ajout
                     $em =$doctrine->getManager() ;
                     $em->persist($livraisonuser);
                     $em->flush();
                     $this->addFlash('success', 'Ajout avec succès');
          return $this->redirectToRoute("app_ajout");
      }
  return $this->renderForm("livraison_user/index.html.twig",
        array("f"=>$form));
  }   
}