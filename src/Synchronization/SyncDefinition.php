<?php
declare(strict_types=1);

namespace SpaethTech\Synchronization;




final class SyncDefinition
{

    /** @var string */
    private $class;

    /** @var string */
    private $key;

    /** @var string */
    private $property;

    /** @var callable */
    private $nameGenerator;



    public function __construct(string $class, callable $nameGenerator, string $key, string $property = "")
    {

        if(!class_exists($class))
            throw new \Exception("Class '$class' was not found!");

        $this->class = $class;

        $this->nameGenerator = $nameGenerator;

        //if(!property_exists($class, $key))
        //    throw new \Exception("Class '$class' does not have a property '$key'!");

        $this->key = $key;


        //if(!property_exists($class, $property))
        //    throw new \Exception("Class '$class' does not have a property '$property'!");

        $this->property = $property;

    }


    public function generateName($class): string
    {
        return call_user_func($this->nameGenerator, $class);
    }


    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getProperty(): string
    {
        return $this->property;
    }





}
