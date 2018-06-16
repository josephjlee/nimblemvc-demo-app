<?php
    class Users extends Controller {
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function register() {
            // Check for POST request.
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Initialize data.
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Validate email.
                if(empty($data['email'])) {
                    $data['email_err'] = 'Email field can not be empty.';
                } else {
                    // Check email for availability.
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'This email address is already registered.';
                    }
                }

                // Validate name.
                if(empty($data['name'])) {
                    $data['name_err'] = 'Name field can not be empty.';
                }

                // Validate password.
                if(empty($data['password'])) {
                    $data['password_err'] = 'Password field can not be empty.';
                } elseif(strlen($data['password']) < 8) {
                    $data['password_err'] = 'Password has to be at least 8 characters long.';
                }

                // Validate password.
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Confirm Password field can not be empty.';
                } else {
                    if($data['password'] !== $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Password and Confirm Password do not match.';
                    }
                }

                // Make sure there are no errors.
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated
                    // Hash password.
                    $data['password'] = password_hash($data['password'], PASSWORD_ARGON2I);

                    // Register users.
                    if($this->userModel->register($data)) {
                        flash('register_success', 'You\'ve been registered!');
                        redirect('users/login');
                    } else {
                        die("Something went wrong during the registration process.");
                    }
                } else {
                    // Load view with errors.
                    $this->view('users/register', $data);
                }

            } else {
                // Initialize data.
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load the view
                $this->view('users/register', $data);
            }
        }

        public function login() {
            // Check for POST request.
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Initialize data.
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Validate email.
                if(empty($data['email'])) {
                    $data['email_err'] = 'Email field can not be empty.';
                }

                // Validate password.
                if(empty($data['password'])) {
                    $data['password_err'] = 'Password field can not be empty.';
                }

                // Check for email.
                if($this->userModel->findUserByEmail($data['email'])) {

                } else {
                    $data['email_err'] = 'No user found with that email address.';
                }

                // Make sure there are no errors.
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated
                    // Verify password and login user.
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser) {
                        // Create session.
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Password incorrect!';

                        $this->view('users/login', $data);
                    }
                } else {
                    // Load view with errors.
                    $this->view('users/login', $data);
                }
                
            } else {
                // Initialize data.
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Load the view
                $this->view('users/login', $data);
            }
        }

        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            redirect('pages/index');
        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
        }

        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])) {
                return true;
            } else {
                return false;
            }
        }
    }
?>