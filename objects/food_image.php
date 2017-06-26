<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/26/2017
 * Time: 12:03 PM
 */
class FoodImage
{
    private $conn;
    private $table_name = "food_images";
    public $id;
    public $food_id;
    public $name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function readFirst()
    {
        $query = "SELECT id, food_id, name
             FROM " . $this->table_name . "
             WHERE food_id = ?
             ORDER BY name DESC
             LIMIT 0 , 1";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->food_id);

        $stmt->execute();

        return $stmt;
    }

    // read all product image related to a product
    function readByProductId(){

        // select query
        $query = "SELECT id, food_id, name
            FROM " . $this->table_name . "
            WHERE food_id = ?
            ORDER BY name ASC";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // sanitize
        $this->food_id=htmlspecialchars(strip_tags($this->food_id));

        // bind food id variable
        $stmt->bindParam(1, $this->food_id);

        // execute query
        $stmt->execute();

        // return values
        return $stmt;
    }
}