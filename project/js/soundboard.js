let volume = 1;

function editVolume(value) {
    if (value >= 0 && value <= 100) {
        volume = value / 100;
    }
}

function playSound(path) {
    let sound = new Audio(path);
    sound.volume = volume;
    sound.play();
}