let volume = 0.1;

function editVolume(value) {
    if (value >= 0 && value <= 100) {
        volume = value / 100;
    }
}

function playSound(path) {
    let sound = new Audio(path);
    audioStuff1(sound)
    sound.volume = volume;
    sound.play();
}

async function audioStuff(sound) {
    // const audioContext = new AudioContext();

    // // get the audio element
    // const audioElement = document.querySelector(".buttons-icon");
    // console.log(audioElement);

    // // pass it into the audio context
    // const track = audioContext.createMediaElementSource(audioElement);

    // track.connect(audioContext.destination);

    // // Select our play button
    // const playButton = document.querySelector("button");

    // playButton.addEventListener("click", () => {
    //   // Check if context is in suspended state (autoplay policy)
    //   if (audioContext.state === "suspended") {
    //     audioContext.resume();
    //   }

    //   // Play or pause track depending on state
    //   if (playButton.dataset.playing === "false") {
    //     audioElement.play();
    //     playButton.dataset.playing = "true";
    //   } else if (playButton.dataset.playing === "true") {
    //     audioElement.pause();
    //     playButton.dataset.playing = "false";
    //   }
    // });

    // audioElement.addEventListener("ended", () => {
    //   playButton.dataset.playing = "false";
    // });

    // const gainNode = audioContext.createGain();

    // track.connect(gainNode).connect(audioContext.destination);

    // const volumeControl = document.querySelector("#volume");

    // volumeControl.addEventListener("input", () => {
    //   gainNode.gain.value = volumeControl.value;
    // });

    // const stream = await navigator.mediaDevices.getUserMedia({ audio: true, video: false });
    const stream = HTMLMediaElement.audioTracks;
    const audioContext = new AudioContext();

    const audioElement = sound;

    const mediaStreamAudioSourceNode = audioContext.createMediaStreamSource(stream);
    const analyserNode = audioContext.createAnalyser();
    mediaStreamAudioSourceNode.connect(analyserNode);

    const pcmData = new Float32Array(analyserNode.fftSize);
    const onFrame = () => {
        analyserNode.getFloatTimeDomainData(pcmData);
        let sumSquares = 0.0;
        for (const amplitude of pcmData) { sumSquares += amplitude * amplitude; }
        volumeMeterEl.value = Math.sqrt(sumSquares / pcmData.length);
        window.requestAnimationFrame(onFrame);
    };
    window.requestAnimationFrame(onFrame);
    console.log(sumSquares);
}

function audioStuff1(sound) {
    // https://stackoverflow.com/questions/28123525/how-do-you-get-the-decibel-level-of-an-audio-in-javascript

    var audioCtx = new AudioContext();
    var audio = sound; // Abgeändert --> Mikrofonzugriff im Original
    var processor = audioCtx.createScriptProcessor(256, 1, 1);
    var meter = document.getElementById('meter');
    var source;
    let prevRms = 0;

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
        // console.log((rms * 100 - 60));
        // if (rms - prevRms < 1) {
            document.getElementsByClassName('volume-bar').item(0).value = rms * 100 - 60;
        // }
        prevRms = rms;
    };
}
audioStuff1(new Audio('../uploads/14/2.mp3'));

// JS to update visual display of current value
document.querySelectorAll("input[type=range]").forEach(r => {
  r.addEventListener("input", (e) => r.nextElementSibling.textContent = e.target.value)
})
