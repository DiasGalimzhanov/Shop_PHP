<?php

class Controller_Cart extends Controller{
    function __construct() {
        $this->model = new Model_Cart();
        $this->view = new View();
    }

    function action_index() {
        $data = $this->model->getCart();
        $this->view->generate("app/pages/Cart/index.php", "app/layouts/cart.php", $data);
    }

    function action_add() {
        $data = $this->model->addProduct();
        $this->view->generate("app/pages/Cart/index.php", "app/layouts/cart.php", $data);
    }

    function action_remove() {
        $data = $this->model->removeProduct();
        $this->view->generate("app/pages/Cart/index.php", "app/layouts/cart.php", $data);
    }

    
}