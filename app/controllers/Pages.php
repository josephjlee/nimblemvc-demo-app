<?php 
    class Pages extends Controller {
        public function __construct() {

        }

        public function index() {
            if(isLoggedIn()) {
                redirect('posts');
            }
            $data = [
                'title' => 'Farhan\'s Blog',
                'description' => 'Simple blogging application built on <strong>NimbleMVC PHP Framework.</strong>'
            ];

            $this->view('pages/index', $data);
        }

        public function about() {
            $data = [
                'title' => 'About App'
            ];

            $this->view('pages/about', $data);
        }
    }
?>