<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  <script>





// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('d3e22fb171c58adaecbe', {
  cluster: 'us2',
  encrypted: true
});



document.onkeydown = checkKey;

function checkKey(e) {

    e = e || window.event;

    if (e.keyCode == '38') {
        $.ajax({
          method: "GET",
          url: "/push",
          data: { message: "up", }
        });
    }
    else if (e.keyCode == '40') {
        $.ajax({
          method: "GET",
          url: "/push",
          data: { message: "down", }
        });
   }
    else if (e.keyCode == '37') {
        $.ajax({
          method: "GET",
          url: "/push",
          data: { message: "left", }
        });
    }
    else if (e.keyCode == '39') {
        $.ajax({
          method: "GET",
          url: "/push",
          data: { message: "right", }
        });
    }

}

$(function(){

  $('.name').change(function(){
    var text = $('.name').val();
    $.ajax({
          method: "GET",
          url: "/push",
          data: { button: text, }
      });
  });

  $(".color").change(function(){
      // alert("value has changed");

      var color = encodeURI($(".color").val());
      // alert(color);

      $.ajax({
            method: "GET",
            url: "/push",
            data: { color: color, }
          });
  });

});

    // // recieve request
    // var channel = pusher.subscribe('my-channel');
    // channel.bind('my-event', function(data) {
    //   alert(data.message);
    // });

  </script>
</head>
<body>
  <div class="container">
  <!--  <input type="color" class="color">
    <input type="text" class="text"> -->
    <h3 class="text-success text-center">Press up to go autonomous</h3>
    <h6 class="text-danger text-center">Press down to go back to traffic</h6>
  </div>



</body>
</html>
