<?php 
include 'structure/header.php';
?>

  <div class="header">
    <h1>Product Add</h1>
    <div class="buttons">
      <button class="success" type="submit" name="submit" form="product_form">Save</button>
      <a href="product-list.php"><button class="primary">Cancel</button></a>
    </div>
  </div>
  <hr>
  <div class="container">
    <?php include 'add.php'; ?>
    <form action="" id="product_form" method="post" onsubmit="return validateInputs()">
      <div class="input-control">
        <label for="sku">SKU</label>
        <input id="sku" name="sku" type="text">
        <div class="error"></div>
      </div>
      <div class="input-control">
        <label for="name">Name</label>
        <input id="name" name="name" type="text">
        <div class="error"></div>
      </div>
      <div class="input-control">
        <label for="price">Price</label>
        <input id="price" name="price" type="number" step="0.1" min="0">
        <div class="error"></div>
      </div>
      <div class="input-control">
        <label for="productType">Choose a Type:</label>
        <select id="productType" name="type">
        <option disabled selected value> -- select a type -- </option>
          <option value="DVD">DVD</option>
          <option value="Book">Book</option>
          <option value="Furniture">Furniture</option>
        </select>
        <div class="error"></div>
      </div>
      <div id="attribute">
        <div class="error"></div>
      </div>
    </form>
  </div>

  <script src='script.js?v=<?php echo time(); ?>'></script>
  
<?php include 'structure/footer.php';?>