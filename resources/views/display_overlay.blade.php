<html>
  <head>
    <title>Scoreboard Display</title>
    <style>
      body {
  margin: 0;
  background-color:#9999;
}

img, div {
  width: 750px;
  height: 250px;
}

.x {
  animation: x 13s linear infinite alternate;
}

.y {
  animation: y 7s linear infinite alternate;
}

@keyframes x {
  100% {
    transform: translateX( calc(100vw - 750px) );
  }
}

@keyframes y {
  100% {
    transform: translateY( calc(100vh - 250px) );
  }
}
      
      #text{
        font-size: 72pt;
        text-align: center;
        color: #eee;
        font-family: sans-serif;
        border: 1px solid #ff00ff;
      }
    </style>
  </head>
  <body>
    <div class="x">
      <div class="y">
        <div id="text">{!! $text !!}</div>
      </div>
    </div>
  </body>
</html>