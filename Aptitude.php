<?php
$db=mysqli_connect("localhost","root","","cse360") or die("cannot connect");
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CSE360</title>

    <style>
    *{
      padding: 0;
      margin: 0;
      font-family: sans-serif;
    }
    #background{
      background-image: url('images/laptops-cut.jpg');
      background-size: cover;
      height: 50em;
    }
    #working{
      background-image: url('images/working-woman.jpg');
      background-size:65em 45em;
      background-repeat: no-repeat;
      width:50%;
      height:45em;
    }
    #about{
      width:50%;
      display:inline-block;
    }
    #about-company{
      display:flex;
      flex-wrap:wrap;
      text-align: center;
    }
    .container{
      text-align: center;
      position:absolute;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
    }
    .text1{
      font-size:15px;
      color:#6ab04c;
    }
    .text2{
      color:white;
      font-size: 60px;
      font-weight: 700;
      letter-spacing: 8px;
      margin-bottom: 20px;
      position: relative;
      animation: text 3s 1;
    }
    .container span{
      color:white;
      text-transform: uppercase;
      display: block;
    }

    @keyframes text{
      0%{
        color:black;
        margin-bottom: -40px;
      }
      30%{
        letter-spacing: 25px;
        margin-bottom: -40px;
      }
      85%{
        letter-spacing: 8px;
        margin-bottom: -40px;
      }
    }
    #contact-us{
      display: flex;
      flex-wrap:wrap;
      background-color: #F9F9F9;
      width:100%;
    }
    #fill-form{
      width:40%;
      padding-left: 16%;
      padding-top: 10%;
    }
    #address-info{
      width:20%;
      margin-left:19em;
      padding-top: 10%;
    }
    .text input[type="text"]{
      width:100%;
      height:2.5em;
      margin-top: 1.5em;
      margin-bottom: 1.5em;
    }
    .text textarea{
      width:100%;
      height:7em;
      margin-top: 1.5em;
      margin-bottom: 1.5em;
    }
    .address{
      padding-top: 4%;
      padding-bottom: 4%;
    }
    .address span{
      padding-bottom: 2%;
    }
   .box{
   padding-left: 15%;
   padding-right: 15%;
   display:flex;
   flex-wrap: wrap;
    }
    .content-name{
    font-size:2em;
    }
    .content-image img{
      width:250px;
      height:250px;
      padding-top:2em;
      padding-right:1em;
    }
    </style>
  </head>
  <body>
  <?php include "header.php" ?>
  <div id="background">
    <div class="container">
        <span class="text1">Enjoy with us</span>
        <span class="text2">CSE360</span>
    </div>
  </div>
  <div id="about-company">
  <div id="working">
  </div>
  <div id="about">
      <h3>Welcome to CSE360!<h3>
      <span>Hello There..</span>
      <p> CSE360 provides complete guide about many latest technologies in the field of
        Computer Science and Engineering</p>
  </div>
  </div>
  <div id="content">
  <div id="content-heading">
        <h3>Our contents</h3>
  </div>
  <div class="hr">
  <hr/>
  </div>
  <div class="box">
  <?php
  $sql="SELECT * FROM contents";
  $result=mysqli_query($db,$sql);
  while($row=mysqli_fetch_array($result)){
  echo '<div class="content-list">';
  echo  '<div class="content-image">';
  echo   '<a href="'.$row["url"].'"><img src="contents/'.$row["img_name"].'" alt="'.$row["name"].'"/></a>';
  echo  ' </div>';
  echo   '<div class="content-name">';
  echo " <a href='".$row["url"]."'><span>".$row["name"]."</span></a>";
  echo  '</div>';
  echo "</div>";
  }
  ?>
  </div>
  </div>
  <div id="contact-us">
  <div id="fill-form">
  <div class="text">
    <span>Full Name</span>
    <input type="text" placeholder="Full Name" id="name" name="name"/>
  </div>

  <div class="text">
    <span>Email</span>
    <input type="text" placeholder="Email Address" id="email" name="email"/>
  </div>

  <div class="text">
    <span>Phone</span>
    <input type="text" placeholder="Phone Number #" id="phone" name="phone"/>
  </div>
  <div class="text">
    <span>Message</span>
    <textarea rows="6" cols="20" placeholder="Say Hello to us" id="message" name="message"></textarea>
  </div>
  </div>
  <div id="address-info">
 <h3>Contact Info</h3>
 <div class="address">
   <span>Address</span>
   <p>Velammal Engineering College</p>
   <p>Chennai</p>
 </div>
 <div class="address">
   <span>Phone</span>
   <p>+91 1234567890</p>
 </div>
 <div class="address">
   <span>Email Address</span>
   <p>cse360@gmail.com</p>
 </div>
  </div>
  </div>
  <?php include "footer.php" ?>
  </body>
</html>
