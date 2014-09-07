<div id="content" class="init">

    <header class="header">
        <a href="<?php echo SITE_PATH ?>" class="logo">

        </a>
        <div class="school">
           <span class="schoolName">
                NOME ESCOLA
            </span>
            <span class="schoolDescripton">
                REDE SOCIAL
            </span>
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
            <span class="userName"><?php echo $this->user[0]->name; ?></span>
            <a class="profileEdit">Editar Perfil</a>

        </div>

        <div class="groups" >
            <span class="title">Matérias</span>
            <?php
                if(!empty($this->groups)){

                    foreach($this->groups as $k => $v){

            ?>
                <a href="<?php echo SITE_PATH ?>groups/<?php echo $v->id; ?>" class="group"><?php echo $v->name; ?></a>
            <?php

                    }
                }


            ?>
        </div>

    </nav>

    <div class="timeline">

        <div class="form">
            <form action="<?php echo SITE_PATH; ?>postGroupAdd" method="POST">
                <label class="title">ESCREVA SUA OPNIÃO</label>
                <textarea placeholder="Compartilhe aqui seu conhecimento" class="postContent" name="postContent"></textarea>

                <div class="buttons">
                    <select name="category">
                        <option value="1">Dúvida</option>
                    </select>

                    <input type="hidden" name="author" value="<?php echo $this->user[0]->id;?>">
                    <input type="hidden" name="groupId" value="<?php echo $this->group; ?>">
                    <input type="submit" class="button" value="Publicar" />
                </div>


            </form>
        </div>

        <div class="posts">
            <?php
                if(!empty($this->posts)){

                    foreach($this->posts as $k => $v){

                    $user = $this->getUser($v->author);

            ?>
                <div class="postItem">
                    <div class="topPost">
                        <?php

                        if(!empty($user[0]->img_profile)){


                            ?>
                            <img src="<?php echo SITE_PATH ?>img/profile/<?php echo $user[0]->id;?>/<?php echo $user[0]->img_profile; ?>" />
                        <?php

                        }
                        else{
                            ?>
                            <img src="<?php echo SITE_PATH ?>img/profile/profile.jpg" />
                        <?php

                        }
                        ?>
                        <span class="userNane"><?php echo $user[0]->name; ?></span>
                        <span class="postTime"><?php echo $this->formatData($v->date); ?></span>
                    </div>
                    <div class="content">
                        <?php
                        echo $v->post;
                        ?>

                    </div>


                </div>

            <?php
                    }
                }
            ?>
        </div>





    </div>

</div>