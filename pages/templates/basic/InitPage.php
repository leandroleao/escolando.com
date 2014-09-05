<div id="content" class="init">

    <header class="header">
        <div class="logo">

        </div>

    </header>

    <nav class="nav">

        <div class="profile">
            <img src="<?php echo SITE_PATH ?>img/profile/4/profile.jpg" />

        </div>

        <div class="groups" >
            <?php
                if(!empty($this->groups)){

                    foreach($this->groups as $k => $v){
                        print_r($v->name);

                    }
                }


            ?>
        </div>

    </nav>

    <div class="timeline">

    </div>

</div>