<?php include "inc/u-header.php"; ?>
<main class="container">
  <div class="container-overlay">
  <section class="section">
    <h3  class="section-title">Membership Types</h3>
    <div class="section-content">
      <p id="message">
          <?php
              if(isset($_SESSION['message'])){
                  echo $_SESSION['message'];
              }
          ?>
      </p>
    <table id="memberships">
      <tr>
        <th>Name</th>
        <th>Description</th>            
        <th>Period</th>
        <th>Fee</th>            
        <th>Type</th>            
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
      $result = getMemberships();
      while ($membership = mysqli_fetch_assoc($result)) {
        $type_id = $membership['type_id'];
        echo "<td>" . $membership['type_name'] . " </td>";
        echo "<td>" . $membership['type_description'] . "</td>";
        echo "<td>" . $membership['membership_period'] . "</td>";
        echo "<td>" . $membership['membership_fee'] . "&euro;" . "</td>";
        echo "<td>" . $membership['membership_type'] . "</td>";
        echo "<td><a href='u-modifymemberships.php?mtid=$type_id'>Edit<a></td>";
        echo "<td><a href='u-deletememberships.php?mtid=$type_id'>Delete<a></td>";
        echo "</tr>";
      }
      ?>
    </table>
    <h5><a class='section-btn' href="u-addmembership.php">Add Membership</a></h5>
    </div>
  </section>
  </div>
</main>

<?php include "inc/footer.php"; ?>