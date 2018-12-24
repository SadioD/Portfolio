<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CoreBundle\Services\Hydrator;
/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\ProjectRepository")
 */
class Project
{
    // ATTR + CONSTR --------------------------------------------------------------------------------------------------------------------
    
    /**
     * Trait Hydrator
     */
    use Hydrator;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="url", type="string", length=255, unique=true)
     */
    private $url;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="shortDesc", type="text")
     */
    private $shortDesc;

    /**
     * Si True => le projet est Responsive. Si False => Pas compatible
     * @var boolean
     * @ORM\Column(name="seoFollow", type="boolean")
     */
    private $responsive;
 
    /**
     * Project is The Owner of This Relation
     * @ORM\OneToOne(targetEntity="CoreBundle\Entity\Image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;

    public function __construct(array $donnees = []) 
    {
        if (!empty($donnees)) {
            $this->hydrateEntity($donnees);
        }
    }// ---------------------------------------------------------------------------------------------------------------------------------- 
    // GETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @return int
     */
    public function getId() { return $this->id; }
    /**
     * @return string
     */
    public function getUrl() { return $this->url; }
    /**
     * @return string
     */
    public function getTitle() { return $this->title; }
    /**
     * @return string
     */
    public function getShortDesc() { return $this->shortDesc; }
    /**
     * @return boolean
     */
    public function isResponsive() { return $this->responsive; }
     /**
     * @return \CoreBundle\Entity\Image
     */
    public function getImage() { return $this->image; }
    // ----------------------------------------------------------------------------------------------------------------------------------
    // SETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @param string $url
     * @return Project
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
    /**
     * @param string $title
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
    /**
     * @param string $shortDesc
     * @return Project
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }
    /**
     * @param \CoreBundle\Entity\Image $image
     * @return Project
     */
    public function setImage(\CoreBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------------------------------------                  
}
