// document.getElementById("openSidebar").addEventListener("click", function() {
//     document.getElementById("sidebar").classList.toggle("open");
// });


/* <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> */


// function showPopupDelayed(type) {
//     if(type == "login" && !localStorage.getItem('popupShown_login')){
//         document.getElementById('popup').querySelector('h2').textContent = 'Loged in';
//         document.getElementById('popup').querySelector('p').textContent = 'New message based on the condition.';
//         document.getElementById('popup').classList.add('show');
//         localStorage.setItem('popupShown_login', 'true');
//     }    
//      // Check if the popup has been shown before
//      if (!localStorage.getItem('popupShown')) {
//         // Show the popup
//         document.getElementById('popup').querySelector('h2').textContent = 'Welcome!';
//         document.getElementById('popup').querySelector('p').textContent = 'Login to get a free token.';
//         document.getElementById('popup').classList.add('show');
//         localStorage.setItem('popupShown', 'true');
//     }
//     // setTimeout(function() {
//     // }, 1000);
// }
// ! important start 

// function closePopup() {
//     document.getElementById('popup').classList.remove('show');
//     localStorage.setItem('popupShown', 'true');
// }
// function showPopupDelayed(type) {
//     // Check if the popup has been shown before
//     if (!localStorage.getItem('popupShown')) {
//         // Show the popup
//         var popup = document.getElementById('popup');
//         if (type === "login" && !localStorage.getItem('popupShown_login')) {
//             popup.querySelector('h2').textContent = 'Logged in';
//             popup.querySelector('p').textContent = 'New message based on the condition.';
//             localStorage.setItem('popupShown_login', 'true');
//         } else {
//             popup.querySelector('h2').textContent = 'Welcome!';
//             popup.querySelector('p').textContent = 'Login to get a free token.';
//             localStorage.setItem('popupShown', 'true');
//         }
//         popup.classList.add('show');
//     }
// }


// // Call the function with a delay of 3000 milliseconds (3 seconds)
// // showPopupDelayed("welcome");

// // Function to check if the user has visited before
// function hasVisitedBefore() {
//     return localStorage.getItem("visited") === "true";
// }
// // Function to set a flag indicating that the user has visited
// function setVisitedFlag() {
//     localStorage.setItem("visited", "true");
// }
// // Function to track user's activity and show popup after some time
// function trackActivityAndShowPopup() {
//     var timeoutDuration = 5000; // 1 minute (adjust as needed)
//     var timeoutID = setTimeout(function() {
//         // Show your signup popup here
//         // For example:
//         // showSignupPopup();
//         // alert("Sign up to get points!");
//         // Create the popup element
//         var popup = document.createElement("div");
//         popup.id = "popup";
//         // Create the close button
//         var closeButton = document.createElement("button");
//         closeButton.innerHTML = "&times;";
//         closeButton.onclick = closePopup;
//         // Create the heading
//         var heading = document.createElement("h2");
//         heading.innerText = "Welcome!";
//         // Create the paragraph
//         var paragraph = document.createElement("p");
//         paragraph.innerText = "Login to get a free token.";
//         // Append elements to the popup
//         popup.appendChild(closeButton);
//         popup.appendChild(heading);
//         popup.appendChild(paragraph);
//         // Append the popup to the body
//         document.body.insertBefore(popup, document.body.firstChild);
//         showPopupDelayed("welcome");

//     }, timeoutDuration);
// }

// Check if the user has visited before
// if (!hasVisitedBefore()) {
//     // Set a flag to indicate that the user has visited
//     setVisitedFlag();

//     // Track user's activity and show popup after some time
//     trackActivityAndShowPopup();
// } else {
//     // If the user has visited before, you may want to start tracking activity immediately
//     trackActivityAndShowPopup();
// }
//! end important 


    // Function to set a cookie
    // function setCookie(cname, cvalue, exdays) {
    //     var d = new Date();
    //     d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    //     var expires = "expires=" + d.toUTCString();
    //     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    // }
    
    // // Function to get the value of a cookie
    // function getCookie(cname) {
    //     var name = cname + "=";
    //     var decodedCookie = decodeURIComponent(document.cookie);
    //     var ca = decodedCookie.split(';');
    //     for (var i = 0; i < ca.length; i++) {
    //         var c = ca[i];
    //         while (c.charAt(0) == ' ') {
    //             c = c.substring(1);
    //         }
    //         if (c.indexOf(name) == 0) {
    //             return c.substring(name.length, c.length);
    //         }
    //     }
    //     return "";
    // }
    
    // // Check if the user is logged in or visited the website before
    // var isFirstVisit = getCookie("visited");
    // if (!isFirstVisit) {
    //     // Set a cookie to track the visit
    //     setCookie("visited", "true", 30); // Expires after 30 days
    
    //     // Track user's activity and show popup after some time
    //     var timeoutDuration = 10000; // 1 minute (adjust as needed)
    //     var timeoutID = setTimeout(function() {
    //         // Show your signup popup here
    //         // For example:
    //         // showSignupPopup();
    //         alert("Sign up to get points!");
    //     }, timeoutDuration);
    // }



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
function checkname(text){
    if (text.length < 1) {
        var status = 0;
        var msg = "Please enter your Name.";
        // $("#name-error").text();
    }else {
        var status = 1;
    //    $("#name-error").text(""); // Clear any previous length error message
    }
    return status;
}
function checkpassword(password){
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
    // Regular expression pattern to match a valid email address
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
//! data validationi code end 

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