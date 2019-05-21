<?php
if($_POST){
    $html = 0;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['text'];

//send email
    mail("moriarty@abhisaran.tk", "51 Deep comment from" .$email, $message);
    return html=1
}
?>