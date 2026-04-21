function initPage() {
    let str = '';

    str += `
        <main>
            <nav>
                ${initNav()}
            </nav>

            <div>
                <h2>Upload your sounds</h2>
            </div>
            <div class="box">
                <div class="upload-your-sounds">Upload your sounds</div>
                <div class="upload-box">
                    <div class="upload-box-child">
                        <div>
                            <form action="imageupload.php" method="post" enctype="multipart/form-data">
                                <p>Select audio file to upload</p>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input class="button button-txt" type="submit" value="Upload" name="submit">
                            </form>
                        </div>
                    </div>
                    <div class="button">
                        <img class="upload-icon" src="../images/icons/dark/upload.svg" alt="upload-image">
                        <div class="button-txt">Upload</div>
                    </div>
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
                    <img src="../images/icons/light/home.svg" alt="home button">
                </a>
                <a href="./soundboard.html" class="nav-btn">
                    <img src="../images/icons/light/soundboard.svg" alt="soundboard button">
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