<form class="form_action" method="post" action="index.php?controller=category&action=<?php echo $action ?>">
    <label>Nom de la catégorie</label>
    <input name="nom" type="text" required="champ requis" value="<?php if (isset($category)) echo htmlspecialchars($category->get('name')); ?>" >
    <label>OS</label>
    <input name="OS" type="text" required="champ requis"  value="<?php if (isset($category)) echo htmlspecialchars($category->get('OS')); ?>">
    <input name="id" type="hidden" value="<?php if (isset($category)) echo htmlspecialchars($category->get('ID')); ?>">
    <input type="submit" value="<?php echo $keyword ?>">
</form>