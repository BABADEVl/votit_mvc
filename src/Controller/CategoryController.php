<?php
namespace App\Controller;
use App\Repository\CategoryRepository;
use App\Repository\PollRepository;

class CategoryController extends Controller {
    public function list() {
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->findAll();
        $this->render('category/list', ['categories' => $categories]);
    }

    public function show() 
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /');
            exit;
        }
        $repo = new CategoryRepository();
        $category = $repo->findById($id);
        if (!$category) 
        {
            header('Location: /');
            exit;
        }
        $polls = (new PollRepository())->findAllByCategoryId($id);
        $this->render('category/show', ['category' => $category, 'polls' => $polls]);
    }
}