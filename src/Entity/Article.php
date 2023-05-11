<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type:'string',length: 255)]
    #[Assert\Length(min: 5,max:50,minMessage: '"Le nom d un article doit comporter au moins {{ limit }} caractères',maxMessage:'Le nom d un article doit comporter au plus {{ limit }} caractères')]
    private ?string $nom = null;

    #[ORM\Column(type:'float',precision:10,scale:0)]
    #[Assert\NotEqualTo(value:0,message :'Le prix d’un article ne doit pas être égal à 0')] 
    private ?float $prix = null;

    #[ORM\ManyToOne(inversedBy: 'Articles')]
    private ?Category $category = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $Prix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $no = null;

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getNo(): ?string
    {
        return $this->no;
    }

    public function setNo(?string $no): self
    {
        $this->no = $no;

        return $this;
    }

 
}

?>