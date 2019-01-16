/**
 * Prints an app into a HTML element
 * 
 * @param {String} id info app's id
 * @param {HTMLObject} target targetted element
 * @param {Boolean} editable true if the printed app should be editable
 * @param {Function} callback a callback function
 */

function printApp(id, target, editable, callback) {
    loadData('index.php?controller=app&action=read&id=' + id + ((editable) ? '&edit=true' : ''), function (data) {
        target.innerHTML = data;
        if (callback !== undefined) {
            callback();
        }
    });
}


/**
 * Prints an app's categories into a HTML element
 * 
 * @param {String} id info app's id
 * @param {HTMLObject} target targetted element
 * @param {Boolean} editable true if the printed categories should be editable
 * @param {Function} callback a callback function
 */
function printAppCategories(id, target, editable, callback) {
    loadData('index.php?controller=app&action=readAppCategories&id=' + id + ((editable) ? '&edit=true' : ''), function (data) {
        target.innerHTML = data;
        if (callback !== undefined) {
            callback();
        }
    });
}

/**
 * 
 * Execute a request to the server and pass it to the callback function
 * 
 * @param {String} link link of the request
 * @param {Function} callback a callback function
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
 * Send the form's data to the server using a POST request and execture a callback function
 * 
 * @param {String} link
 * @param {HTMLObject} form
 * @param {Function} callback
 */
function sendFormData(link, form, callback) {
    var request = new XMLHttpRequest();
    var formData = new FormData(form);

    request.addEventListener("load", function (event) {
        callback(true);
    });

    request.addEventListener("error", function (event) {
        callback(false);
    });

    request.open("POST", link);
    request.send(formData);
}


/**
 * 
 * Toggle a class attributes for a certain HTML element
 * 
 * @param {HTMLObject} element
 * @param {String} key
 */

function toggleClass(element, key) {
    if (element.classList.contains(key)) {
        element.classList.remove(key);
    } else {
        element.classList.add(key);
    }
}