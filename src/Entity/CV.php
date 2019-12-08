<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CVRepository")
 */
class CV
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, options={"default":"Titre"})
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, options={"default":"Anonyme.jpg"})
     */
    private $Photo_Avatar;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, options={"default":"La rédaction d'un cv nous cause des migraines car dans ce domaine on nous fait marcher sur la tête. Alain Leblay, Consultant RH."})
     */
    private $TextePhoto ;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Age;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\NivExp", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $NivExp;

    /**
     * @ORM\Column(type="boolean", options={"default":0})
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Formation", mappedBy="cv", orphanRemoval=true)
     */
    private $formations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project", mappedBy="cv", orphanRemoval=true)
     */
    private $projects;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\BlocContact", cascade={"persist", "remove"})
     */
    private $blocContact;

     /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     */
    private $user;

    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Experiences", mappedBy="cv", orphanRemoval=true)
     */
    private $experiences;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Hobbie")
     */
    private $hobbies;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ReseauxSociaux")
     */
    private $ResSoc;

       

    public function __construct()
    {
        $this->formations = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->ReseauxSoc = new ArrayCollection();        
        $this->experiences = new ArrayCollection();
        $this->hobbies = new ArrayCollection();
        $this->ResSoc = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getPhotoAvatar(): ?string
    {
        return $this->Photo_Avatar;
    }

    public function setPhotoAvatar(?string $Photo_Avatar): self
    {
        $this->Photo_Avatar = $Photo_Avatar;

        return $this;
    }

    public function getTextePhoto(): ?string
    {
        return $this->TextePhoto;
    }

    public function setTextePhoto(?string $TextePhoto): self
    {
        $this->TextePhoto = $TextePhoto;

        return $this;
    }
    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(int $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getNivExp(): ?NivExp
    {
        return $this->NivExp;
    }

    public function setNivExp(NivExp $NivExp): self
    {
        $this->NivExp = $NivExp;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setCv($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->contains($formation)) {
            $this->formations->removeElement($formation);
            // set the owning side to null (unless already changed)
            if ($formation->getCv() === $this) {
                $formation->setCv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Experiences[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experiences $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setCv($this);
        }

        return $this;
    }

    public function removeExperience(Experiences $experience): self
    {
        if ($this->experiences->contains($experience)) {
            $this->experiences->removeElement($experience);
            // set the owning side to null (unless already changed)
            if ($experience->getCv() === $this) {
                $experience->setCv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setCv($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
            // set the owning side to null (unless already changed)
            if ($project->getCv() === $this) {
                $project->setCv(null);
            }
        }

        return $this;
    }

    public function getBlocContact(): ?BlocContact
    {
        return $this->blocContact;
    }

    public function setBlocContact(?BlocContact $blocContact): self
    {
        $this->blocContact = $blocContact;

        return $this;
    }
    
        
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Hobbie[]
     */
    public function getHobbies(): Collection
    {
        return $this->hobbies;
    }

    public function addHobby(Hobbie $hobby): self
    {
        if (!$this->hobbies->contains($hobby)) {
            $this->hobbies[] = $hobby;
        }

        return $this;
    }

    public function removeHobby(Hobbie $hobby): self
    {
        if ($this->hobbies->contains($hobby)) {
            $this->hobbies->removeElement($hobby);
        }

        return $this;
    }

    /**
     * @return Collection|ReseauxSociaux[]
     */
    public function getResSoc(): Collection
    {
        return $this->ResSoc;
    }

    public function addResSoc(ReseauxSociaux $resSoc): self
    {
        if (!$this->ResSoc->contains($resSoc)) {
            $this->ResSoc[] = $resSoc;
        }

        return $this;
    }

    public function removeResSoc(ReseauxSociaux $resSoc): self
    {
        if ($this->ResSoc->contains($resSoc)) {
            $this->ResSoc->removeElement($resSoc);
        }

        return $this;
    }

        
}
