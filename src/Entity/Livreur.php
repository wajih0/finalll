<?php

namespace App\Entity;
use App\Entity\Livraison;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\LivreurRepository;
#[ORM\Entity(repositoryClass: LivreurRepository::class)]


/**
 * Livreur
 *
 * @ORM\Table(name="livreur")
 * @ORM\Entity
 */


class Livreur
{

    //#[ORM\OneToMany(mappedBy: 'livreur', targetEntity: Livraisonuser::class, cascade:["persist", "remove"], orphanRemoval:true)]
   // private Collection $livraison;

//    public function __construct()
   // {
   //     $this->livraison = new ArrayCollection();
  //  }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="num", type="string", length=50, nullable=false)
     * @Assert\Length(min=8,minMessage="veuillez avoir 8 chiffres")
     */
    private $num;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $region;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNum(): ?string
    {
        return $this->num;
    }

    public function setNum(string $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getLivraisonuser(): ?Collection
    {
        return $this->livraison;
    }
    public function setLivraisonuser(?Collection $livraison): void
    {
        $this->livraison = $livraison;
    }
    


}