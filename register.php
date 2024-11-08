<?php
 include("includes/header.php");
?>


  <main class="main">

   

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Register for Bulk SMS</h2>
        <p>Register Now to Send Bulk SMS</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up">
      <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
  <div class="row gy-4">

    <div class="col-md-6">
      <input type="text" name="first_name" class="form-control" placeholder="First Name" required="">
    </div>

    <div class="col-md-6">
      <input type="text" name="last_name" class="form-control" placeholder="Last Name" required="">
    </div>

    <div class="col-md-12">
      <input type="email" name="email" class="form-control" placeholder="Email" required="">
    </div>

    <div class="col-md-9">
      <input type="text" name="phone_number" class="form-control" placeholder="Phone number" required="">
    </div>

    <div class="col-md-12">
      <input type="password" name="password" class="form-control" placeholder="Password" required="">
    </div>

    <div class="col-md-12 text-center">
      <div class="loading">Loading</div>
      <div class="error-message"></div>
      <div class="sent-message">Your information has been submitted. Thank you!</div>

      <button type="submit">Register</button>
    </div>

  </div>
</form>

      </div>

    </section><!-- /Starter Section Section -->

  </main>

 <?php
 include("includes/footer.php");
 ?>