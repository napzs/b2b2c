$(document).ajaxError(function(event,xhr,options,exc){
    if (xhr.statusText != 'abort') {
        notify.error(xhr.responseText);
    }
});