<?php 
include 'structure/header.php';
include 'model.php';
$model = new Model();
$delete = $model->delete();
?>
    
    <div class="header">
    <h1>Product List</h1>
        <div class="buttons">
            <a href="add-product.php"><button class="success">ADD</button></a>
            <button type="submit" name="delete_product" form="products" class="delete">MASS DELETE</button>
        </div>
    </div>
    <hr>
    <form action="" method="POST" id="products" class="cards">
        <?php
            $query = "SELECT * FROM records";
            $query_run  = mysqli_query($model->conn, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $row)
                {
                    ?>
                    <div class="cards-inner">
                        <input type="checkbox" name="delete_product_sku[]" value="<?= $row['sku']; ?>" class="delete-checkbox">
                        <p><?= $row['sku']; ?></p>
                        <p><?= $row['name']; ?></p>
                        <p><?= $row['price']; ?> $</p>
                        <p><?= $row['attribute']; ?></p>
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                    <p>No records found</p>
                <?php
            }
        ?>
    </form>

<?php include 'structure/footer.php';?>