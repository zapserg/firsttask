<?php

namespace Acme\BazaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Acme\StoreBundle\Entity\Tovar;
/**
 * Kategor
 *
 * @ORM\Table(name="kategor")
 * @ORM\Entity
 */
class Kategor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\BazaBundle\Entity\Tovar", mappedBy="idkategor")
     */
    private $idtovar;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idtovar = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Kategor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add idtovar
     *
     * @param \Acme\BazaBundle\Entity\Tovar $idtovar
     *
     * @return Kategor
     */
    public function addIdtovar(\Acme\BazaBundle\Entity\Tovar $idtovar)
    {
        $this->idtovar[] = $idtovar;

        return $this;
    }

    /**
     * Remove idtovar
     *
     * @param \Acme\BazaBundle\Entity\Tovar $idtovar
     */
    public function removeIdtovar(\Acme\BazaBundle\Entity\Tovar $idtovar)
    {
        $this->idtovar->removeElement($idtovar);
    }

    /**
     * Get idtovar
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdtovar()
    {
        return $this->idtovar;
    }
}
