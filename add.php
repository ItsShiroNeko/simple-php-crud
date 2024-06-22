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
    <h3>Add Item</h3> 
   </div> 
   <div class="panel-body"> 
 
     <form method="post" action="set.php"> 
      <div class="form-group"> 
       <label>Item</label> 
       <input type="hidden" name="id" value="<?php echo $d['id']; ?>"> 
       <input type="text" class="form-control" name="item" placeholder="Add item" required> 
      </div> 
 
      <div class="form-group"> 
       <label>Stock</label> 
       <input type="number" class="form-control" name="stock" min="1" max="30" placeholder="Add stock" required> 
      </div> 
 
      <div class="form-group"> 
       <label>Used</label> 
       <input type="number" class="form-control" name="used" min="1" max="30" placeholder="Add used" required> 
      </div> 

      <div class="form-group"> 
       <label>Total</label> 
       <input type="text" class="form-control" name="total" readonly> 
      </div> 
 
      <br /> 
 
      <input type="submit" class="btn btn-primary" value="Add Item"> 
      <a class="btn btn-danger" href="index.php">Back</a>
     </form> 
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
 