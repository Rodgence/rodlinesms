<?php
 include("includes/header.php");
?>

<main class="main">
  <!-- Starter Section -->
  <section id="starter-section" class="starter-section section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Register for Bulk SMS</h2>
      <p>Register Now to Send Bulk SMS</p>
    </div><!-- End Section Title -->

    <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="mail.php" method="POST" class="php-email-form">
        <div class="form-group">
          <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
        </div>
        <div class="form-group">
          <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
        </div>
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="text" name="phone_number" class="form-control" placeholder="Phone number" required>
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary w-100">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>


 <?php
 include("includes/footer.php");
 ?>