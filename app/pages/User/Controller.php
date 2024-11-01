<?php

class Controller_User extends Controller
{
    public function __construct() {
        $this->model = new Model_Users();
        $this->view = new View();
    }

    public function action_index() {
        //session_start();
        $this->view->generate("app/pages/User/index.php", 'app/layouts/base.php', $_SESSION['user']);

        // if(!empty($_POST)){
        //     $user = [];
        //     $user['username'] = $_POST['username'];
        //     $user['email'] = $_POST['email'];
        //     $user['phone_number'] = $_POST['phone_number'];
        //     $user['password'] = $_POST['password'];
        //     $user['gender'] = $_POST['gender'];
        //     $user['birthdate'] = $_POST['birthday'];
        //     $user['id'] = $_SESSION['user']['id'];
        //     $newUser = $this->model->updateUser($user);
        //     if($newUser > 0){
        //         $this->view->generate("app/pages/User/succsess.php", 'app/layouts/base.php');
        //     } else {
        //         $this->view->generate("app/pages/User/failed.php", 'app/layouts/base.php');
        //     }
        // } else {
        // }
    }

    public function action_auth(){
        if(!empty($_POST)){
            $user = [];
            $user['email'] = $_POST['email'];
            $user['password'] = $_POST['password'];

            $newUser = $this->model->authUser($user);
            if($newUser > 0){
                $this->view->generate("app/pages/User/index.php", 'app/layouts/base.php');
            } else {
                $this->view->generate("app/pages/User/failed.php", 'app/layouts/base.php');
            }
        } else {
            $this->view->generate("app/pages/User/auth.php", 'app/layouts/base.php');
        }
    }

    public function action_logout(){
        $this->model->logout();
        $this->view->generate("app/pages/User/logout.php", 'app/layouts/base.php');
    }


    // function action_profile() {
    //     //session_start();
    //     if(!empty($_POST)){
    //         $user = [];
    //         $user['username'] = $_POST['username'];
    //         $user['email'] = $_POST['email'];
    //         $user['phone_number'] = $_POST['phone_number'];
    //         $user['password'] = $_POST['password'];
    //         $user['gender'] = $_POST['gender'];
    //         $user['birthdate'] = $_POST['birthday'];
    //         $user['id'] = $_SESSION['user']['id'];
    //         $newUser = $this->model->updateUser($user);
    //         if($newUser > 0){
    //             $this->view->generate("app/pages/User/succsess.php", 'app/layouts/base.php');
    //         } else {
    //             $this->view->generate("app/pages/User/failed.php", 'app/layouts/base.php');
    //         }
    //     } else {
    //         $this->view->generate("app/pages/User/profile.php", 'app/layouts/base.php', $_SESSION['user']);
    //     }
    // }


    function action_register() {
        if(!empty($_POST)){
            $user = [];
            $user['username'] = $_POST['username'];
            $user['email'] = $_POST['email'];
            $user['phone_number'] = $_POST['phone_number'];
            $user['password'] = $_POST['password'];
            $user['gender'] = $_POST['gender'];
            $user['birthdate'] = $_POST['birthday'];

            $newUser = $this->model->createUser($user);
            if($newUser > 0){
                $this->view->generate("app/pages/User/succsess.php", 'app/layouts/base.php');
            } else {
                $this->view->generate("app/pages/User/failed.php", 'app/layouts/base.php');
            }
        } else {
            $this->view->generate("app/pages/User/register.php", 'app/layouts/base.php');
        }
    }

    // function action_edit(){
    //     if(!empty($_POST)){
    //         $user = [];
    //         $user['username'] = $_POST['username'];
    //         $user['email'] = $_POST['email'];
    //         $user['phone_number'] = $_POST['phone_number'];
    //         $user['password'] = $_POST['password'];
    //         $user['gender'] = $_POST['gender'];
    //         $user['birthdate'] = $_POST['birthday'];
    //         $user['id'] = $_SESSION['user']->id;
    //         $newUser = $this->model->updateUser($user);
    //         if($newUser > 0){
    //             $this->view->generate("app/pages/User/succsess.php", 'app/layouts/base.php');
    //         } else {
    //             $this->view->generate("app/pages/User/failed.php", 'app/layouts/base.php');
    //         }
    //     } else {
    //         $this->view->generate("app/pages/User/edit.php", 'app/layouts/base.php', $_SESSION['user']);
    //     }
    // }

    function action_edit() {
        if (!empty($_POST)) {
            $user = [];
            $user['username'] = $_POST['username'];
            $user['email'] = $_POST['email'];
            $user['phone_number'] = $_POST['phone_number'];
            $user['password'] = $_POST['password'];
            $user['gender'] = $_POST['gender'];
            $user['birthdate'] = $_POST['birthday'];
            $user['id'] = $_SESSION['user']->id;
    
            $newUser = $this->model->updateUser($user);
            
            if ($newUser > 0) {
                $_SESSION['user']->username = $user['username'];
                $_SESSION['user']->email = $user['email'];
                $_SESSION['user']->phone_number = $user['phone_number'];
                $_SESSION['user']->gender = $user['gender'];
                $_SESSION['user']->birthdate = $user['birthdate'];
                $_SESSION['user']->password = $user['password']; 
                $this->view->generate("app/pages/User/success.php", 'app/layouts/base.php');
            } else {
                // Для отладки:
                error_log("Update failed for user ID: " . $user['id']);
                $this->view->generate("app/pages/User/failed.php", 'app/layouts/base.php');
            }
        } else {
            $this->view->generate("app/pages/User/edit.php", 'app/layouts/base.php', $_SESSION['user']);
        }
    }
    
    
}
