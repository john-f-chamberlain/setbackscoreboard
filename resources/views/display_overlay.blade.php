<html>
  <head>
    <title>Scoreboard Display</title>
    <style>
      #overlay {
          position: fixed;
          display: block;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #999;
          z-index: 2;
          cursor: pointer;
      }
      
      #text{
          position: absolute;
          top: 50%;
          left: 50%;
          font-size: 50px;
          color: #ccc;
          font-family: sans-serif;
          transform: translate(-50%,-50%);
          -ms-transform: translate(-50%,-50%);
      }
    </style>
  </head>
  <body>
    <div id="overlay" onclick="off()">
        <div id="text">{{$text}}</div>
      </div>
  </body>
</html>