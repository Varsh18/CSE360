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
  </div>
  </div>
  </body>
</html>
