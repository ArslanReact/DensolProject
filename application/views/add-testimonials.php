<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <?php echo $head;?>
    <title>Add Testimonial - AR-Instrument</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://ar-instrumed.com.au/files/frontend/favicon.ico" />
<link rel="icon" href="https://ar-instrumed.com.au/files/frontend/favicon.gif" type="image/gif" >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>

<body onload="myFunction()">

    <?php 

    echo $header;

    echo $banner;

    //echo $content;

    ?>
<main class="main">
<div class="blusecolorbg banner-wrap-brecrumbs m-b-40 align-items-center d-flex">
    <div class="main-container2">
        <div class="row align-items-center d-flex">
            <div class="col-xl-12 col-lg-12 col-md-12 m-b-40">
                <h5 class="text-white text-center fontwieghtbold">Add Testimonial</h5>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 px-0">
                        <li class="breadcrumb-item"><a class="" href="https://ar-instrumed.com.au/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Testimonial</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <section class="page-content my-5">

        <div class="container">

            <div class="row">

                <div class="col-md-12 mr-auto ml-auto">
                    <?php if($this->session->flashdata("info") != ''){ ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata("info"); ?>
                        </div>
                    <?php } ?>
                    <form method="post" action="<?php echo base_url('cms/submittestimonial'); ?>">
                        <input type="text" name="title" placeholder="Enter Your Name Here" class="form-control mb-3" required>
                         <input type="text" name="position" placeholder="Enter Your Position Here" class="form-control mb-3" required>
                        <textarea placeholder="Enter your testimonial comment here..." class="form-control mb-3" name="message" rows="7" required></textarea>
                        <button type='submit' class="btn btn-blue-fill borderradius50">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </section>

    </main>


    <?php

    echo $footer;

    echo $scripts;

    ?>

</body>

</html>