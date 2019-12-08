<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="text", nullable=true)
     */
    private $imageUrl;

    /**
     * @var Category[]
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="projects")
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CV", inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cv;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Competances", inversedBy="projects")
     */
    private $competances;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Techno", inversedBy="projects")
     */
    private $Technos;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\FrameworkLogiciel", inversedBy="projects")
     */
    private $FrameworkLogiciel;
   
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set title
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Project
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->competances = new ArrayCollection();
        $this->Technos = new ArrayCollection();
        $this->FrameworkLogiciel = new ArrayCollection();
    }

    /**
     * Add category
     *
     * @param \App\Entity\Category $category
     *
     * @return Project
     */
    public function addCategory(\App\Entity\Category $category)
    {
        $this->categories[] = $category;
        return $this;
    }

    /**
     * Remove category
     *
     * @param \Entity\Category $category
     */
    public function removeCategory(\App\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }
    
    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
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

    /**
     * @return Collection|Competances[]
     */
    public function getCompetances(): Collection
    {
        return $this->competances;
    }

    public function addCompetance(Competances $competance): self
    {
        if (!$this->competances->contains($competance)) {
            $this->competances[] = $competance;
        }

        return $this;
    }

    public function removeCompetance(Competances $competance): self
    {
        if ($this->competances->contains($competance)) {
            $this->competances->removeElement($competance);
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
    public function getFrameworkLogiciel(): Collection
    {
        return $this->FrameworkLogiciel;
    }

    public function addFrameworkLogiciel(FrameworkLogiciel $frameworkLogiciel): self
    {
        if (!$this->FrameworkLogiciel->contains($frameworkLogiciel)) {
            $this->FrameworkLogiciel[] = $frameworkLogiciel;
        }

        return $this;
    }

    public function removeFrameworkLogiciel(FrameworkLogiciel $frameworkLogiciel): self
    {
        if ($this->FrameworkLogiciel->contains($frameworkLogiciel)) {
            $this->FrameworkLogiciel->removeElement($frameworkLogiciel);
        }

        return $this;
    }

}
