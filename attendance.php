<?php
include 'compo/head.php';
/************  Dont forget you have acsess to ****************
            $id =  $_SESSION["id"];
            $first_name = $_SESSION["first_name"] ;
            $last_name = $_SESSION["last_name"] ;
            $email = $_SESSION["email"];
            $user_name = $_SESSION["user_name"];
            $gender = $_SESSION["gender"];
            $phone = $_SESSION["phone"] ;
            $address = $_SESSION["address"];
            $rank = $_SESSION["rank"]; 
*/
?>
<title>Attendance</title>
<!-- luxon timezone library  -->
<!-- <script src="https://cdn.jsdelivr.net/npm/luxon@3.2.1/build/global/luxon.min.js"></script> -->
<style>
    table.attendancce_log_table{
        margin: 1rem 0rem;
    }
    @media only screen and (max-width: 768px) {
        .for_in_out_btn {
            position: absolute; 
            top: 5px; 
            left: 5px !important;
        }
    }
    .for_in_out_btn {
            position: absolute;
            top: 5px;
            left: 70px;
        }
    div#attendancce_log_table_length {
        margin-bottom: 0.5rem;
    }
 /* this is for the   js_clocks */
    .js_clock {
        padding: 20px 40px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 10px;
        text-align: center;
        width: 400px;
    }
    .js_dayName {
        text-transform: uppercase;
        font-size: 15px;
    }
    .js_flexbox {
        display: flex;
        justify-content: center;
        align-items: end;
        padding: 10px;
    }
    .js_HrMinSec {
        font-size: 35px;
    }
    .js_merdian {
        font-size: 12px;
        padding-left: 20px;
        padding-bottom: 10px;
    }
    .popup_div{
        display: none;
        width: 20rem;
        overflow-x: hidden;
    }
    .featherlight-content{
        padding: 0px !important;
        border: none !important;
    }
    /* // Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) { 
        .popup_div{
            width: 30rem;
            overflow-x: hidden;
        }
     }

    /* // Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) { 
        .popup_div{
            width: 40rem;
            overflow-x: hidden;
        }
     }

    /* // Large devices (desktops, 992px and up) */
    @media (min-width: 992px) { 
        .popup_div{
            width: 50rem;
            overflow-x: hidden;
        }
     }

</style>
</head>
<?php
include 'compo/navbar.php';
?>
<!-- <div class="height-100 bg-light"> -->
<div class="container attendance_page">
   
    <div class="d-flex justify-content-center mb-2">
        <div class="js_clock bg-dark-subtle">
        <div class="js_dayName">Saturday</div>
        <div class="js_flexbox">
            <div class="js_HrMinSec">00:00:00</div>
            <div class="js_merdian">AM</div>
        </div>
        <div class="js_date">
            <span class="js_month">May</span>
            <span class="js_today">12</span>
            <span class="js_year">2021</span>
        </div>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-2">
        <span class=" text-capitalize">entry time must be: <span id='entry_time'></span>  </span>
        <br>
        <span class=" text-capitalize">leave time must be: <span id='leave_time'></span></span>
    </div>

                <div class="btns_div d-flex justify-content-center">
                    <button id="in_btn" style="display:none;" class="btn btn-success btn-lg text-capitalize">start your day</button>
                    <button id="out_btn" style="display:none;" class="btn btn-danger btn-lg text-capitalize">end your day</button>
                </div>
                <div class="alert alert-danger mt-2 text-center text-capitalize for_in_out_btn" id="alertbox_danger" style='display:none;' role="alert">
                    this is the alert danger box
                </div>
                <div class="alert alert-success mt-2 text-center for_in_out_btn text-capitalize" id="alertbox_success" style='display:none;' role="alert">
                    this is the alert success box
                </div>
            </div>

            <table class="table table-striped table-hover attendancce_log_table" id="attendancce_log_table">
                <thead>
                    <tr class="table-dark text-center">
                        <th class="table-dark text-center text-capitalize">date</th>
                        <th class="table-dark text-center text-capitalize">time in</th>
                        <th class="table-dark text-center text-capitalize">time out</th>
                        <th class="table-dark text-center text-capitalize">excuse</th>
                    </tr>
                </thead>
                <tbody id='attendancce_log_tbody'>
                 
                </tbody>
            </table>
            <div id="popup_div" class='popup_div p-4 bg-dark' style="">
                <div class="row">
                    <div class="col-12">
                        <textarea id="excuse_textarea" class="form-control" placeholder="Write Your Excuse"></textarea>
                        <button id="send_excuse" class="btn btn-info mt-2" onclick="submit_excuse()">Submit</button>
                    </div>
                </div>
            </div>
<!-- in_out_script  -->
<script>
// $(document).ready(function(){
    $('#add_excuse_btn').featherlight({
	    targetAttr: '#popup_div'
    });
    //------------
    function im_i_in_or_out(time = 0){
        $.ajax({
            url: 'controlar/attendance.cont.php',
            type: 'POST', 
            data: {
                attendance_csae: '',
                needTo: 'im_i_in_or_out'
                },  
            beforeSend: function() {
                $body = $("body");
                $body.addClass("loading");
            },
            complete: function() {
                $body = $("body");
                $body.removeClass("loading");
                },
            success: function(data, status, xhr){
                            // console.log(data);
                            var res = JSON.parse(data);
                            if(res.state == 'good'){
                            // console.log(res.msg);
                            // console.log(res.respond);
                            if(res.respond === 'show_#in_btn'){
                                $('#in_btn').show(time);
                                $('#out_btn').hide(time);
                            }else if (res.respond === 'show_#out_btn'){
                                $('#in_btn').hide(time);
                                $('#out_btn').show(time);
                            }
                            }else{
                            console.log('requst returned bad');
                            }
                },
            error: function (Xhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                              
        });
        get_attendance_log();
    }
    im_i_in_or_out();
    //------------
    $('#in_btn').click(function (){
        let if_late = "false";
        if(typeof(in_timeing_obj) != "undefined" && in_timeing_obj !== null) {
            let rightNow = new Date();
            console.log(compareDates_2(rightNow,in_timeing_obj))
            if(compareDates_2(rightNow,in_timeing_obj) === 'd2 before d1'){
                if_late = "true";
            }else{
                if_late = "false";
            }
        }
            event.preventDefault();
            var louclTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            $.ajax({
                    url: 'controlar/attendance.cont.php',
                    type: 'POST', 
                    data: {
                        timeZone: louclTimeZone,
                        needTo: 'in',
                        if_late: if_late// will be 'true' or 'false'
                        },  
                    beforeSend: function() { 
                        $body = $("body");
                        $body.addClass("loading"); 
                    },
                    complete: function() {
                        $body = $("body");
                        $body.removeClass("loading");
                        },
                    success: function(data, status, xhr){
                        // console.log(data);
                        var res = JSON.parse(data);
                        if(res.state == 'good'){
                        //   console.log(res.msg);
                        //   console.log(res.respond);
                            im_i_in_or_out(500);
                            $('#alertbox_success').html(res.msg);
                            $('#alertbox_success').show(500);
                            setTimeout(() => { $('#alertbox_success').hide(500);  }, 3000);
                        }else if(res.state === 'bad'){
                            $('#alertbox_danger').html(res.msg);
                            $('#alertbox_danger').show(500);
                            setTimeout(() => { $('#alertbox_danger').hide(500);  }, 3000);
                        }      
                        },
                    error: function (Xhr, textStatus, errorMessage) {
                        console.log('Error' + errorMessage + ' status: '+ textStatus);
                        }                                       
            });
    });
    //------------
    $('#out_btn').click(function (){
        let if_late = "false";
        if(typeof(in_timeing_obj) != "undefined" && in_timeing_obj !== null) {
            let rightNow = new Date();
            console.log(compareDates_2(out_timeing_obj,rightNow))
            if(compareDates_2(out_timeing_obj,rightNow) === 'd2 before d1'){
                if_late = "true";
            }else{
                if_late = "false";
            }
        }
        console.log(if_late)
        event.preventDefault();
        var louclTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        $.post('controlar/attendance.cont.php',
        {
        timeZone: louclTimeZone,
        needTo: 'out',
        if_late: if_late
        },
        function(data){
            console.log(data);
            var res = JSON.parse(data);
            if(res.state == 'good'){
            //   console.log(res.msg);
            //   console.log(res.respond);
                im_i_in_or_out(500);
                $('#alertbox_success').html(res.msg);
                $('#alertbox_success').show();
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 3000);
            }else{
                $('#alertbox_danger').html(res.msg);
                $('#alertbox_danger').show();
                setTimeout(() => { 
                    $('#alertbox_danger').hide(500); 
                    location.reload(true);
                }, 1000);
            }
        });
    });
    //------------
    let in_timeing_obj,out_timeing_obj
    function get_attendance_log(){
        console.log('get_attendance_log strat')
        const date = new Date();
        let Thismonth = date.getMonth()+1;
        $.ajax({
                url: 'controlar/attendance.cont.php',
                type: 'POST', 
                data: {
                    Thismonth: Thismonth,
                    get_attendance_log: '',
                    needTo: 'get_attendance_log'
                    },
                beforeSend: function() {
                    $body = $("body");
                    $body.addClass("loading"); 
                },
                complete: function() {
                    $body = $("body");
                    $body.removeClass("loading");
                    },
                success: function(data, status, xhr){
                    // console.log(data)
                    var res = JSON.parse(data);
                    //  console.log(res.msg);
                    // console.log(res.respond)
                    in_timeing_obj = '';
                    out_timeing_obj = '';
                        if(res.state == 'good'){
                            if(res.msg[0]['enter_time'] !== null && res.msg[0]['leave_time'] !== null){
                                in_timeing_obj = DateStringToObject(res.msg[0]['enter_time']);
                                out_timeing_obj = DateStringToObject(res.msg[0]['leave_time']);
                                let entryTime = in_timeing_obj.toLocaleString("en-US").split(',')
                                $('#entry_time').text(entryTime[1]);
                                let levaeTime = out_timeing_obj.toLocaleString("en-US").split(',')
                                $('#leave_time').text(levaeTime[1]);
                            }else{
                                in_timeing_obj = 'Not_Set';
                                out_timeing_obj = 'Not_Set';
                            }
                            // console.log(in_timeing_obj.toLocaleString("en-US")+' -- '+out_timeing_obj.toLocaleString("en-US"));
                            var dataCollection = res.respond;
                            // console.log('dataCollection  ',dataCollection);
                            drawTable(dataCollection, 'attendancce_log_tbody');
                            //this is for the data table defaults
                            $.extend( $.fn.dataTable.defaults, {
                                searching: false,
                                ordering:  false
                            } );
                            // adding Pagination with data table 
                            $(document).ready( function () {
                                $('#attendancce_log_table').DataTable();
                                
                            } );
                        }else{
                        console.log(data);
                        if(res.respond[0]['enter_time'] !== null && res.respond[0]['leave_time'] !== null){
                                in_timeing_obj = DateStringToObject(res.respond[0]['enter_time']);
                                out_timeing_obj = DateStringToObject(res.respond[0]['leave_time']);
                                let entryTime = in_timeing_obj.toLocaleString("en-US").split(',')
                                $('#entry_time').text(entryTime[1]);
                                let levaeTime = out_timeing_obj.toLocaleString("en-US").split(',')
                                $('#leave_time').text(levaeTime[1]);
                            }else{
                                in_timeing_obj = 'Not_Set';
                                out_timeing_obj = 'Not_Set';
                            }
                        console.log('requst returned bad');
                        }     
                    },
                error: function (Xhr, textStatus, errorMessage) {
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                    }                                       
        });
    }
    //------------
  
    //------------
    function drawTable(jsData, tbody) {
        var tr, td;
        tbody = document.getElementById(tbody);
        tbody.innerHTML = '';
        let late_in, late_out;
        // console.log(jsData)
        for (var i = 0; i < jsData.length; i++) {

            late_in = null; late_out = null;

            tr = tbody.insertRow(tbody.rows.length);
            tr.setAttribute("class", " text-center");

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = jsData[i].day_date;

            td = tr.insertCell(tr.cells.length);
            var d= DateStringToObject(jsData[i].time_in);
            var compare = compareDates_2(d, in_timeing_obj)
            if(compare === 'd1 before d2'){
                td.setAttribute("class", "table-primary text-center");
                late_in = false;
            }else if(compare === 'd1 = d2'){
                td.setAttribute("class", "table-primary text-center");
                late_in = false;
            }else{
                td.setAttribute("class", "table-danger text-center");
                late_in = true;
            }
            // var compare = compareDates(d, in_timeing_obj)
            // if(compare === 'good'){
            //     td.setAttribute("class", "table-primary text-center");
            //     late_in = false;
            // }else if (compare === 'bad'){
            //     td.setAttribute("class", "table-danger text-center");
            //     late_in = true;
            // }
            let time_only = d.toLocaleString("en-US").split(',');
            td.innerHTML = time_only[1];

            td = tr.insertCell(tr.cells.length);
            if(jsData[i].time_out !== null){
                var d= DateStringToObject(jsData[i].time_out);
                var compare = compareDates_2(out_timeing_obj, d);
                if(compare === 'd1 before d2'){
                    td.setAttribute("class", "table-primary text-center");
                    late_out = false;
                }else if(compare === 'd1 = d2'){
                    td.setAttribute("class", "table-primary text-center");
                    late_out = false;
                }else{
                    td.setAttribute("class", "table-danger text-center");
                    late_out = true;
                }
                // var compare = compareDates(out_timeing_obj, d)
                // console.log(out_timeing_obj.getHours(),d.getHours())
                // if(compare === 'good'){
                //     td.setAttribute("class", "table-primary text-center");
                //     late_out = false;
                // }else if (compare === 'bad'){
                //     td.setAttribute("class", "table-danger text-center");
                //     late_out = true;
                // }
                let time_only = d.toLocaleString("en-US").split(',');
                td.innerHTML = time_only[1];
            }else{
                td.setAttribute("class", "table-primary text-center");
                td.innerHTML = 'not set yet';
            }

            td = tr.insertCell(tr.cells.length);
            if(jsData[i].excuse != null){
                td.setAttribute("class", "table-danger text-center ");
                td.innerHTML = jsData[i].excuse;
            }else{
                if(late_in != null || late_out != null){
                    if(late_in == true || late_out == true){
                        //late
                        td.setAttribute("class", "table-danger text-center");
                        td.innerHTML = `<button id="add_excuse_btn" onclick="entry_id=${jsData[i].id};" class="add_excuse_btn btn btn-secondary" href="#popup_div">add an Excuse</button>`;// get_excuse('${jsData[i].id}' data-featherlight="#popup_div" onclick="add_excuse('${jsData[i].id}')
                    }else if(late_in == false || late_out == false){
                        //not late
                        td.setAttribute("class", "table-primary text-center ");
                        td.innerHTML = `:)`;
                    }
                }
            }
        }
        $('.add_excuse_btn').featherlight({
	        targetAttr: 'href',
            variant: 'test_class',
        });

    }
    //------------
    function DateStringToObject(DateString, return_Type = 'DateObj') {
        if(DateString !== null){
            var month, day, year, HH, MM, SS;
            var TheDate = DateString.slice(0, 10);//DTparts[0];
            var TheTime = DateString.slice(10);//DTparts[1];
            var DateParts = TheDate.split('-');
            month = DateParts[1]; day = DateParts[2]; year = DateParts[0];
            month = Number(month); day = Number(day); year = Number(year);
            // console.log('day: ',day,' month: ',month,' year: ',year)
            var TimeParts = TheTime.split(':');
            HH = TimeParts[0]; MM = TimeParts[1]; SS = TimeParts[2];
            HH = Number(HH); MM = Number(MM); SS = Number(SS);
            // console.log('hour: ',HH,' min: ',MM,' sec: ',SS)
            var D = new Date();
            D.setFullYear(year); D.setMonth(month-1); D.setDate(day);
            D.setHours(HH); D.setMinutes(MM); D.setSeconds(SS);
            if(return_Type === 'DateObj'){
                return D;
            }else if(return_Type === 'infoObj'){
                var Date_info= [{
                    day: D.getDate(),
                    month: D.getMonth()+1,
                    year: D.getFullYear(),
                    huor: D.getHours(),
                    minute: D.getMinutes(),
                    second: D.getSeconds() 
                }];
                return Date_info;
            }
        }else{
            return "there is no date";
        }
    }
    //------------
    // this is for the js clock
    function showClock() {
        // Declare Variables
        var time = new Date();
        var hours = time.getHours();
        var minutes = time.getMinutes();
        var seconds = time.getSeconds();
        var day = time.getDay();
        var date = time.getDate();
        var month = time.getMonth();
        var year = time.getFullYear();
        var meridian = hours > 12 ? "PM" : "AM";
        var daysOfWeek = [
            "SUNDAY",
            "MONDAY",
            "TUESDAY",
            "THURSDAY",
            "WEDNESDAY",
            "FRIDAY",
            "SATURDAY"
        ];
        var monthsOfYear = [
            "JAN",
            "FEB",
            "MAR",
            "APR",
            "MAY",
            "JUN",
            "JUL",
            "AUG",
            "SEP",
            "OCT",
            "NOV",
            "DEC"
        ];
        var currentDay = daysOfWeek[day];
        var currentMonth = monthsOfYear[month];
        if (hours > 12) {
            hours = hours - 12;
        }

        // Add Leading Zero
        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        var HrMinSec = hours + " : " + minutes + " : " + seconds;
        // Implement values to DOM
        document.querySelector(".js_dayName").innerHTML = currentDay;
        document.querySelector(".js_HrMinSec").innerHTML = HrMinSec;
        document.querySelector(".js_merdian").innerHTML = meridian;
        document.querySelector(".js_month").innerHTML = currentMonth;
        document.querySelector(".js_today").innerHTML = date;
        document.querySelector(".js_year").innerHTML = year;
    }
    setInterval(() => { showClock(); }, 1000);
    //------------
// });
    //------------
    let entry_id;
    function submit_excuse(){
        var post_data = {
            needTo: 'add_excuse',
            entry_id: Number(entry_id),
            excuse_text: $('.featherlight-content > div > div > div > textarea').val()
        };
        // Send a POST request to the server
        $.post('controlar/attendance.cont.php', post_data).done(function(data) {
            // var res = JSON.parse(data);
            // console.log(data);
            var current = $.featherlight.current();
            current.close();
            get_attendance_log();
        }); 
    }
    //------------
    function compareDates_2(d1,d2){
        //.setFullYear(y, m, d)
        //m(0-11) d(1-31) y(9999)
        d1.setFullYear(2023, 0, 1); d2.setFullYear(2023, 0, 1);
        if(d1 > d2){
            // return '(d1 > d2)'
            return('d2 before d1')
        }else if(d2 > d1){
            // return '(d2 > d1)'
            return('d1 before d2')
        }else{
            // return '(d1 = d2)'
            return('d1 = d2')
        }
    }



</script>
<?php
include 'compo/foot.php';
?>