<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="<?=base_url();?>files/backend/images/favicon.ico"/>
    <link rel="stylesheet" href="<?=base_url();?>files/backend/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme_bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme-style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .nlink{
            padding: 2px 10px 3px !important;
        }
        .dataTables_wrapper .dataTables_info{ float: none;}
    </style>
</head>
  <body>
    <!-- Side Navbar -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>
    <div class="col-xl-10 col-lg-9">
        <!-- dashboard content -->
        <div class="content-page-admin">
      <!-- navbar-->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!-- Header Section-->
        <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>
          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                <h2 class="display h4">Edit Product</h2>
                <p>Edit Product by Entring required detail.</p>
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/products/update',$attributes);
                ?>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Title</label>
                                <input type="text" name="title" value="<?php echo $product->title;?>" class="form-control" required="">
                            </div>
                        </div>
                        <!--<div class="col-md-4">-->
                        <!--    <div class="form-group">-->
                        <!--        <label>Product Image ALT</label>-->
                        <!--        <input type="text" name="img_alt" value="<?php //echo $product->img_alt;?>" class="form-control" >-->
                        <!--    </div>-->
                        <!--</div>                        -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" name="slug" value="<?php echo $product->slug;?>" class="form-control" >
                            </div>
                        </div>                        
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Article/Model (Required)</label>
                                <input type="text" name="article" value="<?php echo $product->article;?>" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Category</label>
                                <div class="menubuilder">
                                    <?php echo buildMenu($categories,$sel_cat);?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Short Description(Optional)</label>
                                <textarea class="form-control editor" name="short_detail" rows="3"><?php echo $product->short_detail;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Full Description</label>
                                <textarea class="form-control editor" name="full_detail" rows="3"><?php echo $product->full_detail;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 m-t-10">
                            <div class="form-group">
                                <label>Product Image</label>
                                <div class="custom-file">
                                    <input type="file" name="product" id="customFile">
                                    <label for="customFile">Choose files To Upload</label>
                                    <?php if($product->image != ""){?>
                                    <img src="<?php echo base_url()."uploads/products/small/".$product->image;?>" style="max-height: 80px; margin-bottom: 15px;">
                                    <div class="checkbox-container">
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="del_image" value="1">
                                            <span class="checkbox-custom rectangular"></span>
                                        </label>
                                        Delete
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 m-t-10">
                            <div class="form-group tagsll">
                                <label>Product Tags</label>
                                <input class="form-control" name="tags" value="<?php echo implode(",",$sel_tags);?>" data-role="tagsinput">
                            </div>
                        </div>
                        
                        <div class="col-md-12 m-t-10">
                            <h6>Inventory</h6>
                            <?php $stocks = getSingleValuee("item_stock","stock_item_fk",$product->id);?>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="text" class="form-control" name="qty" value="<?php echo $stocks->stock_quantity;?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Weight</label>
                                        <input type="text" class="form-control" name="weight" value="<?php echo $product->weight;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Auto Allocate Stock</label>
                                        <select name="stock_availability" class="form-control">
                                            <option <?php if($stocks->stock_auto_allocate_status=="1"){echo "selected";}?> value="1">Yes</option>
                                            <option <?php if($stocks->stock_auto_allocate_status=="0"){echo "selected";}?> value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        $usergroups = getAlluserGroups();
                        if(!empty($usergroups)){
                        ?>
                        <div class="col-md-12 m-t-10">
                            <h6>Product Price</h6>
                        </div>
                        <div class="col-md-12 prdvar">
                            <div id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom:15px;">
                                <?php
                                foreach($usergroups as $usergroup){
                                $groupprice = getprodsprice($product->id,$usergroup->id);
                                ?>
                                <div class="accordion-panel" style="border: 1px solid #ddd;margin-bottom:10px;">
                                    <div class="accordion-heading" role="tab" id="grouppriceextra<?php echo $usergroup->id;?>">
                                        <h3 class="card-title accordion-title" style="margin-bottom:0;">
                                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                            data-parent="#accordion" href="#grouppriceextrain<?php echo $usergroup->id;?>"
                                            aria-expanded="true" aria-controls="grouppriceextrain<?php echo $usergroup->id;?>" style="padding: 14px 10px;display:block;color:#ffb901;">
                                            <?php echo $usergroup->title." Price";?>
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="grouppriceextrain<?php echo $usergroup->id;?>" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="grouppriceextra<?php echo $usergroup->id;?>">
                                        <div class="accordion-content accordion-desc menubuilder" style="padding: 0 10px 10px 10px;">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input type="hidden" name="groupprice[<?php echo $usergroup->id;?>][id]" value="<?php echo $usergroup->id;?>">
                                                        <input type="text" class="form-control" name="groupprice[<?php echo $usergroup->id;?>][price]" value="<?php echo $groupprice->price;?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Sale Price</label>
                                                        <input type="text" class="form-control" name="groupprice[<?php echo $usergroup->id;?>][sale_price]" value="<?php echo $groupprice->sale_price;?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Start Sale</label>
                                                        <?php if($groupprice->sale_start==0){$tpslatestart="";}else{$tpslatestart=date('Y-m-d', strtotime($groupprice->sale_start));}?>
                                                        <input type="date" class="form-control" name="groupprice[<?php echo $usergroup->id;?>][sale_start]" value="<?php echo $tpslatestart;?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>End Sale</label>
                                                        <?php if($groupprice->sale_end==0){$tpslateend="";}else{$tpslateend=date('Y-m-d', strtotime($groupprice->sale_end));}?>
                                                        <input type="date" class="form-control" name="groupprice[<?php echo $usergroup->id;?>][sale_end]" value="<?php echo $tpslateend;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <?php }?>

                        <div class="col-md-12 m-t-10">
                            <h6>Product Boundel</h6>
                        </div>
                        <div class="col-md-12">
                            <div class="cloneyabx">
                                <?php if($sel_specs){
                                foreach($sel_specs as $sel_spec){?>
                                <div class="row toclone m-t-20" style="position:relative;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input class="form-control" name="specih[]" value="<?php echo $sel_spec->title;?>" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" type="text" name="speciv[]" value="<?php echo $sel_spec->content;?>">
                                        </div>
                                        </div>
                                   
                                    <button style="position:absolute;top:20px;right:40px;" type="button" class="btn btn-success clone">
                                    <i class="fa fa-plus"></i>
                                    </button>
                                    <button style="position:absolute;top:20px;right:0;" type="button" class="btn btn-danger delete">
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <?php }}else{?>
                                <div class="row toclone m-t-20" style="position:relative;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input class="form-control" name="specih[]" type="text">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="form-control " name="speciv[]">
                                        </div>
                                    </div>
                                    <button style="position:absolute;top:20px;right:40px;" type="button" class="btn btn-success clone">
                                    <i class="fa fa-plus"></i>
                                    </button>
                                    <button style="position:absolute;top:20px;right:0;" type="button" class="btn btn-danger delete">
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <?php }?>
                            </div>
                        </div>

                        <?php
                        $vgroups = getValues("variation_group",null,null,null,"sort","ASC");
                        if(!empty($vgroups)){
                        ?>
                        <div class="col-md-12 m-t-10">
                            <h6>Product Variation (Optional)</h6>
                        </div>
                        <div class="col-md-12 prdvar">
                            <div id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom:15px;">
                                <?php
                                foreach($vgroups as $vgroup){
                                    switch ($vgroup->type) {
                                        case "check":
                                            $vvtype = "Checkbox eg: multi selection";
                                            break;
                                        case "select":
                                            $vvtype = "Select Box eg: single selection dropdown";
                                            break;
                                        case "radio":
                                            $vvtype = "Radio Box eg: single selection";
                                            break;
                                        default:
                                            $vvtype = "Select Box";
                                    }
                                ?>
                                <div class="accordion-panel" style="border: 1px solid #ddd;">
                                    <div class="accordion-heading" role="tab" id="variationextra<?php echo $vgroup->id;?>">
                                        <h3 class="card-title accordion-title" style="margin-bottom:0;">
                                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                            data-parent="#accordion" href="#variation<?php echo $vgroup->id;?>"
                                            aria-expanded="true" aria-controls="variation<?php echo $vgroup->id;?>" style="padding: 14px 10px;display:block;color:#ffb901;">
                                            <?php echo $vgroup->title.' <span style="font-size: 12px; color: #808080; font-weight:400;">('.$vvtype.')</span><span class="pull-right" style="font-size: 12px; color: #808080;">'.$vgroup->helper_name.'</span>';?>
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="variation<?php echo $vgroup->id;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="variationextra<?php echo $vgroup->id;?>">
                                        <div class="accordion-content accordion-desc menubuilder" style="padding: 0 10px 10px 10px;">
                                        
                                            <?php
                                            $voptions = getValues("variations","group_id",$vgroup->id,null,"sort","ASC");
                                            if(isset($voptions)){
                                                foreach($voptions as $voption){
                                                if (in_array($voption->id, $sel_vars)){$sell = "checked";}else{$sell = "";}
                                                ?>
                                                <div class="checkbox-container"><label class="checkbox-label"><input type="checkbox" name="pvar[]" <?php echo $sell;?> value="<?php echo $voption->id;?>"><span class="checkbox-custom rectangular"></span></label></div>
                                                <span style="margin-right:10px;"><?php echo $voption->title;?></span>
                                                <?php 
                                                }
                                            }else{echo "no options created";}
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <?php }?>
                        
                        <!--<div class="col-md-12 m-t-10">-->
                        <!--    <h6>Related Products</h6>-->
                        <!--</div>-->
                        <!--<div class="col-md-12 prdvar">-->
                        <!--    <div id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom:15px;">-->
                        <!--        -- loop start --->
                        <!--        <div class="accordion-panel" style="border: 1px solid #ddd;">-->
                        <!--            <div class="accordion-heading" role="tab" id="variationextra999111">-->
                        <!--                <h3 class="card-title accordion-title" style="margin-bottom:0;">-->
                        <!--                    <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"-->
                        <!--                    data-parent="#accordion" href="#variation999111"-->
                        <!--                    aria-expanded="true" aria-controls="variation999111" style="padding: 14px 10px;display:block;color:#ffb901;">-->
                        <!--                    Open / Close <span style="font-size: 12px; color: #808080; font-weight:400;">(select which products appear on the related section)</span>-->
                        <!--                    </a>-->
                        <!--                </h3>-->
                        <!--            </div>-->
                        <!--            <div id="variation999111" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="variationextra999111">-->
                        <!--                <div class="accordion-content accordion-desc menubuilder" style="padding: 0 10px 10px 10px;">-->
                        <!--                    <div class="menubuilder">-->
                        <!--                        <?php echo buildRelated($type="product",$product->id);?>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        -- loop end--->
                        <!--    </div>-->
                        <!--</div>-->

                        <div class="col-md-12 m-t-10">
                            <h6>SEO Information</h6>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Seo Title</label>
                                <input class="form-control" value="<?php echo $product->meta_title;?>" name="meta_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea class="form-control" name="meta_desc" rows="3"><?php echo $product->meta_desc;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Keyword</label>
                                <textarea class="form-control" name="meta_key" rows="3"><?php echo $product->meta_key;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <label for="customRadio">Publish</label>
                                                <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="is_active" value="1" id="customRadio3"  <?php if($product->is_active==1){?>checked="checked"<? }?>>
                                                <label class="custom-control-label" for="customRadio3">Yes</label>
                                                </div>
                                            </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="is_active" value="0" id="customRadio4" <?php if($product->is_active==0){?>checked="checked"<? }?>>
                                                <label class="custom-control-label" for="customRadio4">No</label>
                                                </div>
                                            </fieldset>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <label for="customRadio">Featured</label>
                                                <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="is_featured" value="1" id="customRadio6" <?php if($product->is_featured==1){?>checked="checked"<? }?>>
                                                <label class="custom-control-label" for="customRadio6">Yes</label>
                                                </div>
                                            </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="is_featured" value="0" id="customRadio7" <?php if($product->is_featured==0){?>checked="checked"<? }?>>
                                                <label class="custom-control-label" for="customRadio7">No</label>
                                                </div>
                                            </fieldset>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <label for="customRadio">This products for weekly Promotion</label>
                                                <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="promotion" value="1" id="customRadio8" <?php if($product->promotion==1){?>checked="checked"<? }?>>
                                                <label class="custom-control-label" for="customRadio8">Yes</label>
                                                </div>
                                            </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="promotion" value="0" id="customRadio9" <?php if($product->promotion==0){?>checked="checked"<? }?>>
                                                <label class="custom-control-label" for="customRadio9">No</label>
                                                </div>
                                            </fieldset>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sort</label>
                                <input class="form-control" name="sort" value="<?php echo $product->sort;?>" required="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        <div class="btn-group mt-30px col">
                            <input type="hidden" name="page_id" value="<?php echo $product->id;?>">
                            <!-- <button type="button" class="btn btn-custopm">Cancel</button> -->
                            <a href="<?php echo base_url(ADMIN_FOLDER."/products/");?>" class="btn btn-all m-r-10">Cancel</a>
                            <button type="submit" class="btn btn-all bg-green float-right">Submit</button>
                        </div>
                        </div>
                    </div>                     
                </form>
              </div>
            </div>
          </div>
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div></div>
    <!-- JavaScript files-->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts-bk");?>
    <script src="<?php echo base_url("files/backend/js/jquery-cloneya.min.js");?>"></script>
    <script>
    $(document).ready(function(){
        $('.cloneyabx').cloneya()
        .on('before_clone.cloneya', function (e, limit, toclone) {
            tinymce.remove();
        })
        .on('after_append.cloneya', function (e, limit, toclone) {
            setTimeout(function() {addTinyMCE(".editor");}, 50);
        });
    });
    </script>
  </body>
</html>