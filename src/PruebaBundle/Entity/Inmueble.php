<?php

namespace PruebaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inmueble
 *
 * @ORM\Table(name="inmueble")
 * @ORM\Entity(repositoryClass="PruebaBundle\Repository\InmuebleRepository")
 */
class Inmueble
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\ManyToOne(targetEntity="persona")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")     
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Ubicacion", type="string", length=255)
     */
    private $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="Tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="Registro", type="string", length=255)
     */
    private $registro;

    /**
     * @var int
     *
     * @ORM\Column(name="Impuesto", type="integer")
     */
    private $impuesto;

    /**
     * Many Inmubles have One Persona.
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     */
    private $persona;

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
     * Set ubicacion
     *
     * @param string $ubicacion
     *
     * @return Inmueble
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Inmueble
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set registro
     *
     * @param string $registro
     *
     * @return Inmueble
     */
    public function setRegistro($registro)
    {
        $this->registro = $registro;

        return $this;
    }

    /**
     * Get registro
     *
     * @return string
     */
    public function getRegistro()
    {
        return $this->registro;
    }

    /**
     * Set impuesto
     *
     * @param integer $impuesto
     *
     * @return Inmueble
     */
    public function setImpuesto($impuesto)
    {
        $this->impuesto = $impuesto;

        return $this;
    }

    /**
     * Get impuesto
     *
     * @return int
     */
    public function getImpuesto()
    {
        return $this->impuesto;
    }

    /**
     * Set persona
     *
     * @param \PruebaBundle\Entity\persona $persona
     *
     * @return Inmueble
     */
    public function setPersona(\PruebaBundle\Entity\persona $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \PruebaBundle\Entity\persona
     */
    public function getPersona()
    {
        return $this->persona;
    }
    
    public function __toString()
    {
        return (string) $this->getUbicacion();
    }
}
