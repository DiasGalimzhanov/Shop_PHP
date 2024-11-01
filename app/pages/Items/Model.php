<?php

class Model_Items extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getData() {
        return false;
    }

    public function getItems() {
        return $this->db->getAll("SELECT * FROM products");
    }

    public function getById($id) {
        $sql = "SELECT products.*, users.phone_number 
                FROM products 
                JOIN users ON products.user_id = users.id 
                WHERE products.id = :id";
        $args = [
            "id" => $id
        ];
        return $this->db->getRow($sql, $args);
    }
    

    public function addComment($comment, $product_id) {
        $sql = "INSERT INTO comments (product_id, comment, user_id) VALUES (:product_id, :comment , :user_id)";
        $args = [
            "product_id" => $product_id,
            "user_id" => $_SESSION["user"]->id,
            "comment" => $comment["comment"]
        ];
        return $this->db->insert($sql, $args);
    }

    public function getComment($id) 
    { 
        $query = "SELECT comments.*, users.username FROM comments 
                  JOIN users ON comments.user_id = users.id 
                  WHERE comments.product_id = :product_id";
        $args = ["product_id" => $id];
        return $this->db->getAll($query, $args);
    }

    public function addItem($data, $id) {
        $sql = "INSERT INTO products (name, brand, description, price, discount ,image_url, stock_quantity, category_id , user_id) 
        VALUES (:name, :brand ,:description, :price, :discount , :image_url , :stock_quantity , :category_id ,:user_id)";
        $args = [
            "name" => $data["name"],
            "brand" => $data["brand"],
            "description" => $data["description"],
            "price" => $data["price"],
            "discount" => 0,
            "image_url" => $data["image_url"],
            "stock_quantity" => $data["stock_quantity"],
            "category_id" => $data["category_id"],
            "user_id" => $id
        ];
        return $this->db->insert($sql, $args);
        
    }

    public function deleteItem($id) {
        $sql = "DELETE FROM products WHERE id = :id";
        $args = [
            "id" => $id
        ];
        return $this->db->deleteRow($sql, $args);
    }

    public function searchItem($data) {
        $sql = "SELECT * FROM products WHERE name LIKE :name";
        return $this->db->getAll($sql, ["name" => "%" . $data["name"] . "%"]);
    }

    // public function editItem($data, $id) {
    //     $sql = "UPDATE products SET name = :name, brand = :brand, description = :description, price = :price, image_url = :image_url, stock_quantity = :stock_quantity, category_id = :category_id WHERE id = :id";
    //     $args = [
    //         "name" => $data["name"],
    //         "brand" => $data["brand"],
    //         "description" => $data["description"],
    //         "price" => $data["price"],
    //         "image_url" => $data["image_url"],
    //         "stock_quantity" => $data["stock_quantity"],
    //         "category_id" => $data["category_id"],
    //         "id" => $id
    //     ];
    //     return $this->db->update($sql, $args);
    // }

    public function editItem($data, $id) {
        $sql = "UPDATE products SET name = :name, brand = :brand, description = :description, price = :price, image_url = :image_url, stock_quantity = :stock_quantity, category_id = :category_id WHERE id = :id";
        $args = [
            "name" => $data["name"],
            "brand" => $data["brand"],
            "description" => $data["description"],
            "price" => $data["price"],
            "image_url" => $data["image_url"],
            "stock_quantity" => $data["stock_quantity"],
            "category_id" => $data["category_id"],
            "id" => $id
        ];
        return $this->db->update($sql, $args);
    }
    
}