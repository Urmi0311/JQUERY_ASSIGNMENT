<?php
if(isset($_POST['txt'])){
    $txt=$_POST['txt'];
    echo $txt;

}
else{
    echo "error: no data received.";
}
?>