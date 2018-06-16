<?php 
    class Pages extends Controller {
        public function __construct() {

        }

        public function index() {

            $data = [
                'title' => 'Farhan\'s Blog',
                'description' => 'Simple blogging application built on <strong>DIYMVC PHP Framework.</strong>'
            ];

            $this->view('pages/index', $data);
        }

        public function about() {
            $data = [
                'title' => 'About Us'
            ];

            $this->view('pages/about', $data);
        }
    }
?>