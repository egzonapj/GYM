<?php include "inc/u-header.php"; ?>
<main class="container">
  <div class="container-overlay">
  <section class="section">
  <h3 class="section-title">Form for Modifying Trainers</h3>
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
    if (isset($_POST['save'])) {
      modifyTrainers($trainer_id,$_POST['firstname'], $_POST['lastname'],$_POST['telephone'],$_POST['email'],$_POST['password']);
    }
    ?>
    <div class="section-container">
    <form id="trainers" method="POST">
        <fieldset>
            <label>First Name: </label>
            <input type="text" id="firstname" name="firstname" value="<?php if(!empty($trainer_firstname)) echo $trainer_firstname; ?>">
        </fieldset>
        <fieldset>
            <label>Last Name: </label>
            <input type="text" id="lastname" name="lastname"  value="<?php if(!empty($trainer_lastname)) echo $trainer_lastname; ?>">
        </fieldset>
        <fieldset>
            <label>Telephone: </label>
            <input type="text" id="telephone" name="telephone" value="<?php if(!empty($telephone)) echo $telephone; ?>">
        </fieldset>
        <fieldset>
            <label>Email: </label>
            <input type="email" id="email" name="email" value="<?php if(!empty($email)) echo $email; ?>">
        </fieldset>
        <fieldset>
            <label>Password: </label>
            <input type="text" id="password" name="password" value="<?php if(!empty($password)) echo $password; ?>">
        </fieldset>
        <input type="submit" name="save" id="save" value="Save">
    </form> 
    </div>   
  </section>
  </div>
</main>

<?php include "inc/footer.php"; ?>