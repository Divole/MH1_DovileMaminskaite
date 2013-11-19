<link rel="stylesheet" type="text/css" href="index.css">

<?php
echo "
<div>
<div style='width: 100%; border-bottom: 1px solid black'><a href='index.html' class='home'>Home</a></div>
    <form action='' method='POST'>
       <p><label class='field' for='name'>Your Name</label><input type='text' name='name' style='width: 250px'></p>
       <p><label class='field' for='message'>Your Message</label><textarea name='msg' style='width: 250px; height: 100px'></textarea></p>
       <button name='submit'>Submit</button>
    </form>
</div>
";
$file = 'guests.txt';
if(isset( $_POST['submit'] ) ) {
    if($_POST['name']!="" && $_POST['msg']!="") {
       echo "Thanks for visiting this web page";
        $guest = htmlspecialchars($_POST['name'])."/  ".date('m/d/Y h:i:s a', time())."/  ".htmlspecialchars($_POST['msg'])."\n";
        file_put_contents($file, $guest, FILE_APPEND | LOCK_EX);
    }else{
       echo "You need to fill your name and leave a message";
    }
}


