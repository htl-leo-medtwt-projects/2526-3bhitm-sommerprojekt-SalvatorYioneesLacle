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