<!DOCTYPE html>
<!-- saved from url=(0061)http://titsofttennis.sakura.ne.jp/album/2017/riko_spring.html -->
<html lang="ja"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Album | 東工大ソフトテニス部</title>
  <link rel="stylesheet" href="./common.css">
  <link rel="stylesheet" href="./album.css">
  <?php
  	$cateDir = $_GET['cate'];
  	$contDir = $_GET['cont'];
    $albumPath = dirname(__FILE__)."/Album/";
  	$path = $albumPath.$cateDir."/".$contDir."/";
    $xmlPath = $albumPath.'album.xml';
    $excludes = array(".","..","memo.html");
    
    
	$cate = simplexml_load_file($xmlPath)->xpath("category[@dir='{$cateDir}']")[0];
	$cateName = $cate->name;
	$cont = $cate->xpath("content[@dir='{$contDir}']")[0];
	$contName = $cont->name;
  ?>
</head>
<body class="sample">
  <div id="album" class="page">
    <header>
      <h1 class="siteTitle">東工大ソフトテニス部</h1>
      <nav class="globalNavi">
        <ul class="menu">
          <li><a href="http://titsofttennis.sakura.ne.jp/index.html">home</a></li>
          <li><a href="http://titsofttennis.sakura.ne.jp/schedule.html">schedule</a></li>
          <li><a href="http://titsofttennis.sakura.ne.jp/result.html">result</a></li>
          <li class="current"><a href="http://titsofttennis.sakura.ne.jp/album.html">album</a></li>
          <li><a href="http://titsofttennis.sakura.ne.jp/data.html">data</a></li>
        </ul>
      </nav>
    </header>
    <h3 class='head'><?php echo("{$cateName} {$contName}");?></h3>
    <div class='album'>
    <?php
		$imgs = scandir($path);
		foreach($imgs as $img){
			if(in_array($img,$excludes)) continue;
			$imgPath = "./Album/".$cateDir."/".$contDir."/".$img;
			echo "<img src='{$imgPath}' alt=''>";
	   	}
	?>
	</div>
    <div class="foot">
      <a class="back" href="./Album_index.php">
        <p>アルバム一覧へ戻る</p>
      </a>
    </div>
    <footer>
      <p id="copyright"><small>Copyright© 2017 東京工業大学ソフトテニス部</small></p>
    </footer>
  </div>

</body></html>