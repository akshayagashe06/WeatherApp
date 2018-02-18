<html>
<head>
    
<title>My Weather</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<!--    <style src="home_style.css"></style>-->
    <link rel="stylesheet" href="home_style.css">
</head> 
<body>
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

//		print $output;	
//    $xml = simplexml_load_string($output);
//    
//    $temp = (String)$xml->query->results->channel->link->children('yweather',true)->wind->attributes()->chill;
    $phpObj =  json_decode($output,true);
    $temp='';
    foreach($phpObj["query"]["results"]["channel"]["units"] as $item)
    {
        echo $item["distance"];
        break;
    }
?>
    <div class="container">
       <div class="col-lg-12 col-md-12 col-ls-12 weather_class">
           <span class="temp"><?php echo $temp ?></span>
       </div> 
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>