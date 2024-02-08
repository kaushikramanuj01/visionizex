console.log("here11");
//! give user prompt length 
function prompter() {
    var result = {};
    if (localStorage.getItem('user_prompt') !== null) {
        var user_prompt_value = localStorage.getItem('user_prompt');
        result.prompt = user_prompt_value;
        result.length = user_prompt_value.length;
    } else {
        // Handle the case where 'user_prompt' is not set in localStorage
        result.prompt = "";
        result.length = 0; // Or any other default value you prefer
    }
    return result;
}

function ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback) {
    currentXhr = $.ajax({
        type: method,
        url: url + '.php',
        headers: headerdata,
        data: paramsdata,
        dataType: "json", // Ensure JSON response is expected
        error: errorCallback,
        success: successCallback,
    });
}

function showPopupMessage(message, status) {
    // Create a div element
    var messagePopupDiv = document.createElement('div');
    // Set attributes for the div
    messagePopupDiv.id = 'messagePopup';
    messagePopupDiv.className = 'message-popup';
    // Get a reference to the first child of the body
    var firstChild = document.body.firstChild;
    // Insert the div before the first child
    document.body.insertBefore(messagePopupDiv, firstChild);
    console.log("showPopupMessage show ");
    var popup = document.getElementById('messagePopup');
    // Set the appropriate class based on status
    var className = (status === 1) ? 'success' : 'danger';
    // Set the message and class
    popup.innerHTML = message;
    popup.className = 'message-popup ' + className;
    // Show the popup
    popup.style.display = 'block';
    // Hide the popup after 4 seconds
    setTimeout(function () {
        popup.style.display = 'none';
    }, 8000);
}

//! navbar -> sidebar code
function w3_close() {
    document.getElementById("mySidebar").classList.remove("show");
}
function w3_toggle() {
    const sidebar = document.getElementById("mySidebar");
    sidebar.classList.toggle("show");
}

//! data validationi code 
function checkname(text) {
    if (text.length < 1) {
        var status = 0;
        var msg = "Please enter your Name.";
        // $("#name-error").text();
    } else {
        var status = 1;
        //    $("#name-error").text(""); // Clear any previous length error message
    }
    return status;
}

function checkpassword(password) {
    var result = {};
    if (password.length < 7) {
        result.msg = "Password must be at least 7 characters long.";
        result.status = 0;
    } else {
        // Password character validation
        if (!/\d/.test(password) || !/[a-zA-Z]/.test(password)) {
            result.msg = "Password must contain at least one letter and one number.";
            result.status = 0;
        } else {
            result.msg = "";
            result.status = 1;
        }
    }
    return result;
}

function isValidEmail(email) {
    console.log("here22");
    // Regular expression pattern to match a valid email address
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
//! data validationi code end 