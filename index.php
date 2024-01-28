<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>
<?php
include("header.php");
?>
<?php
// database connection
try{
$con = new PDO("mysql:host=localhost; dbname=test2022", 'test2022', 'test2022');
} catch(PDOExection $e) {
echo $e->getMessage();
}
// define daterange
$dateCond = '';
if (!empty($_GET['from']) && !empty($_GET['to'])) {
$dateCond = "DATE(trn_date) >= '{$_GET['from']}' AND DATE(trn_date) <= '{$_GET['to']}'";
}
// define product filter
$product = '';
if (!empty($_GET['product'])) {
$product = "product='{$_GET['product']}'";
}
$city = '';
if (!empty($_GET['city'])) {
$city = "city='{$_GET['city']}'";
}
// search query
$sql = "SELECT city as city, farm_name as farm_name, salesdate as salesdate, rate as rate, product as product,
sum(amount) as amount,
sum(totaltaka) as totaltaka FROM sales WHERE farm_name = '{$_SESSION["username"]}' AND {$dateCond} AND {$product}  AND {$city} OR usertype = '{$_SESSION["usertype"]}' AND {$dateCond} AND {$product} AND {$city} GROUP BY city, farm_name, salesdate, rate, product order by product, salesdate asc";
$stmt = $con->prepare($sql);
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 </head>
 <body>
  <div align="center" class="container mt-5">
   <h5 align="center">Product Sales Summary Report by Sales Date & Product Filter</h5><br>
   <h6 align="center">Search Date Range within: (1 Jan 2021 to 31 Dec 2021/current date)</h6><br>
   <form class="myForm" method="get" enctype="application/x-www-form-urlencoded" action="index.php">
    <div class="form-row" align="left">
     <div class="form-group col-md-3">
      <label>From Date:</label>
      <input type="date" class="datepicker btn-block"  name="from" id="fromDate" Placeholder="Select From Date" value="<?php echo isset($_GET['from']) ? $_GET['from'] : '' ?>">
     </div>
     <div class="form-group col-md-3">
      <label>To Date:  </label>
      <input type="date" name="to" id="toDate" class="datepicker btn-block"  Placeholder="Select To Date" value="<?php echo isset($_GET['to']) ? $_GET['to'] : '' ?>">
     </div>
     <div class="form-group col-md-3">
      <label>Product:  </label>
      <select class="custom-select" name="product" id="product" required>
       <option value="">--Select Product--</option>
       <option value="Milk">Milk</option>
       <option value="Egg">Egg</option>
      </select>
     </div>
     <div class="form-group col-md-3">
      <label>City (value from other table)</label>
      <?php
      $con = mysqli_connect("localhost", "test2022", "test2022", "test2022");
      $city_name = '';
      $query = "SELECT city_name FROM city GROUP BY city_name ORDER BY city_name ASC";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_array($result))
      {
      $city_name .= '<option value="'.$row["city_name"].'">'.$row["city_name"].'</option>';
      }
      ?>
      <select name="city" id="city_name" class="custom-select" required>
       <option value="">--Select City--</option>
       <?php echo $city_name; ?>
      </select>
     </div>
    </div>
    <div class="form-row" align="left">
     <div class="form-group col-md-3 offset-md-6">
      <a href="index.php" class="btn btn-danger btn-block"><i class="fa fa-refresh"></i> Reset</a></span>
     </div>
     <div class="form-group col-md-3">
      <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Submit</button>
     </div>
    </div>
   </form>
   <br>
   <style type="text/css">
   @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}</style>
   <div class="tg-wrap">
    <table id="table" class="display" cellspacing="0" style="width:100%">
     <thead style="font: bold; active" align="center">
      <tr>
       <td>Id</td>
       <td align= center>City Name</td>
       <td align= center>Farm Name</td>
       <td align= center>Product</td>
       <td align= center>Sales Date</td>
       <td align= center>Rate</td>
       <td align= center>Sales Qty/Ltr</td>
       <td align= center>Total (USD)</td>
      </tr>
     </thead>
     <tbody>
      <?php
      $total = [
      'total' => 0,
      'amount' => 0,
      'totaltaka' => 0,
      ];
      foreach ($arr as $index => $unit) {
      $total = [
      'amount' => $total['amount'] + $unit['amount'],
      'totaltaka' => $total['totaltaka'] + $unit['totaltaka'],
      ];
      echo '<tr>';
       echo '<td align= center>' . ($index + 1) . '</td>';
        echo '<td align= center>' . $unit['city'] . '</td>';
       echo '<td align= center>' . $unit['farm_name'] . '</td>';
       echo '<td align= center>' . $unit['product'] . '</td>';
       echo '<td align= center>' . $unit['salesdate'] . '</td>';
       echo '<td align= center>' . $unit['rate'] . '</td>';
       echo '<td align= center>' . $unit['amount'] . '</td>';
       echo '<td align= center>' . $unit['totaltaka'] . '</td>';
      echo '</tr>';
      }
      echo '<tr align= center>';
       echo '<th colspan="6" style="text-align: right;">Total</th>';
       echo '<td ><b>' . $total['amount'] . '</b></td>';
       echo '<td ><b>' . $total['totaltaka'] . '</b></td>';
      echo '</tr>';
      ?>
     </tbody>
    </table>
   </div>
   <!-- </div> -->
   <br>
   <br><br>
   <script type="text/javascript">
   $(document).ready(function() {
   $('#table').dataTable();
   } );
   </script>
  </body>
 </html>