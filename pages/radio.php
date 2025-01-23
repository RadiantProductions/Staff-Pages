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
                });

        });

    </script>

</div>
