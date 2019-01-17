
function refresh_display(){
    window.location.href = 'enter_login.php';
}

$(document).ready(function(){
    var msTimeDiff = openningDate.getTime() - currentDate.getTime();
    if(msTimeDiff <=0){
        refresh_display();
    }else{
        var secondTimeDiff = Math.ceil(msTimeDiff/1000);
        var clock = $('.your-clock').FlipClock(secondTimeDiff,{
            clockFace: 'DailyCounter',
            countdown:true,
            language:'french',
            callbacks: {
                stop: function(){
                    refresh_display();
                }
            }
            
        });
    }
});