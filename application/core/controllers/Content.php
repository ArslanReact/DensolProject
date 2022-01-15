<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content extends MY_Controller {

    public $userlogin = false;
    public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->helper(array('form','text'));
        $this->flexi = new stdClass;
        $this->load->library(array('form_validation','antispam','pagination','flexi_cart'));
        $this->load->model('cmsModel');
        $this->load->model('blogModel');
        if(!$this->is_logged_in()){
        $this->userlogin = false;
        }else{
        $this->userlogin = true;
        }
    }
    public function index($id)
    {   $args = func_get_args();
        $slug = end($args);
        $full_slug = uri_string();
        $cms = $this->cmsModel->get_single_cms_by_slug($slug,$full_slug);
        if(!$cms){
            $blog = $this->blogModel->get_single_blog_by_slug($slug);
            if(!$blog){
                show_404();
            }else{
                $categoryid = getValuee("blogcategory_id","blogs_sel_categories","blog_id",$blog->id);
                
                if($blog->banner != ""){
                    $banner = base_url("uploads/blog/".$blog->banner);
                }else{
                    $catbanner = getValuee("banner","blogs_categories","id",$categoryid);
                    if($catbanner != ""){
                        $banner = base_url("uploads/blog/categories/".$catbanner);
                    }else{
                        $banner = base_url("files/frontend/images/about-P-bg.jpg");
                    }
                }
                $headdata['beforeheads'] = getMeta("blogs",$blog->id);
                $footerdata['footer'] = "";
                $bannerdata['title'] = $blog->title;
                $bannerdata['brudcrumb'] = showBlogsBreadCrumb("blogs",$blog->id);
                $bannerdata['banner'] = $banner;
                $bannerdata['ctpag'] = 1;
                $leftmenudata["categories"] = "";
                $data['content'] = $blog;
                $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
                $data['header'] = $this->load->view('includes/header', NULL, TRUE);
                $data['leftmenu'] = $this->load->view('includes/blog_leftmenu', $leftmenudata, TRUE);
                $data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);
                $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
                $data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);
                $this->load->view('blogcategory',$data);
            }
        }else{
            
            if($cms->banner != ""){$banner = base_url("uploads/pages/".$cms->banner);}else{
                $catbanner = getValuee("banner","cms","id",$cms->parent_id);
                if($catbanner!=""){
                    $banner = base_url("uploads/pages/".$catbanner);
                }else{
                    $banner = base_url("files/frontend/images/about-P-bg.jpg");
                }
            }
            $headdata['beforeheads'] = getMeta("cms",$cms->id);
            $footerdata['footer'] = "";
            $bannerdata['title'] = $cms->title;
            $bannerdata['brudcrumb'] = showPagesBreadCrumb("cms",$cms->id);
            $bannerdata['banner'] = $banner;
            
            if($cms->parent_id==46){
            $singleportfoliorelateddata = getRelatedcms($cms->parent_id,false,$cms->id);
            $bannerdata['portfoliorelated'] = $singleportfoliorelateddata;
            }
            if($cms->id==65){
                $captcha = $this->antispam->get_antispam_image(1,1,1);
                $this->session->unset_userdata('captcha');
                $this->session->set_userdata('captcha', $captcha['word']);
                $contactformdata['captcha'] = $captcha['image'];
                $datapp = $this->load->view('includes/contact_form', $contactformdata, TRUE);
                $bannerdata['content'] = getcmsold($cms->id,$datapp);
                $data['leftmenu'] = $this->load->view('includes/blog_leftmenu',NULL, TRUE);
            }else{
                $bannerdata['content'] = getcmsold($cms->id);
            }
            $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
            $data['header'] = $this->load->view('includes/header', NULL, TRUE);
            $data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);
            $data['leftmenu'] = $this->load->view('includes/blog_leftmenu',NULL, TRUE);
            $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
            $data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);

            if($cms->parent_id==75){
                $data['cms'] = $cms;
                $data['sel_docs'] = $this->cmsModel->getselgalleries($cms->id,"docs");
                $data['sel_drivers'] = $this->cmsModel->getselgalleries($cms->id,"drivers");
                $data['sel_updates'] = $this->cmsModel->getselgalleries($cms->id,"firmware");
                $data['sel_apps'] = $this->cmsModel->getselgalleries($cms->id,"application");
                $data['leftmenu'] = $this->load->view('includes/drivers_leftmenu', NULL, TRUE);
                $this->load->view('drivers',$data);
            }else{
                if($cms->id==76){
                    $data['firm'] = true;
                }else{
                    $data['firm'] = false;
                }
                if($cms->slug=='login' || $cms->slug=='register'){
                $formdd['return_page'] = "login/";
                $data['loginform'] = $this->load->view('user/login', $formdd, TRUE);
                $data['registerform'] = $this->load->view('user/register', $formdd, TRUE);
                $this->load->view('login',$data);
                }else{
                $this->load->view('cms',$data);
                }
            }
            
        }
        
    }
    public function blog_categories($id)
    {
        //$args = func_get_args();
        $slug = $this->uri->segment(2);
        $cat = getValuee("id","blogs_categories","slug",$slug);
        if($cat==""){
            show_404();
        }else{
            $category = getSingleValuee("blogs_categories","id",$cat);
            $totalcount = $this->blogModel->count_all("category",$category->id);
            $prpage = 6;
            $config = array();
            $config["base_url"] = base_url() . "topics/".$id;
            $config["total_rows"] = $totalcount;
            $config["per_page"] = $prpage;
            $config["uri_segment"] = 4;
            $config["num_links"] = 3;
            $config["prefix"] = "/page/";
            $config['use_page_numbers'] = true;
            $config['full_tag_open'] = '<ul class="pagination hidden-xs pull-right">';
            $config['full_tag_close'] = '</ul><!--pagination-->';
            $config['first_link'] = '&laquo; First';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last &raquo;';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = 'Next &rarr;';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&larr; Previous';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';
            
            $apaginate = $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4)-1: 0;
            $data["links"] = $this->pagination->create_links();
            $data["paging"] = pagination_detail($this->uri->segment(4),$prpage,$totalcount);
            $blogs = $this->blogModel->get_all_front_blogs($cat,"","",$config["per_page"],$page*$prpage);
            if($category->banner != ""){$banner = base_url("uploads/blog/categories/".$category->banner);}else{$banner = base_url("files/frontend/images/about-P-bg.jpg");}
            $headdata['beforeheads'] = getMeta("blogs_categories",$cat);
            $footerdata['footer'] = "";
            $bannerdata['title'] = $category->title;
            $bannerdata['brudcrumb'] = showBlogscatBreadCrumb($category->title,$category->slug);
            $bannerdata['banner'] = $banner;
            $leftmenudata["categories"] = "";
            $data['blogs'] = $blogs;
            $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
            $data['header'] = $this->load->view('includes/header', NULL, TRUE);
            $data['leftmenu'] = $this->load->view('includes/blog_leftmenu', $leftmenudata, TRUE);
            $data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);
            $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
            $data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);
            $this->load->view('blog',$data);
        }  
    }
    public function author_blogs($id)
    {
        $author = getValuee("id","users","username",$id);
        if($author==""){
            show_404();
        }else{
            $user = getSingleValuee("users","id",$author);
            $totalcount = $this->blogModel->count_all("author",$id);
            $prpage = 6;
            $config = array();
            $config["base_url"] = base_url() . "author/".$id;
            $config["total_rows"] = $totalcount;
            $config["per_page"] = $prpage;
            $config["uri_segment"] = 4;
            $config["num_links"] = 3;
            $config["prefix"] = "/page/";
            $config['use_page_numbers'] = true;
            $config['full_tag_open'] = '<ul class="pagination hidden-xs pull-right">';
            $config['full_tag_close'] = '</ul><!--pagination-->';
            $config['first_link'] = '&laquo; First';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last &raquo;';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = 'Next &rarr;';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&larr; Previous';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';
            
            $apaginate = $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4)-1: 0;
            $data["links"] = $this->pagination->create_links();
            $blogs = $this->blogModel->get_all_front_blogs(null,"author",$id,$config["per_page"],$page*$prpage);
            $data["paging"] = pagination_detail($this->uri->segment(4),$prpage,$totalcount);
            $scms = getSingleValuee("cms","id",107);
            if($scms->banner==""){
                $banner = base_url("files/frontend/images/about-P-bg.jpg");
            }else{
                $banner = base_url("uploads/pages/".$scms->banner);
            }
            
            $headdata['beforeheads'] = getMeta("author",$user,$scms);
            $footerdata['footer'] = "";
            $bannerdata['title'] = $user->name;
            $bannerdata['brudcrumb'] = $scms->short_detail." ".$user->name;
            $bannerdata['banner'] = $banner;
            $leftmenudata["categories"] = "";
            $data['blogs'] = $blogs;
            $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
            $data['header'] = $this->load->view('includes/header', NULL, TRUE);
            $data['leftmenu'] = $this->load->view('includes/blog_leftmenu', $leftmenudata, TRUE);
            $data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);
            $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
            $data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);
            $this->load->view('blog',$data);
        }  
    }
    public function keywords_blogs($id)
    {
            $totalcount = $this->blogModel->count_keywords_all($id);

            $prpage = 6;
            $config = array();
            $config["base_url"] = base_url() . "keywords/".$id;
            $config["total_rows"] = $totalcount;
            $config["per_page"] = $prpage;
            $config["uri_segment"] = 4;
            $config["num_links"] = 3;
            $config["prefix"] = "/page/";
            $config['use_page_numbers'] = true;
            $config['full_tag_open'] = '<ul class="pagination hidden-xs pull-right">';
            $config['full_tag_close'] = '</ul><!--pagination-->';
            $config['first_link'] = '&laquo; First';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last &raquo;';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = 'Next &rarr;';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&larr; Previous';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';
            
            $apaginate = $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4)-1: 0;
            $data["links"] = $this->pagination->create_links();
            $blogs = $this->blogModel->key_blogs($id,$config["per_page"],$page*$prpage);
            $data["paging"] = pagination_detail($this->uri->segment(4),$prpage,$totalcount);
            $scms = getSingleValuee("cms","id",108);
            if($scms->banner==""){
                $banner = base_url("files/frontend/images/about-P-bg.jpg");
            }else{
                $banner = base_url("uploads/pages/".$scms->banner);
            }
            $tagg = getSingleValuee("tags","seo_tag",$id);
            $headdata['beforeheads'] = getMeta("tags",$tagg,$scms);
            $footerdata['footer'] = "";
            $bannerdata['title'] = $tagg->normal_tag;
            $bannerdata['brudcrumb'] = $scms->short_detail." ".$tagg->normal_tag;
            $bannerdata['banner'] = $banner;
            $leftmenudata["categories"] = "";
            $data['blogs'] = $blogs;
            $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
            $data['header'] = $this->load->view('includes/header', NULL, TRUE);
            $data['leftmenu'] = $this->load->view('includes/blog_leftmenu', $leftmenudata, TRUE);
            $data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);
            $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
            $data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);
            $this->load->view('blog',$data);
        
    }
    public function all_blogs()
    {
        $totalcount = $this->blogModel->count_all();
        $prpage = 6;
        $config = array();
        $config["base_url"] = base_url() . "blog";
        $config["total_rows"] = $totalcount;
        $config["per_page"] = $prpage;
        $config["uri_segment"] = 3;
        $config["num_links"] = 3;
        $config["prefix"] = "/page/";
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination hidden-xs pull-right">';
        $config['full_tag_close'] = '</ul><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        
        $apaginate = $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3)-1: 0;
        $data["links"] = $this->pagination->create_links();
        $data["paging"] = pagination_detail($this->uri->segment(3),$prpage,$totalcount);
        $blogs = $this->blogModel->get_all_front_blogs(null,"","",$config["per_page"],$page*$prpage);

        $scms = getSingleValuee("cms","id",145);
        if($scms->banner==""){
            $banner = base_url("files/frontend/images/about-P-bg.jpg");
        }else{
            $banner = base_url("uploads/pages/".$scms->banner);
        }
        
        //$headdata['beforeheads'] = "";
        $footerdata['footer'] = "";
        $bannerdata['title'] = $scms->title;
        $bannerdata['brudcrumb'] = $scms->short_detail;
        $bannerdata['banner'] = $banner;
        $leftmenudata["categories"] = "";
        $data['blogs'] = $blogs;
        $headdata['beforeheads'] = getMeta("cms",$scms->id);
        $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
        $data['header'] = $this->load->view('includes/header', NULL, TRUE);
        $data['leftmenu'] = $this->load->view('includes/blog_leftmenu', $leftmenudata, TRUE);
        $data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);
        $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
        $data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);
        $this->load->view('blog',$data);
         
    }
    public function submit_contact()
    {
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|xss_clean');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|xss_clean');
        
        $id = $this->input->post('contact',TRUE);
        $error_color = "#ff0000";$font_size = "12px";

        if ($this->form_validation->run() == FALSE)
        {
            $errors = array(
                "name" => form_error('name', '<span style="font-size:'.$font_size.';color:'.$error_color.'"><i style="color: '.$error_color.';" class="fa fa-exclamation-triangle"></i> ', '</span>'),
                "email" => form_error('email', '<span style="font-size:'.$font_size.';color:'.$error_color.'"><i style="color: '.$error_color.';" class="fa fa-exclamation-triangle"></i> ', '</span>'),
                "subject" => form_error('subject', '<span style="font-size:'.$font_size.';color:'.$error_color.'"><i style="color: '.$error_color.';" class="fa fa-exclamation-triangle"></i> ', '</span>'),
                "message" => form_error('message', '<span style="font-size:'.$font_size.';color:'.$error_color.'"><i style="color: '.$error_color.';" class="fa fa-exclamation-triangle"></i> ', '</span>'),
                "captcha" => form_error('captcha', '<span style="font-size:'.$font_size.';color:'.$error_color.'"><i style="color: '.$error_color.';" class="fa fa-exclamation-triangle"></i> ', '</span>')
            );
            $this->session->set_flashdata('error', $errors);
            redirect(base_url($id."/"));
        }else{
            $captcha = sanitize($this->input->post('captcha',TRUE));

            if($captcha==$this->session->userdata('captcha')){

                $name = sanitize($this->input->post('name',TRUE));
                $email = sanitize($this->input->post('email',TRUE));
                $subject = sanitize($this->input->post('subject',TRUE));
                $message = sanitize($this->input->post('message',TRUE));
                $template = getValuee("content","email_template","id",1);
                $ss = site_settings();
                $html = str_replace(array('[LOGO]','[SITENAME]','[NAME]','[EMAIL]','[SUBJECT]','[MESSAGE]','[CUSTOMERIP]','[URL]'), array(base_url("files/frontend/images/logo.png"),$ss->company_name,$name,$email,$subject,$message,$this->uIP,base_url()), $template);
                $this->send_email_to_user($email,"Contact Form",$html);
                //$this->send_email_to_user($ss->company_email,"Contact Form",$html);

                $this->session->set_flashdata('success', 'Form Submit Successfully');
                redirect(base_url($id."/"));
            }else{
                $errors = array(
                    "captcha" => '<span style="font-size:'.$font_size.';color:'.$error_color.'"><i style="color: '.$error_color.';" class="fa fa-exclamation-triangle"></i> Invalid Captcha</span>'
                );
                $this->session->set_flashdata('error', $errors);
                redirect(base_url($id."/"));
            }
            
        }

        //$this->session->userdata('captcha')
    }
    public function getfirmware()
    {
        $cid = $this->input->post('cid');
        $frims = $this->cmsModel->getselgalleries($cid,"firmware");

        $reponse['csrfName'] = $this->security->get_csrf_token_name(); 
        $reponse['csrfHash'] = $this->security->get_csrf_hash();
        

        if(!empty($frims)){
        $content = '
        <table id="example" class="table table-striped table-bordered tttttc" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">Image</th>
                <th class="text-center">Name</th>
            </tr>
        </thead>
        <tbody>';
            if (strpos($frims[0]->content, ',') !== false) {
                $galls = explode(",",$frims[0]->content);
                foreach($galls as $gall){
                    $content .= '
                    <tr>
                    <td><img class="img-responsive center-block" src="'.base_url("uploads/gallery/".getValuee("thumbnail","gallery","id",$gall)).'" alt="" width="50" height="50"></td>
                    <td>
                    <p style="text-align: center;"><i class="fa fa-download"></i> <a href="'.base_url("uploads/gallery/".getValuee("file","gallery","id",$gall)).'">'.getValuee("title","gallery","id",$gall).'</a></p>
                    </td>
                    </tr>
                    ';
                }
            }else{
                $content .= '
                    <tr>
                    <td><img class="img-responsive center-block" src="'.base_url("uploads/gallery/".getValuee("thumbnail","gallery","id",$frims[0]->content)).'" alt="" width="50" height="50"></td>
                    <td>
                    <p style="text-align: center;"><i class="fa fa-download"></i> <a href="'.base_url("uploads/gallery/".getValuee("file","gallery","id",$frims[0]->content)).'">'.getValuee("title","gallery","id",$frims[0]->content).'</a></p>
                    </td>
                    </tr>
                    ';
            }
        $content .= '
        </tbody>
		</table>
        ';
            $reponse['content'] = $content;
        }else{
            $reponse['content'] = "no data found yet!";
        }

        //$reponse['content'] = $frims; 



        echo json_encode($reponse);
        // $content = '
        // <table class="tg tg bor">
        // <tbody>
        // <tr>
        // <th class="tg-bg" style="text-align: center;">Firmware Version</th>
        // </tr>
        // <tr>
        // <td class="tg-031e">
        // <table class="tg2" style="undefined;table-layout: fixed; width: 100%;">
        // <colgroup>
        // <col style="width: 10%;">
        // <col style="width: 50%;">
        // <col style="width: 10%;">
        // <col style="width: 15%;">
        // <col style="width: 15%;"></colgroup>
        // <tbody>
        // <tr>
        // <th class="tg-s6z1">Image</th>
        // <th class="tg-s6z2">Name</th>
        // <th class="tg-031e">File Type</th>
        // <th class="tg-yw4l">Size</th>
        // <th class="tg-yw4l">Date</th>
        // </tr>
        // <tr>
        // <td class="tg-spn1" style="text-align: center;"><img class="size-medium wp-image-7780 aligncenter" src="https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-300x300.jpg" alt="" width="50" height="50" srcset="https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-300x300.jpg 300w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-374x374.jpg 374w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-80x80.jpg 80w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-768x768.jpg 768w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-187x187.jpg 187w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-100x100.jpg 100w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-560x560.jpg 560w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-367x367.jpg 367w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-85x85.jpg 85w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-50x50.jpg 50w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09.jpg 1000w" sizes="(max-width: 50px) 100vw, 50px"></td>
        // <td class="tg-4eph" style="text-align: center;">
        // <p style="text-align: center;"><i class="fa fa-download"></i> <a href="https://www.intercel.com.au/wp-content/uploads/2015/06/UltraSAM4W_V0.0.9.gzip">UltraSAM UFIRMWARE V0.0.9 Download</a></p>
        // </td>
        // <td class="tg-b7b8" style="text-align: center;">PDF</td>
        // <td class="tg-b7b8" style="text-align: center;">500 KB</td>
        // <td class="tg-4eph" style="text-align: center;">July 17</td>
        // </tr>
        // <tr>
        // <td class="tg-spn1" style="text-align: center;"><img class="size-medium wp-image-7780 aligncenter" src="https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-300x300.jpg" alt="" width="50" height="50" srcset="https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-300x300.jpg 300w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-374x374.jpg 374w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-80x80.jpg 80w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-768x768.jpg 768w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-187x187.jpg 187w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-100x100.jpg 100w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-560x560.jpg 560w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-367x367.jpg 367w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-85x85.jpg 85w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09-50x50.jpg 50w, https://www.intercel.com.au/wp-content/uploads/2017/07/UltraSAM4G-09.jpg 1000w" sizes="(max-width: 50px) 100vw, 50px"></td>
        // <td class="tg-4eph" style="text-align: center;">
        // <p style="text-align: center;"><i class="fa fa-download"></i> <a href="https://www.intercel.com.au/wp-content/uploads/2015/09/UltraSAM4W_V0.0.10.gzip">FIRMWARE V0.0.10 (SPECIAL FIRMWARE FOR DDNS REMOTE CONNECTION)</a></p>
        // </td>
        // <td class="tg-b7b8" style="text-align: center;">PDF</td>
        // <td class="tg-b7b8" style="text-align: center;">500 KB</td>
        // <td class="tg-4eph" style="text-align: center;">July 17</td>
        // </tr>
        // </tbody>
        // </table>
        // </td>
        // </tr>
        // </tbody>
        // </table>
        // ';
    }


    public function dealer_form()
    {
        $this->load->helper('security');
        $captcha = sanitize($this->input->post('captcha',TRUE));
        $name = sanitize($this->input->post('first_name_main_contact',TRUE));
        $email = sanitize($this->input->post('email_address_main_contact',TRUE));
        $company = sanitize($this->input->post('registered_name',TRUE));

        if($captcha==$this->session->userdata('captcha')){
            $allposts = $this->input->post(NULL, TRUE);
            $removeposts = array("captcha");
            $filterdposts =array_diff_key($allposts,array_flip($removeposts));
            $emailcontent = '';
            $dbdatatojson = array();
            foreach($filterdposts as $input=>$value){
                if(is_array($value)){$value = implode(', ', $value);}
                $emailcontent .= '<strong>'.tUc($input).'</strong>: '.sanitize($value).'<br>';
                $dbdatatojson[tUc($input)] = sanitize($value);
            }
            $form_subject = "Dealership Form";
            $template = getValuee("content","email_template","id",4);
            $ss = site_settings();
            $emailtemplateheading = $form_subject;
            $html = str_replace(array('[LOGO]','[SITENAME]','[EMAILCONTENT]','[HEADING]','[CUSTOMERIP]','[URL]'), array(base_url("files/frontend/images/logo.png"),$ss->company_name,$emailcontent,$emailtemplateheading,$this->uIP,base_url()), $template);
            $this->send_email_to_user($email,$form_subject,$html);

            $dealershipdata = array(
                'name' => $name,
                'company' => $company,
                'email' => $email,
                'data' => json_encode($dbdatatojson)
            );

            if($this->cmsModel->add_dealership($dealershipdata)){
                $formnotice["success"] = array("Form submit successfully.");
                $this->session->set_userdata('formnotice', $formnotice);
                redirect(base_url('dealer-application'));
            }else{
                $formnotice["errors"] = array("Somthing wrong please try again");
                $this->session->set_userdata('formnotice', $formnotice);
                redirect(base_url('dealer-application'));
            }
        }else{
            $formnotice["errors"] = array("Invalid Captcha");
            $this->session->set_userdata('formnotice', $formnotice);
            redirect(base_url('dealer-application'));
        }

        //$this->session->userdata('captcha')
    }

    public function feedback_form()
    {
        $this->load->helper('security');
        $captcha = sanitize($this->input->post('captcha',TRUE));
        $name = sanitize($this->input->post('name',TRUE));
        $email = sanitize($this->input->post('email',TRUE));
        $company = sanitize($this->input->post('company',TRUE));

        if($captcha==$this->session->userdata('captcha')){
            $allposts = $this->input->post(NULL, TRUE);
            $removeposts = array("captcha");
            $filterdposts =array_diff_key($allposts,array_flip($removeposts));
            $emailcontent = '';
            $dbdatatojson = array();
            foreach($filterdposts as $input=>$value){
                if(is_array($value)){$value = implode(', ', $value);}
                $emailcontent .= '<strong>'.tUc($input).'</strong>: '.sanitize($value).'<br>';
                $dbdatatojson[tUc($input)] = sanitize($value);
            }
            $form_subject = "Feedback Form";
            $template = getValuee("content","email_template","id",4);
            $ss = site_settings();
            $emailtemplateheading = $form_subject;
            $html = str_replace(array('[LOGO]','[SITENAME]','[EMAILCONTENT]','[HEADING]','[CUSTOMERIP]','[URL]'), array(base_url("files/frontend/images/logo.png"),$ss->company_name,$emailcontent,$emailtemplateheading,$this->uIP,base_url()), $template);
            $this->send_email_to_user($email,$form_subject,$html);

            $dealershipdata = array(
                'name' => $name,
                'company' => $company,
                'email' => $email,
                'data' => json_encode($dbdatatojson)
            );

            if($this->cmsModel->add_feedback($dealershipdata)){
                $formnotice["success"] = array("Form submit successfully.");
                $this->session->set_userdata('formnotice', $formnotice);
                redirect(base_url('frequently-asked-question/'));
            }else{
                $formnotice["errors"] = array("Somthing wrong please try again");
                $this->session->set_userdata('formnotice', $formnotice);
                redirect(base_url('frequently-asked-question/'));
            }
        }else{
            $formnotice["errors"] = array("Invalid Captcha");
            $this->session->set_userdata('formnotice', $formnotice);
            redirect(base_url('frequently-asked-question/'));
        }

        //$this->session->userdata('captcha')
    }
    public function credit_form()
    {
        $this->load->helper('security');
        $captcha = sanitize($this->input->post('captcha',TRUE));
        $name = NULL;
        $email = sanitize($this->input->post('email',TRUE));
        $company = sanitize($this->input->post('company_name',TRUE));
        if($captcha==$this->session->userdata('captcha')){
            $allposts = $this->input->post(NULL, TRUE);
            $removeposts = array("captcha");
            $filterdposts =array_diff_key($allposts,array_flip($removeposts));
            $emailcontent = '';
            $dbdatatojson = array();
            foreach($filterdposts as $input=>$value){
                if(is_array($value)){$value = implode(', ', $value);}
                $emailcontent .= '<strong>'.tUc($input).'</strong>: '.sanitize($value).'<br>';
                $dbdatatojson[tUc($input)] = sanitize($value);
            }
            $form_subject = "Credit Account Request Form";
            $template = getValuee("content","email_template","id",4);
            $ss = site_settings();
            $emailtemplateheading = $form_subject;
            $html = str_replace(array('[LOGO]','[SITENAME]','[EMAILCONTENT]','[HEADING]','[CUSTOMERIP]','[URL]'), array(base_url("files/frontend/images/logo.png"),$ss->company_name,$emailcontent,$emailtemplateheading,$this->uIP,base_url()), $template);
            $this->send_email_to_user($email,$form_subject,$html);

            $dealershipdata = array(
                'name' => $name,
                'company' => $company,
                'email' => $email,
                'data' => json_encode($dbdatatojson)
            );

            if($this->cmsModel->add_credit($dealershipdata)){
                $formnotice["success"] = array("Form submit successfully.");
                $this->session->set_userdata('formnotice', $formnotice);
                redirect(base_url('open-a-credit-account/'));
            }else{
                $formnotice["errors"] = array("Somthing wrong please try again");
                $this->session->set_userdata('formnotice', $formnotice);
                redirect(base_url('open-a-credit-account/'));
            }
        }else{
            $formnotice["errors"] = array("Invalid Captcha");
            $this->session->set_userdata('formnotice', $formnotice);
            redirect(base_url('open-a-credit-account/'));
        }

        //$this->session->userdata('captcha')
    }
    public function submit_subs()
    {
        $this->load->helper('security');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|xss_clean');
        //$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|xss_clean');
        
        $id = $this->input->post('return',TRUE);
        $error_color = "#ff8888";$font_size = "12px";

        if ($this->form_validation->run() == FALSE)
        {
            $errors = array(
                "email" => form_error('email', '<span style="font-size:'.$font_size.';color:'.$error_color.'"><i style="color: '.$error_color.';" class="fa fa-exclamation-triangle"></i> ', '</span>'),
                //"captcha" => form_error('captcha', '<span style="font-size:'.$font_size.';color:'.$error_color.'"><i style="color: '.$error_color.';" class="fa fa-exclamation-triangle"></i> ', '</span>')
            );
            $this->session->set_flashdata('subserror', $errors);
            redirect(base_url($id."/#subscribe"));
        }else{
          
            $email = sanitize($this->input->post('email',TRUE));
                //$title = sanitize($this->input->post('title',TRUE));

                $sql = "INSERT INTO email_list (email) VALUES ( ".$this->db->escape($email).")";
                $this->db->query($sql);

            $template = getValuee("content","email_template","id",4);
            $ss = site_settings();
            $html = str_replace(array('[LOGO]','[SITENAME]','[EMAIL]','[URL]'), array(base_url("files/frontend/images/logo.png"),$ss->company_name,$email,base_url()), $template);
            $this->send_email_to_user($email,"Email Subscribe Request",$html);
            $this->session->set_flashdata('subssuccess', 'Form Submit Successfully');
            redirect(base_url($id."/#subscribe"));

        }

        //$this->session->userdata('captcha')
    }
    public function pay_online(){
        $this->load->view('pay_online');
    }
    public function open_credit_account(){

        $this->load->view('open-a-credit-account');
    }
    public function credit_account_submit(){
        
        $business_name = $this->input->post('business_name');
        $trading_name = $this->input->post('trading_name');
        $business_email = $this->input->post('business_email');
        $name_of_proprietor = $this->input->post('name_of_proprietor');
        $d_building = $this->input->post('d_building');
        $d_suite = $this->input->post('d_suite');
        $d_postcode = $this->input->post('d_postcode');
        $d_city = $this->input->post('d_city');
        $d_state = $this->input->post('d_state');
        $p_building = $this->input->post('p_building');
        $p_suite = $this->input->post('p_suite');
        $p_postcode = $this->input->post('p_postcode');
        $p_city = $this->input->post('p_city');
        $p_state = $this->input->post('p_state');
        $phone = $this->input->post('phone');
        $fax = $this->input->post('fax');
        $mobile_no = $this->input->post('mobile_no');
        $email = $this->input->post('email');
        $business_category = $this->input->post('business_category');
        $business_q1 = $this->input->post('business_q1');
        $business_q2 = $this->input->post('business_q2');
        $trade_ref_person1 = $this->input->post('trade_ref_person1');
        $trade_ref_person1_phone = $this->input->post('trade_ref_person1_phone');
        $trade_ref_person2 = $this->input->post('trade_ref_person2');
        $trade_ref_person2_phone = $this->input->post('trade_ref_person2_phone');
        $read_condition = $this->input->post('read_condition');
        
        $array_data = array(
                'business_name' => $business_name,
                'trading_name' => $trading_name,
                'business_email' => $business_email,
                'name_of_proprietor' => $name_of_proprietor,
                'd_building' => $d_building,
                'd_suite' => $d_suite,
                'd_postcode' => $d_postcode,
                'd_city' => $d_city,
                'd_state' => $d_state,
                'p_building' => $p_building,
                'p_suite' => $p_suite,
                'p_postcode' => $p_postcode,
                'p_city' => $p_city,
                'p_state' => $p_state,
                'phone' => $phone,
                'fax' => $fax,
                'mobile_no' => $mobile_no,
                'email' => $email,
                'business_category' => $business_category,
                'business_q1' => $business_q1,
                'business_q2' => $business_q2,
                'trade_ref_person1' => $trade_ref_person1,
                'trade_ref_person1_phone' => $trade_ref_person1_phone,
                'trade_ref_person2' => $trade_ref_person2,
                'trade_ref_person2_phone' => $trade_ref_person2_phone,
                'read_condition' => $read_condition,
                
            );
            $this->db->insert('tbl_credit_account_request',$array_data);
            $this->session->set_flashdata('success','Your Basic Info Successfully Updated.');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
            
    }
    public function shop(){
        $headdata['beforeheads'] = getMeta("settings",1);
        $footerdata['footer'] = "";
        $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
        $data['header'] = $this->load->view('includes/header', NULL, TRUE);
        $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
        $data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);

        $this->load->view('shop',$data);
    }
    public function offer(){
        $headdata['beforeheads'] = getMeta("settings",1);
$this->load->view('offer',$headdata);
    }
    public function student(){
        $this->load->view('student');
    }
    public function student_submit(){
        
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $institute = $this->input->post('institute');
        $id_number = $this->input->post('id_number');
        $area_of_study = $this->input->post('area_of_study');
        $study_year = $this->input->post('study_year');
        $contact = $this->input->post('contact');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        
        $array_data = array(
                'fname' => $fname,
                'lname' => $lname,
                'institute' => $institute,
                'id_number' => $id_number,
                'area_of_study' => $area_of_study,
                'study_year' => $study_year,
                'contact' => $contact,
                'email' => $email,
                'address' => $address,
            );
            $this->db->insert('student_request_form',$array_data);
            $this->session->set_flashdata('success','Your Basic Info Successfully Updated.');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
            
    }
    public function weekly_promotion(){
        $this->load->view('weekly_promotion');
    }
    
    
    
    public function placeorderindb()
	{

		// Card Data 
		$cardholdername = $this->input->post('cardholdername');
		$cardno = $this->input->post('card_num');
		$card_exp_month = $this->input->post('card_exp_month');
		$card_exp_year = $this->input->post('card_exp_year');
		$card_cvc = $this->input->post('card_cvc');
		$cardsave = $this->input->post('cardsave');
		$amount = $this->input->post('amount');
		// Cart Data
		
		////// Count Order No
		
		
			require_once('application/libraries/stripe/init.php');
		
			\Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
		
			$stripe = \Stripe\Charge::create ([
					"amount" => $amount*100,
					"currency" => "usd",
					"source" => $this->input->post('stripeToken'),
					"description" => "" 
			]);
			if($stripe->status=="succeeded"){
			    echo "work";
			}
			
			$this->session->set_flashdata('success','Your Payment Transfer.');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
		
		
	}
    
    
    
    
    
}