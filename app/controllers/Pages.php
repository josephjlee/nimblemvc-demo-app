<?php 
    class Pages extends Controller {
        public function __construct() {
            // $this->postModel = $this->model('Post');
        }

        public function index() {
            // $posts = $this->postModel->getPosts();

            $data = [
                'title' => 'WELCOME TO FARHAN\'S MVC PHP FRAMEWORK',
                // 'posts' => $posts
            ];

            $this->view('pages/index', $data);
        }

        public function about() {
            $data = [
                'title' => 'ABOUT US'
            ];

            $this->view('pages/about', $data);
        }
    }
?>