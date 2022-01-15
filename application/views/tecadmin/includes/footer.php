<div id="alertbox">
    <?php
    if ($this->session->flashdata('emsg') != null) {
        echo '<div class="alert '.$this->session->flashdata('etype').'">'.$this->session->flashdata('emsg').'</div>';
    }elseif ($this->session->flashdata('infoerror') != null) {
        foreach($this->session->flashdata('infoerror') as $error){
            echo '<div class="alert alert-error">'.$error.'</div>';
        }
    }elseif($this->session->flashdata('iii') != null){
        foreach($this->session->flashdata('iii') as $key => $value){
            if($key=="infosucc"){
                foreach($value as $vv){
                    echo '<div class="alert alert-success">'.$vv.'</div>';
                }
            }else{
                foreach($value as $vv){
                    echo '<div class="alert alert-error">'.$vv.'</div>';
                }
            }
        }
    }elseif(!empty($message)){
        echo $message;
    }
    ?>
</div>

<footer class="footer text-center text-md-right m-t-20"><p>Design & developed By: <a href="https://tecmyer.com.au/" target="_blank">Tecmyer</a></p></footer>

</div>
</div>
</div>
<a href="#" class="scroll-top" id="scroll-top">
    <i class="arrow-top fa fa-long-arrow-up"></i>
    <i class="arrow-bottom fa fa-long-arrow-up"></i>
</a>