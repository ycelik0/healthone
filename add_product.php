<?php
require_once 'dbconnectie.php';
include 'logged_in_user.php';
if ($userRole != 'admin') {
  echo "Error: Not Allowed";
} else {

  $categories = $db->prepare("SELECT * FROM `categories`");
  $categories->execute();
  $result = $categories->fetchAll(PDO::FETCH_ASSOC);
  
  if (isset($_POST["submit"])) {
    $productName = $_POST['productName'];
    $categorySelect = $_POST['categorySelect'];
    $productDetail = $_POST['productDetail'];
    $file_upload = $_FILES["file_upload"];
    
    $fileName = $_FILES["file_upload"]["name"];
    $fileTmpName = $_FILES["file_upload"]["tmp_name"];
    $fileSize = $_FILES["file_upload"]["size"];
    $fileError = $_FILES["file_upload"]["error"];
    $fileType = $_FILES["file_upload"]["type"];

    $fileExtension = explode(".", $fileName );
    $fileActualExtension = strtolower(end($fileExtension));
    $allowedFileExt = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileActualExtension, $allowedFileExt)) {
      if ($fileError === 0) {
        if ($fileSize < 500000) {
          $fileNewName = uniqid('' , true). ".". $fileActualExtension;
          $fileDir = "./img/$fileNewName";
          move_uploaded_file($fileTmpName, $fileDir);

          if ($productName == '' || $categorySelect == '' || $productDetail == '') {
            $statusAlert = 'alert-warning';
            $statusMessage = 'Empty Box';
          } else {
            $users = $db->prepare("INSERT INTO products (name, image, detail, category_id) VALUES (:productName, :productImage, :productDetail, :categorySelect)");
            $users->bindParam("productName", $productName);
            $users->bindParam("productDetail", $productDetail);
            $users->bindParam("categorySelect", $categorySelect);
            $users->bindParam("productImage", $fileDir);
            if ($users->execute()) {
              $statusAlert = 'alert-succes';
              $statusMessage = 'Product added!';
            }
          }
        } else {
          $statusAlert = "alert-danger";
          $statusMessage = 'Bestand moet minder dan 500kb zijn!';
        }
      } else {
        $statusAlert = "alert-danger";
        $statusMessage = 'Er is iets foutgegaan!';
      }
    } else {
      $statusAlert = 'alert-danger';
      $statusMessage = 'Bestand niet toegestaan!';
    }
  }
?>
  <!DOCTYPE html>
  <html lang="en">
  <?php  
  include_once 'components/head.php';
  ?>
<body>
  <div class="container p-3 my-4">
    <?php
    include_once 'components/header.php';
    include_once 'components/navbar.php';
    include_once 'components/picture.php';
    
    if(isset($statusAlert)) 
    { 
      echo "<div class='alert $statusAlert' role='alert'>$statusMessage</div>";
    } else {
      echo '';
    }
    ?>
    <form action="" method="post" enctype='multipart/form-data'>
    <div class="row my-4">
      <div class="col">
        <label for="name">Product Naam:</label>
        <input type="text" name="productName" class="form-control" placeholder="Product Naam">
      </div>
      <div class="col">
        <label for="category">Category:</label>
        <select class="form-select" name="categorySelect">
          <?php
          foreach ($result as &$data) {
          ?>
            <option value="<?php echo $data["id"] ?>" <?php if ($data["id"] == 1) {echo "selected";} ?>><?php echo $data["name"] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col">
        <label for="detail">Beschrijving:</label>
        <textarea type="text" name="productDetail" class="form-control"></textarea>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col">
        <label for="detail">Image bij sportapparaat:</label>
        <div class="input-group mb-3">
          <input type="file" name="file_upload" class="form-control">
        </div>
      </div>
    </div>
      <button type="submit" class="btn btn-succes" name="submit">Add Product</button>
    </form>
    <?php
    
    include_once 'components/footer.php';
    ?>
  </div>
</body>

  </html>
<?php
}
