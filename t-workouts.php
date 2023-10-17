<?php include "inc/t-header.php"; ?>
  <main class="container">
    <div class="container-overlay">
    <section class="section">
      <h3 class="section-title">WORKOUTS</h3>
      <p id="message">
            <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
            ?>
      </p>
      <table id="workouts">
        <tr>
            <th>Workout Name</th>
            <th>Workout Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        $result = getWorkouts();
        while ($workout = mysqli_fetch_assoc($result)) {
            $workout_id = $workout['workout_id'];   
            echo "<td>" . $workout['workout_name'] . " </td>";
            echo "<td>" . $workout['workout_description'] . "</td>";
            echo "<td><a href='t-modifyworkout.php?wid=$workout_id'>Edit</a></td>";
            echo "<td><a href='t-deleteworkout.php?wid=$workout_id'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
      </table>
      <h5><a class="section-btn" href="t-addworkout.php">Add Workout</a></h5>
    </section>
    </div>
  </main>
  
<?php include "inc/footer.php"; ?>