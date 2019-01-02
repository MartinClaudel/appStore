/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.onload=function(){        
    
  var w=document.documentElement.clientWidth;
  var sidebar=document.getElementById("sidebar");      
  var appList=document.getElementById("app_list");
  var overlay=document.getElementById("overlay");
  var pageChanger=document.getElementById("pageChanger");
  var header=document.getElementsByTagName("header")[0];
  
  //Setting initials positions and display status
  overlay.style.display="none";
  sidebar.style.left="100vw";
  
  window.onresize=function(){
      w=document.documentElement.clientWidth;
  }
    

appList.addEventListener('click',function(e){
    if(e.target.parentElement.classList.contains('app_link')){
        loadApp(e.target.parentElement.getAttribute("data_url"));
    }      
});

    header.addEventListener('click',function(e){
        loadPage(e.target.getAttribute("data_url"));
});

overlay.addEventListener('click',function(e){
    toggleSideBar();    
});



    function loadPage(link){
        var request=new XMLHttpRequest();
        pageChanger.style.left=0;
        pageChanger.style.width="100vw";
        request.onreadystatechange=function(){
            if(this.readyState===4 && this.status===200){
                document.getElementsByTagName('main')[0].innerHTML=this.responseText;
            }
        };
        request.open("GET",link);
        request.send();
    }

    function toggleSideBar(){
        console.log("AAAAAAAAAAA",w-sidebar.offsetWidth);
        overlay.style.display=(overlay.style.display==="none" ? "block" : "none");
        sidebar.style.left=(sidebar.style.left==="100vw" ? (w-sidebar.offsetWidth)+"px" : "100vw" );
    }
    
    function loadApp(link){
        var request=new XMLHttpRequest();
        request.onreadystatechange=function(){
            if(this.readyState===4 && this.status===200){
                toggleSideBar();
                sidebar.innerHTML=this.responseText;
            }
        };
        request.open("GET",link);
        request.send();
    }


};
    

