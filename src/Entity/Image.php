<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Skill::class, inversedBy="SkillImage", cascade={"persist", "remove"})
     */
    private $ImageName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ImageUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageName(): ?Skill
    {
        return $this->ImageName;
    }

    public function setImageName(?Skill $ImageName): self
    {
        $this->ImageName = $ImageName;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->ImageUrl;
    }

    public function setImageUrl(string $ImageUrl): self
    {
        $this->ImageUrl = $ImageUrl;

        return $this;
    }
}
