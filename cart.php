<?php
session_start();
if(isset($_SESSION['h']))
{
    foreach($_SESSION['h'] as $val)
    {
        echo "<br>";
        echo $val;
    }

}

?>