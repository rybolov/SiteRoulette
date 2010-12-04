<?php
//SiteRoulette main script
//Michael Smith rybolov@ryzhe.ath.cx
// http://www.guerilla-ciso.com

//require 'config.php';
if (!@include 'config.php') {
    die('Config not found.  Please read README.');
}

$con = mysql_connect($db_host ,$db_user, $db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);


$querystring = "SELECT url FROM redirect_links";


//See config.php for info and setup.
if ($_GET[$parole])
  {
    $parole_ID = $_GET[$parole];
    //exit("Parole is $parole_ID");
      if(preg_match("/^[0-9]{1,5}$/", $parole_ID)) 
      {
        $querystring .= " WHERE id='$parole_ID'";
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
    elseif (preg_match("/Linux/", $_SERVER['HTTP_USER_AGENT']))
    {
      $querystring .= " AND linux='y' AND mobileonly='n'";
      //exit("query:$querystring");
    }
    elseif (preg_match("/Windows/", $_SERVER['HTTP_USER_AGENT']))
    {
      $querystring .= " AND windows='y' AND mobileonly='n'";
      //exit("query:$querystring");
    }
    elseif (preg_match("/Macintosh/", $_SERVER['HTTP_USER_AGENT']))
    {
      $querystring .= " AND mac='y' AND mobileonly='n'";
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
  //Multiple redirect methods are used for compatibility across browsers
  //Think: browser variants, noscript, and mobile devices
  
  
  //Use the php header method to redirect, should work 99% of the time.
  header( "Location: $newurl" ) ;
  
  echo("<html><head>");
  
  //Use a meta-tag method to redirect
  echo ("<meta http-equiv=\"refresh\" content=\"1;url=$newurl\">");
  
  //give a page with javascript method to redirect
  echo ("<SCRIPT language=\"JavaScript\">\r");
  echo ("<!--\r");
  echo ("window.location=\"$newurl\";\r");
  echo ("//-->\r");
  echo ("</SCRIPT>\r");
  
  //if all else fails, give a link/manual method to redirect
  echo ("</head><body>");
  echo ("<a href=\"$newurl\">Click Here</a>");
  echo ("</body>");
  }

mysql_close($con);
?> 
