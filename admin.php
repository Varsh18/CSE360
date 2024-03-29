<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Console</title>
    <style>
    img{
      width:200px;
      height:150px;
    }
    #container{
      width:100%;
      display:flex;
      flex-wrap: wrap;
    }
    .box{
      border:0.5em solid black;
      margin-left: 3em;
      margin-top:  2em;
      padding: 1.5em;
      text-align: center;
    }
    .desc{
      padding-top: 1.5em;
      display:inline-block;
    }
    a{
      text-decoration: none;
      font-size: 2em;
    }
    </style>
  </head>
  <body>
 <div id="container">
      <div class="box">
            <div class="picture">
                  <a href="#"><img src="images/user.png" alt="user-icon"/></a>
            </div>
            <div class="desc">
                  <a href="#"><span>User List</span></a>
            </div>
      </div>
      <div class="box">
            <div class="picture">
                  <a href="edit-content.php"><img src="images/settings.png" alt="settings-icon"/></a>
            </div>
            <div class="desc">
                  <a href="edit-content.php"><span>Website Settings</span></a>
            </div>
      </div>
 </div>
  </body>
</html>
