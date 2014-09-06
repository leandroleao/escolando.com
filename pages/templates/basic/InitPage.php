<div id="content" class="init">

    <header class="header">
        <div class="logo">

        </div>

    </header>

    <nav class="nav">

        <div class="profile">
            <?php

                if(!empty($this->user[0]->img_profile)){
            ?>
                    <img src="<?php echo SITE_PATH ?>img/profile/<?php echo $this->user[0]->id;?>/<?php echo $this->user[0]->img_profile; ?>" />
            <?php
                }
                else{
            ?>
                    <img src="<?php echo SITE_PATH ?>img/profile/profile.jpg" />
            <?php

                }
            ?>


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

        <div class="form">
            <form action="<?php echo SITE_PATH; ?>postAdd" method="POST">
                <label>ESCREVA SUA OPNIÃO</label>
                <textarea name="postContent">

                </textarea>
                <select name="category">
                    <option value="1">Dúvida</option>
                </select>

                <input type="hidden" name="author" value="<?php echo $this->user[0]->id;?>">
                <input type="hidden" name="groupId" value="1">
                <input type="submit" class="button" value="ENVIAR" />

            </form>
        </div>

        <div class="posts">
            <?php
                if(!empty($this->posts)){

                    foreach($this->posts as $k => $v){

                        print_r($v);
                        echo "<br><br>";
                    }
                }
            ?>
        </div>





    </div>

</div>