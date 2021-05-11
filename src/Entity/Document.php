<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 * @Vich\Uploadable
 */
class Document
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Resume;

    /**
     * @ORM\Column(type="integer")
     */
    private $Priorite;

    /**
     * @ORM\Column(type="date")
     */
    private $DatePoste;

    /**
     * @ORM\Column(type="string")
     */
    private $docName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="document_image", fileNameProperty="docName", size="docSize")
     *
     * @var File|null
     */
    private $docFile;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int|null
     */
    private $docSize;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="documents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;
    /**
     * @var DateTimeImmutable
     */


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

    public function getResume(): ?string
    {
        return $this->Resume;
    }

    public function setResume(string $Resume): self
    {
        $this->Resume = $Resume;

        return $this;
    }

    public function getPriorite(): ?int
    {
        return $this->Priorite;
    }

    public function setPriorite(int $Priorite): self
    {
        $this->Priorite = $Priorite;

        return $this;
    }

    public function getDatePoste(): ?DateTimeInterface
    {
        return $this->DatePoste;
    }

    public function setDatePoste(DateTimeInterface $DatePoste): self
    {
        $this->DatePoste = $DatePoste;

        return $this;
    }
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|null $docFile
     * @throws Exception
     */
    public function setdocFile(?File $docFile = null): void
    {
        $this->docFile = $docFile;

        if (null !== $docFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->DatePoste = new DateTimeImmutable();
        }
    }

    public function getdocFile(): ?File
    {
        return $this->docFile;
    }

    public function getdocName()
    {
        return $this->docName;
    }

    public function setdocName(?string $docName)
    {
        $this->docName = $docName;

        return $this;
    }

    public function setdocSize(?int $docSize): void
    {
        $this->docSize = $docSize;
    }

    public function getdocSize(): ?int
    {
        return $this->docSize;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
