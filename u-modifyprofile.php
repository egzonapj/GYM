<?php include "inc/u-header.php"; ?>
<main class="container">
  <div class="container-overlay">
  <section class="section">
  <h3 class="section-title">Form for modifying profile</h3>
      <?php
      if (isset($_SESSION['user'])){
        $user= array();
        $user= $_SESSION['user'];
        $user_id=$user['user_id'];
        $user_firstname = $user['user_firstname'];
        $user_lastname=$user['user_lastname'];
        $telephone=$user['telephone'];
        $email=$user['email'];
        $password=$user['password'];
      }
      if (isset($_POST['save'])) {
        modifyUserProfile($_POST['user_id'],$_POST['firstname'],$_POST['lastname'],$_POST['telephone'],
        $_POST['email'], $_POST['password']);
      }

      ?>
      <div class="section-content">
        <div class="center">
      <form method="POST" id="t-profile">
        <input type="hidden" id="user_id" name="user_id" value="<?php if(!empty($user_id)) echo $user_id; ?>">
        <fieldset>
          <label>First name: </label>
            <input type="text" id="firstname" name="firstname" value="<?php if(!empty($user_firstname)) echo $user_firstname; ?>">
        </fieldset>
        <fieldset>
          <label>Last Name: </label>
          <input type="text" id="lastname" name="lastname" value="<?php if(!empty($user_lastname)) echo $user_lastname; ?>">
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
      </div>
  </section>
  </div>
</main>

<?php include "inc/footer.php"; ?>