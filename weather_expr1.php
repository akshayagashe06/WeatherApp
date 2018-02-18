<?php
		// create curl resource 
        $ch = curl_init(); 

        // set url

		// echo "https://maps.googleapis.com/maps/api/geocode/xml?address='$addr_plus'&key=AIzaSyBe1V58rpXg9OjQ2HDKDM14BozWN4C5zxM";	
        curl_setopt($ch, CURLOPT_URL, "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22athens%2C%20ga%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys"); 
		
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

		// echo $output;
        // close curl resource to free up system resources 
        curl_close($ch);

		print $output;	
?>