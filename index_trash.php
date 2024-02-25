<script>
//! LOGIN SESSION GET START 
const url = "session";
const method = "POST";
const headerdata = {
    "Content-Type": "application/json"
};
const paramsdata = JSON.stringify({
    type: "login"
});;
ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback)

function successCallback(data) {
    console.log(data);
    login = data;
}

function errorCallback(data) {
    // console.log(data);
    // console.error('Error:', error);
}
//! LOGIN SESSION GET END
</script>


//! important start
// window.onload = function() {
// Check if the popup has been shown before
// if (!localStorage.getItem('popupShown')) {
// // Show the popup
// document.getElementById('popup').classList.add('show');
// }
// Function to show the popup message after a delay
// function showPopupDelayed(type) {
// if(type == "login" && !localStorage.getItem('popupShown_login')){
// document.getElementById('popup').querySelector('h2').textContent = 'Loged in';
// document.getElementById('popup').querySelector('p').textContent = 'New message based on the condition.';
// document.getElementById('popup').classList.add('show');
// localStorage.setItem('popupShown_login', 'true');
// }
// // Check if the popup has been shown before
// if (!localStorage.getItem('popupShown')) {
// // Show the popup
// document.getElementById('popup').querySelector('h2').textContent = 'Welcome!';
// document.getElementById('popup').querySelector('p').textContent = 'Login to get a free token.';
// document.getElementById('popup').classList.add('show');
// localStorage.setItem('popupShown', 'true');
// }
// // setTimeout(function() {
// // }, 1000);
// }
// // Call the function with a delay of 3000 milliseconds (3 seconds)
// showPopupDelayed("welcome");
// };

// session_login = ?php echo $login; ?>;
// console.log("session login in JS" + session_login);
// if(session_login == 1){
// console.log(session_login);
// showPopupDelayed("login");
// }
//! important end