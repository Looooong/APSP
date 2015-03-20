<center>
    <div class="below_body">
        <div id="clock">Loading...</div>
		<script type="text/javascript">
        function refrClock()
        {
        var d=new Date();
        var s=d.getSeconds();
        var m=d.getMinutes();
        var h=d.gethours();
        var day=d.getDay();
        var date=d.getDate();
        var month=d.getMonth();
        var year=d.getFullYear();
        var days=new Array("Chủ nhật","thứ hai","thứ 3","thứ 4","thứ 5","thứ 6","thứ 7");
        var months=new Array("1","2","3","4","5","6","7","8","9","10","11","12");
        var am_pm;
        if (s<10) {s="0" + s}
        if (m<10) {m="0" + m}
        if (h>12) {h-=12;AM_PM = "PM"}
        else {AM_PM="AM"}
        if (h<10) {h="0" + h}
        document.getElementById("clock").innerHTML=days[day] + " Ngày " + date + "/" +months[month] + "/" + year + " Bây giờ là "+ "  [" + h + ":" + m + ":" + s + "] " + AM_PM;
        setTimeout("refrClock()",1000);
        }
        refrClock();
        
        </script>
    </div>
</center>