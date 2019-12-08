<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlocContactRepository")
 */
class BlocContact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_num_rue;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $adresse_cp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_ville;

    /**
     * @ORM\Column(type="string", length=14, nullable=true)
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Anonymous;
    
    public function getAdresseNumRue(): ?string
    {
        return $this->adresse_num_rue;
    }

    public function setAdresseNumRue(?string $adresse_num_rue): self
    {
        $this->adresse_num_rue = $adresse_num_rue;

        return $this;
    }

    public function getAdresseCp(): ?string
    {
        return $this->adresse_cp;
    }

    public function setAdresseCp(?string $adresse_cp): self
    {
        $this->adresse_cp = $adresse_cp;

        return $this;
    }

    public function getAdresseVille(): ?string
    {
        return $this->adresse_ville;
    }

    public function setAdresseVille(?string $adresse_ville): self
    {
        $this->adresse_ville = $adresse_ville;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(?string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->phone_number;
    }

    public function setEmail(?string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getAnonymous(): ?bool
    {
        return $this->Anonymous;
    }

    public function setAnonymous(bool $Anonymous): self
    {
        $this->Anonymous = $Anonymous;

        return $this;
    }

    
}
