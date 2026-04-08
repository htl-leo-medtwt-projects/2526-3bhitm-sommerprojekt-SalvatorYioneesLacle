function initPage() {
    let str = '';

    str += `
        <main>
            <nav>
                ${initNav()}
            </nav>

            <div class="page-headline">
                <h2>Create your soundboard</h2>
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
                <a href="./pages/upload-sound.html" class="nav-btn">
                    <img src="./images/icons/light/upload.svg" alt="upload button">
                </a>
                <a href="./pages/soundboard.html" class="nav-btn">
                    <img src="./images/icons/light/soundboard.svg" alt="soundboard button">
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