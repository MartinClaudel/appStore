<form method="post" action="index.php?controller=category&action=<?php echo $action ?>">

    <label>Nom de la catégorie</label>
    <input name="nom" type="text" required="champ requis" value="<?php if (isset($app)) echo htmlspecialchars($app->get('name')); ?>" >

    <label>OS</label>
    <input name="OS" type="text" required="champ requis"  value="<?php if (isset($category)) echo htmlspecialchars($app->get('OS')); ?>">

    <input name="id" type="hidden" value="<?php if (isset($category)) echo htmlspecialchars($app->get('ID')); ?>">

    <input type="submit" value="<?php echo $keyword ?>">

</form>