/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



window.onload = function () {

    var appList=document.getElementsByClassName("app_list")[0];
    var appListLinks = document.getElementsByClassName("app_link");
    var appDetail = document.getElementById("app_detail");
    var createAppButton = document.getElementById("create_app");
    var createCategoryButton = document.getElementById("create_category");
    var formOverlay = document.getElementById("form_overlay");
    var overlay = document.getElementById("overlay");
    var appCategories = document.getElementById("app_categories");
    var categoriesToAdd();
    var addCtoA;
    var actionLinks;
    var form;
    var currentAppId;

    function initAppLinksListener(){
        for (var i = 0; i < appListLinks.length; i++) { //For each link, we add an event listener
            appListLinks[i].addEventListener('click', function (e) {
                e.preventDefault();
                var splited = this.getAttribute("href").split('/');
                currentAppId=splited[splited.length - 1];
                printAppBoard(currentAppId);

            });
        }
    }

    initAppLinksListener();

    createAppButton.addEventListener('click', function (e) {
        e.preventDefault();
        printForm(this.getAttribute("href"));
    });

    createCategoryButton.addEventListener('click', function (e) {
        e.preventDefault();
        printForm(this.getAttribute("href"));
    });

    overlay.addEventListener('click', function (e) {
        toggleClass(overlay, 'hidden');
        toggleClass(formOverlay, 'hidden');
    });
    
    
    
    function printForm(href){
            loadData(href, function(data){
            toggleClass(overlay, 'hidden');
            toggleClass(formOverlay, 'hidden');
            formOverlay.innerHTML=data;
            form = document.getElementsByClassName("form_action")[0];
            form.addEventListener('submit',function(e){
                e.preventDefault();
               sendFormData(form.getAttribute('action'),form,function(success){
                   if(success){
                      toggleClass(overlay, 'hidden');
                      toggleClass(formOverlay, 'hidden');
                      printAppBoard(currentAppId);
                      printAppList();
                   }
               }); 
            });
            
            var confirm=document.getElementById("confirm_deletion");
            var cancel=document.getElementById("cancel_deletion");

            console.log(confirm);

           if(confirm !== undefined && cancel!==undefined){
              confirm.addEventListener('click',function(e){
                  e.preventDefault();
                  loadData(confirm.getAttribute("href"),function(){
                        window.location.replace("index.php?controller=app&action=board");
                    });
              });

              cancel.addEventListener('click',function(e){
                  e.preventDefault();
                  toggleClass(overlay, 'hidden');
                  toggleClass(formOverlay, 'hidden');
              });
          }

        });
}

function printAppBoard(id){
                printApp(id, appDetail, true, function () {
                actionLinks = document.getElementsByClassName("action_link");
                for (var j = 0; j < actionLinks.length; j++) {
                    actionLinks[j].addEventListener('click', function (e) {
                        e.preventDefault();
                        printForm(this.getAttribute("href"));
                    });
                }
            });
            
        printAppCategories(id,appCategories,true,function(){
            
        });
}


function printAppList(){
    loadData("index.php?controller=app&action=readAll",function(data){
        appList.innerHTML=data;
        initAppLinksListener();
    });
}


};