<?php
   session_start();
    include "../db_con.php";
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $start = $time;
if(isset($_GET['search']))
    {
        $mainContent ='';
        $search = $_GET['search'];
        if (empty($search)) 
        { 
            $warning="its empty"; 
                echo "
                 <div  class='alert alert-danger'  role='alert'>
                 <strong>Oh snap!</strong> ".$warning.".
                 </div>
                 "; 
        }
       else
       {
            $sql = "SELECT name, age, picture FROM users WHERE name LIKE '%".$search."%'"; 
            $result=mysqli_query($link,$sql);  
            $totalItems = mysqli_num_rows($result);

            if($totalItems < 1)
            {
                $warning = "Can't find ".$search;
                echo "
                <div  class='alert alert-danger'  role='alert'>
                <strong>Oh snap!</strong> ".$warning.".
                </div>
                ";
                die;
            }
            else 
            {   
                echo "
                <div  class='alert alert-success'>
                Found <strong>".$totalItems."</strong> Results.
                </div>
                           ";
            } 
            if ($result) 
                {  
                    if(isset($_GET['page']))
                    {
                        $page = $_GET['page'];
                    }
                    else
                    {
                        ?><input type="hidden"  name="page"><?php
                        $page=0;
                    }

                    $perPage = 12;
                    $pages=ceil($totalItems / $perPage);
                    $starts = (($page) * $perPage);
                    $sql .= " LIMIT $starts,$perPage";
                    echo '<div>';
                for($number=1;$number<=$pages;$number++)
                    {
                        if($number == $pages)
                            {    
                                $numberIndex = $number."</a>";
                            }
                        else
                        {
                            $numberIndex = $number."</a> - ";
                        }
                            echo '<a href=index.php?search='.$search.'&page='.($number-1).'>'.$numberIndex;
                    }
                  ?>  </div> <?php
                $result=mysqli_query($link,$sql);  
                while ($obj=mysqli_fetch_object($result))
                {                
                        echo '
                        <div class="col-md-2">
                        <a href="#" class="thumbnail">
                        <img src="http://placehold.it/350x200" alt="ALT NAME">
                        <div class="caption">
                        <h3>'.$obj->name.'</h3>
                        <p>
                            <button href="http://artsnaplesworldfestival.tix.com/" class="btn btn-primary" target="_top">Launch</button>
                            <button  href="http://artsnaplesworldfestival.tix.com/" class="btn btn-primary" target="_top">Email</button>
                        </p>
                        </div>
                        </a>
                        </div>
                        ';
                    } 
                }
        }
    }
else 
{
    $mainContent ='Welcome back '.$_SESSION['name'];
}
    //END SEARCH
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
        <head>
        <title>Admin Page</title>
        <!-- JQUERY -->
        <script type="text/javascript" language="javascript" src="../vendor/jquery/jquery.js"></script>
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
<!-- Theme CSS -->
    <link href="../css/agency.css" rel="stylesheet">
        <link href="../style/style.css" rel="stylesheet" type="text/css" media="all"/>

        <script type="text/javascript" language="javascript" src="../style/style.js"></script>
    </head>
 
    <body>

    <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Home </a>
                        <a class="navbar-brand" href="admin-profiles.php">Players</a>
               <!--          <a class="navbar-brand" href="#">Navbar 3</a>
                        <a class="navbar-brand" href="#">Navbar 4</a> -->
                        <a class="navbar-brand pull-right" href="logout.php?destroy"> <span class="glyphicon glyphicon-off"></span> Logout </a>
                        <a class="navbar-brand pull-right"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['name'];?> </a>
                        <form class="navbar-form navbar-left" action="" method="GET">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                            </div>
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                </div>
            </div>
    </div>
    <div id="container">