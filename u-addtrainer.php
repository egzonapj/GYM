<?php include "inc/u-header.php"; ?>
<main class="container">
  <div class="container-overlay">
  <section class="section">
  <h3 class="section-title">Form for Adding Trainers</h3>
  <div class="section-content">
    <div class="center">
  <?php
    if (isset($_POST['add'])) {
      addTrainer($_POST['firstname'], $_POST['lastname'],$_POST['telephone'],$_POST['email'],$_POST['password'],$_SESSION['user']['user_id']);
    }
    ?>
    <form id="trainers" method="POST">
        <fieldset>
            <label>First Name: </label>
            <input type="text" id="firstname" name="firstname">
        </fieldset>
        <fieldset>
            <label>Last Name: </label>
            <input type="text" id="lastname" name="lastname">
        </fieldset>
        <fieldset>
            <label>Telephone: </label>
            <input type="text" id="telephone" name="telephone">
        </fieldset>
        <fieldset>
            <label>Email: </label>
            <input type="email" id="email" name="email">
        </fieldset>
        <fieldset>
            <label>Password: </label>
            <input type="text" id="password" name="password">
        </fieldset>
        <input type="submit" name="add" id="add" value="ADD">
    </form>
    </div> 
    </div>   
  </section>
  </div>
</main>

<?php include "inc/footer.php"; ?>