<h3>Catégories</h3>

<div style="position: relative;">
    <?php

    foreach ($categoriesByApp as $c){
        echo '<span class="category_label">'
        . '<a href="index.php?controller=category&action=update&c='.$c->get('ID').'">'.$c->get('name').' '
        .($editable ? '<i class="material-icons">edit</i>' : '')
        . '</a>'
        .($editable ? '<a href="index.php?controller=app&action=removeAppCategory&a='.$_GET['id'].'&c='.$c->get('ID').'"> X </a>' : '')        
        . '</span>';
    }
    ?>

</div>
    
     <?php if($editable) :?>
    <span id="add_category">
        <i class="material-icons">add</i>
        <div class="hidden">

            <?php foreach($categories as $c){
                if(!in_array($c,$categoriesByApp))
                        echo '<a class="category_to_add" href="index.php?controller=app&action=addAppCategory&a='.$_GET['id'].'&c='.$c->get('ID').'">'.$c->get('name').' </a>';
            }?>

        </div>
    </span>

    <?php endif;?>