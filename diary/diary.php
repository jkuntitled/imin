<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" href="../favicon.ico" />
    <link rel="shortcut icon" href="../favicon.ico" />
    <title>I'm in</title>
    <style>
    body {
      margin-left: 15%;
      margin-right: 15%
    }
    body{
      background-image: url('../bg.gif');
    }
    select {
      width: 100%;
      min-width: 100px;
      min-height: 50px;
      padding: .5em .10em;
      font-family: Times ;
      font-size: 1.5vw ;
      border: 2px solid black;
      border-radius: 5px;
    }
      .grid {
        display: grid;
        grid-template-rows: 300px auto auto 1fr 1fr;
        justify-items: center;
      }
      h1.title {
        grid-row: 1;
        font-size: 3vw ;
        font-family: Times ;
        align-self: flex-end;
      }
      .icon {
        grid-row: 3;
        width: 30px;
        align-items: flex-start ;
        padding-top: 20px ;
      }

      .contents {
        background-color: white;
        font-size: 16px;
        border: 1px solid black;
        padding: 50px
      }
      h3 {
        background-color: black;
        color: white;
      }
      ol {
        padding-left: 15px;
        font-size: 20px;
        background-color: white
      }
      ol a:visited {
        color: black;
      }
      ol a:link {
        text-decoration: none;
        line-height: 1.5em
      }
      ol a:hover {
        background-color: gray;
        color: white;
      }
      @media(max-width:1242px) {
        select {
          font-size: 16px;
        }
        body {
            margin-left: 5%;
            margin-right: 5%
          }
      }
    </style>
  </head>
  <body>
    <div class="grid">
      <h1 class="title">
        <select onchange="location.href=this.value">
          <option value="../playlist.html">Playlist</option>
          <option value="diary/diary.php" selected="selected">Diary</option>
          <option value="../photos.html">Photos</option>
        </select>
      </h1>
      <ol>
        <?php

        $list = scandir('contents');
        $i = count($list);
        while ($i > 0){
          if($list[$i] != '..'){
            if($list[$i] != null){
          echo "<li><a href=\"diary.php?id=$list[$i]\">$list[$i]</a></li>\n";
        }}
          $i = $i - 1;
        }
         ?>
      </ol>
      <h3>
        <?php
        if(isset($_GET['id'])){
        echo $_GET['id'];}
        else {
          echo "일기입니다";
        }
         ?>
      </h3>
      <p class=contents>
        <?php
          if(isset($_GET['id'])){
          echo file_get_contents("contents/".$_GET['id']);}
          else {
            echo "위 날짜를 클릭해주세요.";
          };
         ?>
      </p>
        <a href="https://www.instagram.com/jin.mov"><img src="../insta.png" alt="instagram" class=icon></a>
    </div>
  </body>
</html>
