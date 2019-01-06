/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function loadPage(link) {
    var request = new XMLHttpRequest();
    pageChanger.style.left = 0;
    pageChanger.style.width = "100vw";
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementsByTagName('main')[0].innerHTML = this.responseText;
        }
    };
    request.open("GET", link);
    request.send();
}

function printApp(id,target,editable,callback){
        loadData('index.php?controller=app&action=read&id='+id +((editable)? '&edit=true' : ''),function(data){
            target.innerHTML=data;
            if(callback !==undefined){
                callback();
            }
        });
}

function printAppCategories(id,target,editable,callback){
        loadData('index.php?controller=app&action=readAppCategories&id='+id +((editable)? '&edit=true' : ''),function(data){
            target.innerHTML=data;
            if(callback !==undefined){
                callback();
            }
        });
}

/**
 * 
 * Sends a request to the server using GET
 * Put the output's data into @target
 * 
 * @param string link 
 * @param HTMLElement target
 * 
 */
function loadData(link, callback) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            callback(this.responseText);
        }
    };
    request.open("GET", link);
    request.send();
}

/**
 * 
 * Send the form's data to the server using a POST request
 * Returns -1 if there's an error, 0 else
 * 
 * @param string link
 * @param HTMLObject form
 * @param HTMLObject target
 * @returns int
 */
function sendFormData(link, form,callback){
    var request = new XMLHttpRequest();
    var formData= new FormData(form);
   
    request.addEventListener("load", function(event) {
      callback(true);
    });
   
    request.addEventListener("error", function(event) {
      callback(false);
    });
   
    request.open("POST", link);
    request.send(formData);
}

function toggleClass(element, key){
    if(element.classList.contains(key)){
        element.classList.remove(key);
    }else{
        element.classList.add(key);
    }
}