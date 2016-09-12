<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Specialist;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSpecialistData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $objectManager
     */
    public function load(ObjectManager $objectManager)
    {
        // Specialist 1
        $specialist = new Specialist();
        $specialist->setName('Mr. Ak Bansal');
        $objectManager->persist($specialist);
        $objectManager->flush();

        // Specialist 2
        $specialist = new Specialist();
        $specialist->setName('Mr. Bk Hengre');
        $objectManager->persist($specialist);
        $objectManager->flush();

        // Specialist 3
        $specialist = new Specialist();
        $specialist->setName('Mr. Ck Chatarjee');
        $objectManager->persist($specialist);
        $objectManager->flush();

        // Specialist 4
        $specialist = new Specialist();
        $specialist->setName('Mr. Dk Benerjee');
        $objectManager->persist($specialist);
        $objectManager->flush();

        // Specialist 5
        $specialist = new Specialist();
        $specialist->setName('Mr. LK Gahlot');
        $objectManager->persist($specialist);
        $objectManager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }
}