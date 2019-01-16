<img class="app_thumbnail" src="<?php $img_link = (is_null($app->get('image_link')) ? Util::build_relative_path(array('ressources','img','placeholder.png')) : $app->get('image_link'));echo $img_link;?>" width="50px" height="50px">
<div class="app_summary">
    <span class="name"><?php echo $app->get("name") ?>
        <?php if (isset($_GET['edit']) && $_GET['edit'] == 'true') : ?>
            <a href="index.php?controller=app&action=update&id=<?php echo $app->get("ID") ?>" class="action_link"><i class="material-icons">edit</i></a>
            <a href="index.php?controller=app&action=delete&id=<?php echo $app->get("ID") ?>" class="action_link"><i class="material-icons">delete</i></a>
        <?php endif; ?>
    </span>
    <span class="OS">OS : <?php echo $app->get("OS") ?></span>
    <span class="package">Package : <?php echo $app->get("pckg") ?></span>
    <span class="version">Version : <?php echo $app->get("ver") ?></span>
</div>
<p class="app_desc">
    <span><?php echo $app->get("description") ?></span>
</p>
