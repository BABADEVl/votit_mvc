<?php
namespace App\Controller;

use App\Repository\PollRepository;
use App\Repository\PollItemRepository;
use App\Repository\UserPollItemRepository;
use App\Repository\CategoryRepository;
use App\Entity\Poll;
use App\Entity\PollItem;
use App\Entity\UserPollItem;

class PollController extends Controller {
    public function list() {
        $pollRepository = new PollRepository();
        $polls = $pollRepository->findAll();
        $this->render('poll/list', ['polls' => $polls]);
    }
    public function show() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /');
            exit;
        }
        $repo = new PollRepository();
        $poll = $repo->find($id);
        $itemRepo = new PollItemRepository();
        $items = $itemRepo->findByPollId($id);
        $voteRepo = new UserPollItemRepository();
        $results = $voteRepo->countVotes($id);
        $this->render('poll/show', ['poll' => $poll, 'items' => $items, 'results' => $results]);
    }
    public function create() {
        if (empty($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $options = array_filter(array_map('trim', explode("\n", $_POST['options'])));
            if (count($options) >= 2) {
                $pollId = (new PollRepository())->create($_POST['title'], $_POST['description'], $_SESSION['user']->getId(), $_POST['category_id']);
                foreach ($options as $option) {
                    (new PollItemRepository())->create(new PollItem(null, $option, $pollId));
                }
                header('Location: /poll/?id=' . $pollId);
                exit;
            }
            $error = 'Veuillez saisir au moins deux options.';
        }
        $categories = (new CategoryRepository())->findAll();
        $this->render('poll/create', ['categories' => $categories, 'error' => $error]);
    }
  
    public function vote() {
        if (empty($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        $voteRepo = new UserPollItemRepository();
        $voteRepo->removeVotesForUserAndPoll($_SESSION['user']->getId(), $_GET['id']);
        $voteRepo->addVote(new UserPollItem($_SESSION['user']->getId(), $_POST['option']));
        header('Location: /poll/?id=' . $_GET['id']);
        exit;
    }

    public function search() {
        $q = $_GET['q'] ?? '';
        $polls = (new PollRepository())->search($q);
        $this->render('poll/search', ['polls' => $polls, 'q' => $q]);
    }
}
