<script src="<?=base_url();?>files/backend/js/theme-jquery.min.js"></script>
<script src="<?=base_url();?>files/backend/js/theme-bootstrap.bundle.js"></script>
<script src="<?=base_url();?>files/backend/js/theme_slider-custom.js"></script>
<!-- chart -->
<script src="<?=base_url();?>files/backend/charts/canvasjs.min.js"></script>
<script src="<?=base_url();?>files/backend/charts/theme-chart.js"></script>
<script src="<?=base_url();?>files/backend/charts/theme-client.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bulma.min.js"></script>
<script src='<?=base_url();?>files/backend/js/tinymce/tinymce.min.js'></script>
<script>
    $(document).ready(function() {
        addTinyMCE(".editor");
        $('#alertbox').delay(10000).fadeOut('slow');
        $('#alertbox div, #alertbox p').click(function() {
            $(this).hide();
        });
        $('#datatable').DataTable({
            responsive: true,
        drawCallback: function () {
                $('.dataTables_filter input').addClass('form-control ml-3');
               $('.dataTables_filter label').addClass('d-flex align-items-center');
               $('.dataTables_length select').addClass('form-control mx-3');
                $('.dataTables_length label').addClass('d-flex align-items-center');
                $('.page-item a').addClass('page-link');
                $('.pagination-list').addClass('d-flex');
                  $('.pagination-list li').addClass('page-item');
                  $('.pagination-list li a').addClass('page-link');
    }            
        });
        $(document).ready(function() {
    $('#example').DataTable();
} );
        $('.js-selectbox').select2();
        $('#select-all').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    });


    function addTinyMCE(sele){
        tinymce.init({
            selector: sele,
            relative_urls: false, convert_urls: true, remove_script_host : false,
            document_base_url: '',
            content_css : "files/frontend/css/style.min.css,files/frontend/css/bootstrap.min.css,//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css,files/frontend/css/extra.css",
            extended_valid_elements : "i[class],span,video",
            height: 250,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'styleselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | media',
            //toolbar2: 'media | forecolor backcolor',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ]
        });
    }
</script>
    <script>
        $(document).ready(function(){
           $('.dataTables_filter input').addClass('form-control ml-3');
           $('.dataTables_filter label').addClass('d-flex align-items-center');
           $('.dataTables_length select').addClass('form-control mx-3');
            $('.dataTables_length label').addClass('d-flex align-items-center');
                        $('.page-item a').addClass('page-link');
              $('.pagination-list').addClass('d-flex');
                           $('.pagination-list li').addClass('page-item');
              $('.pagination-list li a').addClass('page-link');
        });
    </script>
    <script>
        $(document).ready(function() {
            console.log("document is ready");
            $('[data-toggle="offcanvas"], #navToggle').on('click', function() {
                $('.offcanvas-collapse').toggleClass('open')
            })
        });
        
        $(document).ready(function() {
            console.log("document is ready");
            $('[data-toggle="offright"], #navTogglee').on('click', function() {
                $('.offright-collapse').toggleClass('open')
            })
        });
    </script>