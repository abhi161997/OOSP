<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Product Search</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
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

  <div class="container">
   <br/>
   <h2 align="center">Search Your Product Here</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
 </body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>