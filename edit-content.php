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
    img{
      width:200px;
      height:150px;
    }
    </style>
  </head>
  <body>
    <div id="content-box">
        <div class="box">
            <div class="picture">
                <a href="#"><img src="images/add_new.png" alt="add new"/></a>
            </div>
            <div class="desc">
                <a href="#"><span> Add new </span></a>
            </div>
        </div>
    </div>
    <div id="add-content">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" enctype="multipart/form-data">
          <div id="insert-image">
          <input type="text" name="name" placeholder="Enter the content name"/>
          </div>
          <div id="insert-image">
              <input type="file" name="file" accept="image/gif, image/jpeg" />
          </div>
          <div id="form-submit">
              <input type="submit" name="submit" value="Create"/>
          </div>
      </form>
    </div>
  </body>
</html>
