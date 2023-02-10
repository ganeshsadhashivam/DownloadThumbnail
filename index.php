<?php

if(isset($_POST['download'])){
  //if download button clicked

  //getting image url from hidden input
  $imgUrl = $_POST['imgurl'];

  //initializing curl
  $ch = curl_init($imgUrl);

  //it transfers data as the return value of curl_exec rather then output
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

  //executing curl
  $download= curl_exec($ch);

  curl_close($ch);//closing curl session

  //setting content type of header to image/jpg so we can get img in jpg not in base64 format
  header('Content-type: image/jpg');

   //setting Content-Disposition to indicating browser this file should download with given file name
  header('Content-Disposition: attachment;filename="thumbnail.jpg"');
  echo $download; //download img in jpg format
}


?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thumbnail</title>
    <link rel="stylesheet" href="styles.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <header>Download Thumbnail</header>
      <div class="url-input">
        <span class="title">Paste Video Url:</span>
        <div class="field">
          <input
            type="text"
            placeholder="https://www.youtube.com/watch?v="
            required
          />
          <input class="hidden-input" type="hidden" name="imgurl"/>
          <div class="bottom-line"></div>
        </div>
      </div>
      <div class="preview-area">
        <img class="thumbnail" src="" alt="thumbnail" />
        <i class="icon fas fa-cloud-download-alt"></i>
        <span>Paste video url to see preview</span>
      </div>
      <button class="download-btn" type="submit" name="download">Download</button>
    </form>
  </body>
  <script src="script.js"></script>
</html>
