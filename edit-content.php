<?php
$actual_link = "http://$_SERVER[HTTP_HOST]/CSE360/";
$text=$url=$result='';
$db=mysqli_connect("localhost","root","","cse360") or die("cannot connect");
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST["submit"])){
  $content=$_POST["name"];
  $insertql="CREATE TABLE ".$content."(";
  $count=$_POST["column-size"];
  $colname=array();
  $coltype=array();
  for($itr=0;$itr<$count;$itr++){
  $colname[$itr]=$_POST["cname".$itr];
  $coltype[$itr]=$_POST["ctype".$itr];
  if($coltype[$itr] == "VARCHAR")
  $coltype[$itr]=$coltype[$itr]."(500)";
  else if( $coltype[$itr] == "INT")
  $coltype[$itr]=$coltype[$itr]."(100)";
  if($itr == $count-1)
  $insertql=$insertql.$colname[$itr]." ".$coltype[$itr].")";
  else
  $insertql=$insertql.$colname[$itr]." ".$coltype[$itr].",";
  }
  $file=$_FILES['file']['name'];
  $image=$_FILES['file']['name'];
  $temp = explode(".", $_FILES["file"]["name"]);
  $newfilename = $content . '.' . end($temp);
  $target="contents/".$newfilename;
  $url=$actual_link.$content.'.php';
  if (!file_exists($content.'/')) {
    mkdir($content.'/', 0777, true);
}
  if(move_uploaded_file($_FILES['file']['tmp_name'],$target)){
        $sql="INSERT INTO contents (name,image,img_name,url) VALUES ('$content','$file','$newfilename','$url')";
        if(mysqli_query($db,$sql) && mysqli_query($db,$insertql)){
          $result="Added content";
          $myfile = fopen($content.".php", "w") or die("Unable to open file!");
          copy("index.php",$content.".php");
        }
  }
  else
	echo "error";
}
}
?>
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
    #insert-text input[type="text"]{
      width: 25em;
      height: 3em;
    }
    input[type="text"]{
      width: 15em;
      height: 3em;
      margin-bottom: 0.5em;
    }
    input[type="button"]{
      margin-bottom: 2em;
    }
    input[type="submit"]{
      margin-top: 2em;
    }
    select{
      margin-left: 1em;
    }
    #pop-up{
      width:500px;
      height:300px;
      background-color: white;
      border-radius: 4px;
      text-align: center;
      padding: 20px;
      overflow: auto;
    }
    .pop-inside{
      padding-bottom: 3em;
    }
    </style>
  </head>
  <body>
    <div id="content-box">


      <?php
          $result=mysqli_query($db,"SELECT * from contents order by name ASC");
          while($row=mysqli_fetch_array($result)){
              echo  "<div class='box'>";
              echo  " <div class='picture'>";
              echo  '<a href="'.$row['url'].'"><img src="contents/'.$row['img_name']. '" alt="'.$row['name'].'"/></a>';
              echo  "</div>";
              echo  "<div class='desc'>";
              echo  '<a href="'.$row['url'].'"><span>'.$row['name'].'</span></a>';
              echo  '</div>';
              echo  '</div>';
          }
       ?>

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
               <img src="images/close.jpg" id="close" alt="close" width="12" height="12"/>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" enctype="multipart/form-data">
                <div id="insert-text" class="pop-inside">
                <input type="text" name="name" placeholder="Enter the content name"/>
                </div>
                <div id="insert-image" class="pop-inside">
                    <input type="file" name="file" accept="image/gif, image/jpeg" />
                </div>
                <div class="input-col pop-inside">
                      <input type="text" name="column-size" id="column-size" placeholder="Enter column size"/>
                </div>
                <div class="go" class="input-col pop-inside">
                      <input type="button"id="go" name="column-submit" value="Go" />
                </div>
                <div id="dynamic-input">
                </div>
                <div id="form-submit" class="pop-inside">
                    <input type="submit" name="submit" value="Create"/>
                </div>
            </form>
      </div>
    </div>

    <div>

      <table>
      <thead>
      <tr>
      <?php
      for($itr=0;$itr<count($column);$itr++)
      echo "<th>".$column[$itr]."</th>";
      ?>
      </tr>
      </thead>
      <tbody>
      <?php
      while($row=mysqli_fetch_array($selectresult)){
      echo "<tr>";
      for($itr=0;$itr<count($column);$itr++)
      echo "<td>".$row["$column[$itr]"]."</td>";
      echo "</tr>";
      }
      ?>
      </tbody>
      </table>
    </div>
    <script>
    document.getElementsByClassName('add-button')[0].addEventListener('click',function(){
      document.querySelector('#add-content').style.display="flex";
    });
    document.getElementsByClassName('add-button')[1].addEventListener('click',function(){
      document.querySelector('#add-content').style.display="flex";
    });
    document.getElementById('close').addEventListener('click',function(){
      document.querySelector('#add-content').style.display="none";
    });
    document.getElementById('go').addEventListener('click',function(){
    document.querySelector('#add-content').style.display="flex";
    var length=document.getElementById('column-size').value;
    if(!length)
    alert("Enter a valid length"+length);
    else{
    var tag=document.getElementById('dynamic-input');
    for(var i=0;i<length;i++){
    var text=document.createElement("input");
    text.setAttribute("type","text");
    text.setAttribute("class","cname");
    text.setAttribute("name","cname"+i);
    tag.appendChild(text);

    var array=["VARCHAR","INT","LONGBLOB"];
    var select=document.createElement("SELECT");
    var options= document.createElement("option");
    for(var itr=0;itr<array.length;itr++)
    select.options.add( new Option(array[itr],array[itr]) );
    tag.appendChild(select);
    tag.setAttribute("class","datatype");
    select.setAttribute("name","ctype"+i);
    }
    document.querySelector('#add-content').style.display="flex";

    }
    });
    </script>
  </body>
</html>
