<?php include "inc/t-header.php"; ?>
  <main class="container">
    <div class="container-overlay">
    <section class="section">
      <h3 class="section-title">Form for modifying profile</h3>
      <?php
      if (isset($_SESSION['member'])){
        $trainer= array();
        $trainer= $_SESSION['member'];
        $trainer_id=$trainer['trainer_id'];
        $trainer_firstname = $trainer['trainer_firstname'];
        $trainer_lastname=$trainer['trainer_lastname'];
        $telephone=$trainer['telephone'];
        $email=$trainer['email'];
        $password=$trainer['password'];
      }
      if (isset($_POST['save'])) {
        modifyTrainerProfile($_POST['trainer_id'],$_POST['telephone'],
        $_POST['email'], $_POST['password']);
      }

      ?>
      <div class="section-content">
      <form method="POST" id="t-profile">
        <input type="hidden" id="trainer_id" name="trainer_id" value="<?php if(!empty($trainer_id)) echo $trainer_id; ?>">
        <fieldset>
          <label>First name: </label>
            <input disabled type="text" id="firstname" name="firstname" value="<?php if(!empty($trainer_firstname)) echo $trainer_firstname; ?>">
        </fieldset>
        <fieldset>
          <label>Last Name: </label>
          <input disabled type="text" id="lastname" name="lastname" value="<?php if(!empty($trainer_lastname)) echo $trainer_lastname; ?>">
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
          <input type="password" id="password" name="password" value="<?php if(!empty($password)) echo $password; ?>">
        </fieldset>
        <input type="submit" name="save" id="save" value="SAVE">
      </form>
      </div>
    </section>
    </div>
  </main>
  
<?php include "inc/footer.php"; ?>
  