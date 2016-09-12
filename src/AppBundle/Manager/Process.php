<?php

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;

/**
 * Class Process
 * @package AppBundle\Manager
 */
class Process
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Process constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * GET sessions, specialists & anesthetists by operating room
     * @param int $orId
     * @return mixed
     */
    public function getSessionSpecialistAndAnesthetistByOr($orId)
    {
        $result = $this->entityManager
            ->getRepository('AppBundle:OperatingRoom')
            ->getElements([
                'by_id' => $orId,
                'by_action' => 'one'
            ]);

        return $result;
    }

    /**
     * GET sessions & operating rooms by specialist
     * @param int $specialistId
     * @return mixed
     */
    public function getSessionAndORBySpecialist($specialistId)
    {
        $result = $this->entityManager
            ->getRepository('AppBundle:Specialist')
            ->getElements([
                'by_id' => $specialistId,
                'by_action' => 'one'
            ]);

        return $result;
    }

    /**
     * Check specialist availability in particular timeslot
     * @param \DateTime $from
     * @param \DateTime $to
     * @return bool
     */
    public function checkSpecialistAvailableTimeSlot(\DateTime $from, \DateTime $to)
    {
        $result = $this->entityManager
            ->getRepository('AppBundle:Specialist')
            ->getElements([
                'by_from' => $from,
                'by_to' => $to,
                'by_action' => 'one'
            ]);

        return !count($result);
    }
}