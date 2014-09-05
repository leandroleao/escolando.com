<html>
<head>
    <?php include "adm/headers.php" ?>
</head>
<body>
<div id="all">
    <div id="top">
        <div class="logo" ></div>

    </div>
    <?php if(isset($_SESSION['OutClubUser']) && !empty($_SESSION['OutClubUser'])){ ?>
        <div id="nav">
            <?php include "adm/pages/nav.php" ?>
        </div>
    <?php } ?>

    <div id="content">
        <?php //echo $message; ?>
        <?php require $this->page ?>
    </div>
    <div id="foot"></div>
</div>
</body>
</html>