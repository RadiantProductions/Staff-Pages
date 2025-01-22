<title>Radiant Radios | Radio Player</title>

<style>
    body {
        background-color: #000000;
    }

</style>

<div id="socials-widget">
    <style>
        #socials-widget {
            font-family: 'Arial', sans-serif;
            color: #FFF;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            background: rgba(66, 66, 66, 0.479);
            border-radius: 40px;
            padding: 20px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 0, 0, 0.2);
            max-width: 800px;
            margin: 20px auto;

        }
        #socials-widget a {
            text-decoration: none;
            color: #FFF;
            font-size: 20px;
            border-radius: 100px;
            background: rgb(0, 0, 0);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            transition: background 0.3s ease;
            max-width: 50px;
        }

        #socials-widget a:hover {
            box-shadow: 0 4px 20px rgb(0, 0, 0);
        }
    </style>

    <a href="https://www.tiktok.com/@radiant.productions" target="_blank"><img width="101%" src="https://pngimg.com/d/tiktok_PNG9.png"></a>
    <a href="https://discord.gg/fnSMgWx4Pz" target="_blank"><img width="101%" src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/discord-round-color-icon.png"></a>
    <a href="https://x.com/RadiantP101" target="_blank"><img width="101%" src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/x-social-media-round-icon.png"></a>
    <a href="https://www.paypal.me/controlwebllc" target="_blank"><img width="101%" src="https://cdn-icons-png.flaticon.com/512/2504/2504802.png"></a>
    <a href="mailto:contact@radiantradios.xyz" target="_blank"><img width="101%" src="https://cdn3.iconfinder.com/data/icons/web-ui-3/128/Mail-2-512.png"></a>
    <iframe id="services" src="https://status.radiantradios.xyz/badge?theme=dark" width="190.5px" height="30" frameborder="0" scrolling="no" style="color-scheme: normal;"></iframe>
</div>

<div id="radiant-widget">

    <style>

        #radiant-widget {

            font-family: 'Arial', sans-serif;
            color: #FFF;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            background: rgba(66, 66, 66, 0.479);
            border-radius: 40px;
            padding: 20px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 0, 0, 0.2);
            max-width: 1000px;
            margin: auto;

        }



        #radiant-widget .show-info,
        #radiant-widget .track-info {
            flex: 1;
            min-width: 300px;
        }



        #radiant-widget .show-info {
            text-align: center;
        }



        #radiant-widget .progress-container {

            width: 60%;
            background-color: rgb(66, 66, 66);
            border-radius: 5px;
            overflow: hidden;
            margin: 0 auto;
        }



        #radiant-widget .progress-bar {
            height: 8px;
            width: 0px;
            background-color: #ffffff;
            text-align: center;
            line-height: 30px;
            color: white;
            border-radius: 5px;

        }



        #radiant-widget .show-art {
            width: 300px;
            height: 300px;
            border-radius: 15px;
            margin: 0 auto 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;

        }



        #radiant-widget .show-title {
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 3%;
        }



        #radiant-widget .track-info {
            display: flex;
            flex-direction: column;
            align-items: center;

        }



        #radiant-widget .album-art {

            width: 150px;
            height: 150px;
            border-radius: 15px;
            margin-bottom: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;

        }



        #radiant-widget .now-playing {
            font-size: 20px;
            margin-bottom: 20px;

        }



        #radiant-widget .recent-tracks h3 {

            font-size: 25px;

        }



        #radiant-widget .recent-tracks ul {
            padding: 0;
            list-style: none;

        }



        #radiant-widget .recent-tracks li {

            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }



        #radiant-widget .recent-tracks {

            width: 100%;

        }



        #radiant-widget .recent-tracks-iframe {

            align-items:start;

        }



        #radiant-widget .recent-track-art {

            width: 50px;
            height: 50px;
            border-radius: 5px;
            margin-right: 10px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;

        }



        #radiant-widget .track-title {

            font-size: 14px;
            word-wrap: break-word;
            white-space: normal;



        }



        .custom-audio-player {

            display: flex;
            flex-direction: column;
            align-items: center;
            align-content: center;
            background: rgba(66, 66, 66, 0.85);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            max-width: 52%;
            margin: auto;
            color: #FFF;
            font-family: Arial, sans-serif;

        }



        .custom-audio-player .controls {

            display: flex;
            align-items: center;
            gap: 15px;
            width: 100%;

        }



        .custom-audio-player .controls button {

            background: #ffffff;
            border: none;
            color: #000000;
            font-weight: bold;
            font-size: 18px;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 55px;

        }



        .custom-audio-player .controls button:hover {

            background: #ffffff;

        }



        



        .custom-audio-player #current-time,
        .custom-audio-player #duration {

            font-size: 14px;
            font-weight: bold;

        }



        .custom-audio-player .controls .volume {

            font-size: 18px;

        }



        .spacer {

            padding-top: 5%;

        }

    </style>

        <div class="show-info">

            <div class="show-art" id="show-art"></div>

            <div class="show-title" id="show-title">Loading Show Info...</div>

            <div class="progress-container">

            </div>

            <div class="spacer">

            </div>

            <div class="custom-audio-player">

                <audio id="audio" src="https://azura.typicalmedia.net/listen/radianthits/radio.mp3"></audio>

                <div class="controls">

                    <button id="play-pause" class="play">▶</button>

                    <span id="current-time">Time Listened: 0:00</span>

                    <button id="mute-unmute" class="volume"><img src="https://cdn-icons-png.flaticon.com/512/565/565296.png" width="60%" height="60%"></button>

                </div>

            </div>

        </div>

        <div class="track-info">

            <div class="album-art" id="album-art"></div>

            <div class="now-playing" id="now-playing">Loading Track Info...</div>

            <div class="recent-tracks">

                <h3>Recent Tracks</h3>

                <iframe id="recent-tracks-iframe" src="https://azura.typicalmedia.net/public/radianthits/history?theme=dark" width="95%" height="350px" frameborder="0" scrolling="yes" style="color-scheme: normal;"></iframe>

            </div>

        </div>

    <script>

        const audio = document.getElementById('audio');

        const playPauseButton = document.getElementById('play-pause');

        const currentTimeDisplay = document.getElementById('current-time');

        const muteButton = document.getElementById('mute-unmute');



        // Play or pause the audio

        playPauseButton.addEventListener('click', () => {

            if (audio.paused) {

                audio.play();

                playPauseButton.textContent = ' | | '; // Pause icon

            } else {

                audio.pause();

                playPauseButton.textContent = '▶'; // Play icon

            }

        });



        // Update progress bar and time

        audio.addEventListener('timeupdate', () => {

            // Format time

            const formatTime = time =>

                Math.floor(time / 60) + ':' + String(Math.floor(time % 60)).padStart(2, '0');

            currentTimeDisplay.textContent = 'Time Listened: '+formatTime(audio.currentTime);

        });



        // Mute or unmute audio

        muteButton.addEventListener('click', () => {

            audio.muted = !audio.muted;

            muteButton.style.backgroundColor = audio.muted ? 'red' : 'white';

        });



        (function () {

            const AZURACAST_METADATA_URL = 'https://azura.typicalmedia.net/api/nowplaying/radianthits';

            const specificTrackImageURLs = [

                'https://a10.asurahosting.com/static/uploads/onoradio/album_art.1733486583.png',

                'https://azura.typicalmedia.net/api/station/radianthits/streamer'

            ];

            const recentTracks = [];

        

            async function fetchNowPlaying() {

                try {

                    const response = await fetch(AZURACAST_METADATA_URL);

                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

                    const data = await response.json();

        

                    const nowPlaying = data.now_playing.song;

                    const showInfo = data.live;

        

                    // **STEP 1: Show the show metadata (title, artist, etc.)**

                    document.getElementById('now-playing').innerText = `${nowPlaying.text}`;
document.getElementById('show-title').innerText = showInfo.streamer_name || 'Radiant Radio';



        

                    const showArt = showInfo.art || 'https://us-east-1.tixte.net/uploads/cdn.radiantradios.xyz/Transparent-LOGO.png';

                    document.getElementById('show-art').style.backgroundImage = `url('${showArt}')`;

    

                    // **STEP 2: Handle album art URL**

                    const albumArtURL = nowPlaying.art;

                    let resolvedAlbumArt = albumArtURL;

    

                    if (albumArtURL && specificTrackImageURLs.some(url => albumArtURL.startsWith(url))) {

                        // **If the album art URL matches an ignored URL, use Spotify instead**

                        resolvedAlbumArt = await fetchAlbumArtFromSpotify(nowPlaying.artist, nowPlaying.title);

                    }

    

                    // **STEP 3: Update the album art (even if URL was ignored)**

                    document.getElementById('album-art').style.backgroundImage = `url('${resolvedAlbumArt}')`;

    

                } catch (error) {

                    console.error('Error fetching metadata:', error);

                    document.getElementById('now-playing').innerText = 'Unable to fetch song info';

                }

            }

    

            async function fetchAlbumArtFromSpotify(artist, songTitle) {

                const clientId = '3d08adcb51994f8eaca7f0edbfb6ba23';

                const clientSecret = 'dc17097bafa74ff886f616402f217c02';

    

                try {

                    const tokenResponse = await fetch('https://accounts.spotify.com/api/token', {

                        method: 'POST',

                        headers: {

                            'Content-Type': 'application/x-www-form-urlencoded',

                            'Authorization': 'Basic ' + btoa(`${clientId}:${clientSecret}`)

                        },

                        body: 'grant_type=client_credentials'

                    });

            

                    const tokenData = await tokenResponse.json();

                    const accessToken = tokenData.access_token;

        

                    const searchResponse = await fetch(`https://api.spotify.com/v1/search?q=${encodeURIComponent(artist + ' ' + songTitle)}&type=track&limit=1`, {

                        headers: {

                            'Authorization': `Bearer ${accessToken}`

                        }

                    });

            

                    const searchData = await searchResponse.json();

                    if (searchData.tracks.items.length > 0) {

                        return searchData.tracks.items[0].album.images[0].url;

                    }

                } catch (error) {

                    console.error('Error fetching Spotify album art:', error);

                }

    

                return 'default-album.jpg';

            }

        

            fetchNowPlaying();

            setInterval(fetchNowPlaying, 30000);

        

            function updateProgressBar() {

                const now = new Date();

                const minutes = now.getMinutes();

                const seconds = now.getSeconds();

                const totalSeconds = (minutes * 60) + seconds;

                const percentage = (totalSeconds / 3600) * 100;

        

                const progressBar = document.getElementById('progress-bar');

                progressBar.style.width = percentage + '%';

            }

            setInterval(updateProgressBar, 1000);

            updateProgressBar();

        })();

    </script>

</div><style>#ed-476256835 { padding: 150px 0px 0px; } @media screen and (max-width: 575px) {

  #ed-476256835 { padding: 0px; }

}</style>

<div id="contact-widget">

    <div class="contact-heading">

        <h3>Contact Us</h3>

    </div>

    <section class="formcarry-container">

        <form method="POST" id="form">



            <input type="hidden" name="access_key" value="02d43aae-942b-48c9-ba16-cd69d17dde51">

            

            <div class="formcarry-block">

                <label for="fc-generated-1-name">Full Name</label>

                <input type="text" name="name" id="fc-generated-1-name" placeholder="Your first and last name" required>

            </div>

                

            <div class="formcarry-block">

                <label for="fc-generated-1-email">Email Address</label>

                <input type="email" name="email" id="fc-generated-1-email" placeholder="john@doe.com" required>

            </div>

                

            <div class="formcarry-block">

                <label for="fc-generated-1-message">Message</label>

                <textarea name="message" id="fc-generated-1-message" placeholder="Enter your message..." required></textarea>

            </div>

            

            <input type="checkbox" name="botcheck" class="hidden" style="display: none;">



            <div class="formcarry-block">  

                <button type="submit">Send</button>

            </div>



            <div id="result"></div>



        </form>

    </section>

    <style>

        .contact-heading {

            text-align: center;

            font-size: 20px;

        }

        #contact-widget {

            font-family: 'Arial', sans-serif;

            color: #FFF;

            display: flex 2;

            justify-content: center;

            align-items: center;

            gap: 20px;

            background: rgba(66, 66, 66, 0.479);

            border-radius: 40px;

            padding: 20px;

            backdrop-filter: blur(10px);

            -webkit-backdrop-filter: blur(10px);

            border: 1px solid rgba(0, 0, 0, 0.2);

            max-width: 800px;

            margin: 20px auto;

        }



        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');

    

        .formcarry-container {

            box-sizing: border-box;

            margin: 40px auto 0 auto;

            padding: 0;

            font-family: "Inter", sans-serif;

            font-size: 14px;

            font-weight: 400;

            line-height: 24px;

            letter-spacing: -0.01em;

    

            width: 400px;

    

            /* NORMAL */

            --fc-border-color: #ECEFF9;

            --fc-normal-text-color: #0E0B3D;

            --fc-normal-placeholder-color: #B3B8D0;

    

            /* PRIMARY COLOR | HSL FORMAT*/

            --fc-primary-color-hue: 0;

            --fc-error-color-hue: 356;

            --fc-primary-hsl: var(--fc-primary-color-hue), 0%, 100%;

            --fc-error-hsl: var(--fc-error-color-hue), 100%, 54%;

    

            /* HOVER */

            --fc-field-hover-bg-color: #F7F9FC;

            --fc-border-hover-color: #DDE0EE;

            --fc-field-hover-text-color: #B3B8D0;

    

            --fc-border-active-color: #ffffff;

        }

    

        .formcarry-container * {

            box-sizing: border-box;

        }

    

        .formcarry-container label {

            display: block;

            cursor: pointer;

        }

    

        .formcarry-container .formcarry-block:not(:first-child) {

            margin-top: 16px;

        }

    

        /*=============================================

        =            Fields           =

        =============================================*/

        

        .formcarry-container input,

        .formcarry-container textarea,

        .formcarry-container select {

            margin-top: 4px;

            width: 100%;

            height: 42px;

            border: 1px solid var(--fc-border-color);

            box-shadow: 0 1px 2px var(--fc-border-color);

            color: var(--fc-normal-text-color);

            border-radius: 10px;

            padding: 8px 12px;

            

            font-family: "Inter", sans-serif;

            font-size:14px;

            transition: 125ms background, 125ms color, 125ms box-shadow;

        }

    

        .formcarry-container textarea{

            min-height: 188px;

            max-width: 100%;

            padding-top: 12px;

        }

    

        .formcarry-container input::placeholder,

        .formcarry-container textarea::placeholder,

        .formcarry-container select::placeholder {

            color: var(--fc-normal-placeholder-color);

        }

    

        .formcarry-container input:hover,

        .formcarry-container textarea:hover,

        .formcarry-container select:hover {

            border-color: var(--fc-border-hover-color);

            background-color: var(--fc-field-hover-bg-color);

        }

    

        .formcarry-container input:hover::placeholder,

        .formcarry-container textarea:hover::placeholder,

        .formcarry-container select:hover::placeholder {

            color: var(--fc-field-hover-text-color);

        }

    

        .formcarry-container input:focus,

        .formcarry-container textarea:focus,

        .formcarry-container select:focus {

            background-color: #fff;

            border: 2px solid hsl(var(--fc-primary-hsl));

            box-shadow: hsla(var(--fc-primary-hsl), 8%) 0px 0px 0px 3px;

            outline: none;

        }

    

        .formcarry-container input:focus,

        .formcarry-container select:focus {

            padding: 8px 11px;

        }

    

        .formcarry-container textarea:focus {

            padding: 11px;

        }

    

        .formcarry-container select {

            background-image: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11.9997 14.5001L8.46387 10.9642L9.64303 9.78589L11.9997 12.1434L14.3564 9.78589L15.5355 10.9642L11.9997 14.5001Z' fill='%236C6F93'/%3E%3C/svg%3E%0A");

            /* background-position: calc(100% - 20px) calc(1em + 4px), calc(100% - 15px) calc(1em + 4px); */

            background-size: 24px 24px;

            background-position: 98%;

            background-repeat: no-repeat;

            appearance: none;

            -webkit-appearance: none;

        }

    

        .formcarry-container button {

            font-family: "Inter", sans-serif;

            font-weight: 500;

            font-size: 14px;

            letter-spacing: -0.02em;

            height: 40px;

            line-height: 24px;

            width: 100%;

            border: 0;

            border-radius: 10px;

            box-sizing: border-box;

            background-color: hsla(var(--fc-primary-hsl));

            color: #000000;

            cursor: pointer;

            box-shadow: 0 0 0 0 transparent;

            

            transition: 125ms all;

        }

        

        .formcarry-container button:hover {

            background: linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), hsla(var(--fc-primary-hsl));

        }

        

        .formcarry-container button:focus {

            background: linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), hsla(var(--fc-primary-hsl));

            border-inline: 1px solid inline rgba(255, 255, 255, 0.6);

            box-shadow: 0px 0px 0px 3px rgba(var(--fc-primary-hsl), 12%);

        }

    

        .formcarry-container button:active {

            background: linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), hsla(var(--fc-primary-hsl));

        }

    

        .formcarry-container button:disabled {

            background-color: hsla(var(--fc-primary-hsl), 40%);

            cursor: not-allowed;

        }

    

        .formcarry-container input:focus:required:invalid,

        .formcarry-container input:focus:invalid, 

        .formcarry-container select:focus:required:invalid,

        .formcarry-container select:focus:invalid

        {

            color: hsl(var(--fc-error-hsl)); 

            border-color: hsl(var(--fc-error-hsl));

            box-shadow: 0px 0px 0px 3px hsla(var(--fc-error-hsl), 12%);

        }

    

        /*=====  End of Fields  ======*/

    </style>

    <script>

        const form = document.getElementById('form');

        const result = document.getElementById('result');



        form.addEventListener('submit', function(e) {

        e.preventDefault();

        const formData = new FormData(form);

        const object = Object.fromEntries(formData);

        const json = JSON.stringify(object);

        result.innerHTML = "Please wait..."



            fetch('https://api.web3forms.com/submit', {

                    method: 'POST',

                    headers: {

                        'Content-Type': 'application/json',

                        'Accept': 'application/json'

                    },

                    body: json

                })

                .then(async (response) => {

                    let json = await response.json();

                    if (response.status == 200) {

                        result.innerHTML = "Message submitted successfully";

                    } else {

                        console.log(response);

                        result.innerHTML = json.message;

                    }

                })

                .catch(error => {

                    console.log(error);

                    result.innerHTML = "Something went wrong!";

                })

                .then(function() {

                    form.reset();

                    setTimeout(() => {

                        result.style.display = "none";

                    }, 3000);

                });

        });

    </script>

</div>