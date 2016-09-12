<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Doctor;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDoctorData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $objectManager
     */
    public function load(ObjectManager $objectManager)
    {
        // Specialist 1
        $doctor = new Doctor();
        $doctor->setName('Mr. Ak Bansal');
        $doctor->setType('Specialist');
        $objectManager->persist($doctor);
        $objectManager->flush();

        // Specialist 2
        $doctor = new Doctor();
        $doctor->setName('Mr. Bk Hengre');
        $doctor->setType('Specialist');
        $objectManager->persist($doctor);
        $objectManager->flush();

        // Specialist 3
        $doctor = new Doctor();
        $doctor->setName('Mr. Ck Chatarjee');
        $doctor->setType('Specialist');
        $objectManager->persist($doctor);
        $objectManager->flush();

        // Specialist 4
        $doctor = new Doctor();
        $doctor->setName('Mr. Dk Benerjee');
        $doctor->setType('Specialist');
        $objectManager->persist($doctor);
        $objectManager->flush();

        // Specialist 5
        $doctor = new Doctor();
        $doctor->setName('Mr. LK Gahlot');
        $doctor->setType('Specialist');
        $objectManager->persist($doctor);
        $objectManager->flush();

        // Anesthetists 1
        $anesthetist = new Doctor();
        $anesthetist->setName('Mr. A.N');
        $anesthetist->setType('Anesthetists');
        $objectManager->persist($anesthetist);
        $objectManager->flush();

        // Anesthetists 2
        $anesthetist = new Doctor();
        $anesthetist->setName('Mr. A.N II');
        $anesthetist->setType('Anesthetists');
        $objectManager->persist($anesthetist);
        $objectManager->flush();

        // Anesthetists 3
        $anesthetist = new Doctor();
        $anesthetist->setName('Mr. A.N III');
        $anesthetist->setType('Anesthetists');
        $objectManager->persist($anesthetist);
        $objectManager->flush();

        // Anesthetists 4
        $anesthetist = new Doctor();
        $anesthetist->setName('Mr. A.N IV');
        $anesthetist->setType('Anesthetists');
        $objectManager->persist($anesthetist);
        $objectManager->flush();

        // Anesthetists 5
        $anesthetist = new Doctor();
        $anesthetist->setName('Mr. A.N V');
        $anesthetist->setType('Anesthetists');
        $objectManager->persist($anesthetist);
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