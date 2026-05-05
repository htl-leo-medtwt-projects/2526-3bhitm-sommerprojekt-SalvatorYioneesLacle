// Generated from figma
function account() {
    let headerAuthContainer = document.getElementById("headerAuthContainer");
    if (headerAuthContainer) {
        headerAuthContainer.addEventListener("click", function (e) {
            // Add your code here
        });
    }
}

function navBtnAnimation(element) {
    // Reset animation
    element.classList.remove('shake');
    element.offsetHeight;
    // Start animation
    element.classList.add('shake');
}