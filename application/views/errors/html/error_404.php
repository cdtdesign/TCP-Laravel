<?php
  defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>404 Page Not Found</title>
    <style type="text/css">
      ::selection {
        background-color: #E13300;
        color: white;
      }

      ::-moz-selection {
        background-color: #E13300;
        color: white;
      }

      body {
        text-align: center;
        background-color: #fedf8d;
        margin: 3%;
        font: 1.25em normal Helvetica, Arial, sans-serif;
        font-weight: bold;
        color: #ef6831;
      }

      a {
        text-align: center;
        color: #003399;
        background-color: transparent;
        font-weight: normal;
      }

      h1 {
        text-align: center;
        color: #ef6831;
        background-color: transparent;
        /*border-bottom: 1px solid #D0D0D0;*/
        font-size: 1em;
        font-weight: bold;
        letter-spacing: -.04em;
        margin: 0 0 0px 0;
        padding: 5px 5px 0px 5px;
      }

      code {
        text-align: center;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 1em;
        background-color: #f9f9f9;
        /*border: 1px solid #D0D0D0;*/
        color: #002166;
        display: block;
        margin: 4px 0 4px 0;
        padding: 5px 5px 0px 5px;
      }

      #container {
        height: 500px;
        /*border: 1px solid #D0D0D0;
      box-shadow: 0 0 8px #D0D0D0;*/
      }

      p {
        /*	line-height: .0625em;*/
        letter-spacing: -.04em;
        margin: 5px 5px 0px 5px;
      }

      #thumbsDownError {
        width: 60%;
      }
    </style>
  </head>
  <body>
    <div id="container">
      <?= $message ?>
      <img id="thumbsDownError" src="/assets/img/tcp-404-page-not-found.svg" />
    </div>
  </body>
</html>
