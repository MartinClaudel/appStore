<div id="app_detail">
    
    
    
    <img src="<?php $img_link=(is_null($app->get('image_link')) ? "img".DIRECTORY_SEPARATOR."placeholder.png": $app->get('image_link'));
    echo $img_link ?>" width="50px" height="50px">
    <div id="app_summary">
        <span><?php echo $app->get("name") ?></span>
        <span><?php echo $app->get("OS") ?></span>
        <span><?php echo $app->get("pckg") ?></span>
        <span><?php echo $app->get("ver") ?></span>
    </div>
    <p id="app_desc">
        <span><?php echo $app->get("description") ?></span>
    </p>
    
</div>
