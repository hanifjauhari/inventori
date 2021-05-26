function startTime(){
    var today = new Date();
    var hours = today.getHours();
    var minutes = today.getMinutes();
    var seconds = today.getSeconds();

    hour = checkTime(hours)
    minute = checkTime(minutes);
    second = checkTime(seconds);
    
    document.getElementById('time').innerHTML = hour + ":" + minute + ":" + second;

    var time = setTimeout(startTime, 250);
}

function checkTime(i){
    if (i < 10) {i = "0" + i};
    return i;
}

var i = 0;
function typeWriter(){
    var today = new Date();

    var message = "Good ";

    var morningMessage = "Morning, "
    var afternoonMessage = "Afternoon, "
    var eveningMessage = "Evening, "
    var nightMessage = "Night, "

    var hour = today.getHours();
    
    if(hour > 19)
        message += nightMessage;

    else if(hour > 14) 
        message += eveningMessage;

    else if(hour > 10)
        message += afternoonMessage;
        
    else 
        message += morningMessage;
    
    message += "Selamat datang di";
    message +=" CV. BINA KREATIF";
    
    var speed = 100
    if (i < message.length){
        document.getElementById('message').innerHTML += message.charAt(i)
        i++;
        setTimeout(typeWriter, speed);
    }
}