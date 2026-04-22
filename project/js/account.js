function initPage() {
    let str = '';

    str += `
        <main>
            <nav>
                ${initNav()}
            </nav>
            <div class="box">
                <div class="user">
                    <img class="icon" src="../images/icons/light/user.svg" alt="user icon">
                </div>
                <div class="text-box">
                    <div class="welcome-user">Welcome, <?php echo $username; ?></div>
                    <div class="last-login">Last Login: 15.03.2026, 15:03</div>
                </div>
            </div>
        </main>
    `;

    document.getElementsByTagName('body').item(0).innerHTML = str;

}
// initPage();

function initNav() {
    let str = '';

    str += `
        <div id="nav-btn-box">
            <div class="nav-left">
                <a href="../index.html" class="nav-btn">
                    <img src="../images/icons/light/home.svg" alt="home button">
                </a>
                <a href="./upload-sound.html" class="nav-btn">
                    <img src="../images/icons/light/upload.svg" alt="upload button">
                </a>
                <a href="" class="nav-btn">
                    C
                </a>
            </div>
        </div>
    `;

    document.getElementsByTagName('nav').item(0).innerHTML = str;
}
initNav();