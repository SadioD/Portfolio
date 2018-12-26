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
     * Contient le nom de l'icone (ex: fa fa-trash) ou le nom de l'image
     * @var string
     * @ORM\Column(name="iconUrl", type="string", length=180)
     */
    private $iconUrl;

    /**
     * Contient le label de l'icone (ex: supprimer) ou l'alt de l'image
     * @var string
     * @ORM\Column(name="iconLabel", type="string", length=180, unique=true)
     */
    private $iconLabel;

    /**
     * Si True => GoogleBot follow le link (externe). Sinon => le lien est une simple ancre
     * @var boolean
     * @ORM\Column(name="seoFollow", type="boolean")
     */
    private $seoFollow;

    /**
     * Url de redirection au click d'un lien
     * @var string
     * @ORM\Column(name="redirectUrl", type="string", length=180, nullable=false)
     */
    private $redirectUrl;

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
    public function getIconLabel() { return $this->iconLabel; }
    /**
     * @return boolean
     */
    public function getSeoFollow() { return $this->seoFollow; }
    /**
     * @return string
     */
    public function getRedirectUrl() { return $this->redirectUrl; }
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
     * @param string $iconLabel
     * @return Technology
     */
    public function setIconLabel($iconLabel)
    {
        $this->iconLabel = $iconLabel;

        return $this;
    }
    /**
     * @param boolean $seoFollow
     * @return Technology
     */
    public function setSeoFollow($seoFollow)
    {
        $this->seoFollow = $seoFollow;

        return $this;
    }
    /**
     * @param string $redirectUrl
     * @return Technology
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------------------------------------                     
}
