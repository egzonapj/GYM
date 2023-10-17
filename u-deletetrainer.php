<?php include "inc/u-header.php"; ?>
<main class="container">
  <div class="container-overlay">
  <section class="section">
    <h3 class="section-title">Form for Deleting Trainer</h3>
  <?php
    if(isset($_GET['tid'])){
      $trainer_id=$_GET['tid'];
      $trainer=getTrainerId($trainer_id);
      $trainer_firstname=$trainer['trainer_firstname'];
      $trainer_lastname=$trainer['trainer_lastname'];
      $telephone=$trainer['telephone'];
      $email=$trainer['email'];
      $password=$trainer['password'];

    }
    if (isset($_POST['delete'])) {
      deleteTrainer($trainer_id);
    }
    ?>
    <div class="section-content">
    <form id="trainers" method="POST">
        <fieldset>
            <label>First Name: </label>
            <input disabled type="text" id="firstname" name="firstname" value="<?php if(!empty($trainer_firstname)) echo $trainer_firstname; ?>">
        </fieldset>
        <fieldset>
            <label>Last Name: </label>
            <input disabled type="text" id="lastname" name="lastname"  value="<?php if(!empty($trainer_lastname)) echo $trainer_lastname; ?>">
        </fieldset>
        <fieldset>
            <label>Telephone: </label>
            <input disabled type="text" id="telephone" name="telephone" value="<?php if(!empty($telephone)) echo $telephone; ?>">
        </fieldset>
        <fieldset>
            <label>Email: </label>
            <input disabled type="email" id="email" name="email" value="<?php if(!empty($email)) echo $email; ?>">
        </fieldset>
        <fieldset>
            <label>Password: </label>
            <input disabled type="text" id="password" name="password" value="<?php if(!empty($password)) echo $password; ?>">
        </fieldset>
        <input type="submit" name="delete" id="delete" value="Delete">
    </form> 
    </div>   
  </section>
  </div>
</main>

<?php include "inc/footer.php"; ?>