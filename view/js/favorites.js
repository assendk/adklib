function setFavorite(id,fstatus) {
    // initialisation
    console.log("TTT",id,fstatus);
    var fav_status;
    if(fstatus === undefined){
        fav_status = '1';
    } else {fav_status = fstatus}
    var url = '../favorites.ctrl.php';
    var method = 'POST';
    var params = 'book_id='+ id;
    params += '&fstatus='+ fav_status;
    // params += '&account_desc='+document.getElementById('account_desc').value;

    var container_id = 'fav_container' ;
    var loading_text = '<img src="../view/images/ajax_loader.gif">' ;
    // call ajax function
    ajax (url, method, params, container_id, loading_text) ;
}

// function ajaxRow(tagID, aid) {
//     var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');  // XMLHttpRequest object
//
//     // create pairs index=value with data that must be sent to server
//     //var  the_data = 'test='+document.getElementById('txt2').innerHTML;
//     var the_data = 'id-submit=' + aid;
//     var php_file = '../controller/get_account_by_id.php';
//
//     request.open("POST", php_file, true);			// set the request
//
//     // adds  a header to tell the PHP script to recognize the data as is sent via POST
//     request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     request.send(the_data);		// calls the send() method with datas as parameter
//
//     // Check request status
//     // If the response is received completely, will be transferred to the HTML tag with tagID
//     request.onreadystatechange = function () {
//         if (request.readyState == 4) {
//             document.getElementById(tagID).innerHTML = request.responseText;
//         }
//     }
// }

function ajax (url, method, params, container_id, loading_text) {
    try { // For: chrome, firefox, safari, opera, yandex, ...
        xhr = new XMLHttpRequest();
    } catch(e) {
        try{ // for: IE6+
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        } catch(e1) { // if not supported or disabled
            alert("Not supported!");
        }
    }
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4) { // when result is ready
            document.getElementById(container_id).innerHTML = xhr.responseText;
        } else { // waiting for result
            document.getElementById(container_id).innerHTML = loading_text;
        }
    }
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.send(params);
}