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
     * @ORM\Column(name="graduationYear", type="string", length=4)
     */
    private $graduationYear;

    /**
     * @var string
     * @ORM\Column(name="country", type="string", length=10, nullable=true)
     */
    private $country;

    /**
     * @var string
     * @ORM\Column(name="degree", type="string", length=26)
     */
    private $degree;

    /**
     * @var string
     * @ORM\Column(name="shortDesc", type="string", length=125, nullable=true)
     */
    private $shortDesc;

    /**
     * @var string
     * @ORM\Column(name="firstHtmlClass", type="string", length=180)
     */
    private $firstHtmlClass;
    
    /**
     * @var string
     * @ORM\Column(name="secondHtmlClass", type="string", length=180)
     */
    private $secondHtmlClass;

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
    public function getGraduationYear() { return $this->graduationYear; }
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
    /**
     * @return string
     */
    public function getFirstHtmlClass() { return $this->firstHtmlClass; }
    /**
     * @return string
     */
    public function getSecondHtmlClass() { return $this->secondHtmlClass; }
    // ----------------------------------------------------------------------------------------------------------------------------------
    // SETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @param string $graduationYear
     * @return Education
     */
    public function setGraduationYear($graduationYear)
    {
        $this->graduationYear = $graduationYear;

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
    }
    /**
     * @param string $firstHtmlClass
     * @return Education
     */
    public function setFirstHtmlClass($firstHtmlClass)
    {
        $this->firstHtmlClass = $firstHtmlClass;

        return $this;
    }
    /**
     * @param string $secondHtmlClass
     * @return Education
     */
    public function setSecondHtmlClass($secondHtmlClass)
    {
        $this->secondHtmlClass = $secondHtmlClass;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------------------------------------            
}
