<?php

    define("HOSTNAME","localhost");
    define("USERNAME","root");
    define("PASSWORD","");
    define("DBNAME","WLMS");

    $connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);

    if (!$connection) {
        die("Connection failed");
    }
