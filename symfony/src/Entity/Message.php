<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity
 */
class Message
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_edition", type="datetime", nullable=false)
     */
    private $dateEdition;

    /**
     * @var string
     *
     * @ORM\Column(name="Content", type="text", length=0, nullable=false)
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="UtilisateurId", type="integer", nullable=false)
     */
    private $utilisateurid;

    /**
     * @var int
     *
     * @ORM\Column(name="TopicId", type="integer", nullable=false)
     */
    private $topicid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDateEdition(): ?\DateTimeInterface
    {
        return $this->dateEdition;
    }

    public function setDateEdition(\DateTimeInterface $dateEdition): self
    {
        $this->dateEdition = $dateEdition;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getUtilisateurid(): ?int
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid(int $utilisateurid): self
    {
        $this->utilisateurid = $utilisateurid;

        return $this;
    }

    public function getTopicid(): ?int
    {
        return $this->topicid;
    }

    public function setTopicid(int $topicid): self
    {
        $this->topicid = $topicid;

        return $this;
    }


}
