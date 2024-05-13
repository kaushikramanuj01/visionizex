<?php
require_once 'config/init.php';
include 'navbar.php';

$login = json_encode(isset($_SESSION['login']) ? ($_SESSION['login']) : "");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    @import url('https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap');
    
    * {
      margin: 0;
      box-sizing: border-box;
    }     
    body {
      /* background-color: #6a9ac4; */
      background-color: #333;
    }
    #contact {
      /* background-color: #6a9ac4; */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .contact-box {
      width: clamp(100px, 90%, 1000px);
      margin: 40px 50px;
      display: flex;
      flex-wrap: wrap;
      height: 515px;
    }
    .contact-links, .contact-form-wrapper {
      width: 50%;
      padding: 8% 5% 10% 5%;
      padding-bottom: 0px;

    }
    .contact-links {
      background-color: #1f2e43;
      background:
      radial-gradient(
        circle at 55% 92%, #768493 0 12%, transparent 12.2%
      ),
      radial-gradient(
        circle at 94% 77%, #617082 0 10%, transparent 10.2%
      ),
      radial-gradient(
        circle at 20% max(78%, 350px), #404c5a 0 7%, transparent 7.2%
      ),
      radial-gradient(
        circle at 0% 0%, #3b4655 0 40%, transparent 40.2%
      ),#37393c;
      border-radius: 10px 0 0 10px;
      /* background: radial-gradient( circle at 55% 92%, #5072a7 0 12%, transparent 12.2% ),
      radial-gradient( circle at 94% 77%, #38516b 0 10%, transparent 10.2% ),
      radial-gradient( circle at 20% max(78%, 350px), #6d8aa9 0 7%, transparent 7.2% ),
      radial-gradient( circle at 0% 0%, #788a9d 0 40%, transparent 40.2% ),
      #6b7d8b; */
    }

    .contact-form-wrapper {
      background-color: #414345;
      /* #37393c */
      border-radius: 0 10px 10px 0;
    }

    @media only screen and (max-width: 800px) {
      .contact-links, .contact-form-wrapper {
        width: 100%;
      }
      .contact-links {
        border-radius: 10px 10px 0 0;
      }
      .contact-form-wrapper {
        border-radius: 0 0 10px 10px;
      }
    }

    @media only screen and (max-width: 400px) {
      .contact-box {
        width: 95%;
        margin: 8% 5%;
      }
    }

    h2 {
      /* font-family: monospace; */
      font-family: 'Arimo', sans-serif;
      color: #fff;
      font-size: clamp(30px, 6vw, 60px);
      letter-spacing: 2px;
      text-align: center;
      transform: scale(.95, 1);
    }

    .links {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding-top: 50px;
    }

    .link {
      margin: 10px;
      cursor: pointer;
    }

    .link img {
      width: 45px;
      height: 45px;
      filter:
        hue-rotate(220deg)
        drop-shadow(2px 4px 4px #0006);
      transition: 0.2s;
      user-select: none;
    }

    .link img:hover {
      transform: scale(1.1, 1.1);
    }

    .link img:active {
      transform: scale(1.1, 1.1);
      filter:
        hue-rotate(220deg)
        drop-shadow(2px 4px 4px #222)
        sepia(0.3);
    }

    .form-item {
      position: relative;
    }

    label, input, textarea {
      font-family: monospace;
      /* font-family: 'Poppins', sans-serif; */
    }

    label {
      position: absolute;
      top: 10px;
      left: 2%;
      color: #999;
      font-size: clamp(14px, 1.5vw, 18px);
      pointer-events: none;
      user-select: none;
    }

    input, textarea {
      width: 100%;
      outline: 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      /* margin-bottom: 20px; */
      padding: 12px;
      font-size: clamp(15px, 1.5vw, 18px);
    }

    input:focus+label,
    input:valid+label,
    textarea:focus+label,
    textarea:valid+label {
      font-size: clamp(13px, 1.3vw, 16px);
      color: #777;
      top: -20px;
      transition: all .225s ease;
    }

    .submit-btn {
      /* background-color: #fd917e;
      filter: drop-shadow(2px 2px 3px #0003);
      color: #fff;
      font-family: "Poppins",sans-serif;
      font-size: clamp(16px, 1.6vw, 18px);
      /* display: block; */
      /* padding: 12px 20px; *
      padding: 4px 20px;
      margin: 2px auto;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      user-select: none;
      transition: 0.2s;
      width: 125px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 7px; */

      text-decoration: none;
      color: white;
      /* height: 45px; */
      /* display: inline-block; */
      /* border: 2px solid white; */
      font-size: 20px;
      border-radius: 27px;
      /* width: 9rem; */
      width: 50%;
      min-width: 6rem;
      text-align: center;
      /* margin-left: 10px; */
      background-color: ff4f6e;
      border: 2px solid #ff4f6e;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-right: 10px;
      font-family: monospace;
      /* font-family: sans-serif; */
      transition: background-color 0.3s ease;
    }

    /* .submit-btn:hover {
      transform: scale(1.1, 1.1);
    } */

    .submit-btn:active {
      transform: scale(1.1, 1.1);
      filter: sepia(0.5);
    }

    @media only screen and (max-width: 800px) {
      h2 {
        font-size: clamp(40px, 10vw, 60px);
      }
    }

    @media only screen and (max-width: 400px) {
      h2 {
        font-size: clamp(30px, 12vw, 60px);
      }
      .links {
        padding-top: 30px;
      }
      .link img {
        width: 38px;
        height: 38px;
      }
    }
    .validation-indicator {
        display: block;
        /* display: none; */
        font-size: 16px;
        color: #dc3545;
        text-align: left;
        margin-bottom: 20px;
        font-family: monospace;
        /* font-family: 'Poppins', sans-serif; */
    }

    /* Modal styles */
.modal {
  display: none; /* Hide the modal by default */
  position: fixed; /* Position the modal relative to the viewport */
  /* z-index: 1; Set the z-index to ensure it appears above other content */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
  opacity: 0; /* Start with 0 opacity */
  transition: opacity 0.3s ease; /* Smooth transition for opacity change */
}

.modal-content {
  /* background-color: #fefefe; White background for the modal content */
  /* margin: 15% auto; Center the modal vertically and horizontally */
  padding: 15px;
  border-radius: 5px;
  /* width: 45%; Set the width of the modal */
  /* background-image: linear-gradient(to right, #3a514c, #473939); */
  color: white;
  font-family: monospace;
  /* font-family: 'Arimo'; */
  background-image: linear-gradient(148deg, rgba(85, 139, 254, 0.12) 1.65%, rgba(87, 139, 254, 0) 72%, #0B0F18);
  background-color: #1a2338ba;
  /* background-color: #1c263b; */
  width: 23rem;
  margin: 30px;
}

#loginButton-b {
  /* background: linear-gradient(to right, #5a605f, #484747);
  border: 1px solid white;
  border-radius: 3px;
  width: 130px;
  margin-top: 10px;
  text-decoration: none;
  color: white;
  width: 78px;
  display: inline-block;
  text-align: center; */

  text-decoration: none;
  color: white;
  /* height: 45px; */
  /* display: inline-block; */
  /* border: 2px solid white; */
  font-size: 17px;
  border-radius: 27px;
  /* width: 9rem; */
  width: 32%;
  min-width: 6rem;
  text-align: center;
  margin-left: 10px;
  background-color: ff4f6e;
  border: 2px solid #ff4f6e;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-right: 10px;
  font-family: monospace;
  /* font-family: sans-serif; */
  transition: background-color 0.3s ease;
  display: inline-block;
}

/* Close button style */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.modal {
  display: flex; /* Show the modal */
  justify-content: center;
  align-items: center;
  /* opacity: 1; Fade in the modal */
  z-index: -11;
}

.show {
  opacity: 1; /* Fade in the modal */
  z-index: 1;
}

.p-2{
  margin-top: 50px;
  display: inline-block;
}
/* .modal-content {
  background-color: #fefefe; /* White background for the modal content 
  padding: 20px;
  border-radius: 5px;
  width: 50%; /* Set the width of the modal 
} */


#loader {
  /* border: 4px solid #f3f3f3; Light grey */
  border: 4px solid #937575;
  /* border-top: 4px solid #3498db; Blue */
  /* border-top: 4px solid #4d6c81; */
  border-top: 4px solid #4d6c8100;
  border-radius: 50%;
  width: 21px;
  height: 21px;
  animation: spin 1s linear infinite;
  display: none; /* Initially hide loader */
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

  </style>
</head>
<body>
   <!-- Modal -->
   <div id="loginModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>To fill this form you have to login first.</p>
      <p class="p-2">To login Click here.</p>
      <a href="login" id="loginButton-b">Login</a>
      <!-- <button id="loginButton">Login</button> -->
    </div>
  </div>
  <!-- Modal end -->

  <section id="contact">
    <div class="contact-box">
      <div class="contact-links">
        <h2>CONTACT</h2>
        <div class="links">
          <div class="link">
            <a href="https://www.linkedin.com/" target="_blank"><img src="https://i.postimg.cc/m2mg2Hjm/linkedin.png" alt="linkedin"></a>
          </div>
          <div class="link">
            <a href="https://github.com/" target="_blank"><img src="https://i.postimg.cc/YCV2QBJg/github.png" alt="github"></a>
          </div>
          <!-- <div class="link">
            <a><img src="https://i.postimg.cc/W4Znvrry/codepen.png" alt="codepen"></a>
          </div> -->
          <div class="link">
            <a href="mailto:communicate@visionizex.tech" target="_blank"><img src="https://i.postimg.cc/NjLfyjPB/email.png" alt="email"></a>
          </div>
        </div>
      </div>
      <div class="contact-form-wrapper">
        <form id="contactForm" method="post">
          <div class="form-item">
            <!-- <input type="text" name="sender" id="name"> -->
            <input type="text" name="sender" id="name" required>
            <label>Name:</label>
            <div class="validation-indicator" id="nameValidation"> </div>
          </div>
          <div class="form-item">
            <input type="text" name="email" id="email" required>
            <label>Email:</label>
            <!-- <input type="text" name="email" id="email"> -->
            <div class="validation-indicator" id="emailValidation"> </div>
          </div>
          <div class="form-item">
            <textarea class="" name="message" id="msg" required></textarea>
            <label>Message:</label>
            <div class="validation-indicator" id="msgValidation"> </div>
            <!-- <textarea class="" name="message" id="msg"></textarea> -->
          </div>
          <button type="button" class="submit-btn" id="contact-btn">Send <div id="loader"></div> </button>
          <!-- <button type="button" class="submit-btn" id="contact-btn">Send</button> -->
        </form>
      </div>
    </div>
  </section>
  <script src="main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>

    document.addEventListener('DOMContentLoaded', function() {
      var login = <?php echo $login; ?>;

      // $("#contact-btn").click(function(){
      //   // $("#loader").show(); // Show loader when button is clicked
      //   // Simulate a process completion after 3 seconds (you can replace this with your actual process)
      //   setTimeout(function(){
      //     $("#loader").hide(); // Hide loader after process is complete
      //   }, 3000);
      // });
      
  
      $("#contact-btn").on("click", function() {
        console.log("clicked btn");
         if(login !== 1){
          // Show the login modal
          $("#loginModal").addClass("show");
          return;
        }

        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var user_msg = document.getElementById("msg").value;
        
        // ! data validation start
          if (isValidEmail(email)) {
              // document.getElementById('emailValidation').style.display = 'none';
              $("#emailValidation").text("");
          } else {
              $("#emailValidation").text("Plese enter valid Email.");
              var error = 1;
              // document.getElementById('emailValidation').style.display = 'block';
          }
          var checknameresult = checkname(name);
          if(checknameresult == 0){
              var msg = "Please enter your Name.";
              $("#nameValidation").text(msg);
              var error = 1;
            } else{
                $("#nameValidation").text("");
            }
            var checkmsgresult = checkname(user_msg);
            if(checkmsgresult == 0){
                var msg = "Please enter your Message.";
                $("#msgValidation").text(msg);
                var error = 1;
            } else{
                $("#msgValidation").text("");
            }
            if(error == 1){ return; }

        // ! data validation end

        $("#loader").show();

        const url = "api/contact";
        const method = "POST";
        const headerdata = {
          "Content-Type": "application/json"
        };
        const paramsdata = JSON.stringify({
          name: name,
          email: email,
          user_msg: user_msg,
          action: "insertcontact",
        });

        ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback)

        function errorCallback(error) {
          console.log("err");
          // console.error('Error:', error);
          // $(".generation_msg_box").hide();
          $("#loader").hide();
          showPopupMessage("Server Error", 0);
        }

        function successCallback(data) {
          var jsonString = JSON.stringify(data);
          var jsondata = JSON.parse(jsonString);
          console.log("success");
          $("#loader").hide();
          showPopupMessage(jsondata.message, jsondata.status);
          if(jsondata.status == 1){
            document.getElementById("contactForm").reset();
          }

        }

      });

      $(".close").on("click", function() {
        $("#loginModal").removeClass("show");
      });

      // Handle the login button click event
      $("#loginButton").on("click", function() {
        // Redirect the user to the login page or perform any other action
        // For example:
        // window.location.href = "login.php";
      });

    });
  </script>
</body>
</html>