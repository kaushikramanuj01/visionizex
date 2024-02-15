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
// ! old new // importaant

    // function showPopupMessage(message, status) {
    //     // Check if outerDiv already exists
    //     var outerDiv = document.getElementById('outerDiv');
    //     if (!outerDiv) {
    //         // If outerDiv does not exist, create it
    //         outerDiv = document.createElement('div');
    //         outerDiv.id = 'outerDiv'; // Set ID for the outer div
    //         // Insert outerDiv as the first child of the body
    //         var firstChild = document.body.firstChild;
    //         document.body.insertBefore(outerDiv, firstChild);
    //     }

    //     // Create a div element for the message popup container
    //     var messagePopupContainer = document.createElement('div');
    //     messagePopupContainer.className = 'message-popup-container';

    //     // Create a div element for the message popup
    //     var messagePopupDiv = document.createElement('div');
    //     messagePopupDiv.className = 'message-popup';
    //     // Set the appropriate class based on status
    //     var className = (status === 1) ? 'success' : 'danger';
    //     messagePopupDiv.classList.add(className);
    //     // Set your HTML content (replace this with your actual HTML content)
    //     messagePopupDiv.innerHTML = '<p>Your HTML content goes here</p>';
    //     messagePopupDiv.innerHTML = message;

    //     // Append the messagePopupDiv to the messagePopupContainer
    //     messagePopupContainer.appendChild(messagePopupDiv);

    //     // Insert the messagePopupContainer as the first child of outerDiv
    //     outerDiv.insertBefore(messagePopupContainer, outerDiv.firstChild);

    //     // Show the popup with animation
    //     messagePopupDiv.style.opacity = '1';

    //     // Shift existing pop-up messages down
    //     var containers = document.querySelectorAll('.message-popup-container');
    //     var shiftAmount = messagePopupContainer.offsetHeight + 10; // Adjust for margin
    //     containers.forEach(function(container) {
    //         container.style.transform = 'translateY(' + shiftAmount + 'px)';
    //     });

    //     // Hide the popup after 4 seconds (8000 milliseconds)
    //     setTimeout(function () {
    //         // Remove the messagePopupContainer after hiding
    //         // messagePopupContainer.remove();
    //         // // Shift existing pop-up messages back up
    //         // containers.forEach(function(container) {
    //         //     container.style.transform = 'translateY(0)';
    //         // });
    //     }, 8000); // Adjusted timeout to 8 seconds (8000 milliseconds)
    // }

// ! old new // Important

function showPopupMessage2(message, status) {
    // Check if outerDiv already exists
    var outerDiv = document.getElementById('outerDiv');

    if (!outerDiv) {
        // If outerDiv does not exist, create it
        outerDiv = document.createElement('div');
        outerDiv.id = 'outerDiv'; // Set ID for the outer div
        // Insert outerDiv as the first child of the body
        var firstChild = document.body.firstChild;
        document.body.insertBefore(outerDiv, firstChild);
    }

    // Create a div element for the message popup
    var messagePopupDiv = document.createElement('div');
    messagePopupDiv.className = 'message-popup';
    // Set your HTML content (replace this with your actual HTML content)
    messagePopupDiv.innerHTML = '<p>' + message + '</p>';

    // Insert the messagePopupDiv as the first child of outerDiv
    outerDiv.insertBefore(messagePopupDiv, outerDiv.firstChild);

    // Set the appropriate class based on status
    var className = (status === 1) ? 'success' : 'danger';
    console.log(className);
    // Set the message and class
    messagePopupDiv.firstChild.innerHTML = message;
    messagePopupDiv.className = 'message-popup ' + className + ' animate';

    // Show the popup with animation
    outerDiv.style.display = 'block';

    // Apply a delay to ensure smooth transition
    setTimeout(function () {
        // Get the height of the new messagePopupDiv
        var height = messagePopupDiv.offsetHeight;
        // Get the existing messagePopupDivs
        var existingPopups = document.querySelectorAll('.message-popup:not(.animate)');
        // Adjust the position of existing messagePopupDivs
        existingPopups.forEach(function (popup) {
            // Apply transition and transform properties
            popup.style.transition = 'transform 0.3s ease';
            popup.style.transform = 'translateY(' + height + 'px)';
        });

        // Hide the popup after 4 seconds (8000 milliseconds)
        setTimeout(function () {
            // Remove the messagePopupDiv after hiding
            outerDiv.style.display = 'none';
            // Remove the messagePopupDiv after hiding
            messagePopupDiv.remove();
            // Reset the position of existing messagePopupDivs after hiding
            existingPopups.forEach(function (popup) {
                popup.style.transition = 'none';
                popup.style.transform = 'translateY(0)';
            });
        }, 8000); // Adjusted timeout to 8 seconds (8000 milliseconds)
    }, 100); // Adjust the delay as needed
}




function showPopupMessage_final(message, status) {
    // Check if outerDiv already exists
    var outerDiv = document.getElementById('outerDiv');

    if (!outerDiv) {
        // If outerDiv does not exist, create it
        outerDiv = document.createElement('div');
        outerDiv.id = 'outerDiv'; // Set ID for the outer div
        // Insert outerDiv as the first child of the body
        var firstChild = document.body.firstChild;
        document.body.insertBefore(outerDiv, firstChild);
    }

    // Create a div element for the message popup
    var messagePopupDiv = document.createElement('div');
    messagePopupDiv.className = 'message-popup';
    // Set your HTML content (replace this with your actual HTML content)
    messagePopupDiv.innerHTML = '<p>' + message + '</p>';

    // Append the messagePopupDiv to the outerDiv
    outerDiv.appendChild(messagePopupDiv);

    // Get the first child of outerDiv, which will be the oldest messagePopupDiv
    // var firstChild = outerDiv.firstChild;

    outerDiv.insertBefore(messagePopupDiv, outerDiv.firstChild);

    // Set the appropriate class based on status
    var className = (status === 1) ? 'success' : 'danger';

    // Set the message and class
    messagePopupDiv.innerHTML = message;
    messagePopupDiv.className = 'message-popup ' + className;

    // Show the popup with animation
    outerDiv.style.display = 'block';
    messagePopupDiv.style.opacity = '1';

    // Hide the popup after 5 seconds (5000 milliseconds)
    setTimeout(function () {
        // Remove the messagePopupDiv after hiding
        // messagePopupDiv.style.opacity = '0';
        setTimeout(function () {
            // messagePopupDiv.remove();
        }, 1000); // Wait 1 second for the fade out animation to complete before removing
    }, 5000); // 5 seconds
}

function showPopupMessage(message, status) {
    // Check if outerDiv already exists
    var outerDiv = document.getElementById('outerDiv');

    if (!outerDiv) {
        // If outerDiv does not exist, create it
        outerDiv = document.createElement('div');
        outerDiv.id = 'outerDiv'; // Set ID for the outer div
        // Insert outerDiv as the first child of the body
        var firstChild = document.body.firstChild;
        document.body.insertBefore(outerDiv, firstChild);
    }

    // Create a div element for the message popup
    var messagePopupDiv = document.createElement('div');
    messagePopupDiv.className = 'message-popup';
    // Set your HTML content (replace this with your actual HTML content)
    messagePopupDiv.innerHTML = '<p>' + message + '</p>';

    // Append the messagePopupDiv to the outerDiv
    outerDiv.appendChild(messagePopupDiv);

    // Get the first child of outerDiv, which will be the oldest messagePopupDiv
    // var firstChild = outerDiv.firstChild;

    outerDiv.insertBefore(messagePopupDiv, outerDiv.firstChild);

    // Set the appropriate class based on status
    var className = (status === 1) ? 'success' : 'danger';

    // Set the message and class
    messagePopupDiv.innerHTML = message;
    messagePopupDiv.className = 'message-popup ' + className;

    // Create a cancel button
    var cancelButton = document.createElement('button');
    // cancelButton.innerText = 'Cancel';
    cancelButton.innerHTML = '&times;'; // Add close sign "&times;"
    cancelButton.className = 'cancel-button';
    // Add click event listener to the cancel button
    cancelButton.addEventListener('click', function() {
        // Remove the messagePopupDiv when the cancel button is clicked
        outerDiv.removeChild(messagePopupDiv);
    });
    // Append the cancel button to the messagePopupDiv
    messagePopupDiv.appendChild(cancelButton);

    // Show the popup with animation
    outerDiv.style.display = 'block';
    messagePopupDiv.style.opacity = '1';

    // Hide the popup after 5 seconds (5000 milliseconds)
    setTimeout(function () {
        // Remove the messagePopupDiv after hiding
        messagePopupDiv.style.opacity = '0';
        setTimeout(function () {
            messagePopupDiv.remove();
        }, 1000); // Wait 1 second for the fade out animation to complete before removing
    }, 5000); // 5 seconds
}


function showPopupMessage3(message, status) {
    // Check if outerDiv already exists
    var outerDiv = document.getElementById('outerDiv');

    if (!outerDiv) {
        // If outerDiv does not exist, create it
        outerDiv = document.createElement('div');
        outerDiv.id = 'outerDiv'; // Set ID for the outer div
        // Insert outerDiv as the first child of the body
        var firstChild = document.body.firstChild;
        document.body.insertBefore(outerDiv, firstChild);
    }

    // Create a div element for the message popup
    var messagePopupDiv = document.createElement('div');
    messagePopupDiv.id = 'messagePopup';
    messagePopupDiv.className = 'message-popup';
    // Set your HTML content (replace this with your actual HTML content)
    messagePopupDiv.innerHTML = '<p>'+message+'</p>';

    // Append the messagePopupDiv to the outerDiv
    outerDiv.appendChild(messagePopupDiv);

    console.log("showPopupMessage show ");
    // Get the first child of outerDiv, which will be the oldest messagePopupDiv
    var firstChild = outerDiv.firstChild;

    const height = outerDiv.offsetHeight;
    outerDiv.style.height = height + 'px';
    // Insert the messagePopupDiv before the firstChild (at the beginning)
    outerDiv.insertBefore(messagePopupDiv, firstChild);

    var inners = document.getElementById('message-popup');

    inners
    // var popup = document.getElementById('messagePopup');
    // var popup = outerDiv.lastChild;
    var popup = outerDiv.firstChild;

    // Set the appropriate class based on status
    var className = (status === 1) ? 'success' : 'danger';
    console.log(className);
    // Set the message and class
    popup.innerHTML = message;
    popup.className = 'message-popup ' + className;
    // Show the popup

    // Show the popup with animation
    outerDiv.style.display = 'block';
    popup.style.opacity = '1';




    // Hide the popup after 4 seconds (8000 milliseconds)
    setTimeout(function () {
        // outerDiv.style.display = 'none';
        // Remove the messagePopupDiv after hiding
        messagePopupDiv.remove();
    }, 4000); // Adjusted timeout to 8 seconds (8000 milliseconds)
}


// function showPopupMessage(message, status) {

//     var outerDiv = document.getElementById('outerDiv');
//     if(outerDiv){
//         // Create a div element for your message popup
//         var messagePopupDiv = document.createElement('div');
//         messagePopupDiv.id = 'messagePopup';
//         messagePopupDiv.className = 'message-popup';
//         // Set your HTML content (replace this with your actual HTML content)
//         messagePopupDiv.innerHTML = '<p>Your HTML content goes here</p>';

//         outerDiv.appendChild(messagePopupDiv);
//     }else{
//          // Create a div element
//         var outerDiv = document.createElement('div');
//         outerDiv.id = 'outerDiv'; // Set ID for the outer div
//         // Create a div element for your message popup
//         var messagePopupDiv = document.createElement('div');
//         messagePopupDiv.id = 'messagePopup';
//         messagePopupDiv.className = 'message-popup';
//         // Set your HTML content (replace this with your actual HTML content)
//         messagePopupDiv.innerHTML = '<p>Your HTML content goes here</p>';
//         // Append the messagePopupDiv to the outerDiv
//         var outerDiv = document.getElementById('outerDiv');

//         outerDiv.appendChild(messagePopupDiv);
//         // Get a reference to the first child of the body
//         var firstChild = document.body.firstChild;
//         // Insert the outerDiv before the first child
//         document.body.insertBefore(outerDiv, firstChild);
//     }

//     //!
//     // Get the parent div element
//     // var parentDiv = document.getElementById('outerDiv');
//     // // Check if the parent div exists
//     // if (parentDiv) {
//     //     // Get all div elements inside the parent div
//     //     var childDivs = parentDiv.querySelectorAll('div');
//     //     // Get the count of div elements inside the parent div
//     //     var divCount = childDivs.length;
//     //     console.log("Number of divs inside parent div:", divCount);
//     // } else {
//     //     console.error('Parent div not found');
//     // }

//     //! new 
//     // Create a div element
//     // var messagePopupDiv = document.createElement('div');
//     // Set attributes for the div
//     // messagePopupDiv.id = 'messagePopup';
//     // messagePopupDiv.className = 'message-popup';
//     // Get a reference to the first child of the body
//     // var firstChild = document.body.firstChild;
//     // Insert the div before the first child
//     // document.body.insertBefore(messagePopupDiv, firstChild);
//     var outerDiv = document.getElementById('outerDiv');

//     console.log("showPopupMessage show ");
//     var popup = document.getElementById('messagePopup');
//     // Set the appropriate class based on status
//     var className = (status === 1) ? 'success' : 'danger';
//     // Set the message and class
//     popup.innerHTML = message;
//     popup.className = 'message-popup ' + className;
//     // Show the popup
//     // popup.style.display = 'block';
//     outerDiv.style.display = 'block';
//     // Hide the popup after 4 seconds
//     setTimeout(function () {
//         // popup.style.display = 'none';
//     }, 800000);
// }

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
function checkotp(otp) {
    var result = {};
    if (otp.length < 1) {
        result.status = 0;
        result.msg = "Please enter Code.";
    } else if (otp.length !== 6) {
        result.status = 0;
        result.msg = "Code must be 6 character.";
    } else {
        result.status = 1;
    }
    return result;
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