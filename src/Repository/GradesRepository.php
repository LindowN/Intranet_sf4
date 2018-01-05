<?php

namespace App\Repository;

use Doctrine\ORM\Query as Query;
/**
 * GradesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GradesRepository extends \Doctrine\ORM\EntityRepository
{
    public function getGradesForUser($user)
    {
            return $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.users = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }
}
