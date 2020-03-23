    <div class="slider-se bradscarm-se">
        <div class="container">
            <div class="search-box-po">
                <div class="search-box">
                    <h1>Frequently asked questions</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="search-history-se padding-70">
        <div class="container">
            <div class="comman-title">
                <!-- <h3>Sign in</h3> -->
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="accordion" id="accordionExample">
                        <?php
                        if(isset($faq) && !empty($faq)) {
                            foreach ($faq as $faq_key => $faq_value) {
                                ?>
                                <div class="card">
                                   <div class="card-header" id="headingOne_<?= $faq_value['id']; ?>">
                                      <h2 class="mb-0">
                                         <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_<?= $faq_value['id']; ?>" aria-expanded="true" aria-controls="collapse_<?= $faq_value['id']; ?>">
                                         <?= $faq_value['title']; ?>
                                         </button>
                                      </h2>
                                   </div>
                                   <div id="collapse_<?= $faq_value['id']; ?>" class="collapse <?php if($faq_key==0) { echo "show"; } ?> " aria-labelledby="headingOne_<?= $faq_value['id']; ?>" data-parent="#accordionExample">
                                      <div class="card-body">
                                         <?= $faq_value['description']; ?>
                                      </div>
                                   </div>
                                </div>
                                <?php         
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>        
    </div>