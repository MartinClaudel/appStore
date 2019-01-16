<?php foreach($arr as $app){
                $img_link=(is_null($app->get('image_link')) ? Util::build_relative_path(array('ressources','img','placeholder.png')): $app->get('image_link'));
		echo '<a href="/app/'.$app->get('ID').'" class="app_link">'
                        . '<div class="app"><img src="'.$img_link.'" >'
                        .'<span>'.$app->get('name').'</span>';
                
                if((isset($_GET['action']) && $_GET['action']=='board') || (isset($_GET['edit']) && $_GET['edit']=='true')) 
                    echo '<span>'.$app->get('pckg').'</span>'
                        . '<span>'.$app->get('ver').'</span>';
                
                echo '</div></a>';
            }
            ?>