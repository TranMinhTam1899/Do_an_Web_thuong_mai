<?php

namespace Faker\ORM\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
<<<<<<< HEAD
use Faker\Generator;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * Service class for populating a database using the Doctrine ORM or ODM.
 * A Populator can populate several tables using ActiveRecord classes.
 */
class Populator
{
<<<<<<< HEAD
    /** @var int  */
    protected $batchSize;

    /** @var Generator  */
    protected $generator;

    /** @var ObjectManager|null  */
    protected $manager;

    /** @var array  */
    protected $entities = array();

    /** @var array  */
    protected $quantities = array();

    /** @var array  */
    protected $generateId = array();

    /**
     * Populator constructor.
     * @param Generator $generator
     * @param ObjectManager|null $manager
     * @param int $batchSize
     */
    public function __construct(Generator $generator, ObjectManager $manager = null, $batchSize = 1000)
    {
        $this->generator = $generator;
        $this->manager = $manager;
        $this->batchSize = $batchSize;
=======
    protected $generator;
    protected $manager;
    protected $entities = array();
    protected $quantities = array();
    protected $generateId = array();

    /**
     * @param \Faker\Generator $generator
     * @param ObjectManager|null $manager
     */
    public function __construct(\Faker\Generator $generator, ObjectManager $manager = null)
    {
        $this->generator = $generator;
        $this->manager = $manager;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Add an order for the generation of $number records for $entity.
     *
     * @param mixed $entity A Doctrine classname, or a \Faker\ORM\Doctrine\EntityPopulator instance
     * @param int   $number The number of entities to populate
     */
    public function addEntity($entity, $number, $customColumnFormatters = array(), $customModifiers = array(), $generateId = false)
    {
        if (!$entity instanceof \Faker\ORM\Doctrine\EntityPopulator) {
            if (null === $this->manager) {
                throw new \InvalidArgumentException("No entity manager passed to Doctrine Populator.");
            }
            $entity = new \Faker\ORM\Doctrine\EntityPopulator($this->manager->getClassMetadata($entity));
        }
        $entity->setColumnFormatters($entity->guessColumnFormatters($this->generator));
        if ($customColumnFormatters) {
            $entity->mergeColumnFormattersWith($customColumnFormatters);
        }
        $entity->mergeModifiersWith($customModifiers);
        $this->generateId[$entity->getClass()] = $generateId;

        $class = $entity->getClass();
        $this->entities[$class] = $entity;
        $this->quantities[$class] = $number;
    }

    /**
     * Populate the database using all the Entity classes previously added.
     *
<<<<<<< HEAD
     * Please note that large amounts of data will result in more memory usage since the the Populator will return
     * all newly created primary keys after executing.
     *
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @param null|EntityManager $entityManager A Doctrine connection object
     *
     * @return array A list of the inserted PKs
     */
    public function execute($entityManager = null)
    {
        if (null === $entityManager) {
            $entityManager = $this->manager;
        }
        if (null === $entityManager) {
            throw new \InvalidArgumentException("No entity manager passed to Doctrine Populator.");
        }

        $insertedEntities = array();
        foreach ($this->quantities as $class => $number) {
            $generateId = $this->generateId[$class];
            for ($i=0; $i < $number; $i++) {
<<<<<<< HEAD
                $insertedEntities[$class][]= $this->entities[$class]->execute(
                    $entityManager,
                    $insertedEntities,
                    $generateId
                );
                if (count($insertedEntities) % $this->batchSize === 0) {
                    $entityManager->flush();
                    $entityManager->clear($class);
                }
            }
            $entityManager->flush();
            $entityManager->clear($class);
=======
                $insertedEntities[$class][]= $this->entities[$class]->execute($entityManager, $insertedEntities, $generateId);
            }
            $entityManager->flush();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $insertedEntities;
    }
}
