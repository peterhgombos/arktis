<html>
<head>
<title>Music :: Arktis by Sigve Sebastian Farstad</title>
<link rel="stylesheet" href="/css.css">
<script src="Player.js"></script>

<style>


* {
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    transition: all .3s ease;
}

.description{
    padding: 0;
    font-size: 0.8em;
    line-height: 1.2em;
}

.progressbar{
    height: 5px;
    width: 0;
    background: #222;
    -webkit-transition: width 1s linear;
    -moz-transition: width 1s linear;
    transition: width 1s linear;
}

.progressbar-container{
    display:none;
    width: 580px;
    margin-bottom: -10px;
    margin-left: -20px;
    margin-right: -20px;
}

.song.playing .progressbar-container{
    display: block;
}

.song{
    cursor: pointer;
    padding: 0;
}

.song .by{
    opacity: 0.5;
}

.song .by::before{
    content: "by ";
}

.song .description{
    display: none;
    padding: 20px;
}

.song .name{
    padding-left: 10px;
}

.song.playing{
    background: #ccc;
}

.playlist {
    border: 1px solid #ccc;
    background: #eee;
    margin-bottom: 20px;
}

.playlist > * {
    padding: 10px 20px; 
}

.playlist.playing{
}

.song.playing .description{
    display: block;
}

</style>
</head>
<body>

<h1>Music</h1>

<p>
This is a collection of music I have made.
Some is recent, some is quite old. 
Click a track to play it.
</p>

<div id=demoscene class=playlist>
    <h3>Demoscene songs</h3>
    <div class=description>Some tracks from my participation in the demoscene.</div>

    <div class=song>
    <span class=name>TUNL-MNTN-WTER</span>
    <span class=by>Ninjadev</span>
    <div class=description>This is the soundtrack for the Ninjadev demo called TUNL-MNTN-WTER.</div>
    <audio>
        <source src=tunl-mntn-wter.mp3>
        <source src=tunl-mntn-wter.ogg>
    </audio>
    </div>

    <div class=song>
    <span class=name>HONEYCOMB</span>
    <span class=by>Ninjadev</span>
    <div class=description>This is the soundtrack for the Ninjadev demo called HONEYCOMB by Ninjadev.</div>
    <audio>
        <source src=honeycomb.mp3>
        <source src=honeycomb.ogg>
    </audio>
    </div>
</div>

<div id=random class=playlist>
    <h3>Random</h3>
    <div class=description>Just some songs.</div>

    <div class=song>
    <span class=name>Unbreakable</span>
    <span class=by>sigveseb</span>
    <div class=description></div>
    <audio>
        <source src=unbreakable.mp3>
        <source src=unbreakable.ogg>
    </audio>
    </div>
</div>

<div id=remixes class=playlist>
    <h3>Remixes</h3>
    <div class=description>Some remixes that I have made.</div>

    <div class=song>
    <span class=name>Doin' It Right feat. Giorgio Moroder</span>
    <span class=by>sigveseb</span>
    <div class=description>I've been wanting to make a remix of Daft Punk's "Doin' It Right" for a long time, and this is the result. The Giorgio quotes are taken from the REM Collaborators interview.</div>
    <audio>
        <source src=doin-it-right-feat-giorgio-moroder.mp3>
        <source src=doin-it-right-feat-giorgio-moroder.ogg>
    </audio>
    </div>
</div>

<script>

(function(){

/* ghetto jquery */
var $ = function(selector, element){
    var result = (element || document).querySelectorAll(selector);
    result.forEach = function(fn){ [].forEach.call(result, fn); };
    return result;
}

var player = new Player();

a = player;

$('.song').forEach(function(el){
    var progressBarContainer = document.createElement('div');
    progressBarContainer.classList.add('progressbar-container');
    var progressBar = document.createElement('div');
    progressBarContainer.appendChild(progressBar);
    progressBar.classList.add('progressbar');
    el.appendChild(progressBarContainer);
    el.addEventListener('click', function(){
        player.click(el);
    });

    setInterval(function(){
        $('.progressbar', player.song)[0].style.width = player.audio.currentTime/player.audio.duration * 100 + "%";
    },900);
});

})();

</script>

</body>
</html>
