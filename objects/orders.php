<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 7/3/2017
 * Time: 11:06 PM
 */
class Order
{
    private $conn;
    private $table_name = "food_orders";

    public $id;
    public $food_list;
    public $food_total;
    public $created_on;

    public function __construct($db){
        $this->conn = $db;
    }

    function read($from_record_num, $records_per_page)
    {
        $query = "SELECT
                id, food_list, food_total, created_on 
            FROM
                " . $this->table_name . "
            ORDER BY
                created_on ASC
            LIMIT
                ?, ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt;
    }

    public function count()
    {
        $query = "SELECT count(*) FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $rows = $stmt->fetch(PDO::FETCH_NUM);

        return $rows[0];
    }
}