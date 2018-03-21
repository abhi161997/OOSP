<?php

if(isset($_POST["submit"]))
{
$p_name = $_POST["p_name"];
$p_code = $_POST["p_code"];
$p_desc = $_POST["p_desc"];
$p_rate = $_POST["p_rate"];

$conn = mysqli_connect("localhost","root","","oosd");
if($conn)
{
    $sql = "insert into product(p_name,p_code,p_desc,p_rating) values('".$p_name."','".$p_code."','".$p_desc."','".$p_rate."')";
    if($run = mysqli_query($conn, $sql));
       {
        echo "<script>alert('Registered Successfully')</script>";
       }
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
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
     	<h1 id="h"><b>ADD Product</b></h1>
     	<form name="insert_product" method="post" action="" enctype="multipart/form-data">
            <table width="95%" height="500px" align="center" cellpadding="5" cellspacing="5" border="1px">
               <tr>
                  <td><b>Product Name</b></td>
                  <td><input type ="text" name="p_name" placeholder="Product Name" pattern="[A-Za-z0-9(). ]{1,100}" title="User name should contain only alphabet and numbers"></td>  
               </tr>
                <tr>
                <td><b>Product code</b></td>
                <td><input type="text" name="p_code" placeholder="Pcode">
                </td>
                </tr>
                <tr>
                <td><b>Product Description</b></td>
                <td><input type="text" name="p_desc" placeholder="Product Description">
                </td>
                </tr>
                <tr>
                <td><b>Product Rating(0-10)</b></td>
                <td><input type="number" name="p_rate" placeholder="Product Rating" max="10" min="0">
                </td>
                </tr>
                <tr>
                <td><b>Confirm</b></td>
                <td><input type="submit" name="submit" value="ADD PRODUCT">
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