<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OperatingRoom
 */
class OperatingRoom
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $otType;

    /**
     * @var string
     */
    private $otName;

    /**
     * @var \DateTime
     */
    private $otFrom;

    /**
     * @var \DateTime
     */
    private $otTo;


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
     * Set otType
     *
     * @param string $otType
     * @return OperatingRoom
     */
    public function setOtType($otType)
    {
        $this->otType = $otType;

        return $this;
    }

    /**
     * Get otType
     *
     * @return string 
     */
    public function getOtType()
    {
        return $this->otType;
    }

    /**
     * Set otName
     *
     * @param string $otName
     * @return OperatingRoom
     */
    public function setOtName($otName)
    {
        $this->otName = $otName;

        return $this;
    }

    /**
     * Get otName
     *
     * @return string 
     */
    public function getOtName()
    {
        return $this->otName;
    }

    /**
     * Set otFrom
     *
     * @param \DateTime $otFrom
     * @return OperatingRoom
     */
    public function setOtFrom($otFrom)
    {
        $this->otFrom = $otFrom;

        return $this;
    }

    /**
     * Get otFrom
     *
     * @return \DateTime 
     */
    public function getOtFrom()
    {
        return $this->otFrom;
    }

    /**
     * Set otTo
     *
     * @param \DateTime $otTo
     * @return OperatingRoom
     */
    public function setOtTo($otTo)
    {
        $this->otTo = $otTo;

        return $this;
    }

    /**
     * Get otTo
     *
     * @return \DateTime 
     */
    public function getOtTo()
    {
        return $this->otTo;
    }
}
