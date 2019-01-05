/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.onload=function(){
    
    var appList = document.getElementsByClassName("app_link");
    var appDetail = document.getElementById("app_detail");
    var createAppButton=document.getElementById("create_app");
    var createCategoryButton=document.getElementById("create_category");
    var formOverlay=document.getElementById("form_overlay");
    var overlay = document.getElementById("overlay");
    var actionLinks;
    var form;
    
    for (var i=0 ;i<appList.length;i++) { //For each link, we add an event listener
        appList[i].addEventListener('click', function (e){

            e.preventDefault();
            var splited=this.getAttribute("href").split('/');
            
            var promise = new Promise((resolve,reject)=>{
                printApp(splited[splited.length-1], appDetail,true);
                resolve();
            });
            
            promise.then((value)=>{
                actionLinks=document.getElementsByClassName("action_link");
                console.log(actionLinks);
                for(var j=0;j<actionLinks.length;j++){
                   actionLinks[j].addEventListener('click',function(e){
                       e.preventDefault();
                       loadData(this.getAttribute("href"),formOverlay);
                   });
                }
            });

        });
    }
    

    
    createAppButton.addEventListener('click', function (e) {
        e.preventDefault();
//        toggleClass(overlay,'hidden');
//        toggleClass(formOverlay,'hidden');
//        loadData(this.getAttribute("href"),formOverlay);
//        form = document.getElementsByTagName("form")[0];
    });
    
    
    console.log(createCategoryButton),
    createCategoryButton.addEventListener('click',function(e){
        e.preventDefault();
        toggleClass(overlay,'hidden');
        toggleClass(formOverlay,'hidden');
        loadData(this.getAttribute("href"),formOverlay);
        form = document.getElementsByTagName("form")[0];
    });
    
    overlay.addEventListener('click', function (e) {
        toggleClass(overlay,'hidden');
        toggleClass(formOverlay,'hidden');
    });
}