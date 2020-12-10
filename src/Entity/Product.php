<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Product
{
    /**
     * @Assert\NotBlank()
     * @Assert\Type("integer", message="'{{ value }}' is not a valid {{ type }}.")
     * @Assert\Positive(message="'{{ value }}' must be greater than zero.")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 1,
     *     max = 50,
     *     minMessage="Product Name must contain at least {{limit}} character.",
     *     maxMessage="Product Name may not contain more than {{limit}} characters."
     * )
     */
    private $name;

    /**
     * @Assert\NotBlank
     * @Assert\Date()
     */
    private $date;

    /**
     * @Assert\Length(
     *     max = 30,
     *     maxMessage="Product Manager may not contain more than {{limit}} characters."
     * )
     */
    private $manager;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId( $id ): Product
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName( $name ): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return $this
     */
    public function setDate( $date ): Product
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param mixed $manager
     * @return $this
     */
    public function setManager( $manager ): Product
    {
        $this->manager = $manager;
        return $this;
    }
}