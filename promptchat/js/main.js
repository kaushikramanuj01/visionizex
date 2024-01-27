document.getElementById('menu-icon').addEventListener('click', function () {
    document.getElementById('sidebar').style.display = 'block';
});

document.getElementById('sidebar').addEventListener('click', function () {
    document.getElementById('sidebar').style.display = 'none';
});

document.addEventListener('DOMContentLoaded', function (event) {
    var dataText = ["Utrecht.", "Full Service.", "Webdevelopment.", "Wij zijn Codefield!"];

    function typeWriter(text, i, fnCallback) {
        if (i < text.length) {
            document.getElementById("type_text").innerHTML = text.substring(0, i + 1);
            setTimeout(function () {
                typeWriter(text, i + 1, fnCallback)
            }, 100);
        } else if (typeof fnCallback == 'function') {
            setTimeout(fnCallback, 700);
        }
    }

    function startTextAnimation(i) {
        if (i < dataText.length) {
            typeWriter(dataText[i], 0, function () {
                startTextAnimation(i + 1);
            });
        }
    }

    startTextAnimation(0);
});

// function showPromptBoxes() {
//     // Display the prompt boxes when the button is clicked
//     document.getElementById('examplePromptBox').style.display = 'block';
//     document.getElementById('aiPromptBox').style.display = 'block';
//     // Hide the "Generate" button after clicking
//     document.getElementById('generateButton').style.display = 'none';
// }