/* 
 *  Script managing the store page's interactions
 */

window.onload = function () {

    var w = document.documentElement.clientWidth;

    window.onresize = function () {
        w = document.documentElement.clientWidth;
    }

    var sidebar = document.getElementById("sidebar");
    var appList = document.getElementsByClassName("app_link");
    var overlay = document.getElementById("overlay");
    var sidebarController=document.getElementById("sidebar_controller");

    //Onclick events handling
    for (var i=0 ;i<appList.length;i++) { //For each link, we add an event listener
        appList[i].addEventListener('click', function (e){
            e.preventDefault();
            var splited=this.getAttribute("href").split('/');
            toggleClass(overlay, 'hidden');
            toggleClass(sidebar, 'offScreen');
            printApp(splited[splited.length-1], sidebar.getElementsByTagName("div")[0],false);
            printAppCategories(splited[splited.length-1], sidebar.getElementsByTagName("div")[1],false);
        });
    }
    

    overlay.addEventListener('click', function (e) {
        toggleClass(overlay, 'hidden');
        toggleClass(sidebar, 'offScreen');
    });
    
    sidebarController.addEventListener('click', function (e) {
        toggleClass(overlay, 'hidden');
        toggleClass(sidebar, 'offScreen');
    });


};




