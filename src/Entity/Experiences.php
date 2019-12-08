<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExperiencesRepository")
 */
class Experiences
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Date_Debut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Date_Fin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $entreprise;    

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="experiences")
     */        
    private $Categories;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Competances", inversedBy="experiences")
     */
    private $Competances;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Techno", inversedBy="experiences")
     */
    private $Technos;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\FrameworkLogiciel", inversedBy="experiences")
     */
    private $FrameLog;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CV", inversedBy="experiences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cv;


    public function __construct()
    {
        $this->Categories = new ArrayCollection();
        $this->Competances = new ArrayCollection();
        $this->Technos = new ArrayCollection();
        $this->FrameLog = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDateDebut(): ?string
    {
        return $this->Date_Debut;
    }

    public function setDateDebut(?string $Date_Debut): self
    {
        $this->Date_Debut = $Date_Debut;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->Date_Fin;
    }

    public function setDateFin(?string $Date_Fin): self
    {
        $this->Date_Fin = $Date_Fin;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }    

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->Categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->Categories->contains($category)) {
            $this->Categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->Categories->contains($category)) {
            $this->Categories->removeElement($category);
        }

        return $this;
    }

    /**
     * @return Collection|Competances[]
     */
    public function getCompetances(): Collection
    {
        return $this->Competances;
    }

    public function addCompetance(Competances $competance): self
    {
        if (!$this->Competances->contains($competance)) {
            $this->Competances[] = $competance;
        }

        return $this;
    }

    public function removeCompetance(Competances $competance): self
    {
        if ($this->Competances->contains($competance)) {
            $this->Competances->removeElement($competance);
        }

        return $this;
    }

    /**
     * @return Collection|Techno[]
     */
    public function getTechnos(): Collection
    {
        return $this->Technos;
    }

    public function addTechno(Techno $techno): self
    {
        if (!$this->Technos->contains($techno)) {
            $this->Technos[] = $techno;
        }

        return $this;
    }

    public function removeTechno(Techno $techno): self
    {
        if ($this->Technos->contains($techno)) {
            $this->Technos->removeElement($techno);
        }

        return $this;
    }

    /**
     * @return Collection|FrameworkLogiciel[]
     */
    public function getFrameLog(): Collection
    {
        return $this->FrameLog;
    }

    public function addFrameLog(FrameworkLogiciel $frameLog): self
    {
        if (!$this->FrameLog->contains($frameLog)) {
            $this->FrameLog[] = $frameLog;
        }

        return $this;
    }

    public function removeFrameLog(FrameworkLogiciel $frameLog): self
    {
        if ($this->FrameLog->contains($frameLog)) {
            $this->FrameLog->removeElement($frameLog);
        }

        return $this;
    }

    public function getCv(): ?CV
    {
        return $this->cv;
    }

    public function setCv(?CV $cv): self
    {
        $this->cv = $cv;

        return $this;
    }
}
