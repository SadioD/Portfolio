<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Profile
 *
 * @ORM\Table(name="profile")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\ProfileRepository")
 */
class Profile
{
    // ATTR + CONSTR --------------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="hobbiesDesc", type="text")
     */
    private $hobbiesDesc;

    /**
     * @var string
     * @ORM\Column(name="aboutMe", type="text")
     */
    private $aboutMe;

    /**
     * Icon is The Owner of this Relation 
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Icon", mappedBy="profile", cascade={"remove"})
     */
    private $hobbiesIcons;


    public function __construct(array $donnees = []) {
        foreach($donnees as $key => $value) 
        {
			$method = 'set' . ucfirst($key);
			if (is_callable([$this, $method])) {
				$this->$method($value);
			}
        }
        $this->hobbiesIcons = new ArrayCollection();
    }// ---------------------------------------------------------------------------------------------------------------------------------- 
    // GETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @return int
     */
    public function getId() { return $this->id; }
    /**
     * @return string
     */
    public function getHobbiesDesc() { return $this->hobbiesDesc; }
    /**
     * @return string
     */
    public function getAboutMe() { return $this->aboutMe; }
    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHobbiesIcons() { return $this->hobbiesIcons; }
    // ----------------------------------------------------------------------------------------------------------------------------------
    // SETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @param string $hobbiesDesc
     * @return Profile
     */
    public function setHobbiesDesc($hobbiesDesc)
    {
        $this->hobbiesDesc = $hobbiesDesc;

        return $this;
    }
    /**
     * @param string $aboutMe
     * @return Profile
     */
    public function setAboutMe($aboutMe)
    {
        $this->aboutMe = $aboutMe;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * Add hobbiesIcon
     * @param \CoreBundle\Entity\Icon $hobbiesIcon
     * @return Profile
     */
    public function addHobbiesIcon(\CoreBundle\Entity\Icon $hobbiesIcon)
    {
        $this->hobbiesIcons[] = $hobbiesIcon;

        // Vu que la relation est bidirectionnelle on lie également hobbiesIcon à Profile
        // => il faut utiliser $hobbiesIcon->setProfile($this)
        $hobbiesIcon->setProfile($this);

        return $this;
    }
    /**
     * Remove hobbiesIcon
     * @param \CoreBundle\Entity\Icon $hobbiesIcon
     */
    public function removeHobbiesIcon(\CoreBundle\Entity\Icon $hobbiesIcon)
    {
        $this->hobbiesIcons->removeElement($hobbiesIcon);
    }// ----------------------------------------------------------------------------------------------------------------------------------                    
}
