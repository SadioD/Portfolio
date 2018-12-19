<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Icon
 *
 * @ORM\Table(name="icon")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\IconRepository")
 */
class Icon
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     * @ORM\Column(name="iconLabel", type="string", length=255)
     */
    private $iconLabel;

    /**
     * Icon is The Owner of This Relation
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Profile", inversedBy="hobbiesIcons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $profile;

    public function __construct(array $donnees = []) {
        foreach($donnees as $key => $value) 
        {
			$method = 'set' . ucfirst($key);
			if (is_callable([$this, $method])) {
				$this->$method($value);
			}
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
    public function getIconLabel() { return $this->iconLabel; }
    /**
     * @return \CoreBundle\Entity\Profile
     */
    public function getProfile() { return $this->profile; }
    // ----------------------------------------------------------------------------------------------------------------------------------
    // SETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @param string $url
     * @return Icon
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
    /**
     * @param string $iconLabel
     * @return Icon
     */
    public function setIconLabel($iconLabel)
    {
        $this->iconLabel = $iconLabel;

        return $this;
    }
    /**
     * @param \CoreBundle\Entity\Profile $profile
     * @return Icon
     */
    public function setProfile(\CoreBundle\Entity\Profile $profile)
    {
        $this->profile = $profile;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------------------------------------                
}
