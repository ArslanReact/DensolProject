</main>
<div id="snackbar">Your Message Successfully Send.</div>
<div id="snackbarerror">Please fill captcha also.</div>
<button class="open-button" onclick="openForm()"><img src="<?=base_url();?>files/frontend/images/livechat.svg" width="25" /></button>
<div class="chat-popup" id="myForm">
    <div style="border-radius: 12px 12px 0 0;padding: 10px;min-height: 75px;color: white;transition: height 160ms ease-out 0s;background: linear-gradient(135deg, rgb(2 87 146) 0%, rgb(2 87 146) 100%);">
            <div opacity="1">
                <div>
                    <div>
                        <img src="<?=base_url();?>files/frontend/images/logo.png" alt="Logo" width="150">
                    </div>
                    <h1>
                        <div style="font-size: 32px; max-width: 296px;">
                        <span class="text-white">Hi there 👋</span>
                    </div>
                </h1>
                <p>
                    <span class="text-white">How can we help you today?</span>
                </p>
            </div>
        </div>
    </div>
  <form action="<?php echo base_url('livechat'); ?>" method="post" id="liveform" class="form-container">
    <h2 class="" style="font-weight: 600 !important;">Offline Message</h2>

    <label for="msg"><b>Your Name</b></label>
    <input type="text" class="form-control" placeholder="enter your name" name="name" required />
    <label for="msg"><b>Your Phone</b></label>
    <input class="form-control"  type="text" min="10" max="10" id="phone" placeholder="Enter your phone no"  pattern="[04]{1}[0-9]{9}" title="Phone number with 04 and remaing 9 digit with 0-9" name="phone" required />
    <label class="msg mt-2"><b>Your Email</b></label>
    <input type="email" class="form-control" placeholder="enter your email" name="email" required />
    <label class="msg mt-2"><b>Your Message</b></label>
    <textarea class="form-control mb-3" placeholder="Type message.." rows="5" name="msg" required></textarea>
    <div class="g-recaptcha mb-2"  data-sitekey="6Lf4aL0dAAAAAKlHNsu7vTDhRSEDVg9SauOuqiRq"></div>
    <div class="d-flex align-items-center">
        <button type="submit" class="btn btn-blue-fill borderradius50 mr-2 w-100">Send</button>
        <button type="button" class="btn btn-blue-fill borderradius50 w-100" onclick="closeForm()">Close</button>
    </div>
  
  </form>
</div>
<footer class="footer">
    <div class="col-10 mx-auto mb-md-5">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                <a href="<?=base_url();?>" class="m-b-25 d-block"><img class="img-fluid" src="<?=base_url();?>files/frontend/images/logo.png" alt="" width="300"></a>
                <p class="fontsize14 text-white">A company that entails the experience of more than six decades in manufacturing and selling Surgical instruments, Dental instruments worldwide</p>
            </div>
            <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <h5 class="fontwieghtbold fontsize24 m-b-15 pt-md-5">Contact Us</h5>
                <p class="align-items-center fontsize14 d-flex text-white"><i class="fas fa-map-marker-alt mr-4 fontsize18"></i> 6 Moonah Ave Brookfield VIC 3338</p>
                <p class="align-items-center fontsize14 d-flex text-white"><i class="fas fa-phone-alt mr-4 fontsize18"></i> 1300 920 097</p>
                <p class="align-items-center fontsize14 d-flex text-white"><i class="far fa-envelope mr-4 fontsize18"></i> sales@densol.com.au</p>
                <p class="align-items-center fontsize14 d-flex text-white"><i class="far fa-clock mr-4 fontsize18"></i> 9:00am-4:00pm Weekdays</p>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                <h5 class="fontwieghtbold fontsize24 m-b-15 pt-md-5">Information</h5>
                <ul class="list-unstyled bottom-links">
                    <li><a href="<?php echo getSeoLink("cms",144);?>" class="linked">Sterilizing & Cleaning Instructions</a></li>
                    <li><a href="<?php echo getSeoLink("cms",143);?>" class="linked">Credit Terms</a></li>
                    <li><a href="<?php echo getSeoLink("cms",142);?>" class="linked">Warranty policy</a></li>
                    <li><a href="<?php echo getSeoLink("cms",125);?>">Manufacturing Process</a> </li>
                    <li><a href="<?php echo getSeoLink("cms",105);?>">Privacy Policy</a> </li>
                </ul>
            </div> 
            <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                <h5 class="fontwieghtbold fontsize24 m-b-15 pt-md-5">Services</h5>
                <ul class="list-unstyled bottom-links">
                    <li><a href="<?=base_url("pay-online/");?>" class="linked">Pay Bills Online</a></li>
                    <li><a href="<?=base_url('open-a-credit-account/');?>" class="linked">Open A Credit Account</a></li>
                    <li><a href="<?php echo getSeoLink("cms",141);?>" class="linked">Become A Distributor</a></li>
                    <li><a href="<?php echo getSeoLink("cms",110);?>" class="linked">Medical Rep</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="lightdarkblusecolorbg col-10 mx-auto px-4 py-2 borderradius-top-right-left10">
        <div class="row align-items-center">
            <div class="col-lg-4 col-sm-12 text-center text-sm-left">
                <div class="social text-md-center text-lg-left">
                    <a href="https://www.facebook.com/arinstrumedAU" target="new" class="d-inline-block mr-2"><i class="fab fa-facebook-f fontsize14"></i></a>
                    <a href="" class="d-inline-block mr-2"><i class="fab fa-twitter fontsize14"></i></a>
                    <a href="" class="d-inline-block mr-2"><i class="fab fa-linkedin-in fontsize14"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 text-center text-sm-center"><p class="fontsize14 fontwieghtmedium text-white align-items-center d-flex justify-content-center ">©Copyright <a href="<?=base_url();?>" class="align-items-center d-inline-flex mx-1 w-129 justify-content-center"><img class="img-fluid" src="<?=base_url();?>files/frontend/images/copyrightlogowhite.svg" alt="" width="80" ></a> <?php echo date('Y')?></p></div>
             <div class="col-lg-4 col-sm-12 text-center text-lg-right"><p class="fontsize14 fontwieghtmedium text-white align-items-center d-inline-flex">Designed &amp; Developed By <a href="https://tecmyer.com.au/" target="_blank" class="ml-2"><img class="img-fluid" src="<?=base_url();?>files/frontend/images/tecmyer.png" alt="" width="100"></a></p></div>
        </div>
    </div>
</footer>
<a href="#" class="scroll-top" id="scroll-top">
    <i class="arrow-top fas fa-long-arrow-alt-up"></i>
    <i class="arrow-bottom fas fa-long-arrow-alt-up"></i>
</a>

<script>
window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};
 <?php if($this->session->flashdata('chatsuccess') != ''){ ?> 
    var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
 <?php } ?>  
 <?php if($this->session->flashdata('chatsuccesserror') != ''){ ?> 
    var y = document.getElementById("snackbarerror");
  y.className = "show";
  setTimeout(function(){ y.className = y.className.replace("show", ""); }, 5000);
 <?php } ?>  
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}



 $("#liveform").submit(function(e) {
    e.preventDefault();
var phoneno = document.getElementById("phone").value;
  var phoneno = phoneno.toString();
  var check = phoneno.startsWith("04");
  
  if(check == true)
  {
      document.getElementById("liveform").submit();
      return true;
  }
  else
  {
     alert("Not a valid Phone Number .Phone number must start with 04");
     return false;
  }
});


</script>