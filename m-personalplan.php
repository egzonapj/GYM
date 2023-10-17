<?php include "inc/m-header.php"; ?>
  <main main class="container">
    <div class="container-overlay">
    <section class="section">
      <h3 class="section-title">Personal Plan</h3>
      <?php
        if (isset($_SESSION['member'])){
          $member_id=$_SESSION['member']['member_id'];
          $membership=getMembershipType($member_id);
          $type=$membership['membership_type'];
          if($type=='plan'){
            echo "<table>";
            echo "<tr>";
            echo "<th>Workout Date</th>";
            echo "<th>Start Time</th>";
            echo "<th>End Time</th>";
            echo "<th>Workout Name</th>";
            echo "<th>Workout Description</th>";
            echo "</tr>";
            $workoutplan=getWorkoutPlan($member_id);
            while ($plan = mysqli_fetch_assoc($workoutplan)) {  
            echo "<td>" . $plan['workout_date'] . " </td>";
            echo "<td>" . $plan['start_time'] . " </td>";
            echo "<td>" . $plan['end_time'] . " </td>";
            echo "<td>" . $plan['workout_name'] . " </td>";
            echo "<td>" . $plan['workout_description'] . "</td>";
            echo "</tr>";
          }      
          echo "</table>";
        }else{
          echo "<div class='section-content'>";
          echo "<h5>You don't have a packet of personal plan!</h5>";
          echo "</div>";
        }
      }
      ?>
    </section>
    </div>
  </main>
  
<?php include "inc/footer.php"; ?>