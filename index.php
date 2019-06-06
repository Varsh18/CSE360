<!DOCTYPE html>
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
    .container{
      text-align: center;
      position:absolute;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
    }
    .text1{
      font-size:30px;
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
    </style>
  </head>
  <body>
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
    
  </div>
  </div>
  </body>
</html>
