<?php 
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
include('db_connect.php');
?>

<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">

    <url>
        <loc>http://localhost/new/index</loc>
        <priority>1.00</priority>
    </url>
	 <url>
        <loc>http://localhost/new/training</loc>
        <priority>0.8</priority>
    </url>
	<url>
        <loc>http://localhost/new/diploma_pg_program</loc>
        <priority>0.8</priority>
    </url>
	<url>
        <loc>http://localhost/new/kids_keep_learning</loc>
        <priority>0.8</priority>
    </url>

    <?php

    $sql = "SELECT * FROM courses ORDER BY c_id ASC";
    $result = mysqli_query($con,$sql);  
    while($row = mysqli_fetch_array($result))
    { 
    $filename = stripslashes($row['c_title']);
	$date = date("Y-m-d H:i:s");
	$domain = 'http://innovaskill.in/';
    ?>
    <url>
        <loc><?php echo $domain; ?><?php echo htmlspecialchars($filename); ?></loc>
		<lastmod><?php echo $date;?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

 <?php } ?>

</urlset>