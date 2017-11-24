<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

  <style>

    #box {
      width: 200px;
      height: 200px;
      background-color: black;
      position: absolute;
      top:0px;
      transition: all .2s;
    }

    iframe {
      width: 100vw;
      min-height: 90vh;
      height: auto;
      position: absolute;
      top: 0px;
    }

    .boost {
      display: none;
    }

  </style>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  <script>


// Enable pusher logging - don't include this in production
Pusher.logToConsole = false;

var pusher = new Pusher('cec231f8de255ff07ffb', {
  cluster: 'us2',
  encrypted: true
});



    // recieve request
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {

        var element = $('#box');
        var position = $('#box').position();

        if(data.message == 'down'){
          $('#box').css('top', position.top + 40);
        }
        else if (data.message == 'up'){
          $('#box').css('top', position.top - 40);
          $('.traffic').css('display', 'none');
          $('.boost').css('display', ' block');
        }
         if(data.message == 'left'){
          $('#box').css('left', position.left - 40);
          $('.traffic').css('display', 'block');
          $('.boost').css('display', 'none');
        }
        else if (data.message == 'right'){
          $('#box').css('left', position.left + 40);
        }

        console.log(data);

        if(data.color){
          $('#box').css('backgroundColor', decodeURI(data.color));
        }
        if(data.text){

        }



    });

  </script>
</head>
<body>
  <div class="container">
    <div id="box">
      <h1></h1>
    </div>
    <iframe class="traffic" src="https://www.youtube.com/embed/CeUtA-tfipg?rel=0&amp;controls=0&amp;showinfo=0&amp;start=60;autoplay=1" frameborder="0" allowfullscreen></iframe>
    <iframe class="boost" src="https://www.youtube.com/embed/DvFKyLEwt9g?rel=0&amp;controls=0&amp;showinfo=0;autoplay=1" frameborder="0" allowfullscreen></iframe>

  </div>


</body>
</html>
