<link rel="stylesheet" type="text/css" href="index.css">
<?php
$dir = 'img/';
$i = 0;
$pictures = array();
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if($file !== "." && $file !== ".."){
                $pictures[] = $file;
//
            }
        }
        closedir($dh);
    }else{
        echo "Couldn't open directory!!!";
    }
}else{
    echo "Directory doesn't exist!!!";
}

echo "
    <div style='position: fixed; width: 100%;background: white; z-index: 99'>
        <div style='width: 100%;height: 30px; border-bottom: 1px solid black; padding-top: 10px'><a href='index.html' class='home' >Home</a></div>
    </div>
    <div id='g_content'>";

$group_num = ceil(count($pictures)/9);
$current_group = 1;
$start_page = 1;
$end_page = 9;

echo "<div style='padding-top: 70px'>
<form method='post'>";

while($current_group <= $group_num){
    if($current_group == $group_num){
        $end_page = $end_page - ($end_page - count($pictures));
        echo "<button type='submit' class = 'g_link' name = 'img' value = '".$start_page."'>".$start_page."-".$end_page."</button>";
        $current_group = $current_group+1;
    }else{
        echo "<button type='submit' class = 'g_link' name = 'img' value = '".$start_page."'>".$start_page."-".$end_page."</button>";
        $start_page = $start_page+9;
        $end_page = $end_page +9;
        $current_group = $current_group+1;
    }

}
echo "</form>";

echo "</div>
<div id='g_gallery'>";




if(isset($_POST['img'])){
    display_images($pictures, $_POST['img']);
}else{
    display_images($pictures, 1);
}

function display_images($array, $start_img){
    foreach($array as $key => $value){
        if($key+1 >= $start_img && $key+1 <= $start_img+8){
            echo "<div id='g_pic'>";
            echo "<img class='g_img' src='img/".$value."'>";
            echo "</div>";
        }
    }
}


echo "</div>
        </div>
            </div>";
