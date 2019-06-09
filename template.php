<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contents</title>
    <style>
    .content{
        width:80%;
      }
    .image{
      width:20%;
    }
    .display{
      display: flex;
      flex-wrap: wrap;
      margin-left: 30%;
    }
    p{
      word-wrap: break-word;
      width: 50%;
    }
    }
    </style>
  </head>
  <body>

    <?php
    $content=rtrim(basename($_SERVER["PHP_SELF"]),"php");
    $content=rtrim($content,".");
    $db=mysqli_connect("localhost","root","","CSE360");


    $itr=0;
    $column=array(30);
    $sql="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='CSE360' AND `TABLE_NAME`='".$content."'";
    $result=mysqli_query($db,$sql);
    $selectsql="SELECT * from ".$content;
    $selectresult=mysqli_query($db,$selectsql);
    while($row=mysqli_fetch_assoc($result)){
    $column[$itr++]=$row['COLUMN_NAME'];
    }


    while($row=mysqli_fetch_array($selectresult)){
      echo '<div class="display">';

      if(in_array("image",$column,TRUE)){
      echo '<div class="image">';
      echo '<img src="'.$content.'/'.$row["image"].'" width="200" height="150" alt="'.$row["image"].'" />';
      echo '</div>';
      }
      echo '<div class="content">';
      if(in_array("name",$column,TRUE))
      echo '<ul><li><span class="name">'.$row["name"].'</span><br/></li></ul>';
    for($itr=0;$itr<count($column);$itr++){
    if($column[$itr]=="image" || $column[$itr]=="url" || $column[$itr]=="name")
    continue;
    else
    echo '<p class="desc">'.$row[$itr].'</p><br/>';
    }
    if(in_array("url",$column,TRUE))
    echo '<a href="'.$row["url"].'">Click Here</a><br/>';
    echo '</div></div>';
    }
    ?>
  </body>
</html>
