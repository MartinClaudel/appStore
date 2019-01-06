<div id="form_overlay" class="hidden">
    
</div>
<div id="adminboard"> 
    <div class="app_list board">
        <?php require_once Util::build_path(array('view','app','template-parts','list.php')) ?>
    </div>
    <div id="app_edit">
        <h3>Details</h3>
        <div id="app_detail"></div>
        <div id="app_categories"></div>
        <a id="create_app" href="index.php?controller=app&action=create">Create an app</a>
        <a id="create_category" href="index.php?controller=category&action=create">Create a category</a>
    </div>
</div>
