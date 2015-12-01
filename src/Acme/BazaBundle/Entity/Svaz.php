<?php

namespace Acme\BazaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Svaz
 *
 * @ORM\Table(name="svaz")
 * @ORM\Entity
 */
class Svaz
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTovar", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idtovar;

    /**
     * @var integer
     *
     * @ORM\Column(name="idKategor", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idkategor;



    /**
     * Set idtovar
     *
     * @param integer $idtovar
     *
     * @return Svaz
     */
    public function setIdtovar($idtovar)
    {
        $this->idtovar = $idtovar;

        return $this;
    }

    /**
     * Get idtovar
     *
     * @return integer
     */
    public function getIdtovar()
    {
        return $this->idtovar;
    }

    /**
     * Set idkategor
     *
     * @param integer $idkategor
     *
     * @return Svaz
     */
    public function setIdkategor($idkategor)
    {
        $this->idkategor = $idkategor;

        return $this;
    }

    /**
     * Get idkategor
     *
     * @return integer
     */
    public function getIdkategor()
    {
        return $this->idkategor;
    }
}
