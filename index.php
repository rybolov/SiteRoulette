<?php
//SiteRoulette main script
//Michael Smith rybolov@ryzhe.ath.cx
// http://www.guerilla-ciso.com

//require 'config.php';
if (!@include 'config.php') {
    die('Config not found.  Please read INSTALL.' . mysql_error());
}

$con = mysql_connect($db_host ,$db_user, $db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);


$querystring = "SELECT url FROM qr_redirect_links";


//use ?shizzle=NN to look at a specific url.
if ($_GET['shizzle'])
  {
    $shizzle = $_GET['shizzle'];
    //exit("Shizzle is $shizzle");
      if(preg_match("/^[0-9]{1,5}$/", $shizzle)) 
      {
        $querystring .= " WHERE id='$shizzle'";
        //exit("query:$querystring");
      }
      else
      {
        exit("Whatchu talkin' bout, Willis?");
      } 
  }
  else
  {
    $querystring .= " WHERE active='y'";

    //device-specific urls
    if (preg_match("/Android/", $_SERVER['HTTP_USER_AGENT']))
    {
      $querystring .= " AND android='y'";
      //exit("query:$querystring");
    }
    elseif (preg_match("/iPhone/", $_SERVER['HTTP_USER_AGENT']))
    {
      $querystring .= " AND iphone='y'";
      //exit("query:$querystring");
    }
    else 
    {
      $querystring .= " AND mobileonly='n'";
    }
  }


$querystring .= " ORDER BY Rand()*(1/Weight) LIMIT 1;";

//exit("query:$querystring");

$result = mysql_query($querystring);

while($row = mysql_fetch_array($result))
  {
  $newurl = $row['url'];
  header( "Location: $newurl" ) ;
  }

mysql_close($con);
?> 
