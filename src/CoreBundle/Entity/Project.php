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
     * @ORM\Column(name="url", type="string", length=180, unique=true)
     */
    private $url;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=180, unique=true)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="shortDesc", type="string", length=180)
     */
    private $shortDesc;

    /**
     * Si True => le projet est Responsive. Si False => Pas compatible
     * @var boolean
     * @ORM\Column(name="responsive", type="boolean")
     */
    private $responsive;
    
    /**
     * contient la position du projet dans la boucle (utile pour afficher la boucle for)
     * @var string
     * @ORM\Column(name="loopStatus", type="string", length=180)
     */
    private $loopStatus;

    /**
     * contient l'attribut title (<a/> tag) de chaque projet
     * @var string
     * @ORM\Column(name="titleInfo", type="string", length=180, nullable=true)
     */
    private $titleInfo;
 
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
    public function getName() { return $this->name; }
    /**
     * @return string
     */
    public function getShortDesc() { return $this->shortDesc; }
    /**
     * @return boolean
     */
    public function isResponsive() { return $this->responsive; }
    /**
     * @return string
     */
    public function getLoopStatus() { return $this->loopStatus; }
    /**
     * @return string
     */
    public function getTitleInfo() { return $this->titleInfo; }
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
     * @param string $name
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * @param boolean $responsive
     * @return Project
     */
    public function setResponsive($responsive)
    {
        $this->responsive = $responsive;

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
    /**
     * @param string $loopStatus
     * @return Project
     */
    public function setLoopStatus($loopStatus)
    {
        $this->loopStatus = $loopStatus;

        return $this;
    }
    /**
     * @param string $titleInfo
     * @return Project
     */
    public function setTitleInfo($titleInfo)
    {
        $this->titleInfo = $titleInfo;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------                  
}
