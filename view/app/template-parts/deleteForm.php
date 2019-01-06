<div class="form_action">
    <h4>Etes-vous sûr  de vouloir supprimer l'application <?php echo $_GET['id']?> ? Aucun retour en arrière ne sera possible</h4>
    <div>
        <a href="index.php?controllerapp&action=deleted&id=<?php echo $_GET['id']?>" id="confirm_deletion" >Oui</a> 
        <a href="cancel" id="cancel_deletion" >Non</a>
    </div>
</div>