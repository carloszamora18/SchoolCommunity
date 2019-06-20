<?php

$mykey1=$_REQUEST['key1'];
$mykey2=$_REQUEST['key2'];


include 'connect.php';
mysql_query("delete from files where id = $mykey1");
echo "<script>location.href='downloadfiles.php?page=$mykey2'</script>"

?> 