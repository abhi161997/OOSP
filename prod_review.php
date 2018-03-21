<?php
$conn = mysqli_connect("localhost","root","","oosd");
if(isset($_POST["submit"]))
{
    $p_id = $_POST["p_name"]; 
    $review = $_POST["review"];
    if($conn)
        {
            $sql = "insert into p_review(review,p_id) values('".$review."','".$p_id."')";
            if($run = mysqli_query($conn, $sql))
                {
                    exec('python senti.py');
                    // echo "<script>alert('inserted Successfully')</script>";
                    $av_sql = "select avg(rating),p_id from p_review group by p_id";
                    if($run2 = mysqli_query($conn, $av_sql))
                        { 
                            $row2 = mysqli_fetch_array($run2);
                            $sql2 = "update product set p_rating =".$row2["avg(rating)"]." where p_id=".$row2["p_id"];

                            if($run3 = mysqli_query($conn, $sql2))
                                {
                                    echo "<script>alert('rating updated Successfully')</script>";
                                }
                            else
                                {
                                    echo "<script>alert('error updating rating')</script>";
                                }
                        }
                    else
                        {
                            echo "<script>alert('error selecting product code')</script>";
                        }        
                }
            else
                {
                    echo "<script>alert('error inserting product review')</script>";
                }  

        }
        else
        {
            echo "<script>alert('Database Connection error')</script>";
        }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Review</title>
    <style type="text/css">
     *{
       margin:0px;
       padding:0px;
     }
     .top_bar{
          width: 100%;
          height:60px;
          background-color:#8A0651; 
     }
     .top_side_left{
         margin-left: 10%;
         color:#FFFFFF;
         padding-top: 18px;
         float: left;
     }
      .top_mid_side_left{
         margin-left: 10%;
         color:#FFFFFF;
         padding-top: 8px;
         float: left;
     }
     .top_side_right{
     	margin-right: 10%;
     	color:#FFFFFF;
     	padding-top: 18px;
     	float: right;
     }
     .top_mid_side_right{
         margin-right: 10%;
         color:#FFFFFF;
         padding-top: 8px;
         float: right;
     }
     #offer{
     	border: 1px solid #FFFFFF;
     	width: 200px;
     	text-align: center;
     }
     #a1{
         color:#FFFFFF;
         font-size: 16px;
         transition: 1s;
     }
     #a1:hover{
          background-color: #FFFFFF;
          color: #8A0651;
     }
     .top_ul{
     	    list-style-type: none;
     }
     .li_top{
         display:inline-block;
         color:#FFFFFF;
     }
     .a11{
          text-decoration: none;
     	  color: #ffffff;
     }
     .s_bar{
     	  width: 100%;
          height: 40px;
          background-color:#424242; 
     }
     .top_ul_1{
     	    list-style-type: none;
     	    margin: 0px;
     }
     .prod_ins{
     	margin-left:20%;
     	margin-right:20%;
     	padding-top: 30px;
     }
     #h{
     	margin-bottom:10px; 
     }
     td{
     	padding-left: 10px;
     }
     .footer{
       	margin-top: 30px;
       	 width:100%;
       	 background-color:#434343;
         height:200px;
       }
       .bottom{
       	width:100%;
       	background-color:#000000;
       	height:50px;
       }
       .form-textbox{
        height: 25px !important;
        width:220px !important;
       }
     </style>
</head>
<body>
       <section class="top_bar">
            <div class="top_side_left">
              <p id="offer"><a href="#" id="a1">Get flat 35% off on order 50$</a></p>
            </div>
            <div class="top_side_right">
                 <ul class="top_ul">
                    <li class="li_top"><a href="searchproduct.php" class='a11'>Search Product</a> |</li>
                    <li class="li_top"><a href="user_reg.php" class='a11'>Register</a> |</li>
                    <li class="li_top"><a href="#" class='a11'>Review Product</a> |</li>
                    <li class="li_top"><a href="#" class='a11'>About Us!</a> </li>
                 </ul>
            </div>
     </section>
     <section class="s_bar">
          <div class="top_mid_side_left">
                 <ul class="top_ul_1">
                    <li class="li_top"><a href="searchproduct.php" class='a11'><b>VIT-MART</b></a> |</li>
                    <li class="li_top"><a href="searchproduct.php" class='a11'>Home</a> |</li>
                    <li class="li_top"><a href="user_reg.php" class='a11'>User Registration</a> |</li>
                    <li class="li_top"><a href="product_reg.php" class='a11'>Register Product</a> |</li>
                    <li class="li_top"><a href="prod_review.php" class='a11'>Product Review</a> </li>
                 </ul>
            </div>
            <div class="top_mid_side_right">
                    <form>
                    <table>
                    <tr>
                    <td><input type="text" placeholder="Search..."></input></td> 
                    <td><input type="submit" value="OK!"></input></td> 
                    </tr>
                    </table>
                    </form>
                 </ul>
            </div>
     </section>

     <section class="prod_ins">
     	<h1 id="h"><b>Product Review</b></h1>
     	<form name="insert_product" method="post" action="" enctype="multipart/form-data">
            <table width="95%" height="500px" align="center" cellpadding="5" cellspacing="5" border="1px">
               <tr>
                  <td><b>Product Name</b></td>
                  <td>
                  <select name="p_name">
                    <?php
                    $sql = "select p_name, p_id from product";
                    $run = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($run))
                    {
                     echo "<option value='".$row["p_id"]."'>".$row["p_name"]."</option>";

                    }
                    ?>
                  </select> 
                  </td>
               </tr>
               
                <tr>
                <td><b>Product Review</b></td>
                <td><!--<input type="textarea" name="review" placeholder="review" width="200" height="200"> -->
                    <textarea name="review" width="200" height="200"></textarea>
                </td>
                </tr>
                <tr>
                
                <tr>
                <td><b>Confirm</b></td>
                <td><input type="submit" name="submit" value="ADD REVIEW">
                </td>
                </tr>
            </table>
     	</form>
     </section>
     <section class="footer">
     </section>
     <section class="bottom">
     	
     </section>
</body>
</html>