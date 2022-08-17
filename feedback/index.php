<?php include 'inc/header.php'?>


<?php

$name = $email = $body = '';
$nameErr = $emailErr = $bodyErr = ''; 


//Form Validation
  if(isset($_POST['submit'])){

    //name validation
    if(empty($_POST['name'])) {
      $nameErr = 'Fill up your name!';
    } else {
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //email validation
    if(empty($_POST['email'])) {
      $emailErr = 'Fill up your email!';
    } else {
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    //body validation
    if(empty($_POST['body'])) {
      $bodyErr = 'Fill up your feedback!';
    } else {
      $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
  //Add to database
      $sql = "INSERT INTO  feedback (name, email, body) VALUES('$name', '$email', '$body')";

      if(mysqli_query($conn, $sql)) {
    //Success
        header('Location: feedback.php');
      } else {
      echo 'Error: ' . mysqli_error($conn);
    }
  }
}
?>


<img src="/php-course/feedback/img/logo.png" class="w-50 mb-3" alt="">
    <h2>Feedback</h2>
    <p class="lead text-center">Leave feedback for Anything</p>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mt-4 w-75">

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo !$nameErr ?: 'is-invalid'; ?>" id="name" name="name" placeholder="Enter your name" value="<?php echo $name; ?>">
        <div id="validationServerFeedback" class="invalid-feedback">
          <?php echo $nameErr; ?>
        </div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo !$emailErr ?: 'is-invalid'; ?>" id="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>">
        <div class="invalid-feedback">
          <?php echo $emailErr; ?>
        </div>
      </div>

      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo !$bodyErr ?: 'is-invalid'; ?>" id="body" name="body" placeholder="Enter your feedback"><?php echo $body; ?></textarea>
        <div class="invalid-feedback">
          <?php echo $bodyErr; ?>
        </div>
      </div>
      
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
    
    <?php include 'inc/footer.php' ?>