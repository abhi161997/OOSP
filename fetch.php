<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "oosd");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $sql = "SELECT * FROM product WHERE p_name LIKE '%".$search."%' OR p_code LIKE '%".$search."%' order by p_rating desc";

$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>SL No</th>
     <th>Product Name</th>
     <th>Product Code</th>
     <th>Product Description</th>
     <th>Product Rating</th>
     <th>Amazon Price</th>
     <th>Flipkart Price</th>
     <th>Snapdeal Price</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["p_id"].'</td>
    <td>'.$row["p_name"].'</td>
    <td>'.$row["p_code"].'</td>
    <td>'.$row["p_desc"].'</td>
    <td>'.$row["p_rating"].'</td>
    <td>'.$row["amazon_price"].'</td>
    <td>'.$row["flipkart_price"].'</td>
    <td>'.$row["snapdeal_price"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
}
?>

