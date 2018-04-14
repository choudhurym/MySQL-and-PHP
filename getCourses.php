<?php
	$dept = $_GET["dept"];
	print $dept;
	print ":  ";	

	$DBconnect = mysqli_connect('localhost','guest','cs310');
	if (!$DBconnect) die("Failed to log into the database system");

    $DBselect = mysqli_select_db($DBconnect,"jaybag");
    if (!$DBselect) die("Failed to select database");

	$sql = "select distinct course from courses where dept='$dept';";
    $result = mysqli_query($DBconnect, $sql);
	if (!$result) die("No data returned<br/>");
	print "<select>";
	$row = mysqli_fetch_array($result);
	while ($row) { 
		$value = $row[0];
		print "<option>";
        print "$value";
	    print "</option>";
		print "<br/>";
        $row = mysqli_fetch_array($result);
    }
	print "</select>";
    mysqli_close($DBconnect);


?>