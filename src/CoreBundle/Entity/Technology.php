<?php
// Cette Entité représente les technos que je maîtrise
// Elle sera utilisée pour la page Strength au niveau des icones (sliders). 
namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CoreBundle\Services\Hydrator;
/**
 * Technology
 *
 * @ORM\Table(name="technology")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\TechnologyRepository")
 */
class Technology
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
     * @ORM\Column(name="iconUrl", type="string", length=255, unique=true)
     */
    private $iconUrl;

    /**
     * @var string
     * @ORM\Column(name="iconLabels", type="string", length=255, unique=true)
     */
    private $iconLabels;

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
    public function getIconUrl() { return $this->iconUrl; }
    /**
     * @return string
     */
    public function getIconLabels() { return $this->iconLabels; }
    // ----------------------------------------------------------------------------------------------------------------------------------
    // SETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @param string $iconUrl
     * @return Technology
     */
    public function setIconUrl($iconUrl)
    {
        $this->iconUrl = $iconUrl;

        return $this;
    }
    /**
     * @param string $iconLabels
     * @return Technology
     */
    public function setIconLabels($iconLabels)
    {
        $this->iconLabels = $iconLabels;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------------------------------------                     
}

