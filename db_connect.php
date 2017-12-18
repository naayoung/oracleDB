<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$conn = oci_connect("B489059","B489059","203.249.87.162:1521/orcl");
    
if(!$conn){
	echo "Oricale Connect Error";
    exit();
}

?>
