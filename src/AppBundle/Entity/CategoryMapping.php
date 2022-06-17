<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \AppBundle\Entity\Category;

/**
 * CategoryMapping
 *
 * @ORM\Table(name="category_mapping")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryMappingRepository")
 */
class CategoryMapping
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Category", inversedBy="externalCategories")
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="external_id", type="string", length=255)
     */
    private $externalId;

    /**
     * @var string|null
     * 
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set externalId.
     *
     * @param string $externalId
     *
     * @return CategoryMapping
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Get externalId.
     *
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
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

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return CategoryMapping
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
