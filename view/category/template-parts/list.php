<?php

foreach ($categoriesByApp as $c){
    echo '<span class="category_label">'
    . '<a href="index.php?controller=category&action=update&c='.$c->get('ID').'">'.$c->get('name').'</a>'
    .($editable ? '<a href="index.php"> X </a>' : '')        
    . '</span>';
}
?>
<?php if($editable) :?>
<span id="add_category">
Ajouter une catégorie
    <div class="hidden">

        <?php foreach($categories as $c){
            if(!in_array($c,$categoriesByApp))
                    echo '<span ><a href="index.php?controller=app&action=addAppCategory&a='.$_GET['id'].'&c='.$c->get('ID').'">'.$c->get('name').' </a></span>';
        }?>

    </div>
</span>

<?php endif;?>
