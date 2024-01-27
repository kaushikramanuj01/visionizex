
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    #loading-text {
      font-size: 24px;
      position: relative;
    }

    .dot {
      display: inline-block;
      opacity: 0;
      animation: blink 1s infinite;
    }

    @keyframes blink {
      50% {
        opacity: 1;
      }
    }

    #loading-btn {
      padding: 10px 20px;
      margin-top: 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div id="loading-text">Your image is generating, please wait<span class="dot">.</span><span class="dot">.</span><span class="dot">.</span></div>
  <button id="loading-btn" onclick="toggleAnimation()">Toggle Animation</button>

  <script>
    // function toggleAnimation() {
    //   var dots = document.querySelectorAll('.dot');

    //   dots.forEach((dot, index) => {
    //     setTimeout(() => {
    //       dot.style.opacity = dot.style.opacity === '0' ? '1' : '0';
    //     }, index * 500); // Adjust the time delay between each dot
    //   });
    // }
  </script>
</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Skeleton Loading</title>
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    .skeleton-container {
      width: 300px;
      height: 200px;
      background-color: #ddd; /* Background color of the skeleton */
      border-radius: 8px;
      overflow: hidden;
    }

    .skeleton-animation {
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, #ddd 25%, #eee 50%, #ddd 75%);
      background-size: 200% 100%;
      animation: skeleton-loading 1.5s infinite;
    }

    @keyframes skeleton-loading {
      0% {
        background-position: 200% 0;
      }
      100% {
        background-position: -200% 0;
      }
    }
  </style>
</head>
<body>
  <div class="skeleton-container">
    <div class="skeleton-animation"></div>
  </div>
</body>
</html> -->
