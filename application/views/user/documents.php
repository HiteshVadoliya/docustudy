    <div class="slider-se bradscarm-se">
        <div class="container">
            <div class="search-box-po">
                <div class="search-box">
                    <h1>Document List</h1>
                </div>
            </div>
        </div>
    </div>


    <div class=" padding-70">
        <div class="container">
            <div class="comman-title">
                <!-- <h3>Sign in</h3> -->
            </div>
            <div class="row">
                <div class="col-md-12" id="document-results">
                    
                </div>
            </div>
        </div>        
    </div>
    <input type="hidden" id="search" value="<?php echo $search?>">
    <input type="hidden" id="schooltype" value="<?php echo $schooltype?>">
    <script type="text/javascript">
    $(document).ready(function() {
        get_documents();

    });
    function get_documents($page = '')
    {   

        url = '<?php echo base_url(FRONTEND.'Document/get_documents/') ?>'+$page;
        var search = $('#search').val();
        var schooltype = $('#schooltype').val();
        // load_ajex_loader('<?= ADMINPATH.'images/ajax-loader.gif'; ?>','Loading Please Wait...');
        //load_ajex_loader('<?= ASSETPATH.'images/loader.svg'; ?>','Loading Please Wait...');
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'html',
            data: {search:search, schooltype:schooltype},
            success: function(response) {
                $('#document-results').html(response);
                $('html,body').animate({                    
                     scrollTop: $('#document-results').offset().top - 100
                });
            }
        });
    }
    </script>