<?php
    /*This file is called from proxifyPHP.html.*/    
    $bitlyLogin = getenv('HTTP_BITLY_LOGIN');	// set your bitly login and key as environment variables. retrieve them as shown
    $bitlyKey = getenv('HTTP_BITLY_KEY');    
    $proxyPrefix = urlencode("http://proxy-um.researchport.umd.edu/login?url="); // change proxy prefix to whatever your institution's is
    //echo "<strong>URL-encoded proxy prefix: </strong>"."$proxyPrefix", "<br /> <br />";
    $permalink = $_REQUEST["permalink"];    
    $permalinkEncoded = urlencode($permalink);    
    $longURL = $proxyPrefix.$permalinkEncoded;    
    $bitlyAPICall = "http://api.bitly.com/v3/shorten?login=".$bitlyLogin."&apiKey=".$bitlyKey."&longUrl=".$longURL."&format=xml"; //basic pattern for Bitly API call. Can also change the format to txt or json.
    //print_r($bitlyAPICall); //tests to make sure the URL came together correctly. You can copy the link and open it in a browser to test.    
    $results = file_get_contents($bitlyAPICall); //calls the API and loads the response into a variable
    $xml = new SimpleXMLElement($results); //turns the variable into an XML object    
    //print_r($xml); //lets you see what the XML looks like    
    $link = $xml->data->url; //drill down to the url node in the xml and save it to a variable    
    print $link; //prints just the link. This is what is returned to proxifyForm.html    
?>