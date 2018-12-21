<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="authorName", type="string", length=255)
     */
    private $authorName;

    /**
     * @var string
     * @ORM\Column(name="authoEmail", type="string", length=255)
     */
    private $authoEmail;

    /**
     * @var string
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var string
     * @ORM\Column(name="content", type="text")
     */
    private $content;

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
    public function getAuthorName() { return $this->authorName; }
    /**
     * @return string
     */
    public function getAuthoEmail() { return $this->authoEmail; }
    /**
     * @return string
     */
    public function getSubject() { return $this->subject; }
    /**
     * @return string
     */
    public function getContent() { return $this->content; }
    // ----------------------------------------------------------------------------------------------------------------------------------
    // SETTERS ---------------------------------------------------------------------------------------------------------------------------
    /**
     * @param string $authorName
     * @return Message
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;

        return $this;
    }
    /**
     * @param string $authoEmail
     * @return Message
     */
    public function setAuthoEmail($authoEmail)
    {
        $this->authoEmail = $authoEmail;

        return $this;
    }
    /**
     * @param string $subject
     * @return Message
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }
    /**
     * @param string $content
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------------------------------------                      
}

