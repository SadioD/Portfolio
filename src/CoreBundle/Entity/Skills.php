<?php
// Cette classe contient les 4 domaines de compétences - Page strength au début
namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CoreBundle\Services\Hydrator;

/**
 * Skills
 *
 * @ORM\Table(name="skills")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\SkillsRepository")
 */
class Skills
{ 
    // ATTR + CONSTR --------------------------------------------------------------------------------------------------------------------
    /**
     * Trait Hydrator
     */
    use Hydrator;
    
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=180, unique=true)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="shortDesc", type="string", length=180, nullable=true)
     */
    private $shortDesc;

    /**
     * @var string
     * @ORM\Column(name="htmlID", type="string", length=180, unique=true)
     */
    private $htmlID;

    /**
     * @var string
     * @ORM\Column(name="htmlClass", type="string", length=180)
     */
    private $htmlClass;

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
    public function getName() { return $this->name; }
    /**
     * @return string
     */
    public function getShortDesc() { return $this->shortDesc; }
    /**
     * @return string
     */
    public function getHtmlID() { return $this->htmlID; }
    /**
     * @return string
     */
    public function getHtmlClass() { return $this->htmlClass; }
    /**
     * @return \CoreBundle\Entity\Image
     */
    public function getImage() { return $this->image; }
    // ----------------------------------------------------------------------------------------------------------------------------------
    // SETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @param string $name
     * @return Skills
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    /**
     * @param string $shortDesc
     * @return Skills
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }
    /**
     * @param string $htmlID
     * @return Skills
     */
    public function setHtmlID($htmlID)
    {
        $this->htmlID = $htmlID;

        return $this;
    }
    /**
     * @param string $htmlClass
     * @return Skills
     */
    public function setHtmlClass($htmlClass)
    {
        $this->htmlClass = $htmlClass;

        return $this;
    }
    /**
     * Set image
     * @param \CoreBundle\Entity\Image $image
     * @return Skills
     */
    public function setImage(\CoreBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------------------------------------                      
}
