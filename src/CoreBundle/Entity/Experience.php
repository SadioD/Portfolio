<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CoreBundle\Services\Hydrator;
/**
 * Experience
 *
 * @ORM\Table(name="experience")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\ExperienceRepository")
 */
class Experience
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
     * @ORM\Column(name="startingYear", type="string", length=255)
     */
    private $startingYear;

    /**
     * @var string
     * @ORM\Column(name="startingMonth", type="string", length=255)
     */
    private $startingMonth;

    /**
     * @var string
     * @ORM\Column(name="endingDate", type="string", length=255)
     */
    private $endingDate;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255)
     */
    private $position;

    /**
     * @var string
     * @ORM\Column(name="company", type="string", length=255)
     */
    private $company;

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
    public function getStartingYear() { return $this->startingYear; }
    /**
     * @return string
     */
    public function getStartingMonth() { return $this->startingMonth; }
    /**
     * @return string
     */
    public function getEndingDate() { return $this->endingDate; }
    /**
     * @return string
     */
    public function getPosition() { return $this->position; }
    /**
     * @return string
     */
    public function getCompany() { return $this->company; }
    /**
     * @return string
     */
    public function getShortDesc() { return $this->shortDesc; }
    // ----------------------------------------------------------------------------------------------------------------------------------
    // SETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @param string $startingYear
     * @return Experience
     */
    public function setStartingYear($startingYear)
    {
        $this->startingYear = $startingYear;

        return $this;
    }
    /**
     * @param string $startingMonth
     * @return Experience
     */
    public function setStartingMonth($startingMonth)
    {
        $this->startingMonth = $startingMonth;

        return $this;
    }
    /**
     * @param string $endingDate
     * @return Experience
     */
    public function setEndingDate($endingDate)
    {
        $this->endingDate = $endingDate;

        return $this;
    }
    /**
     * @param string $position
     * @return Experience
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }
    /**
     * @param string $company
     * @return Experience
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }
    /**
     * @param string $shortDesc
     * @return Experience
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------------------------------------            
}

