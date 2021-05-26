function audioPlayer(){
    var x = document.getElementById("audio");
    
    if(x.paused)
        x.play();
    else
        x.pause();
}