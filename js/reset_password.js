
var timer =  document.getElementById("timer");
var duration =  300;
setInterval(updateTimer,1000);

function updateTimer(){

    mins=Math.floor(duration/60);
    sec = duration%60;
    if(sec<10){
        sec="0"+sec;
    }
    duration--;
    if(duration<0){
        window.location = "include/timeout.inc.php";
    }else{
        timer.innerText = "0"+mins+":"+sec;
    }
}
// window.addEventListener("mousemove",resetTimer)
//
// function resetTimer(){
//     duration = 5;
// }