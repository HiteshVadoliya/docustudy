<div class="header-se">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?= LOGOPATH.getSiteSetting('FrontEnd_Logo'); ?>"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">                  
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About us
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                <a class="dropdown-item" href="<?= base_url('who-we-are') ?>">Who we are</a>
                                <a class="dropdown-item" href="<?= base_url('what-we-do') ?>">What we do</a>                                            
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Documents
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <a class="dropdown-item" href="#">Find and share a document</a>
                                <a class="dropdown-item" href="#">Upload a document </a>                                            
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blanck" href="http://thelearningguide.com.au/">The learning guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blanck" href="<?= base_url('compare-list'); ?>">Compare</a>
                        </li>
                        <?php
                        if(isset($this->session->DS_USER['DS_Id']))  {
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hi, <?php echo $this->session->DS_USER['DS_Name']; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    <a class="dropdown-item" href="<?= base_url('profile'); ?>">Profile</a>
                                    <a class="dropdown-item" href="<?= base_url(FRONTEND.'Login/Logout') ?>">Logout</a>                                            
                                </div>
                            </li>
                            <?php
                        } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('login'); ?>" >Sign in</a>
                                <!-- <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#modalLoginForm">Sign in</a> -->
                              </li>
                            <li class="nav-item">
                                <a class="nav-link blue-btn" href="javascript:;" data-toggle="modal" data-target="#modalRegisterForm">Register</a>
                            </li>
                        <?php } ?>
                    </ul>                
                </div>
            </div>
        </nav>
    </div>
</div>  