
// Global AJAX function
function makeAjaxRequest(url, method, headers, payload, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);

    // Set headers
    for (var key in headers) {
        if (headers.hasOwnProperty(key)) {
            xhr.setRequestHeader(key, headers[key]);
        }
    }

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                callback(null, xhr.responseText);
            } else {
                callback("Error: " + xhr.status, null);
            }
        }
    };

    // Convert payload to JSON if it's an object
    if (payload && typeof payload === 'object') {
        payload = JSON.stringify(payload);
    }

    xhr.send(payload);
}