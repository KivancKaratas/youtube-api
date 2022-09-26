<?php
// read the descriptions
$API_KEY=""; // Take your api key from Google and paste it here Note: don't forget to enable the use of youtube api from google
$Channel_ID="UC_d_W1uBdIKo-zcAZVBpE7w"; //paste the youtube channel id here
$Max_Results=10; // write down the maximum number of data to be taken


    $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$Channel_ID.'&maxResults='.$Max_Results.'&key='.$API_KEY.''); 
    if($apiData){ 
        $videoList = json_decode($apiData); 
    }else{ 
        echo 'Yalan böyle api key olmaz.'; 
    }


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<?php 
if(!empty($videoList->items)){ 
    foreach($videoList->items as $item){ 
        // Embed video 
        if(isset($item->id->videoId)){ 
            echo ' 
            <div class="yvideo-box" style="float:left; margin-left:100px;"> 
                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe> 
                <h4>'. $item->snippet->title .'</h4> 
            </div>'; 
        } 
    } 
}else{ 
    echo '<p class="error">'.$apiError.'</p>'; 
} ?>
</body>
</html>
