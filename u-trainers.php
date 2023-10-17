<?php include "inc/u-header.php"; ?>
<main class="container">
  <div class="container-overlay">
  <section class="section">
    <h3 class="section-title">Trainers</h3>
    <div class="section-content">
    <p id="message">
            <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
            ?>
        </p>
    <table id="trainers">
      <tr>
        <th>Full Name</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
        $result = getTrainers();
        while ($trainer = mysqli_fetch_assoc($result)) {
            $trainer_id = $trainer['trainer_id'];           
            echo "<td>" . $trainer['trainer_firstname'] . ' ' . $trainer['trainer_lastname'] . " </td>";
            echo "<td>" . $trainer['telephone'] . "</td>";
            echo "<td>" . $trainer['email'] . "</td>";
            echo "<td>" . $trainer['password'] . "</td>";
            echo "<td><a href='u-modifytrainer.php?tid=$trainer_id'>Edit</a></td>";
            echo "<td><a href='u-deletetrainer.php?tid=$trainer_id'>Delete</a></td>";
            echo "</tr>";
        }
      ?>
    </table>
    <h5><a class="section-btn" href="u-addtrainer.php">Add Trainer</a></h5>
    </div>    
  </section>
  </div>
</main>

<?php include "inc/footer.php"; ?>