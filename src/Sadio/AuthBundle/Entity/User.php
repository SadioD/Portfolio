<?php

namespace Sadio\AuthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CoreBundle\Services\Hydrator;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="auth_user")
 * @ORM\Entity(repositoryClass="Sadio\AuthBundle\Repository\UserRepository")
 */
class User implements UserInterface
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
     * @ORM\Column(name="username", type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=180, unique=true)
     * @Assert\Email(message="Your email is not a valid one.")
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=180)
     */
    private $password;

    /**
     * @var array
     * @ORM\Column(name="roles", type="array")
     */
    private $roles;

    /**
     * @var string
     * @ORM\Column(name="salt", type="string", length=180, nullable=true)
     * The salt to use for hashing. Necessaire pour UserInteface
     */
    protected $salt;

    public function __construct(array $donnees = []) 
    {
        if (!empty($donnees)) {
            $this->hydrateEntity($donnees);
        }
        $this->roles = array();
    }// ---------------------------------------------------------------------------------------------------------------------------------- 
    // GETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @return int
     */
    public function getId() { return $this->id; }
    /**
     * @return string
     */
    public function getEmail() { return $this->email; }
    /**
     * @return string
     */
    public function getPassword() { return $this->password; }
    /**
     * @return array
     */
    public function getRoles() { return $this->roles; }
    /**
     * @return string
     */
    public function getUsername() { return $this->username; }
    /**
     * @return string
     */
    public function getSalt() { return $this->salt; }
    // ----------------------------------------------------------------------------------------------------------------------------------
    // SETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    /**
     * @param array $roles
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
    /**
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
    /**
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @param string $role
     */
    public function addRole($role)
    {
        $role = strtoupper($role);
        
        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }
    /**
     * Nécessaire pour l'interface UserInterface
     */
    public function eraseCredentials()
    {
    }// ----------------------------------------------------------------------------------------------------------------------------------                          
}
