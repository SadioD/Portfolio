<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CoreBundle\Services\Hydrator;
/** 
 * Education
 *
 * @ORM\Table(name="education")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\EducationRepository")
 */
class Education
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
     * @ORM\Column(name="graduationDate", type="string", length=255)
     */
    private $graduationDate;

    /**
     * @var string
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var string
     * @ORM\Column(name="degree", type="string", length=255)
     */
    private $degree;

    /**
     * @var string
     * @ORM\Column(name="shortDesc", type="text", nullable=true)
     */
    private $shortDesc;
    
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
    public function getGraduationDate() { return $this->graduationDate; }
    /**
     * @return string
     */
    public function getCountry() { return $this->country; }
    /**
     * @return string
     */
    public function getDegree() { return $this->degree; }
    /**
     * @return string
     */
    public function getShortDesc() { return $this->shortDesc; }
    // ----------------------------------------------------------------------------------------------------------------------------------
    // SETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @param string $graduationDate
     * @return Education
     */
    public function setGraduationDate($graduationDate)
    {
        $this->graduationDate = $graduationDate;

        return $this;
    }
    /**
     * @param string $country
     * @return Education
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
    /**
     * @param string $degree
     * @return Education
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;

        return $this;
    }
    /**
     * @param string $shortDesc
     * @return Education
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------------------------------------            
}

