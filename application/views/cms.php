<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <?php echo $head;?>

</head>

<body onload="myFunction()">

    <?php 

    echo $header;

    echo $banner;
    ?>
    <div class="p-b-60">
        <div class="main-container2">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-7">
                    <?php echo $content;?>

                </div>
                <div class="col-xl-3 col-lg-3 col-md-5">
                    <?=$leftmenu;?>
                </div>
            </div>
        </div>
    </div>




    <?php

    echo $footer;


    echo $scripts;

    ?>

</body>

</html>