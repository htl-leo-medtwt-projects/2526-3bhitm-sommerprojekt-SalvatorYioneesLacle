const fileUpload = document.getElementById('fileToUpload');
const fileName = document.getElementById('file-name');

function updateSpan() {
    const fileUpload = document.getElementById('fileToUpload');
    const fileName = document.getElementById('file-name');
    
    fileUpload.addEventListener('change', (e) => {
        const selectedFile = e.target.files[0];
        if (selectedFile) {
            fileName.textContent = selectedFile.name;
        } else {
            fileName.textContent = 'No file selected';
        }
    });
}

function getPopUp(index) {
    let str = "";

    if (index == 0) {
        str = `
        <div class='popup'>
            <div class='form-wrapper-popup'>
                <div class='form-box'>
                    <div class='form-box-child'>
                        <div>
                            <form action='../php/upload-pfp.php' method='post' enctype='multipart/form-data'>
                                <div>
                                    <input type='text' name='username'>
                                    <p>Username</p>
                                </div>
                                <div>
                                    <div id='upload-btn-box'>
                                        <input type='file' name='fileToUpload' id='fileToUpload'>
                                        <label for='fileToUpload' class='custom-file-upload'>
                                            <i class='fas fa-upload mr-2'>
                                                <img class='upload-icon' src='../images/icons/dark/upload.svg' alt='upload-image'>
                                            </i>
                                            Upload profile picture
                                        </label>
                                        <span id='file-name' class='file-name'>No file selected</span>
                                    </div>
                                </div>
                                <input class='button' type='submit' value='Continue' name='submit'>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
    }
    if (index == 1) {
        str = `
        <div class='popup'>
            <div class='form-wrapper-popup'>
                <div class='form-header'>Edit your profile</div>
                <div class='form-box'>
                    <div class='form-box-child'>
                        <div>
                            <form action='../php/editUser.php' method='post' enctype='multipart/form-data'>
                                <div>
                                    <input type='text' name='username'>
                                    <p>Username</p>
                                </div>
                                <input class='button' type='submit' value='Continue' name='submit'>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
    }

    document.querySelector('.popup-box').innerHTML += str;

    updateSpan();
}