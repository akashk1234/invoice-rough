<?php 

$conn=mysqli_connect('localhost','root','','invoice','3306');
 
 function insert($qry){
  $res=mysqli_query($GLOBALS['conn'],$qry);
  return mysqli_insert_id($GLOBALS['conn']);
 }

function select($qry){
$res=mysqli_query($GLOBALS['conn'],$qry);
$result=mysqli_fetch_all($res,MYSQLI_ASSOC);
return $result;
}
function update($q){
mysqli_query($GLOBALS['conn'],$q);
}
function redirect($url){?>
<script type="text/javascript">
window.location="<?php echo $url ?>";
</script>
<?php

}
function alert($msg){
echo "<script> alert('$msg')</script>";
}
function delete($qry){
$res=mysqli_query($GLOBALS['conn'],$qry);
return $res;
}
?>