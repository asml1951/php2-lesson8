<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Класс Books представляет книги с произведениями Пушкина
 */

/**
 * @ORM\Entity(repositoryClass="App\Repository\BooksRepository")
 */
class Books
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()make
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     */
    private $issue_date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Work", inversedBy="books_id")
     * @ORM\JoinTable(name="books_work")
     */
    private $work_id;

    public function __construct()
    {
        $this->work_id = new ArrayCollection();
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

    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issue_date;
    }

    public function setIssueDate(\DateTimeInterface $issue_date): self
    {
        $this->issue_date = $issue_date;

        return $this;
    }

    /**
     * @return Collection|Work[]
     */
    public function getWorkId(): Collection
    {
        return $this->work_id;
    }

    public function addWorkId(Work $workId): self
    {
        if (!$this->work_id->contains($workId)) {
            $this->work_id[] = $workId;
        }

        return $this;
    }

    public function removeWorkId(Work $workId): self
    {
        if ($this->work_id->contains($workId)) {
            $this->work_id->removeElement($workId);
        }

        return $this;
    }
}
