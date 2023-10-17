<?php include "inc/u-header.php"; ?>
<main class="container">
  <div class="container-overlay">
  <section class="section">
    <h3 class="section-title">Form for Deleting User</h3>
    <div class="section-overlay">
    <?php
    if(isset($_GET['uid'])){
      $user_id=$_GET['uid'];
      $user=getUserId($user_id);
      $user_firstname=$user['user_firstname'];
      $user_lastname=$user['user_lastname'];
      $telephone=$user['telephone'];
      $email=$user['email'];
      $password=$user['password'];

    }
    if (isset($_POST['delete'])) {
      deleteUser($user_id);
    }
    ?>
    <form id="users" method="POST">
        <fieldset>
            <label>First Name: </label>
            <input disabled type="text" id="firstname" name="firstname" value="<?php if(!empty($user_firstname)) echo $user_firstname; ?>">
        </fieldset>
        <fieldset>
            <label>Last Name: </label>
            <input disabled type="text" id="lastname" name="lastname"  value="<?php if(!empty($user_lastname)) echo $user_lastname; ?>">
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