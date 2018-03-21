<?php

if(isset($_POST["submit"]))
{
$name = $_POST["u_name"];
$add = $_POST["u_add"];
$email = $_POST["u_email"];
$mob = $_POST["u_mobile"];
$pass = $_POST["pass"];

$conn = mysqli_connect("localhost","root","","oosd");
if($conn)
{
    $sql = "insert into user(u_name,u_address,u_email,u_mob_no,password) values('".$name."','".$add."','".$email."','".$mob."','".$pass."')";
    
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
	<title>Add User</title>
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
     	<h1 id="h"><b>ADD User</b></h1>
     	<form name="insert_product" method="post" action="" enctype="multipart/form-data">
            <table width="95%" height="500px" align="center" cellpadding="5" cellspacing="5" border="1px">
               <tr>
                  <td><b>User Name</b></td>
                  <td><input type = "text" name="u_name" placeholder="User Name" pattern="[A-Za-z0-9 ]{1,100}" title="User name should contain only alphabet and numbers"></td>  
               </tr>
               
                <tr>
                <td><b>User Address</b></td>
                <td><input type="text" name="u_add" placeholder="Address">
                </td>
                </tr>
                <tr>
                <td><b>Email Id</b></td>
                <td><input type="email" name="u_email" placeholder="Email">
                </td>
                </tr>
                <tr>
                <td><b>Mobile No</b></td>
                <td><input type="text" name="u_mobile" placeholder="Mobile_No" maxlength="1020">
                </td>
                </tr>
                 <tr>
                <td><b>Password</b></td>
                <td><input type="password" name="pass" placeholder="Password" maxlength="1020">
                </td>
                </tr>
                <tr>
                <td><b>Confirm</b></td>
                <td><input type="submit" name="submit" value="ADD USER">
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