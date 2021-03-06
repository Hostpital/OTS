<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * DoctorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SpecialistRepository extends EntityRepository
{
    /**
     * GET results by param
     * @param array $params
     * @return array
     */
    public function getElements(array $params = [])
    {
        $q = $this->createQueryBuilder('sp')
            ->leftJoin('sp.session', 's')
            ->leftJoin('s.operatingRooms', 'ot');
        $this->addFilterByParams($q, $params);

        return $q->getQuery()->getResult();
    }

    /**
     * @param QueryBuilder $q
     * @param array $params
     */
    private function addFilterByParams(QueryBuilder $q, array $params)
    {
        // GET result by id
        if (array_key_exists('by_id', $params)) {
            $q
                ->andWhere($q->expr()->eq('sp.id', ':id'))
                ->setParameter('id', $params['by_id']);
        }

        // GET result by from and to
        if (array_key_exists('by_from', $params) && array_key_exists('by_to', $params)) {
            $q
                ->andWhere($q->expr()->orX(
                    $q->expr()->gte('s.sessionStart', ':by_from'),
                    $q->expr()->lte('s.sessionEnd', ':by_to')
                ))
                ->setParameters([
                    'by_from' => $params['by_from'],
                    'by_to' => $params['by_to']
                ]);
        }

        // GET results by keywords
        if (array_key_exists('by_keywords', $params)) {
            $q
                ->andWhere($q->expr()->like('sp.name', ':by_keywords'))
                ->setParameter('by_keywords', $params['by_keywords']);
        }
    }
}
