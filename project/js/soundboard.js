function initPage() {
    let str = '';

    str += `
        <main>
            <nav>
                ${initNav()}
            </nav>
            <div id="wrapper">
                <div class="soundboard">
                    ${generateButtons()}
                </div>
            </div>
        </main>
    `;

    document.getElementsByTagName('body').item(0).innerHTML = str;
}
initPage();

function initNav() {
    let str = '';

    str += `
        <div id="nav-btn-box">
            <div class="nav-left">
                <a href="../index.html" class="nav-btn">
                    <img src="../images/home.svg" alt="home button">
                </a>
                <a href="./upload-sound.html" class="nav-btn">
                    <img src="../images/upload.svg" alt="upload button">
                </a>
                <a href="" class="nav-btn">
                    C
                </a>
            </div>
            <div class="nav-account-box">
                <!-- Generated from figma -->
                <div class="header-auth" id="headerAuthContainer">
                    <div class="button-signin">
                        <div class="button-text">Sign in</div>
                    </div>
                    <div class="button-register">
                        <div class="button-text">Register</div>
                    </div>
                </div>
            </div>
        </div>
    `;

    return str;
}

// move to php
function generateButtons() {
    let str = "";

    for (let i = 0; i < 35; i++) {
        str += `<img class="buttons-icon" src="../images/Soundboard_button_alpha Kopie.svg" alt="soundboard button ${i}">`;
    }
    
    return str;
}