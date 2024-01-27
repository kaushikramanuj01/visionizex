<?php
require_once 'config/init.php';
include 'navbar.php';

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
}

.contact-links, .contact-form-wrapper {
  width: 50%;
  padding: 8% 5% 10% 5%;
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
  font-family: 'Poppins', sans-serif;
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
  margin-bottom: 20px;
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
  background-color: #fd917e;
  filter: drop-shadow(2px 2px 3px #0003);
  color: #fff;
  font-family: "Poppins",sans-serif;
  font-size: clamp(16px, 1.6vw, 18px);
  display: block;
  padding: 12px 20px;
  margin: 2px auto;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  user-select: none;
  transition: 0.2s;
}

.submit-btn:hover {
  transform: scale(1.1, 1.1);
}

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

  </style>
</head>
<body>
  <section id="contact">
    <div class="contact-box">
      <div class="contact-links">
        <h2>CONTACT</h2>
        <div class="links">
          <div class="link">
            <a><img src="https://i.postimg.cc/m2mg2Hjm/linkedin.png" alt="linkedin"></a>
          </div>
          <div class="link">
            <a><img src="https://i.postimg.cc/YCV2QBJg/github.png" alt="github"></a>
          </div>
          <div class="link">
            <a><img src="https://i.postimg.cc/W4Znvrry/codepen.png" alt="codepen"></a>
          </div>
          <div class="link">
            <a><img src="https://i.postimg.cc/NjLfyjPB/email.png" alt="email"></a>
          </div>
        </div>
      </div>
      <div class="contact-form-wrapper">
        <form>
          <div class="form-item">
            <input type="text" name="sender" required>
            <label>Name:</label>
          </div>
          <div class="form-item">
            <input type="text" name="email" required>
            <label>Email:</label>
          </div>
          <div class="form-item">
            <textarea class="" name="message" required></textarea>
            <label>Message:</label>
          </div>
          <button class="submit-btn">Send</button>  
        </form>
      </div>
    </div>
  </section>
  <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</body>
</html>