<?php
/**
 * Created by: Ogaga Agi (aogaga).
 * Github: https://github.com/aogaga
 * Twitter: @aogaga
 * Date: 6/4/18
 * Time: 1:25 AM
 * Project Radio
 * In loving memory of Ezekiel Omo aka eze
 */

namespace App\Service;


use App\Entity\Category;


class CategoryService extends BaseService
{

    /*
     * creates  new category
     */
    public function createCategory(Category $category){
        $this->entityManager->persist($category);
        $this->entityManager->flush();
        return $category->getId();
    }


    /**
     * @return mixed
     * get all categories
     */
    public function getAllCategories(){
    return $this->entityManager->getRepository(Category::class)
            ->All();

    }


    public function getCaetroyById($id){
    return $this->entityManager->getRepository(Category::class)
        ->findOneBy(['id'=>$id]);
    }

}