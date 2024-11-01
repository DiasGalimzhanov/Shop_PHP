<?php

class Model_Cart extends Model
{
    public function getData()
    {
        return false;
    }

    public function getCart()
    {
        $cart = [new stdClass, new stdClass, new stdClass];
        return $cart;
    }

    public function getById($id){

    }

    public function addProduct($id){
        echo "Add product: $id";
    }

    public function removeProduct($id){
        echo "Remove product: $id";
    }
}