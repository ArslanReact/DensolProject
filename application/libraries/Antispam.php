<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Antispam {



    function get_antispam_image($r=255,$g=255,$b=255) {

	

        $text = rand(10000,99999); 

        $height = 25; 

        $width = 60; 

        $font_size = 14; 



        $im = imagecreatetruecolor($width, $height); 

        $textcolor = imagecolorallocate($im, $r,$g,$b);

        $bg = imagecolorallocate( $im, 0, 0, 0 );

        imagestring($im, $font_size, 5, 5,  $text, $textcolor);

        imagecolortransparent( $im, $bg );

        imagefill( $im, 0, 0, $bg );

        //header( "Content-type: image/png" );

        //imagepng($im);

        $finalname = rand(00000,99999).".png";

        $save = UPLOADPATH."captcha/".$finalname;

        $view = base_url()."uploads/captcha/".$finalname;

        $my_img = imagepng($im,$save,9);

		

		return array('word' => $text, 'image' => $view);

	   

	}	

	

}