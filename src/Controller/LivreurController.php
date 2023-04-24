<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livreur;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\LivreurRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\LivreurFormType;
use App\Repository\ManagerRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;




class LivreurController extends AbstractController
{
    #[Route('/livreur', name: 'app_livreur')]
    public function index(): Response
    {
        return $this->render('livreur/index.html.twig', [
            'controller_name' => 'LivreurController',
        ]);
    }



    #[Route('/recherche', name: 'app_liste_ordonne')]
    public function listOrdonne(Request $request, LivreurRepository $repo): Response
    {
        $region = $request->query->get('region');
        $list = $repo->findByTitre($region);
        return $this->render('livreur/afficher.html.twig', [
            'livreur' => $list,
        ]);
    }


     //Ajout livreur  
     #[Route('/ajoutlivreur', name: 'app_ajouterliv')]
     public function addC(ManagerRegistry $doctrine, Request $request)
     {
         $livreur= new Livreur();
         $form=$this->createForm(LivreurFormType::class,$livreur);
         $form->handleRequest($request);
              if($form->isSubmitted()){
                     //Action d'ajout
                        $em =$doctrine->getManager() ;
                        $em->persist($livreur);
                        $em->flush();
                        $this->addFlash('success', 'Ajout avec succès');
             return $this->redirectToRoute("app_listliv");
              }
     return $this->renderForm("livreur/ajouter.html.twig",
           array("f"=>$form));
     }
 
    //Affichage de la liste des livreurs
    #[Route('/listeliv', name: 'app_listliv')]
    public function afficher(ManagerRegistry $doctrine): Response
    {
        $repository= $doctrine -> getRepository(Livreur::class);
        $livreur = $repository -> findAll();
        return $this -> render('livreur/afficher.html.twig',['livreur'=>$livreur]);
    }
      //Supprimer un livreur
      #[Route('/deleteliv/{id}', name: 'app_deleteliv')]
      public function delete(Livreur $livreur=null, ManagerRegistry $doctrine): RedirectResponse
      {
          //récupérer livreur à supprimer
           if ($livreur){
           $manager=$doctrine->getManager();
           $manager->remove($livreur);
           $manager->flush();
          $this->addFlash('success',"livreur supprimée!");
      }
       else {
      $this->addFlash('error',"livreur innexistante");
  
  }
  return $this->redirectToRoute('app_listliv');   
   }

   
//modifier
 #[Route('/modifier/{id}', name: 'app_modif')]
 public function  update(ManagerRegistry $doctrine,$id,  Request  $request) : Response
 { $livreur = $doctrine
     ->getRepository(Livreur::class)
     ->find($id);
     $form = $this->createForm(LivreurFormType::class, $livreur);
     $form->add('update', SubmitType::class) ;
     $form->handleRequest($request);
     if ($form->isSubmitted())
     { $em = $doctrine->getManager();
         $em->flush();
         return $this->redirectToRoute('app_listliv');
     }
     return $this->renderForm("livreur/update.html.twig",
         ["f"=>$form]) ;

}
}