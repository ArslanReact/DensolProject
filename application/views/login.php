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

    //echo $content;

    ?>

    <section class="page-content my-5">

        <div class="container">

            <div class="row">
            <!--<div class="col-md-6">-->

            <!--    <?php// echo $registerform;?>-->

            <!--    </div>-->

                <div class="col-md-6 mr-auto ml-auto">

                <?php echo $loginform;?>

                </div>
            </div>

        </div>

    </section>

    <?php

    echo $footer;

    echo $scripts;

    ?>

</body>

</html>