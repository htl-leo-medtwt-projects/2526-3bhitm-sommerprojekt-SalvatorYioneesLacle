function initPopUp() {
    let str = "";

    if (true) {
        str = `
            <div class='form-wrapper popup'>
                <div class='form-header'>Edit your profile</div>
                <div class='form-box'>
                    <div class='form-box-child'>
                        <div>
                            <form action='../php/upload-pfp.php' method='post' enctype='multipart/form-data'>
                                <div>
                                    <div id='upload-btn-box'>
                                        <input type='file' name='fileToUpload' id='fileToUpload'>
                                        <label for='fileToUpload' class='custom-file-upload'>
                                            <i class='fas fa-upload mr-2'></i> Upload File
                                        </label>
                                        <span id='file-name' class='file-name'>No file selected</span>
                                    </div>
                                    <p>Profile picture</p>
                                </div>
                                <input class='button' type='submit' value='Continue' name='submit'>
                            </form>
                        </div>
                    </div>
                    <!--<div class='button'>
                        <img class='upload-icon' src='../images/icons/dark/upload.svg' alt='upload-image'>
                        <div class='button-txt'>Upload</div>
                    </div>-->
                </div>
            </div>
        `;
    }

    document.querySelector('.popup-box').innerHTML += str;
}