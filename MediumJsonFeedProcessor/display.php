
<!-- this script is intended as an example of how to use the data from medium collect. -->
<?php
//Script Created by Outback Games https://outbackgames.com.au
    include_once 'medium-collect.php';
?>
<html>
<head>
<script src="https://use.fontawesome.com/6a0c141912.js"></script> <!--not neccessary but hey, FA is pretty much standard-->
<!-- your usual head stuff -->
</head>
<body>
<?php
    $localCount = 0;
    $maxCount = (sizeof($posts) - 1);
    if($maxCount > 10){
        $maxCount = 10;
    }
    //create your own post cleaner or
    //use below.
    foreach($posts as $post){
        $postTitle = $post['title'];
        $postLink = $post['link'];
        $postDescfull = $post['description'];
        $postThumb = $post['thumbnail'];

        //Post Description Cleaning
        $maxPostDescLength = 100;
        $postDescFind = strstr($postDescfull,'<p>', false); //find the first paragraph tag in the RSS2Json Description as this is where we want to start our snippit.
	$postDescTrim = substr($postDescFind,0,$maxPostDescLength).'...';
	$postDescCleanFirstPass = str_replace("<p>", "", $postDescTrim); //clean the tag from the description, if need be, create a second pass to remove closing tag.
	$postDesc = $postDescCleanFirstPass; // assign short name var to the final clean pass.
	
	    //why we don't want zero: Zero will be the initial key containing an element different to the items list we want.
        if($localCount != 0){
            //Changes Padding on final post (should be post number 10)
            //change the html formatting to your own needs. this is just example code.
            if($localCount == $maxCount){
            	echo '<div style="padding-top:1%;">';
                echo '      <h4><a href="'.$postLink.'" target="_blank">'.$postTitle.'</a></h4>';
                echo '  <div style="display:inline-block; vertical-align:top;">';
                echo '      <a href="'.$postLink.'" target="_blank"><span><img src="'.$postThumb.'" width="160px" alt="'.$postTitle.'" /></span></a>';
                echo '  </div>';
                echo '  <div style="display:inline-block;">';
                echo '      <p>'.$postDesc.' <a href="'.$postLink.'" target="_blank"> Read More <i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>';
                echo '  </div>';
                echo '</div>';
            }else if ($localCount < $maxCount ){
		echo '<div style="padding-bottom:1%;">';
                echo '      <h4><a href="'.$postLink.'" target="_blank">'.$postTitle.'</a></h4>';
                echo '  <div style="display:inline-block; vertical-align:top;">';
                echo '      <a href="'.$postLink.'" target="_blank"><span><img src="'.$postThumb.'" width="160px" alt="'.$postTitle.'" /></span></a>';
                echo '  </div>';
                echo '  <div style="display:inline-block;">';
                echo '      <p>'.$postDesc.' <a href="'.$postLink.'" target="_blank"> Read More <i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>';
                echo '  </div>';
		echo '</div>';
            }
        }
        $localCount++;
    }
?>
</body>

</html>
