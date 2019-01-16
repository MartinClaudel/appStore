
<form class="form_action" method="post" action="index.php?controller=app&action=<?php echo $action ?>">

    <label>Nom de l'application</label>
    <input name="nom" type="text" maxlength="50" required="champ requis" value="<?php if (isset($app)) echo htmlspecialchars($app->get('name')); ?>" >

    <label>Package</label>
    <input name="package" type="text" maxlength="50" required="champ requis"  value="<?php if (isset($app)) echo htmlspecialchars($app->get('pckg')); ?>">

    <label>OS</label>
    <input name="OS" type="text" maxlength="50" required="champ requis"  value="<?php if (isset($app)) echo htmlspecialchars($app->get('OS')); ?>">

    <label>Version</label>
    <input name="version" type="text" maxlength="25" required="champ requis"  value="<?php if (isset($app)) echo htmlspecialchars($app->get('ver')); ?>">

    <label>Description</label>
    <textarea class="form_description" name="description" cols="40" rows="5" ><?php if (isset($app)) echo htmlspecialchars($app->get('description')); ?></textarea>

    <label>Lien de l'image</label>
    <input name="ImageLink" type="text" value="<?php if (isset($app)) echo htmlspecialchars($app->get('image_link')); ?>">

    <input name="id" type="hidden" value="<?php if (isset($app)) echo htmlspecialchars($app->get('ID')); ?>">

    <input type="submit" value="<?php echo $keyword ?>">

</form>