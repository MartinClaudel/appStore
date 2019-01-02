<main>



	<div id="app_list">
            <?php foreach($arr as $app){
                $img_link=(is_null($app->get('image_link')) ? "img".DIRECTORY_SEPARATOR."placeholder.png": $app->get('image_link'));
		echo '<a href="#" data_url="index.php?controller=app&action=read&id='.$app->get('ID').'" class="app_link">'
                        . '<img src="'.$img_link.'" width="100px" height="100px">'
                        .'<span>'.$app->get('name').'</span>'
                        . '</a>';
            } ?>
	</div>
	    
	<div id="overlay"></div>

    <div id="sidebar"></div>

</main>