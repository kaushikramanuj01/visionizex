<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Slider</title>
  <style>
    /* Styles for the slider container and slides */
    .slider-container {
      width: 45%;
      margin: auto;
      overflow: hidden;
      position: relative;
    }

    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .slide {
      flex: 0 0 100%;
      box-sizing: border-box;
      position: relative;
    }

    img {
      width: 100%;
      height: auto;
    }

    /* Style for text overlay */
    .text-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.5);
      color: #fff;
      padding: 10px;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="slider-container">
  <div class="slides">

    !-- Slide 1 --
    <div class="slide">
      <img src="images/p1.jpg" alt="Image 1">
      <div class="text-overlay">
        <p>Text for Image 1</p>
      </div>
    </div>

    !-- Slide 2 ->
    <div class="slide">
      <img src="images/p2.jpg" alt="Image 2">
      <div class="text-overlay">
        <p>Text for Image 2</p>
      </div>
    </div>

    !-- Add more slides as needed -
  </div>
</div>

<script>
  // JavaScript for the slider functionality
  let currentSlide = 0;
  const slides = document.querySelector('.slides');
  const totalSlides = document.querySelectorAll('.slide').length;

  function showSlide(index) {
    currentSlide = (index + totalSlides) % totalSlides;
    const newPosition = -currentSlide * 100 + '%';
    slides.style.transform = 'translateX(' + newPosition + ')';
  }

  function updateTextOverlay(index) {
    const textOverlays = document.querySelectorAll('.text-overlay p');
    textOverlays.forEach((overlay, i) => {
      overlay.style.opacity = i === currentSlide ? '1' : '0';
    });
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
    updateTextOverlay(currentSlide);
  }

  // You can add previousSlide function if needed

  // Show the first slide initially
  showSlide(currentSlide);

  // Set interval for auto-advancing the slides (adjust the time as needed)
  setInterval(nextSlide, 5000); // Change slide every 5 seconds
</script>

</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Downloader</title>
</head>
<body>

    <h1>Image Downloader</h1>

    <form id="imageForm">
        <label for="imageUrl">Image URL:</label>
        <input type="text" id="imageUrl" name="imageUrl" required>
        <button type="button" onclick="downloadImage()">Download Image</button>
    </form>

    <script>
        function downloadImage() {
            var imageUrl = document.getElementById('imageUrl').value;

            // Use AJAX to send the URL to the server
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        alert('Image downloaded successfully!');
                    } else {
                        alert('Failed to download image. Please check the URL.');
                    }
                }
            };
            xhr.open('POST', 'download_image.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('imageUrl=' + encodeURIComponent(imageUrl));
        }
    </script>

</body>
</html> 
