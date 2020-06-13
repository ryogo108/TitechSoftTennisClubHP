<!DOCTYPE html>
<!-- saved from url=(0044)http://titsofttennis.sakura.ne.jp/album.html -->
<html lang="ja"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Album | 東工大ソフトテニス部</title>
  <link rel="stylesheet" href="./common.css">
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
          <li class="current"><a href="http://titsofttennis.sakura.ne.jp/Album_index.php">album</a></li>
          <li><a href="http://titsofttennis.sakura.ne.jp/data.html">data</a></li>
        </ul>
      </nav>
    </header>
    <h2 class="head">Album</h2>
    <?php
    $albumPath = dirname(__FILE__)."/img/album/";
    $xmlPath ='album.xml';
	$xml = simplexml_load_file($xmlPath);
	$cates = $xml->category;

    foreach($cates as $cate){
		$cateDir = $cate->attributes()->dir;
		$cateName = $cate->name;
	    echo "<h3 class='head'>{$cateName}</h3>";
	    $conts = $cate->content;
		foreach($conts as $cont){
	    	$contDir = $cont->attributes()->dir;
			$contName = $cont->name;
			$contIcon = $cont->icon;
			$contMemo = $cont->memo->asXML();
			$dirPath = "./img/album/".$cateDir."/".$contDir."/";
			$iconPath = $dirPath.$contIcon;
		    if(!file_exists($iconPath)){
		    	$imgs = glob($dirPath."*");
			    if(sizeof($imgs)==0){
			    	$iconPath = "./img/album/noimage.png";
			    }else{
				    $iconPath = $dirPath.pathinfo($imgs[rand(0,sizeof($imgs)-1)])['basename'];
			    }
		    }
	    	$pagePath = "./Album_page.php?"."cate=".$cateDir."&cont=".$contDir;
echo <<<DOC
	    <div class="Album_menu">
	      <article class="content">
	        <a href="{$pagePath}">
	          <div class="contentText">
	            <h1>{$contName}</h1>
	            {$contMemo}
	          </div>
	          <div class="contentImg"><img src="{$iconPath}" alt=""></div>
	        </a>
	      </article>
	    </div>
DOC;
		}
	}
    ?>

    <footer>
      <p id="copyright"><small>Copyright© 2017 東京工業大学ソフトテニス部</small></p>
    </footer
  </div>
</body>
</html>
