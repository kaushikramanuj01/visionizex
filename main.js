// document.getElementById("openSidebar").addEventListener("click", function() {
//     document.getElementById("sidebar").classList.toggle("open");
// });


/* <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> */




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


// navbar -> sidebar code

function w3_close() {
    document.getElementById("mySidebar").classList.remove("show");
}

function w3_toggle() {
    const sidebar = document.getElementById("mySidebar");
    sidebar.classList.toggle("show");
}
// Close sidebar when clicking outside of it
// $(document).on("click", function (event) {
//     // Check if the clicked element is not a part of the sidebar
//     console.log("here3");
//     if (!$(event.target).closest("#mySidebar").length) {
//         // Check if the sidebar is currently open
//         console.log("here");
//         if ($("#mySidebar").hasClass("show")) {
//             console.log("here2");
//             // If open, close it
//             $("#mySidebar").removeClass("show");
//             // w3_close();
//         }
//     }
// });