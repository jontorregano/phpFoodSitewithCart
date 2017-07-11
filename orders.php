<!DOCTYPE HTML>
<html>
<head>
    <title>Store Orders Placed</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="libs/bootstrap-3.3.7/css/bootstrap.min.css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- custom css -->
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    </style>

</head>
<body>

    <!-- container -->
    <div class="container">

        <?php
        /**
         * Created by PhpStorm.
         * User: jonto
         * Date: 7/3/2017
         * Time: 10:52 PM
         */

        include 'config/database.php';

        $action = isset($_GET['action']) ? $_GET['action'] : "";

        include_once "objects/food.php";
        include_once "objects/food_image.php";
        include_once  "objects/orders.php";

        $database = new Database();
        $db = $database->getConnection();

        $order = new Order($db);
        $food = new Food($db);
        $food_images = new FoodImage($db);

        $page_title="Orders";

        include 'layout_head.php';

        // select all data
        $query = "SELECT id, food_list, food_total, created_on, customer_names, customer_comment FROM food_orders ORDER BY created_on DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();

        // this is how to get number of rows returned
        $num = $stmt->rowCount();

        // link to create record form
        echo "<a href='orders.php' class='btn btn-primary m-b-1em'>Back to Orders</a>";

        //check if more than 0 record found
        if($num>0){

            echo "<table class='table table-hover table-responsive table-bordered'>";//start table

            //creating our table heading
            echo "<tr>";
            echo "<th>Food Ordered</th>";
            echo "<th>Order Total</th>";
            echo "<th>Customer Name</th>";
            echo "<th>Customer Comment</th>";
            echo "<th>Created On</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            // retrieve our table contents
            // fetch() is faster than fetchAll()
            // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                // extract row
                // this will make $row['firstname'] to
                // just $firstname only
                extract($row);

                // creating new table row per record
                echo "<tr>";
                //echo "<td>{$id}</td>";
                echo "<td>{$food_list}</td>";
                echo "<td>&#36;" . round($food_total,2) . "</td>";
                echo "<td>{$customer_names}</td>";
                echo "<td>{$customer_comment}</td>";
                echo "<td>{$created_on}</td>";
                echo "<td>";

                // we will use this links on next part of this post
                echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Order Complete / <br> Remove Order</a>";
                echo "</td>";
                echo "</tr>";
            }
            // end table
            echo "</table>";

        }

        // if no records found
        else{
            echo "<div class='alert alert-danger text-center'>No records found.</div>";
        }

        if($action=='deleted'){
            echo "<div class='alert alert-success text-center'>Order was Removed.</div>";
        }
        ?>
    <!-- dynamic content will be here -->

    </div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="libs/jquery-3.2.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="libs/bootstrap-3.3.7/js/bootstrap.min.js"></script>

    <script type='text/javascript'>
        function delete_user( id ){

            var answer = confirm('Are you sure?');
            if (answer){
                // if user clicked ok,
                // pass the id to delete.php and execute the delete query
                window.location = 'delete.php?id=' + id;
            }
        }
    </script>

</body>
</html>

<?php
include 'layout_foot.php';
?>