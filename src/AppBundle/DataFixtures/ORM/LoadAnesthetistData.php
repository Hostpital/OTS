<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Anesthetist;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAnesthetistData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $objectManager
     */
    public function load(ObjectManager $objectManager)
    {
        // Anesthetists 1
        $anesthetist = new Anesthetist();
        $anesthetist->setName('Mr. A.N');
        $objectManager->persist($anesthetist);
        $objectManager->flush();

        // Anesthetists 2
        $anesthetist = new Anesthetist();
        $anesthetist->setName('Mr. A.N II');
        $objectManager->persist($anesthetist);
        $objectManager->flush();

        // Anesthetists 3
        $anesthetist = new Anesthetist();
        $anesthetist->setName('Mr. A.N III');
        $objectManager->persist($anesthetist);
        $objectManager->flush();

        // Anesthetists 4
        $anesthetist = new Anesthetist();
        $anesthetist->setName('Mr. A.N IV');
        $objectManager->persist($anesthetist);
        $objectManager->flush();

        // Anesthetists 5
        $anesthetist = new Anesthetist();
        $anesthetist->setName('Mr. A.N V');
        $objectManager->persist($anesthetist);
        $objectManager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }
}