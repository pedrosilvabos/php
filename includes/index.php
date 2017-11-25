<?php  
  include('templates/header.php');
    include "../db_con.php";
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $start = $time;

    if(isset($_SESSION['name']))
    {  
?>   

    <div class="container">
        <br>
            <p> <?php echo $mainContent;?> </p>
        <br>
  
    <?php 
}else{
   
	echo "<script language=\"javascript\">document.location.href='login.php';</script>";

}


include('templates/footer.php');
?>
