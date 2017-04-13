<?php

namespace PruebaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visita
 *
 * @ORM\Table(name="visita")
 * @ORM\Entity(repositoryClass="PruebaBundle\Repository\VisitaRepository")
 */
class Visita
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
     * Many Users have One Address.
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumn(name="visitante_id", referencedColumnName="id")
     */
    private $visitante;

    /**
     * Many Users have One Address.
     * @ORM\ManyToOne(targetEntity="Inmueble")
     * @ORM\JoinColumn(name="inmueble_id", referencedColumnName="id")
     */
    private $inmueble;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set visitante
     *
     * @param string $visitante
     *
     * @return Visita
     */
    public function setVisitante(\PruebaBundle\Entity\persona $visitante = null)
    {
        $this->visitante = $visitante;

        return $this;
    }

    /**
     * Get visitante
     *
     * @return string
     */
    public function getVisitante()
    {
        return $this->visitante;
    }

    /**
     * Set inmueble
     *
     * @param string $inmueble
     *
     * @return Visita
     */
    public function setInmueble(\PruebaBundle\Entity\inmueble $inmueble = null)
    {
        $this->inmueble = $inmueble;

        return $this;
    }

    /**
     * Get inmueble
     *
     * @return string
     */
    public function getInmueble()
    {
        return $this->inmueble;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Visita
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}
