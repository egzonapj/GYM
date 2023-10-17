<?php include "inc/u-header.php"; ?>
<main class="container">
  <div class="container-overlay">
  <section class="section">
    <h3 class="section-title">Users</h3>
    <div class="section-content">
    <p id="message">
            <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
            ?>
        </p>
    <table id="users">
      <tr>
        <th>Full Name</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
        $result = getUsers();
        while ($user = mysqli_fetch_assoc($result)) {
            $user_id = $user['user_id'];           
            echo "<td>" . $user['user_firstname'] . ' ' . $user['user_lastname'] . " </td>";
            echo "<td>" . $user['telephone'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['password'] . "</td>";
            echo "<td><a href='u-modifyuser.php?uid=$user_id'>Edit</a></td>";
            echo "<td><a href='u-deleteuser.php?uid=$user_id'>Delete</a></td>";
            echo "</tr>";
        }
      ?>
    </table>
    <h5><a class="margin section-btn" href="u-adduser.php">Add User</a></h5>
    </div>
  </section>
  </div>
</main>

<?php include "inc/footer.php"; ?>

