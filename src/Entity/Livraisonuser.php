<?php

namespace App\Entity;
use App\Entity\Livreur;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Livraisonuser
 *
 * @ORM\Table(name="livraisonuser")
 * @ORM\Entity
 */
class Livraisonuser
{

    //#[ORM\ManyToOne(inversedBy: 'livraisonuser')]
    //private ?Livreur $livreur = null;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Livreur")
     * @ORM\JoinColumn(name="livreur_id", referencedColumnName="id")
     */
    private ?Livreur $livreur = null;
 

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     *  @Assert\NotBlank
     */
    private $adresse;



    /**
     * @var string
     *
     * @ORM\Column(name="région", type="string", length=255, nullable=false)
     *  @Assert\NotBlank
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="num", type="string", length=255, nullable=false)
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