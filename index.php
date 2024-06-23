<?php
include 'koneksi.php'; 
$login = isset($_COOKIE['login']);

if (!$login) {
  header("Location: login.php");
  exit();
}
function hitungJumlahUsed($conn, $item) {
    $query = "SELECT COALESCE(SUM(used), 0) as stock FROM $item";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);

    return $row['stock'];
}
function hitungJumlahStock($conn, $item) {
    $query = "SELECT COALESCE(SUM(stock), 0) as stock FROM $item";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);

    return $row['stock'];
}
function hitungJumlahItem($conn, $item) {
    $query = "SELECT COUNT(item) as total FROM $item";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);

    return $row['total'];
}
$total_products = hitungJumlahItem($conn, 'item');
$total_stock = hitungJumlahStock($conn, 'item');
$total_used = hitungJumlahUsed($conn, 'item');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link" href="add.php">Add</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Items</h5>
            <p class="card-text"><?php echo $total_products;?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Stock</h5>
            <p class="card-text"><?php echo $total_stock;?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Used</h5>
            <p class="card-text"><?php echo $total_used;?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
      <div class="panel-body"> 
        <br>
        <br>
           <table class="table table-bordered table-striped">
                    <th>Items</th> 
                    <th>Stock</th> 
                    <th>Used</th> 
                    <th>Total</th>
                    <th width="15%">Action</th> 
                </tr> 
                <?php 
                include 'koneksi.php'; 
                $data = mysqli_query($conn, "select * from item"); 
                while ($d = mysqli_fetch_array($data)) { 
                ?> 
                    <tr> 
                        <td><?php echo $d['item']; ?></td> 
                        <td><?php echo $d['stock']; ?></td> 
                        <td><?php echo $d['used']; ?></td> 
                        <td><?php echo $d['total']; ?></td> 
                        </td> 
                        <td> 
                            <a type="submit" class="btn btn-primary" href="edit.php?id=<?php echo $d['id']; ?>">Update</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                              Delete
                            </button>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Item</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Apakah anda yakin ingin menghapus item ini?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a type="submit" class="btn btn-danger" href="hapus.php?id=<?php echo $d['id']; ?>">Delete</a>
                                  </div>
                                </div>
                               </div>
                              </div>
                        </td> 
                    </tr> 
                <?php 
                } 
                ?> 
           </table>
     </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
