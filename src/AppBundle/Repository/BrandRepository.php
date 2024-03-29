<?php

namespace AppBundle\Repository;

/**
 * BrandRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BrandRepository extends \Doctrine\ORM\EntityRepository
{
    /*public function findAllExcludeId($id, $brand, $limit) {

        $query = $this->createQueryBuilder('p')
        ->where('p.id <> :id AND p.category = :category')
        ->setParameters(array("id" => $id, "category" => $category))
        ->orderBy('p.modified', 'DESC')
        ->setMaxResults($limit)
        ->getQuery();

        return $query->getResult();

    }*/


    public function findBrandThatContainsString($externalName)
    {
        $em = $this->getEntityManager();

        $dql = "select b.id, b.name
            from AppBundle:Brand b
            where b.name like :externalName";

        $query = $em->createQuery($dql);
        $query->setParameter('externalName', '%' . $externalName . '%');

        $result = $query->getResult();

        if (empty($result)) {
            $result = null;
        } else {
            $brandId = $result[0]["id"];
            $result = $this->findOneById($brandId);
        }

        return $result;
    }
}
