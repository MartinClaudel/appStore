/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.onload = function () {

    var w = document.documentElement.clientWidth;

    window.onresize = function () {
        w = document.documentElement.clientWidth;
    }

    var sidebar = document.getElementById("sidebar");
    var appList = document.getElementsByClassName("app_link");
    var overlay = document.getElementById("overlay");
    var pageChanger = document.getElementById("pageChanger");
    var header = document.getElementsByTagName("header")[0];

    //Setting initials positions and display status

    //Onclick events handling
    for (var i=0 ;i<appList.length;i++) { //For each link, we add an event listener
        appList[i].addEventListener('click', function (e){
            e.preventDefault();
            var splited=this.getAttribute("href").split('/');
            if (e.target.parentElement.classList.contains('app_link')) {
                toggleClass(overlay, 'hidden');
                toggleClass(sidebar, 'offScreen');
                printApp(splited[splited.length-1], sidebar);
            }
        });
    }
    
    header.addEventListener('click', function (e) {
        loadPage(e.target.getAttribute("data_url"));
    });
    overlay.addEventListener('click', function (e) {
        toggleClass(overlay, 'hidden');
        toggleClass(sidebar, 'offScreen');
    });

};




