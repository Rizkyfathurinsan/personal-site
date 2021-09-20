<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SkillName;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, mappedBy="ImageName", cascade={"persist", "remove"})
     */
    private $SkillImage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkillName(): ?string
    {
        return $this->SkillName;
    }

    public function setSkillName(string $SkillName): self
    {
        $this->SkillName = $SkillName;

        return $this;
    }

    public function getSkillImage(): ?Image
    {
        return $this->SkillImage;
    }

    public function setSkillImage(?Image $SkillImage): self
    {
        // unset the owning side of the relation if necessary
        if ($SkillImage === null && $this->SkillImage !== null) {
            $this->SkillImage->setImageName(null);
        }

        // set the owning side of the relation if necessary
        if ($SkillImage !== null && $SkillImage->getImageName() !== $this) {
            $SkillImage->setImageName($this);
        }

        $this->SkillImage = $SkillImage;

        return $this;
    }
}
