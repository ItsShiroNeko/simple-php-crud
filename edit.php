<!DOCTYPE html> 
<html> 
 
<head> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head> 
 
<div class="container"> 
 <br /> 
 <br /> 
 <br /> 
 <div class="col-md-5 col-md-offset-3"> 
 
  <div class="panel"> 
   <div class="panel-heading"> 
    <h3>Edit Item</h3> 
   </div> 
   <div class="panel-body"> 
 
    <?php 
    include 'koneksi.php'; 
 
    $id = $_GET['id']; 
 
    $data = mysqli_query($conn, "select * from item where id='$id'"); 
    while ($d = mysqli_fetch_array($data)) { 
    ?> 
 
     <form method="post" action="update.php"> 
      <div class="form-group"> 
       <label>Item</label> 
       <input type="hidden" name="id" value="<?php echo $d['id']; ?>"> 
       <input type="text" class="form-control" name="item" placeholder="Edit item" value="<?php echo $d['item']; ?>" required> 
      </div> 
 
      <div class="form-group"> 
       <label>Stock</label> 
       <input type="number" class="form-control" name="stock" min="1" max="30" placeholder="Edit stock" value="<?php echo $d['stock']; ?>" required> 
      </div> 
 
      <div class="form-group"> 
       <label>Used</label> 
       <input type="number" class="form-control" name="used" min="1" max="30" placeholder="Edit used" value="<?php echo $d['used']; ?>" required> 
      </div> 

      <div class="form-group"> 
       <label>Total</label> 
       <input type="text" class="form-control" name="total"value="<?php echo $d['stock'] + $d['used']; ?>" readonly> 
      </div> 
 
      <br /> 
 
      <input type="submit" class="btn btn-primary" value="Update Item"> 
      <a class="btn btn-danger" href="index.php">Back</a>
     </form> 
 
    <?php 
    } 
    ?> 
   </div> 
  </div> 
 </div> 
 
</div> 
 
</body> 
<script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</script>
 