<?php

namespace App\Entity;
use App\Entity\Livreur;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\LivraisonRepository;
#[ORM\Entity(repositoryClass: LivraisonRepository::class)]

/**
 * Livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity
 */
class Livraison
{
    #[ORM\ManyToOne(inversedBy: 'livraison')]
    private ?Livreur $livreur = null;

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
     * @ORM\Column(name="adresse", type="string", length=50, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $region;

 

    /**
     * @var string
     *
     * @ORM\Column(name="num", type="string", length=50, nullable=false)
     * @Assert\Length(min=8,minMessage="veuillez avoir 8 chiffres")
     */
    private $num;


  

  

 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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


    public function getNum(): ?string
    {
        return $this->num;
    }

    public function setNum(string $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getLivreur(): ?Livreur
    {
        return $this->livreur;
    }
    public function setLivreur(?Livreur $livreur): self
    {
        $this->livreur = $livreur;
        return $this;
    }


}