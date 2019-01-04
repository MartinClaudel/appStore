/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.onload=function(){
    var appList = document.getElementsByClassName("app_link");
    var appDetail = document.getElementById("app_detail");
    var createButton=document.getElementById("create_app");
    var formOverlay=document.getElementById("form_overlay");
    var overlay = document.getElementById("overlay");
    var form;
    
    for (var i=0 ;i<appList.length;i++) { //For each link, we add an event listener
        appList[i].addEventListener('click', function (e){
            e.preventDefault();
            var splited=this.getAttribute("href").split('/');
            if (e.target.parentElement.classList.contains('app_link')) {
                printApp(splited[splited.length-1], appDetail);
            }
        });
    }
    
    createButton.addEventListener('click', function (e) {
        toggleClass(overlay,'hidden');
        toggleClass(formOverlay,'hidden');
        loadData(this.getAttribute("data_url"),formOverlay);
        form = document.getElementsByTagName("form")[0];
    });
    overlay.addEventListener('click', function (e) {
        toggleClass(overlay,'hidden');
        toggleClass(formOverlay,'hidden');
    });
    //Form handling
//    form.addEvenetListener('submit',function(e){
//       sendFormData() 
//    });
}