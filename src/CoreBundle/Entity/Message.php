<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CoreBundle\Services\Hydrator;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="authorName", type="string", length=255)
     * @Assert\Length(min=3, minMessage="Your name must have at least {{ limit }} characters")
     */
    private $authorName;

    /**
     * @var string
     * @ORM\Column(name="authorEmail", type="string", length=255)
     * @Assert\Email(message="Your email is not a valid one")
     */
    private $authorEmail;

    /**
     * @var string
     * @ORM\Column(name="receiverEmail", type="string", length=255, nullable=true)
     * @Assert\Email(message="Your email is not a valid one")
     */
    private $receiverEmail;

    /**
     * @var string
     * @ORM\Column(name="receiverName", type="string", length=255, nullable=true)
     */
    private $receiverName;

    /**
     * @var string
     * @ORM\Column(name="subject", type="string", length=255)
     * @Assert\Length(min=5, minMessage="Subject must have at least {{ limit }} characters")
     */
    private $subject;

    /**
     * @var string
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank(message="Your message cannot be blank")
     */
    private $content;
    
    /**
     * @var \DateTime
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var string
     * @ORM\Column(name="status", type="text")
     */
    private $status;


    public function __construct(array $donnees = []) 
    {
        if (!empty($donnees)) {
            $this->hydrateEntity($donnees);
        }
        $this->creationDate = new \DateTime();
        $this->status       = 'NEW';
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
    public function getAuthorEmail() { return $this->authorEmail; }
    /**
     * @return string
     */
    public function getSubject() { return $this->subject; }
    /**
     * @return string
     */
    public function getContent() { return $this->content; }
    /**
     * @return \DateTime
     */
    public function getCreationDate() { return $this->creationDate; }
    /**
     * @return string
     */
    public function getStatus() { return $this->status; }
    /**
     * @return string
     */
    public function getReceiverEmail() { return $this->receiverEmail; }
    /**
     * @return string
     */
    public function getReceiverName() { return $this->receiverName; }
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
     * @param string $authorEmail
     * @return Message
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;

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
        $this->content = nl2br($content);

        return $this;
    }
    /**
     * @param \DateTime $creationDate
     * @return Message
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }
    /**
     * @param string $status
     * @return Message
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
    /**
     * @param string $receiverEmail
     * @return Message
     */
    public function setReceiverEmail($receiverEmail)
    {
        $this->receiverEmail = $receiverEmail;

        return $this;
    }
    /**
     * @param string $receiverName
     * @return Message
     */
    public function setReceiverName($receiverName)
    {
        $this->receiverName = $receiverName;

        return $this;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // OTHERS ---------------------------------------------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------------------------------------                      
}
