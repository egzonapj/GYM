<?php include "inc/t-header.php"; ?>
  <main class="container">
    <div class="container-overlay">
    <section class="section">
      <h3 class="section-title">Workout Plan</h3>
      <div class="section-content">
        <p id="message">
            <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
            ?>
        </p>
      <?php
      if(isset($_GET['mid'])){
        $member_id=$_GET['mid'];
        $member=getMemberId($member_id);
        $member_firstname=$member['member_firstname'];
        $member_lastname=$member['member_lastname'];
        $joining_date=$member['joining_date'];
        $end_of_membership=$member['end_of_membership'];
        $workoutplan=getWorkoutPlan($member_id);
        echo "<h3>" . "Full Name:  " . $member_firstname . ' ' . $member_lastname . "</h3>";
        echo "<h5>" . "Joining Date:  " . $joining_date . "</h5>";
        echo "<h5>" . "End of Membership:  " . $end_of_membership . "</h5>";
        echo "<table>";
        echo "<tr>";
        echo "<th>" . "Workout Date" . "</th>";
        echo "<th>" . "Start Time" . "</th>";
        echo "<th>" . "End Time" . "</th>";
        echo "<th>" . "Workout Name" . "</th>";
        echo "<th>" . "Workout Description" . "</th>";
        echo "<th>" . "Modify" . "</th>";
        echo "<th>" . "Delete" . "</th>";
        echo "</tr>";
        while ($plan = mysqli_fetch_assoc($workoutplan)) { 
          $workout_date=$plan['workout_date']; 
          echo "<tr>";  
          echo "<td>" . $workout_date . " </td>";
          echo "<td>" . $plan['start_time'] . " </td>";
          echo "<td>" . $plan['end_time'] . " </td>";
          echo "<td>" . $plan['workout_name'] . " </td>";
          echo "<td>" . $plan['workout_description'] . "</td>";
          echo "<td><a href='t-modifyplan.php?mid=$member_id&date=$workout_date'>Modify</a></td>";
          echo "<td><a href='t-deleteplan.php?mid=$member_id&date=$workout_date'>Delete</a></td>";
          echo "</tr>";
        } 
        echo "</table>";  
        echo "<h5 class='margin'><a class='section-btn' href='t-addplan.php?mid=$member_id'>" . "Add Workout" . "</a></h5>";
        echo "<h5><a class='section-btn' href='t-workoutplan.php'>Back</a></h5>";
      }
      if(isset($_GET['date'])){
        $workoutplan=getPlanDate($_SESSION['member']['trainer_id'],$_GET['date']);
        echo "<table>";
        echo "<tr>";
        echo "<th>" . "Full Name" . "</th>";
        echo "<th>" . "Workout Date" . "</th>";
        echo "<th>" . "Start Time" . "</th>";
        echo "<th>" . "End Time" . "</th>";
        echo "<th>" . "Workout Name" . "</th>";
        echo "<th>" . "Workout Description" . "</th>";
        echo "<th>" . "Modify" . "</th>";
        echo "<th>" . "Delete" . "</th>";
        echo "</tr>";
        while ($plan = mysqli_fetch_assoc($workoutplan)){
          $member_id=$plan['member_id'];
          $workout_date=$plan['workout_date'];
          echo "<td>" . $plan['member_firstname'] . " " . $plan['member_lastname'] . " </td>";
          echo "<td>" . $plan['workout_date'] . " </td>";
          echo "<td>" . $plan['start_time'] . " </td>";
          echo "<td>" . $plan['end_time'] . " </td>";
          echo "<td>" . $plan['workout_name'] . " </td>";
          echo "<td>" . $plan['workout_description'] . "</td>";
          echo "<td><a href='t-modifyplan.php?mid=$member_id&date=$workout_date'>Modify</a></td>";
          echo "<td><a href='t-deleteplan.php?mid=$member_id&date=$workout_date'>Delete</a></td>";
          echo "</tr>";
        }
        echo "</table>";
        echo "<h5><a class='section-btn' href='t-workoutplan.php'>Back</a></h5>";
      }
      ?>
      </div>
    </section>
    </div>
  </main>
  
<?php include "inc/footer.php"; ?>