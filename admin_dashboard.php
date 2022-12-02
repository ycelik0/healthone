<?php
require_once 'dbconnectie.php';
include 'logged_in_user.php';
if ($userRole != 'admin') {
  echo "Error: Not Allowed";
} else {

  $products = $db->prepare("SELECT * FROM `products`");
  $products->execute();
  $result = $products->fetchAll(PDO::FETCH_ASSOC);
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
  
  ?>
  <table class="w-100">
    <thead>
      <tr>
          <th scope="col" class="text-center p-3">#</th>
          <th scope="col" class="ps-5 p-3">Naam</th>
          <th scope="col" class="text-center p-3">Categorie</th>
          <th scope="col" class="text-center p-3">Aanpassen</th>
          <th scope="col" class="text-center p-3">Verwijderen</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($result as &$product) {
      ?>
      <tr class="border-top">
        <td scope="row" class="text-center py-3">
          <?php
          echo $product["id"];
          ?>
        </td>
        <td class="ps-5 py-3">
          <?php
          echo $product["name"];
          ?>
        </td>
        <td class="text-center py-3">
          <?php
          echo $product["category_id"];
          ?>
        </td>
        <td class="text-center py-3">
            <a href="./edit_product.php?id=<?php echo $product["id"] ?>" class="formgroup btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
            </a>
        </td>
        <td class="text-center py-3">
            <a href="./delete_product.php?id=<?php echo $product["id"] ?>" class="formgroup btn btn-danger">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>
            </a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
</table>
  <a class="btn btn-primary ms-4" href="./add_product.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
    </svg>
  </a>
  <?php
  include_once 'components/footer.php';
  ?>
</div>
</body>
</html>
<?php
}