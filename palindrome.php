<link rel="stylesheet" type="text/css" href="index.css">
<?php
echo "
    <div>
        <div style='width: 100%; border-bottom: 1px solid black'><a href='index.html' class='home'>Home</a></div>
    </div>

    <div style='display: inline-block; text-align: center'>
        <form action='' method='POST'>
           <p><label class='field' for='word'>Word</label><input type='text' name='word' style='width: 250px'></p>
           <button name='submit'>Submit</button>
        </form>
    </div>
";
if(isset( $_POST['submit'] ) ) {
    if($_POST['word']!="") {
        $word = $_POST['word'];
        $reversed =  strrev($word);
        if( strcmp ($word, $reversed)== 0){
           echo "This is a palindrome";
        }else{
            echo "This is not a palindrome";
        }
    }
}

