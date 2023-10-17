<?php include "inc/u-header.php"; ?>
<main class="container">
 <div class="container-overlay">
  <section class="section">
    <div class="section-content">
      <form method="post">
        <fieldset>
          <input type="radio" name="filter" value="p.payment_date" checked>
          <label for="all">Payment Date | </label>
          <input type="radio" name="filter" value="m.joining_date">
          <label for="all">Joining Date</label>
        </fieldset>
        <fieldset>
          <label for="from">From</label>
          <input type="date" name="from" id="from">
          <label for="to">To</label>
          <input type="date" name="to" id="to">
        </fieldset>
        <input type="submit" class="btn-filtro" name="submit" value="FILTER">
      </form>
    </div>
    <div class="section-content">
    <table id="payments">
      <tr>
        <th>Member Fullname</th>
        <th>Payment Date</th>
        <th>Joining Date</th>
        <th>Amount</th>
      </tr>
      <?php
        if(isset($_POST['submit'])){
          if(isset($_POST['filter'])&empty($_POST['from'])&empty($_POST['to'])){
            if($_POST['filter']=='joining_date'){
              $result = getPaymentsAll('m.joining_date');
            }else{
              $result = getPaymentsAll('p.payment_date');
            }
          }else{
            if(isset($_POST['filter'])){
              $date=$_POST['filter'];
            }else{
              $date='p.payment_date';
            }
            $result = getPayments($date,$_POST['from'],$_POST['to']);
          }
        }else {
          $result = getPaymentsAll('p.payment_date');
        }
        while ($payment = mysqli_fetch_assoc($result)) { 
          echo "<td>" . $payment['member_firstname'] . ' ' . $payment['member_lastname'] . " </td>";
          echo "<td>" . date('Y-m-d', strtotime($payment['payment_date'])) . "</td>";
          echo "<td>" . date('Y-m-d', strtotime($payment['joining_date'])) . "</td>";
          echo "<td>" . $payment['amount'] . "&euro;" . "</td>";
          echo "</tr>";
        }
        ?>
    </table>
    </div>
  </section>
  </div>
</main>

<?php include "inc/footer.php"; ?>