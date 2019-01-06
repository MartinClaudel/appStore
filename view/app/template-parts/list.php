<?php foreach($arr as $app){
                $img_link=(is_null($app->get('image_link')) ? "img".DIRECTORY_SEPARATOR."placeholder.png": $app->get('image_link'));
		echo '<a href="/app/'.$app->get('ID').'" class="app_link">'
                        . '<div class="app"><img src="'.$img_link.'" >'
                        .'<span>'.$app->get('name').'</span>'
                        . '</div></a>';
            }
            ?>