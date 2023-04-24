<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livraison;
use App\Entity\Livraisonuser;

use Doctrine\Persistence\ManagerRegistry;
use App\Repository\LivraisonRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\LivraisonFormType;
use App\Repository\ManagerRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class LivraisonController extends AbstractController
{
    #[Route('/livraison', name: 'app_livraison')]
    public function index(): Response
    {
        return $this->render('livraison/index.html.twig', [
            'controller_name' => 'LivraisonController',
        ]);
    }

    //Affichage de la liste des livraisons
    #[Route('/liste', name: 'app_list')]
    public function afficher(ManagerRegistry $doctrine): Response
    {
        $repository= $doctrine -> getRepository(Livraison::class);
        $livraisons = $repository -> findAll();
        return $this -> render('livraison/afficher.html.twig',['livraisons'=>$livraisons]);
    }

    //Ajout de livraison  
    #[Route('/ajouter', name: 'app_ajouter')]
    public function addC(ManagerRegistry $doctrine, Request $request)
    {
        $livraison= new Livraison();
        $form=$this->createForm(LivraisonFormType::class,$livraison);
        $form->handleRequest($request);
             if($form->isSubmitted() && $form->isValid()){
                    //Action d'ajout
                       $em =$doctrine->getManager() ;
                       $em->persist($livraison);
                       $em->flush();
                       $this->addFlash('success', 'votre commande passer avec success');

            return $this->redirectToRoute("app_ajouter");
        }
    return $this->renderForm("livraison/ajouter.html.twig",
          array("f"=>$form));
    }


    //Supprimer une livraison
    #[Route('/delete/{id}', name: 'app_delete')]
    public function delete(Livraison $livraison=null, ManagerRegistry $doctrine): RedirectResponse
    {
        //récupérer la livraison à supprimer
         if ($livraison){
         $manager=$doctrine->getManager();
         $manager->remove($livraison);
         $manager->flush();
    }
     else {
    $this->addFlash('error',"livraison innexistante");

}
return $this->redirectToRoute('app_list');   
 }



//modifier
 #[Route('/update/{id}', name: 'app_update')]
 public function  update(ManagerRegistry $doctrine,$id,  Request  $request) : Response
 { $livraison = $doctrine
     ->getRepository(Livraison::class)
     ->find($id);
     $form = $this->createForm(LivraisonFormType::class, $livraison);
     $form->add('update', SubmitType::class) ;
     $form->handleRequest($request);
     if ($form->isSubmitted())
     { $em = $doctrine->getManager();
         $em->flush();
         return $this->redirectToRoute('app_list');
     }
     return $this->renderForm("livraison/update.html.twig",
         ["f"=>$form]) ;


 }

 













    }