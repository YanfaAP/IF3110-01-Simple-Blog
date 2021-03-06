<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog | Tambah Post</title>

<script type="text/javascript">
function cekData(){
    if(new_post.Judul.value == ""){
        alert("Judul harus diisi!");
        return false;
    }
    else if(new_post.Tanggal.value == ""){
        alert("Tanggal harus diisi!");
        return false;
    }
    else if(new_post.Konten.value == ""){
        alert("Konten post harus diisi!");
        return false;
    }
    else if(checkDate() == false){
        return false;
    }
    else{
        return true;
    }
}

function checkDate(){
    var validformat=/^\d{4}\-\d{2}\-\d{2}$/ //Basic check for format validity
    var returnval=false
    if (!validformat.test(new_post.Tanggal.value)){
        alert("Format tanggal harus YYYY-MM-DD")
    }
    else { //Detailed check for valid date ranges
        var dayfield=new_post.Tanggal.value.split("-")[0]
        var monthfield=new_post.Tanggal.value.split("-")[1]
        var yearfield=new_post.Tanggal.value.split("-")[2]
        
        var date = new Date(dayfield,monthfield - 1,yearfield,0,0,0,0);

        var dayobj = new Date()
        var dd = dayobj.getDate();
        var mm = dayobj.getMonth() + 1;
        var yy = dayobj.getFullYear();
        if(dd < 10){
            dd='0'+dd
        }
        if(mm < 10){
            mm='0'+mm
        }
        var date2 = new Date(yy,mm-1,dd,0,0,0,0)
        if(Date.parse(date) < Date.parse(date2)){
        alert("Tanggal harus hari ini atau setelah hari ini.")
        }
        else{
            returnval=true
        }
    }
    if (returnval==false){
        new_post.Tanggal.select()
    }
    return returnval
}

</script>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Update Post</h2>
            <?php
              $session_post_id = $_GET['pc'];
              // Create connection
              $con=mysqli_connect("localhost","root","","wbd_db");
              $result = mysqli_query($con,"SELECT * FROM post WHERE post_id = '$session_post_id'");
              $row = mysqli_fetch_array($result);
            ?>
            <div id="contact-area">
                <form name="new_post" action="update.php" method="post" onsubmit="return cekData();">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" value="<?php echo $row['tittle']?>">
                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" value="<?php echo $row['post_date']?>">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"><?php echo $row['konten']?></textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                    <input type="hidden" name="post_id" id="post_id" value="<?php echo $row['post_id']?>">
                </form>
                <?php
                    mysqli_close($con);
                ?>
            </div>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
        
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>

</body>
</html>