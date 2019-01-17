
function refresh_display(){
    window.location.href = 'shotgun.php';
}

$(document).ready(function(){
    var msTimeDiff = openningDate.getTime() - currentDate.getTime();
    if(msTimeDiff >0){
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
    }else{
        refresh_display();
    }
});