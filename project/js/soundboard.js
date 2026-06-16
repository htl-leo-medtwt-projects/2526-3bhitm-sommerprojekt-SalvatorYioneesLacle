let volume = 0.1;
let page = 0;
let maxPages = 1;

function initMaxPages(value) {

}

function toPrevPage() {
    if (page > 0) {
        page--;
        changePage();
    }
}

function toNextPage() {
    if (page + 1 < 4) {
        page++;
        changePage();
    }
}

function changePage() {
    let newPos = -70 * page;
    document.querySelector('.soundboard').style.translate = newPos + 'em';
}

function editVolume(value) {
    if (value >= 0 && value <= 100) {
        volume = value / 100;
    }
}

function playSound(path, id) {
    let sound = new Audio(path);
    volume = document.getElementById('volume-slider').value / 200;
    sound.volume = volume;

    let numId = Number.parseInt(id);
    lightBtn(numId);
    // console.log(id, numId);
    // dimBtn(numId);

    updateSoundMeterValue(sound, numId);

    sound.play();
}

function lightBtn(id) {
    let numId = Number.parseInt(id);
    document.getElementsByClassName('soundboard-icon').item(numId).style.backgroundColor = 'var(--highlight)';
}

function dimBtn(id) {
    let numId = Number.parseInt(id);
    document.getElementsByClassName('soundboard-icon').item(numId).style.backgroundColor = '#8d34b971';
}

function turnOffBtn(id) {
    let numId = Number.parseInt(id);
    document.getElementsByClassName('soundboard-icon').item(numId).style.backgroundColor = 'var(--white20)';
}

function updateSoundMeterValue(sound, id) {
    // https://stackoverflow.com/questions/28123525/how-do-you-get-the-decibel-level-of-an-audio-in-javascript

    var audioCtx = new AudioContext();
    var audio = sound; // Abgeändert --> Mikrofonzugriff im Original
    var processor = audioCtx.createScriptProcessor(512);
    var meter = document.getElementById('meter');
    var source;
    let prevRms = 0;

    // var audioWorklet = new AudioWorkletNode(audioCtx, ); 

    audio.addEventListener('canplaythrough', function () {
        source = audioCtx.createMediaElementSource(audio);
        source.connect(processor);
        source.connect(audioCtx.destination);
        processor.connect(audioCtx.destination);
        //audio.play();
    }, false);

    // loop through PCM data and calculate average
    // volume for a given 2048 sample buffer
    processor.onaudioprocess = function (evt) {
        var input = evt.inputBuffer.getChannelData(0)
            , len = input.length
            , total = i = 0
            , rms;
        while (i < len) total += Math.abs(input[i++]);
        rms = Math.sqrt(total / len);

        // Prevent sudden value assigment to -60
        if (prevRms - rms != 0) {
            // Smoothen sound meter values
            prt = (rms - prevRms) / 16;
            for (let j = 0; j < 16; j++) {
                document.getElementsByClassName('sound-meter').item(0).value = (prevRms + prt * j) * 100 - 60;
            }
        }
        // Save current rms for next loop
        prevRms = rms;
    };

    audio.addEventListener("ended", () => {
        // console.log(value);
        document.getElementsByClassName('sound-meter').item(0).value = -999;
        turnOffBtn(id);
    }, true);
}

function updateVolumeValue() {
    // JS to update visual display of current value
    document.querySelectorAll("input[type=range]").forEach(r => {
        r.addEventListener("input", (e) => r.nextElementSibling.textContent = e.target.value)
    })
}
updateVolumeValue();

