<div id="form_overlay" class="hidden">
    
</div>
<div id="adminboard"> 
    <div class="app_list board">
        <?php require_once Util::build_path(array('view','app','template-parts','list.php')) ?>
    </div>
    <div id="app_edit">
        <h3>Details</h3>
        <div id="app_detail"></div>
        <div></div>
        <a id="create_app" href="#" data_url="index.php?controller=app&action=create">Create an app</a>
    </div>
</div>