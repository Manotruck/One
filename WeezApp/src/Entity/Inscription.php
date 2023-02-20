<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer", nullable=false)
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pseudo;
    /**
     * @ORM\Column(type="string")
     */
    private $password;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $codepostal;
    /**
     * @ORM\Column(type="string", length=20)
     */
    private $pays;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
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
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }
    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }
    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
    public function getCodePostal(): ?string
    {
        return $this->codepostal;
    }
    public function setCodePostal(string $codepostal): self
    {
        $this->codepostal = $codepostal;
        return $this;
    }
    public function getPays(): ?string
    {
        return $this->pays;
    }
    public function setPays(string $pays): self
    {
        $this->pays = $pays;
        return $this;
    }
}