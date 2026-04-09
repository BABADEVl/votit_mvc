<?php
namespace App\Controller;
use App\Repository\PollRepository;

class PageController extends Controller {
    public function home() {
        $pollRepository = new PollRepository();
        $polls = $pollRepository->findAll(3);
        
        $this->render('page/home', [
            'polls' => $polls
        ]);
    }

    public function about() {
        $this->render('page/about');
    }

    public function legal() {
        $this->render('page/legal');
    }
}
