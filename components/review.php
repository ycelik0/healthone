<?php
$id = $_GET['id'];
$reviews = $db->prepare("SELECT * FROM `reviews` WHERE product_id = :id");
$reviews->bindParam("id", $_GET['id']);
$reviews->execute();
$result = $reviews->fetchAll(PDO::FETCH_ASSOC);
?>
<ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home-tab" role="tab" aria-controls="home" aria-selected="false">
      Reviews
    </a>
  </li>
</ul>
  <div class="tab-pane fade pt-3 active show" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="col-sm-12">
      <h4>Reviews</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Persoon</th>
            <th scope="col">Datum</th>
            <th scope="col">Rating</th>
            <th scope="col">Review</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            foreach ($result as &$review) {
              ?>
              <tr>
                <td><?= $review["name"]?></td>
                <td><?= $review["date"]?></td>
                <td><?= $review["rating"]?></td>
                <td><?= $review["message"]?></td>
              </tr>
              <?php
              }
              ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>