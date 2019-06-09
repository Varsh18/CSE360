<?php
$db=mysqli_connect("localhost","root","","CSE360");
$column=array(10);
$itr=0;
if(isset($_COOKIE["info"]))
$content=$_COOKIE["info"];
$sql="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='CSE360' AND `TABLE_NAME`='".$content."'";
$result=mysqli_query($db,$sql);
$selectsql="SELECT * from ".$content;
$selectresult=mysqli_query($db,$selectsql);
while($row=mysqli_fetch_assoc($result))
$column[$itr++]=$row['COLUMN_NAME'];
$insert="INSERT INTO ".$content." (";
for($c=0;$c<count($column);$c++)
{
if($c == count($column)-1)
$insert=$insert.$column[$c].") VALUES (";
else
$insert=$insert.$column[$c].",";
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
$r = sizeof($_POST)/$itr;
for($c=0;$c<$r;$c++){
$ins=$insert;
for($c1=0;$c1<$itr;$c1++){
if($column[$c1]=="image"){
  $img=$_FILES["image$c"]['name'];
  $target=$content."/".$img;
  move_uploaded_file($_FILES["image$c"]['tmp_name'],$target);
  if($c1==$itr-1)
  $ins=$ins."'".$img."'".")";
  else
  $ins=$ins."'".$img."'".",";
}
else{
if($c1==$itr-1)
$ins=$ins."'".$_POST["$column[$c1]$c"]."'".")";
else
$ins=$ins."'".$_POST["$column[$c1]$c"]."'".",";
}
}
if( mysqli_query($db,$ins)){}
header("refresh: 1");

}
}
?>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
table {
  width: 100%;
  border-collapse:collapse;
}
body{
  margin-left:10em;
  margin-right:10em;
}
input[type="text"]{
width:100%;
}
th {
  height: 50px;
}
th,td{
width:10%;
}
</style>
</head>
<body>

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
<input type="button" name="add" id="add" value="Wnna add more??"/>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
<table id="insert">
<tbody>
</tbody>
</table>
<input type="submit" value="add"/>
</form>
<script>
var column= <?php echo json_encode($column)?>;
var clen=new Array(column.length);
for(var i=0;i<column.length;i++)
clen[i]=0;
document.getElementById("add").addEventListener("click",function(){
        var rowCnt = insert.rows.length;
        var tr = insert.insertRow(rowCnt);
        tr = insert.insertRow(rowCnt);
        var td = document.createElement('td');

         for(var c=0;c<column.length;c++){
                td = tr.insertCell(c);
                  var ele = document.createElement('input');
                if(column[c] == 'image'){
                ele.setAttribute('type', 'file');
                ele.setAttribute('name', column[c]+clen[c]);
                }
                else{
                ele.setAttribute('type', 'text');
                ele.setAttribute('name', column[c]+clen[c]);
                }
                clen[c]++;
                td.appendChild(ele);
       }
});
</script>

</body>
</html>
