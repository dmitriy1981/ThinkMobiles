<script>

    var StartTime = 1;
    
    function timer() 
    {
      document.getElementById("redirect_timer").innerHTML = StartTime;
      
      StartTime++;
      
      if(StartTime == (5 + 1))
      {
          clearInterval(intervalID);
          window.location.replace("/login");
      }
    }

   var intervalID = setInterval(timer, 1000);
 
</script>
<div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Congratulations your event registration has been successful.</h3>
                </div>
                <div class="panel-body">
                    You will be redirected to a "Log In" page in 5 seconds
                    <strong id="redirect_timer">0</strong>
                </div>
</div>