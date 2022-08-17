<?php include 'inc/header.php' ?>

<?php

  $sql = ' SELECT * FROM feedback';
  $result = mysqli_query($conn, $sql);
  $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


   
    <h2>Feedback</h2>

  <?php if(empty($feedback )): ?>
    <p class="lead mt3"> There are not any feedback available</p>
    <?php endif; ?>


    <?php foreach($feedback as $item): ?>
      <div class="card my-3 w-75">
      <div class="text-title text-center mt-2">
        <?php echo $item['name'] . "(" . $item['email'] . ")"; ?> Writes:
        </div>
      <div class="card-body text-center">
        <?php echo $item['body'];  ?>
        <div class="text-secondary mt-2">
          <?php echo $item['date']; ?>
        </div>
      </div>
      </div>
    <?php endforeach; ?>

   

<?php include 'inc/footer.php'; ?>

