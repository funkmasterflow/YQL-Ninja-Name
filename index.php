<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
    <title>What's your Ninja name?</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />   
    <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css" />
    <link rel="stylesheet" href="layout.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
</head>
<body>

<div id="doc3" class="yui-t7">
   <div id="hd" role="banner"><h1>What's your Ninja name?</h1></div>
   <div id="bd" role="main">
    <div class="yui-g">       
        <form action="index.php" method="post" class="form">
                <fieldset>
                    <label>Your Name:</label>
                    <input type="text" name="yourname" />
                </fieldset>
                              
                <fieldset>            
                <input type="submit" value="What's my Ninja name?" id="submit" />
            </fieldset>
        </form>
    </div>
    
    <div class="done">
        <?php            
            $yourname = $_POST['yourname'];
                       
            $query = 'use "http://github.com/yql/yql-tables/raw/master/fun/ninjaname.xml" as ninjatrans;select * from ninjatrans where name="'.$yourname.'"';
            $api = 'http://query.yahooapis.com/v1/public/yql?q='.
                    urlencode($query).'&format=json';          
                    
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_URL, $api);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($output);
            
            $ninjaname = $data->query->results->translated->ninjaname;  
            echo "Your Ninja name is: ".$ninjaname;        
         ?>
    
    
    </div>

    </div>
   <div id="ft" role="contentinfo"><p>&copy; 2010 - Funkmaster Flow</p></div>
</div>






</body>
</html>