<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Sortable\Sortable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampsRepository")
 */
class Camps
{
    use Timestampable;
    use Translatable;
    use Sortable;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $image;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $watch;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $likes;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getWatch(): ?bool
    {
        return $this->watch;
    }

    public function setWatch(bool $watch): self
    {
        $this->watch = $watch;

        return $this;
    }

    public function getLikes(): ?int
    {
        return $this->likes;
    }

    public function setLikes(?int $likes): self
    {
        $this->likes = $likes;

        return $this;
    }

}
