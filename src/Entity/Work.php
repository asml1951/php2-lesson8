<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Класс Work представляет произведения Пушкина
 */
/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkRepository")
 */
class Work
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
     * @ORM\Column(type="string", length=50)
     */
    private $sort;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $year;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    private $works;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Books", mappedBy="work_id")
     */
    private $book_id;

    public function __construct()
    {
        $this->works = new ArrayCollection();
        $this->book_id = new ArrayCollection();
    }

    public function getWorks()
    {
        return $this->works;
    }

    public function getId()
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

    public function getSort(): ?string
    {
        return $this->sort;
    }

    public function setSort(string $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection|Books[]
     */
    public function getBookId(): Collection
    {
        return $this->book_id;
    }

    public function addBookId(Books $bookId): self
    {
        if (!$this->book_id->contains($bookId)) {
            $this->book_id[] = $bookId;
            $bookId->addWorkId($this);
        }

        return $this;
    }

    public function removeBookId(Books $bookId): self
    {
        if ($this->book_id->contains($bookId)) {
            $this->book_id->removeElement($bookId);
            $bookId->removeWorkId($this);
        }

        return $this;
    }
}
