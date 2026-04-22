function initPage() {
    let str = '';

    str += `
        <main>
            <nav>
                ${initNav()}
            </nav>

            <div class="box">
                <div class="upload-your-sounds">Create an account</div>
                <div class="upload-box">
                    <div class="upload-box-child">
                        <div>
                            <form action="../php/login.php" method="post">
                                <div>
                                    <input type="text" name="username">
                                    <p>Username</p>
                                </div>
                                <div>
                                    <input type="password" name="password">
                                    <p>Password</p>
                                </div>
                                <input class="button button-txt" type="submit" value="Continue" name="submit">
                            </form>
                        </div>
                    </div>
                    <!--<div class="button">
                        <img class="upload-icon" src="../images/icons/dark/upload.svg" alt="upload-image">
                        <div class="button-txt">Upload</div>
                    </div>-->
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
                <a href="../index.php" class="nav-btn">
                    <img src="../images/icons/light/home.svg" alt="home button">
                </a>
                <a href="./soundboard.php" class="nav-btn">
                    <img src="../images/icons/light/soundboard.svg" alt="soundboard button">
                </a>
                <a href="" class="nav-btn">
                    C
                </a>
            </div>
        </div>
    `;

    return str;
}