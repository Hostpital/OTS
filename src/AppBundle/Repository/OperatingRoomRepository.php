<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * OperatingRoomRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OperatingRoomRepository extends EntityRepository
{
    /**
     * GET results by param
     * @param array $params
     * @return array
     */
    public function getElements(array $params = [])
    {
        $q = $this->createQueryBuilder('ot')
            ->leftJoin('ot.sessions', 's')
            ->leftJoin('s.anesthetists', 'an')
            ->leftJoin('s.specialist', 'sp');
        $this->addFilterByParams($q, $params);

        return $this->getResultsByAction($q, $params);
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
                ->andWhere($q->expr()->eq('ot.id', ':id'))
                ->setParameter('id', $params['by_id']);
        }

        // GET result by specialist
        if (array_key_exists('by_specialist_id', $params)) {
            $q
                ->andWhere($q->expr()->eq('s.specialist', ':by_specialist_id'))
                ->setParameter('by_specialist_id', $params['by_specialist_id']);
        }

        // GET results by keywords
        if (array_key_exists('by_keywords', $params)) {
            $q
                ->andWhere($q->expr()->like('ot.name', ':by_keywords'))
                ->setParameter('by_keywords', $params['by_keywords']);
        }
    }

    /**
     * @param QueryBuilder $q
     * @param array $params
     * @return array|mixed|null
     */
    private function getResultsByAction(QueryBuilder $q, array $params)
    {
        $results = null;
        $query = $q->getQuery();
        if (array_key_exists('by_action', $params)) {
            if ($params['by_action'] === 'one') {
                $results = $query->getOneOrNullResult();
            }
        } else {
            $results = $query->getResult();
        }

        return $results;
    }
}
