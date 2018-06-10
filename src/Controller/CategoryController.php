<?php
/**
 * Created by: Ogaga Agi (aogaga).
 * Github: https://github.com/aogaga
 * Twitter: @aogaga
 * Date: 6/4/18
 * Time: 1:53 AM
 * Project Radio
 */

namespace App\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use App\Entity\Category;
use App\Service\CategoryService;
use Carbon\Carbon;
use FOS\RestBundle\Controller\Annotations as Rest;
/**
 * Class CategoryController
 * @package App\Controller
 * @Rest\Route("/api/v1/category")
 */
class CategoryController extends FOSRestController
{

    private $categoryService;

    public function __construct(CategoryService $catService)
    {
        $this->categoryService = $catService;
    }

    /**
 * @Rest\View()
 * @Rest\Get("/", name="gell_all_movies")
 */
    public function getCategories(){
       return $this->categoryService->getAllCategories();
    }


    /**
     * @Rest\View()
     * @Rest\Get("/{slug}", name="get_movie")
     */
    public function getCategory($slug){
       return $this->categoryService->getCaetroyById($slug);
    }

    /**
     * @Rest\View();
     * @Rest\Get("/category/all")
     */
    public function createCategory(){

        $category = new Category();
        $category->setName("Spanish  Sounds");
        $category->setDescription("nothing useful here jsut random text");
        $category->setCreated(Carbon::now());
        $category->setUpdated(Carbon::now());
        return  $this->categoryService->createCategory($category);
    }
}