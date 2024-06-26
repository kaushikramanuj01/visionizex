<div class="navbar">
    <div class="logo">
        <img src="images/logo/logo.png" alt="Logo">
    </div>
    <span class="nav_line"></span>
    <div class="buttons">
        <!-- <a href="javascript:void(0)" onclick="showImageGeneration()">Generate</a>
            <a href="javascript:void(0)" onclick="showGallery()">Explore ideas</a> -->
        <a href="./" id="imageButton" class="nav_hide2">Generate</a>
        <a href="creation" id="chatButton" class="nav_hide2">Explore ideas</a>
        <!-- <a href="blog" id="chatButton" class="nav_hide">Blog</a> -->
        <a href="contact" id="chatButton" class="nav_hide">Contact</a>
        <a href="profile" id="chatButton" class="nav_hide">Profile</a>
        <!-- <button id="imageButton">Image</button> -->
        <!-- <button id="chatButton">Chat</button> -->
    </div>
    <div class="jamButton">
        <!-- <div class="i-block">
            <div class="premium_btn_div">
                <a href="premium" id="premium_btn">Premium</a>
            </div>
        </div> -->
        <?php 
        if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
            $usercredit = $SubDB->countcredit();
            ?>
        <div class="credit">
            <div class="f-center">
                <span class="credit_img"> <img src="images/logo/coin.png" alt="" srcset=""></span>
                <span id="credit_count">
                    <?php echo $usercredit; ?>
                </span>

            </div>
        </div>
        <?php }  ?>

        <?php if(isset($_SESSION['login']) && $_SESSION['login'] == 1){ ?>
        <a href="logout" id="logoutbutton" class="nav_hide">Logout</a>
        <?php }else{ ?>
        <a href="login" id="loginbutton" class="nav_hide">Login</a>
        <?php } ?>
        <div class="i-block">
            <!-- <div class="premium_btn_div"> -->
            <a href="premium" class="premium_btn_div nav_hide" id="premium_btn">Premium</a>
            <!-- </div> -->
        </div>
        <button id="openSidebar">☰</button>
        <!-- <button id="openSidebar" onclick="toggle_sidebar()">☰</button> -->
        <!-- <button id="openSidebar" onclick="w3_toggle()">☰</button> -->
        <!-- <button class="rk_btn w3-button w3-xlarge" onclick="w3_toggle()">button</button> -->
    </div>
</div>

<div class="nav-second">
    <a href="index" class="border-b">Generate</a>
    <a href="creation">Explore ideas</a>
</div>

<div id="mySidebar">
    <!-- <a href="javascript:void(0)" class="w3-bar-item w3-button">Close &times;</a> -->
    <!-- <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="toggle_sidebar()">Close &times;</a> -->
    <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="w3_close()">Close &times;</a>
    <!-- <div class="i-block"> -->
    <!-- <div class="premium_btn_div"> -->
    <!-- </div> -->
    <!-- </div> -->
    <!-- <a href="blog" class="w3-bar-item w3-button">Blog</a> -->
    <a href="premium" class="premium_btn_div w3-bar-item w3-button" id="premium_btn">Premium</a>
    <a href="contact" class="w3-bar-item w3-button">Contact</a>
    <a href="profile" class="w3-bar-item w3-button">Profile</a>

    <?php if(isset($_SESSION['login']) && $_SESSION['login'] == 1){ ?>
    <a href="logout" class="w3-bar-item w3-button" id="logoutbutton">Logout</a>
    <?php }else{ ?>
    <a href="login" class="w3-bar-item w3-button" id="loginbutton">Login</a>
    <?php } ?>
</div>

<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h2>Sidebar</h2>
    </div>
    <ul class="sidebar-menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</div>