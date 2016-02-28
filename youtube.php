<?php

 ?>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
​
var url = '';
var search = <?php echo json_encode($query); ?>;
$.getJSON('https://www.googleapis.com/youtube/v3/search?q='+search+'&key=AIzaSyByfyNLAIY3V-KXdfkpUb5bbPQF7B3Qon4&part=snippet',function(data){
​
 if (typeof(data.items[0]) != "undefined") {
     console.log('video exists ' + data.items[0].id.videoId);
     url = 'http://www.youtube.com/watch?v='+data.items[0].id.videoId+'';
     
     console.log(url);
​	/*
     $.ajax({
            type: "POST",
            url: 'http://textpress.herokuapp.com/index.php',
            data: { 'link': url }
        });*/
​
   } else {
 
     console.log('video does not exist');
     /*
     $.ajax({
            type: 'post',
            url: 'http://textpress.herokuapp.com/index.php',
            data: { 'link': 'video does not exitst' }
        });
        */
 	}
​
​
});
​
</script>