<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\OperatingRoom;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadOperatingRoomData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $objectManager
     */
    public function load(ObjectManager $objectManager)
    {
        // For anesthesia before operation
        $ot = new OperatingRoom();
        $ot->setOtName('Operating room 1');
        $ot->setOtType('Anesthesia');
        $ot->setOtFrom((new \DateTime())->setTime(07, 30));
        $ot->setOtTo((new \DateTime())->setTime(14, 30));
        $objectManager->persist($ot);
        $objectManager->flush();

        // For anesthesia before operation
        $ot = new OperatingRoom();
        $ot->setOtName('Operating room 2');
        $ot->setOtType('Anesthesia');
        $ot->setOtFrom((new \DateTime())->setTime(07, 30));
        $ot->setOtTo((new \DateTime())->setTime(14, 30));
        $objectManager->persist($ot);
        $objectManager->flush();

        // For heart surgery
        $ot = new OperatingRoom();
        $ot->setOtName('Operating room 3');
        $ot->setOtType('Heart Surgery');
        $ot->setOtFrom((new \DateTime())->setTime(07, 30));
        $ot->setOtTo((new \DateTime())->setTime(14, 30));
        $objectManager->persist($ot);
        $objectManager->flush();

        // For heart surgery
        $ot = new OperatingRoom();
        $ot->setOtName('Operating room 4');
        $ot->setOtType('Heart Surgery');
        $ot->setOtFrom((new \DateTime())->setTime(07, 30));
        $ot->setOtTo((new \DateTime())->setTime(14, 30));
        $objectManager->persist($ot);
        $objectManager->flush();

        // For laparoscopy surgery room
        $ot = new OperatingRoom();
        $ot->setOtName('Operating room 5');
        $ot->setOtType('laparoscopy');
        $ot->setOtFrom((new \DateTime())->setTime(07, 30));
        $ot->setOtTo((new \DateTime())->setTime(14, 30));
        $objectManager->persist($ot);
        $objectManager->flush();

        // For laparoscopy surgery room
        $ot = new OperatingRoom();
        $ot->setOtName('Operating room 6');
        $ot->setOtType('laparoscopy');
        $ot->setOtFrom((new \DateTime())->setTime(07, 30));
        $ot->setOtTo((new \DateTime())->setTime(14, 30));
        $objectManager->persist($ot);
        $objectManager->flush();

        // For labour delivery room
        $ot = new OperatingRoom();
        $ot->setOtName('Operating room 7');
        $ot->setOtType('labour delivery');
        $ot->setOtFrom((new \DateTime())->setTime(07, 30));
        $ot->setOtTo((new \DateTime())->setTime(14, 30));
        $objectManager->persist($ot);
        $objectManager->flush();

        // For labour delivery room
        $ot = new OperatingRoom();
        $ot->setOtName('Operating room 8');
        $ot->setOtType('labour delivery');
        $ot->setOtFrom((new \DateTime())->setTime(07, 30));
        $ot->setOtTo((new \DateTime())->setTime(14, 30));
        $objectManager->persist($ot);
        $objectManager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }
}