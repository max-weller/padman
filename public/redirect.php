<!doctype html>
<html>
<head>
<meta charset="utf8">
<?php
include "../config.inc.php";

if (isset($_SERVER["REDIRECT_STATUS"]) && $_SERVER["REDIRECT_STATUS"] == "404") {
	$url = $_SERVER["REDIRECT_SCRIPT_URL"];
	if (preg_match('#^/pubpad/(.*)$#', $url, $res)) {
    
		
    $p = json_decode(file_get_contents("../data/shortlnk.json"), true);
    foreach($p as $k=>$v) {
      if ($v == $res[1]) {
        //header("Location: ".PAD_URL. $k);
        $shortName = substr($k,strpos($k,'$')+1);
        echo "<title>$shortName - etherpad</title>";
      	echo "<style>   html,body {margin:0;padding:0;height:100%;overflow:hidden;}
           iframe { width: 100%; height: 100%; border: 0; }   </style>
           </head><body>";
      	echo '<iframe src="'.PAD_URL. $k.'"></iframe></body></html>';
        exit;
      }
    }
    
  }
}

?>
<style>body { max-width: 600px; margin: 10px auto; }</style>

</head>
<body>
<h3>Pad nicht gefunden</h3>

<p>Pr&uuml;fe bitte nochmals den Link, vielleicht hast du dich ja vertippt... </p>
<p>Ansonsten kann es auch sein, dass das Pad nicht mehr &ouml;ffentlich zug&auml;nglich ist, oder dass es gel&ouml;scht wurde.</p>

</body>
</html>

