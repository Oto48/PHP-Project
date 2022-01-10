<?php

class Model {
    private $server = 'localhost';
    private $username = "root";
    private $password = "";
    private $db = "scandiweb_project";
    public $conn;

    public $attribute;

    public function __construct(){
        try {
            $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
        } catch (Exception $e) {
            echo "connection failed" . $e->getMessage();
        }
    }

    public function insert(){

        if (isset($_POST['submit'])) {

            $sku = $_POST['sku'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $type = $_POST['type'];

            $query = "INSERT INTO records (sku,name,price,type,attribute) VALUES ('$sku','$name','$price','$type','$this->attribute')";
            if ($sql = $this->conn->query($query)) {
                echo "<script>window.location.href = 'product-list.php';</script>";
            }else{
                echo "<p style='color:red;'>SKU has already been used</p>";
            }
        }

    }

    function delete(){
        if(isset($_POST['delete_product']) && isset($_POST['delete_product_sku']))
        {
            $all_id = $_POST['delete_product_sku'];
            $extract_id = implode(',' , $all_id);
            foreach($_POST['delete_product_sku'] as $sku){
                $query = "DELETE FROM records WHERE sku = '" . $sku . "'";
                $query_run = mysqli_query($this->conn, $query);
            }

            if($query_run)
            {
                header("Location: product-list.php");
            }
            else
            {
                echo "<script>alert('cannot delete');</script>";
                header("Location: product-list.php");
            }
        }
    }

}

?>