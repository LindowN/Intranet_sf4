<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Grades
 *
 * @ORM\Table(name="grades")
 * @ORM\Entity(repositoryClass="App\Repository\GradesRepository")
 */
class Grades
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="grade", type="float", nullable=false)
     * @Assert\NotBlank()
     */
    private $grade;

    /**
     * @var string
     *
     * @ORM\Column(name="commentary", type="text")
     * @Assert\NotBlank()
     */
    private $commentary;

    /**
     * @ORM\ManyToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */

    protected $users;

    /**
     * @ORM\ManyToOne(targetEntity="Subject", cascade={"persist"})
     * @ORM\JoinColumn(name="subject_id", referencedColumnName="id")
     */

    protected $subjects;

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tickets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->role = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of users
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set the value of users
     *
     * @return  self
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }


    /**
     * Get the value of subjects
     */
    public function getSubjects()
    {
        return $this->subjects;
    }

    /**
     * Set the value of subjects
     *
     * @return  self
     */
    public function setSubjects($subjects)
    {
        $this->subjects = $subjects;

        return $this;
    }



    /**
     * Get the value of commentary
     *
     * @return  string
     */
    public function getCommentary()
    {
        return $this->commentary;
    }

    /**
     * Set the value of commentary
     *
     * @param  string  $commentary
     *
     * @return  self
     */
    public function setCommentary(string $commentary)
    {
        $this->commentary = $commentary;

        return $this;
    }

    /**
     * Get the value of gradef
     *
     * @return  float
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set the value of grade
     *
     * @param  float  $grade
     *
     * @return  self
     */
    public function setGrade(float $grade)
    {
        $this->grade = $grade;

        return $this;
    }

    public function __toString()
    {
        return $this->grade . " - " . $this->commentary;
    }
}
