<?php
$db=mysqli_connect("localhost","root","","cse360") or die("cannot connect");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Our Contents</title>
    <style>
    #content-box{
      width:100%;
      display:flex;
      flex-wrap: wrap;
    }
    .box{
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
    .close img{
      width: 30px;
      height: 30px;
      float: right;
      cursor: pointer;
    }
    .close{
      height: 50px;
    }
    img{
      width:200px;
      height:150px;
    }
    #add-content{
      width:100%;
      height:100%;
      background-color: rgba(0,0,0,0.7);
      position: absolute;
      top:0;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      display: none;
    }
    input[type="text"]{
      width: 25em;
      height: 3em;
    }

    #pop-up{
      width:500px;
      height:300px;
      background-color: white;
      border-radius: 4px;
      text-align: center;
      padding: 20px;
    }
    .pop-inside{
      padding-bottom: 3em;
    }
    </style>
  </head>
  <body>
    <div id="content-box">
        <div class="box">
            <div class="picture add-button">
                <a href="#"><img src="images/add_new.png" alt="add new"/></a>
            </div>
            <div class="desc add-button">
                <a href="#"><span> Add new </span></a>
            </div>
        </div>
    </div>
    <div id="add-content">
      <div id="pop-up">
            <div class="close">
               <img src="images/close.jpg"  alt="close" width="12" height="12"/>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" enctype="multipart/form-data">
                <div id="insert-text" class="pop-inside">
                <input type="text" name="name" placeholder="Enter the content name"/>
                </div>
                <div id="insert-image" class="pop-inside">
                    <input type="file" name="file" accept="image/gif, image/jpeg" />
                </div>
                <div id="form-submit" class="pop-inside">
                    <input type="submit" name="submit" value="Create"/>
                </div>
            </form>
      </div>
    </div>
    <script>
    document.getElementsByClassName('add-button')[0].addEventListener('click',function(){
      document.querySelector('#add-content').style.display="flex";
    });
    document.getElementsByClassName('add-button')[1].addEventListener('click',function(){
      document.querySelector('#add-content').style.display="flex";
    });
    document.getElementsByClassName('close')[0].addEventListener('click',function(){
      document.querySelector('#add-content').style.display="none";
    });
    </script>
  </body>
</html>
