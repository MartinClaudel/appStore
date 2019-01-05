<div id="app_detail">
    <img class="app_thumbnail" src="<?php $img_link = (is_null($app->get('image_link')) ? "img" . DIRECTORY_SEPARATOR . "placeholder.png" : $app->get('image_link'));echo $img_link;?>" width="50px" height="50px">
    <div class="app_summary">
        <span><?php echo $app->get("name") ?></span>
        <span><?php echo $app->get("OS") ?></span>
        <span><?php echo $app->get("pckg") ?></span>
        <span><?php echo $app->get("ver") ?></span>
    </div>
    <p class="app_desc">
        <span><?php echo $app->get("description") ?></span>
    </p>
    <?php if (isset($_GET['edit']) && $_GET['edit'] == 'true') : ?>
        <a href="index.php?controller=app&action=update&id=<?php echo $app->get("ID") ?>" class="action_link">Modifier</a>
        <a href="index.php?controller=app&action=delete&id=<?php echo $app->get("ID") ?>" class="action_link">Supprimer</a>
    <?php endif; ?>

</div>
