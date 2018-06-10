<?php
/**
 * Created by: Ogaga Agi (aogaga).
 * Github: https://github.com/aogaga
 * Twitter: @aogaga
 * Date: 6/6/18
 * Time: 7:40 AM
 * Project Radio
 */

namespace App\Service;
use App\Repository\CategoryRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


class BaseService
{
    public $entityManager;
    public $categoryRepository;
    public function __construct(ManagerRegistry $manager, CategoryRepository $catRep )
    {
        $this->entityManager = $manager->getManager();
        $this->categoryRepository = $catRep;

    }

}