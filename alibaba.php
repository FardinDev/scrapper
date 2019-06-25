<?php
include_once('simple_html_dom.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>


    
</body>
</html>

<?php
$url = $_GET['url'];
// Create DOM from URL
$html = file_get_html($url);
$articles=[];
$pics[] = '';
echo $html->find('h1.ma-title', 0)->innertext.'<br>';
// Find all article blocks
foreach($html->find('img.pic') as $pic) {
 

    echo str_replace("_350x350.jpg", '', $pic->src). '<br>';
    
}

foreach($html->find('div.thumb') as $thumb) {
 
foreach($thumb->find('img') as $item){
    echo str_replace("50x50","350x350", $item->src). '<br>';
}
    
}

$description = $html->find('div.module-productSpecification', 0);

for ($i=0; $i < sizeof($description->find('img'))-1; $i++) { 
    
        $description->find('img', $i)->src = $description->find('img', $i+1)->src;
    
}
echo $description;
die();





