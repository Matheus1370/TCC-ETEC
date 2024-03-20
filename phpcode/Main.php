<?php
  $Write="<?php $" . "getLEDStatusFromNodeMCU=''; " . "echo $" . "getLEDStatusFromNodeMCU;" . " ?>";
  file_put_contents('LEDStatContainer.php',$Write);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <script src="jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#getLEDStatus").load("LEDStatContainer.php");
        setInterval(function() {
        $("#getLEDStatus").load("LEDStatContainer.php");
        }, 500);
    });
    </script>
    <style>
      html {
          font-family: Arial;
          display: inline-block;
          margin: 0px auto;
          text-align: center;
      }
      
      h1 { font-size: 2.0rem; color:#2980b9;}
      h2 { font-size: 1.25rem; color:#2980b9;}
      
      .buttonON {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #4CAF50;
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px #999;
      }
      .buttonON:hover {background-color: #3e8e41}
      .buttonON:active {
        background-color: #3e8e41;
        box-shadow: 0 1px #666;
        transform: translateY(4px);
      }
        
      .buttonOFF {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #e74c3c;
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px #999;
      }
      .buttonOFF:hover {background-color: #c0392b}
      .buttonOFF:active {
        background-color: #c0392b;
        box-shadow: 0 1px #666;
        transform: translateY(4px);
      }
    </style>
  </head>
  <body>
    <h1>Controlling LED on NodeMCU ESP12E ESP8266 with MySQL Database</h1>
    
    <form action="updateDBLED.php" method="post" id="LED_ON" onsubmit="myFunction()">
      <input type="hidden" name="Stat" value="1"/>    
    </form>
    
    <form action="updateDBLED.php" method="post" id="LED_OFF">
      <input type="hidden" name="Stat" value="0"/>
    </form>
    
    <button class="buttonON" name= "subject" type="submit" form="LED_ON" value="SubmitLEDON" >LED ON</button>
    <button class="buttonOFF" name= "subject" type="submit" form="LED_OFF" value="SubmitLEDOFF">LED OFF</button>  

    <h2 id="ledstatus" style="color:#6f4a8e;">LED Status = </h2>
    <p id="getLEDStatus" hidden></p>

    <script>
    var myVar = setInterval(myTimer, 500);
    function myTimer() {
        var getLEDStat = document.getElementById("getLEDStatus").innerHTML;
        var LEDStatus = getLEDStat;
        if (LEDStatus == 1) {
        document.getElementById("ledstatus").innerHTML = "LED Status = ON";
        }
        if (LEDStatus == 0) {
        document.getElementById("ledstatus").innerHTML = "LED Status = OFF";
        }
        if (LEDStatus == "") {
        document.getElementById("ledstatus").innerHTML = "LED Status = Waiting for the Status LED from NodeMCU...";
        }
    }
    </script>  
  </body>
</html>