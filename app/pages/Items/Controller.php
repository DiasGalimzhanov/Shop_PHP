<?php

class Controller_Items extends Controller
{
    function __construct() {
        $this->model = new Model_Items();
        $this->view = new View();
    }

    function action_index() {
        $data = [];
        $data["title"] = "Items";
        
        if (!empty($_POST) && isset($_POST["name"])) {
            $searchData = [];
            $searchData["name"] = $_POST["name"];
            $data["items"] = $this->model->searchItem($searchData);
    
            if (empty($data["items"])) {
                $this->view->generate("app/pages/Items/notfound.php", "app/layouts/items.php", $data);
                return;
            }
        } else {
            $data["items"] = $this->model->getItems();
        }
    
        $this->view->generate("app/pages/Items/index.php", "app/layouts/items.php", $data);
    }

    // function action_details($id) {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_item']) && $_SESSION['user'] !== null && $_SESSION['user']->id === $this->model->getById($id)->user_id) {
    //         $this->model->deleteItem($id);
    //         header("Location: /mvc/items");
    //         exit();
    //     }
    
    //     $result = $this->model->getById($id);
    //     $cmts = $this->model->getComment($id);  
    //     $data = [];
    //     $data["title"] = $result->name;
    //     $data["item"] = $result;
    //     $data["comments"] = $cmts;
    //     $this->view->generate("app/pages/Items/details.php", "app/layouts/items.php", $data);
    
    //     if (!empty($_POST) && isset($_POST['comment']) && $_SESSION['user'] !== null) {
    //         $com = [];
    //         $com["comment"] = $_POST["comment"];
    //         $res = $this->model->addComment($com, $id);
    //     }
    // }

    function action_details($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_item']) && $_SESSION['user'] !== null && $_SESSION['user']->id === $this->model->getById($id)->user_id) {
            $this->model->deleteItem($id);
            header("Location: /mvc/items");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_item'])) {
            $this->view->generate("app/pages/Items/edit.php", "app/layouts/items.php" , $this->model->getById($id));
        }
    
        $result = $this->model->getById($id);
        $cmts = $this->model->getComment($id);  
        $data = [];
        $data["title"] = $result->name;
        $data["item"] = $result;
        $data["comments"] = $cmts;
        $this->view->generate("app/pages/Items/details.php", "app/layouts/items.php", $data);
    
        if (!empty($_POST) && isset($_POST['comment']) && $_SESSION['user'] !== null) {
            $com = [];
            $com["comment"] = $_POST["comment"];
            $res = $this->model->addComment($com, $id);
        }
    }

    // function action_edit($id) {
    //     if((!empty($_POST) && $_SESSION['user'] !== null && $_SESSION['user']->id === $this->model->getById($id)->user_id)
    //     || (empty($_POST) && $_SESSION['user'] !== null && $_SESSION['user']->role === "admin")) {
    //         $data = [];
    //         $data["name"] = $_POST["name"];
    //         $data["brand"] = $_POST["brand"];
    //         $data["description"] = $_POST["description"];
    //         $data["price"] = $_POST["price"];
    //         $data["stock_quantity"] = $_POST["stock_quantity"];
    //         $data["category_id"] = $_POST["category_id"];
    //         $data["image_url"] = $_POST["image_url"];    
    //         $res = $this->model->editItem($data, $id);
    //         if($res > 0){           
    //             $this->view->generate("app/pages/Items/succsess.php", 'app/layouts/base.php');
    //         } else {
    //             echo "Error";
    //             //$this->view->generate("app/pages/Items/failed.php", 'app/layouts/base.php');
    //         }
    //     }else {
    //         $this->view->generate("app/pages/Items/edit.php", 'app/layouts/base.php', $this->model->getById($id));
    //     }
    // }
    function action_edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Проверяем, является ли пользователь создателем объявления или администратором
            if ($_SESSION['user'] !== null && 
                ($_SESSION['user']->id === $this->model->getById($id)->user_id || $_SESSION['user']->role === "admin")) {
                
                $data = [];
                $data["name"] = $_POST["name"];
                $data["brand"] = $_POST["brand"];
                $data["description"] = $_POST["description"];
                $data["price"] = $_POST["price"];
                $data["stock_quantity"] = $_POST["stock_quantity"];
                $data["category_id"] = $_POST["category_id"];
                $data["image_url"] = $_POST["image_url"];    
                
                $res = $this->model->editItem($data, $id);
                
                if ($res > 0) {           
                    $this->view->generate("app/pages/Items/success.php", 'app/layouts/base.php');
                } else {
                    echo "Error";
                    //$this->view->generate("app/pages/Items/failed.php", 'app/layouts/base.php');
                }
            } else {
                echo "Access denied";
            }
        } else {
            $item = $this->model->getById($id);
            if ($_SESSION['user'] !== null && 
                ($_SESSION['user']->id === $item->user_id || $_SESSION['user']->role === "admin")) {
                // Передаем данные товара в представление
                $this->view->generate("app/pages/Items/edit.php", 'app/layouts/base.php', $item);
            } else {
                echo "Access denied";
            }
        }
    }
    
    
    // function action_edit($id) {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // Проверяем, является ли пользователь создателем объявления или администратором
    //         if ($_SESSION['user'] !== null && 
    //             ($_SESSION['user']->id === $this->model->getById($id)->user_id || $_SESSION['user']->role === "admin")) {
                
    //             $data = [];
    //             $data["name"] = $_POST["name"];
    //             $data["brand"] = $_POST["brand"];
    //             $data["description"] = $_POST["description"];
    //             $data["price"] = $_POST["price"];
    //             $data["stock_quantity"] = $_POST["stock_quantity"];
    //             $data["category_id"] = $_POST["category_id"];
    //             $data["image_url"] = $_POST["image_url"];    
                
    //             $res = $this->model->editItem($data, $id);
                
    //             if ($res > 0) {           
    //                 $this->view->generate("app/pages/Items/success.php", 'app/layouts/base.php');
    //             } else {
    //                 echo "Error";
    //                 //$this->view->generate("app/pages/Items/failed.php", 'app/layouts/base.php');
    //             }
    //         } else {
    //             echo "Access denied";
    //         }
    //     } else {
    //         $item = $this->model->getById($id);
    //         if ($_SESSION['user'] !== null && 
    //             ($_SESSION['user']->id === $item->user_id || $_SESSION['user']->role === "admin")) {
    //             $this->view->generate("app/pages/Items/edit.php", 'app/layouts/base.php', $item);
    //         } else {
    //             echo "Access denied";
    //         }
    //     }
    // }
    
    

    function action_create() {
        if(!empty($_POST)) {
            $data = [];
            $data["name"] = $_POST["name"];
            $data["brand"] = $_POST["brand"];
            $data["description"] = $_POST["description"];
            $data["price"] = $_POST["price"];
            $data["stock_quantity"] = $_POST["stock_quantity"];
            $data["category_id"] = $_POST["category_id"];
            $data["image_url"] = $_POST["image_url"];    
            $id = $_SESSION['user']->id;        
            $res = $this->model->addItem($data, $id);
            if($res > 0){
                $this->view->generate("app/pages/Items/succsess.php", 'app/layouts/base.php');
            } else {
                $this->view->generate("app/pages/Items/failed.php", 'app/layouts/base.php');
            }
        }else {
            $this->view->generate("app/pages/Items/create.php", 'app/layouts/base.php', $_SESSION['user']);
        }
    }

    
    
}
?>
