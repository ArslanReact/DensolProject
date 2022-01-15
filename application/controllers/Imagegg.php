<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Imagegg extends MY_Controller {

    public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
    }
    public function index($path)
    {
        $pathf = uri_string();
        $exp = explode(".",$pathf);
        $path = FCPATH.$exp[0];

        //echo FCPATH.$path;
        if(file_exists($path.".webp")){
            header('Content-Type: image/webp');
            imagewebp($path.".webp");
        }elseif (file_exists($path.".png")) {
            $img = imagecreatefrompng($path.".png"); 
            imagepalettetotruecolor($img);
            imagealphablending($img, true);
            imagesavealpha($img, true);
            header('Content-Type: image/webp');
            imagewebp($img);
        }elseif(file_exists($path.".jpg")){
            $image=  imagecreatefromjpeg($path.".jpg");
            ob_start();
            imagejpeg($image,NULL,100);
            $cont=  ob_get_contents();
            ob_end_clean();
            imagedestroy($image);
            $content =  imagecreatefromstring($cont);
            header('Content-Type: image/webp');
            imagewebp($content);
            imagedestroy($content);
        }

        





        

    }
    

}