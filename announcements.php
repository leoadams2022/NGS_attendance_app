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
<title>Announcements</title>
<script src="https://cdn.jsdelivr.net/npm/underscore@1.13.6/underscore-umd-min.js
"></script>
<style>
                    body{
                background:#eee;
            }

            hr {
                margin-top: 20px;
                margin-bottom: 20px;
                border: 0;
                border-top: 1px solid #FFFFFF;
            }
            a {
                color: #82b440;
                text-decoration: none;
            }
            .blog-comment::before,
            .blog-comment::after,
            .blog-comment-form::before,
            .blog-comment-form::after{
                content: "";
                display: table;
                clear: both;
            }

            .blog-comment{
                /* padding-left: 15%; */
                /* padding-right: 15%; */
                height: 82vh !important;
                overflow-y: scroll; 
            }

            .blog-comment ul{
                list-style-type: none;
                padding: 0;
            }

            .blog-comment img{
                opacity: 1;
                filter: Alpha(opacity=100);
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                    -o-border-radius: 4px;
                        border-radius: 4px;
            }

            .blog-comment img.avatar {
                position: relative;
                float: left;
                margin-left: 0;
                margin-top: 0;
                width: 65px;
                height: 65px;
                border-radius: 50%;
            }

            .blog-comment .post-comments{
                border: 1px solid #eee;
                margin-bottom: 20px;
                margin-left: 85px;
                margin-right: 0px;
                padding: 10px 20px;
                position: relative;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                    -o-border-radius: 4px;
                        border-radius: 4px;
                background: #fff;
                color: #6b6e80;
                position: relative;
            }

            .blog-comment .meta {
                font-size: 13px;
                color: #aaaaaa;
                padding-bottom: 8px;
                margin-bottom: 10px !important;
                border-bottom: 1px solid #eee;
            }

            .blog-comment ul.comments ul{
                list-style-type: none;
                padding: 0;
                margin-left: 85px;
            }

            .blog-comment-form{
                padding-left: 15%;
                padding-right: 15%;
                padding-top: 40px;
            }

            .blog-comment h3,
            .blog-comment-form h3{
                margin-bottom: 40px;
                font-size: 26px;
                line-height: 30px;
                font-weight: 800;
            }
            span#copy {
                font-size: 20px;
                float: right;
                color: #9e9e9e70;
                text-transform: capitalize;
                transition: color 0.5s;
                cursor: pointer;
                margin-top: -20px;
            }
            span#copy:hover {
                color: blue;
            }
            .alert_for_Copy_func {
                position: fixed;
                top: 70px;
                right: 5px;
            }
            p.msg{
                word-wrap: break-word; /* IE>=5.5 */
                white-space: pre; /* IE>=6 */
                white-space: -moz-pre-wrap; /* For Fx<=2 */
                white-space: pre-wrap; /* Fx>3, Opera>8, Safari>3*/ 
            }
            .get_more_msgs_btn {
                border: none;
                width: 100%;
                color: #0d6efd;
                text-transform: capitalize;
                transition: 0.5s;
            }
            .get_more_msgs_btn:after {
                margin-left: 37%;
                content: '';
                width: 0%;
                height: 2px;
                border-radius: 36px;
                background: #44a579;
                display: block;
            }
            .get_more_msgs_btn:hover:after {
                /* margin-left: 37.5%; */
                width: 25%;
            }
</style>
</head>
<?php
include 'compo/navbar.php';
?>
<!-- <div class="height-100 bg-light"> -->
<div class="container">
<div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-success">Announcements</h3>
                <hr/>
                <div id="msgs_div"class="blog-comment">
                    <ul class="comments" id='msgsUL'>
                        <!-- <li class="clearfix">
                            <img src="https://bootdey.com/img/Content/user_3.jpg" class="avatar" alt="">
                            <div class="post-comments">
                                <p class="meta"><span id="date">Dec 18, 2014 </span><span id="auther"> JohnDoe</span> says : </p>
                                <p id="msg">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Etiam a sapien odio, sit amet
                                </p>
                            </div>
                        </li>
                        <li class="clearfix">
                            <img src="https://bootdey.com/img/Content/user_2.jpg" class="avatar" alt="">
                            <div class="post-comments">
                                <p class="meta"><span id="date">Dec 19, 2014 </span><span id="auther"> JohnDoe</span> says : </p>
                                <p id="msg">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Etiam a sapien odio, sit amet

                                    
                                </p>
                            </div>
                        </li> -->
                    </ul>
                    <div class="alert alert-success mt-2 text-center alert_for_Copy_func" id="alertbox_success" style='display:none;' role="alert">
                            Message Copied
                    </div>
                </div>
            </div>
        </div>
    </div> 
<script>
let limit= 3,offset=0;
var post_data = {needTo: 'get_unread_count'};
$.post('controlar/announcements.cont.php', post_data).done(function(data) {
    if(data > limit){
        limit =Number(data),offset=0;
        console.log(limit,data);
    }
});
function get_msgs(){
    $.ajax({
    url: 'controlar/announcements.cont.php',
    type: 'POST', 
    data: {
        needTo: 'get_msgs',
        limit: limit,
        offset: offset
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
        //  console.log(data);
             var res = JSON.parse(data);
            //  let jsD = _.sortBy(res.respond.reverse(), 'recipient');
             if(res.msg === 'No Messages found'){
                var msgsUl = document.getElementById('msgsUL');
                msgsUl.innerHTML = `<div class="no_more_div"><span class="no_more_span text-muted fw-light fs-6">There is no more messsges</span></div>`;
            }else{
                var msgs_obj = res.respond;
                // msgs_obj = msgs_obj.reverse()
                $('#msgsUL').html('');
                var msgsUl = document.getElementById('msgsUL');
                msgs_obj.forEach(function (msg, i){
                    let send_time =  DateStringToObject(msg.created_at).toLocaleString("en-US");
                    let fullMsg = msg.msg;
                    if(msg.msg.includes("Entry time update")){
                        let entry_time_update = msg.msg.slice(-16);
                        entry_time_update =DateStringToObject(entry_time_update+':00').toLocaleTimeString("en-US");
                        fullMsg = msg.msg.slice(0,40)+ entry_time_update;
                    }else if(msg.msg.includes("leave time update")){
                        let leave_time_update = msg.msg.slice(-16);
                        leave_time_update =DateStringToObject(leave_time_update+':00').toLocaleTimeString("en-US");
                        fullMsg = msg.msg.slice(0,40)+ leave_time_update;
                    }
                    msgsUl.innerHTML +=`
                    <li class="clearfix">
                                <img class="avatar" alt="" src="<?=ROOT?>images/${msg.auther}_profile_image.jpg" onerror="this.onerror=null; this.src='<?=ROOT?>images/user.png'">
                                
                                <div class="post-comments">
                                    <p class="meta">
                                        <span id="date">${send_time}</span>
                                        <span id="auther">${msg.auther}</span> : 
                                    </p>
                                    <p id="msg" class="msg msg_${i}">${fullMsg}<span id="copy" onclick="unsecuredCopyToClipboard('.msg_${i}');">
                                        <i class="bx bxs-copy-alt"></i>
                                    </span>
                                    </p>
                                </div>
                            </li> 
                    `;
                });
                msgsUl.innerHTML +=`<button id="get_more_msgs_btn_${offset}" class="get_more_msgs_btn" onclick="get_more_msgs()">get more</button>`
            }
        },
    error: function (Xhr, textStatus, errorMessage) {
            console.log('Error' + errorMessage + ' status: '+ textStatus);
        }
                                            
    });

}
function get_more_msgs(){
    $(`#get_more_msgs_btn_${offset}`).css('display','none')
    offset = offset + limit
    $.ajax({
    url: 'controlar/announcements.cont.php',
    type: 'POST', 
    data: {
        needTo: 'get_msgs',
        limit: limit,
        offset: offset
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
             console.log(res.msg,offset,limit);
             if(res.msg === 'No Messages found'){
                var msgsUl = document.getElementById('msgsUL');
                msgsUl.insertAdjacentHTML('beforeend', `<div class=" no_more_div d-flex justify-content-center align-items-center mt-2 mb-2" ><span class="no_more_span text-muted fw-light fs-6">There is no more messsges</span></div>`);
            }else{
                var msgs_obj = res.respond;
                // msgs_obj = msgs_obj.reverse()
                // $('#msgsUL').html('');
                var msgsUl = document.getElementById('msgsUL');
                msgs_obj.forEach(function (msg, i){
                    let send_time =  DateStringToObject(msg.created_at).toLocaleString("en-US");
                    let fullMsg = msg.msg;
                    if(msg.msg.includes("Entry time update")){
                        let entry_time_update = msg.msg.slice(-16);
                        entry_time_update =DateStringToObject(entry_time_update+':00').toLocaleTimeString("en-US");
                        fullMsg = msg.msg.slice(0,40)+ entry_time_update;
                    }else if(msg.msg.includes("leave time update")){
                        let leave_time_update = msg.msg.slice(-16);
                        leave_time_update =DateStringToObject(leave_time_update+':00').toLocaleTimeString("en-US");
                        fullMsg = msg.msg.slice(0,40)+ leave_time_update;
                    }
                    msgsUl.insertAdjacentHTML('beforeend',`
                            <li class="clearfix">
                                <img class="avatar" alt="" src="<?=ROOT?>images/${msg.auther}_profile_image.jpg" onerror="this.onerror=null; this.src='<?=ROOT?>images/user.png'" >
                                
                                <div class="post-comments">
                                    <p class="meta">
                                        <span id="date">${send_time}</span>
                                        <span id="auther">${msg.auther}</span>
                                        says : 
                                    </p>
                                    <p id="msg" class="msg msg_${i}">${fullMsg}<span id="copy" onclick="unsecuredCopyToClipboard('.msg_${i}');">
                                        <i class="bx bxs-copy-alt"></i>
                                    </span>
                                    </p>
                                </div>
                            </li> 
                    `);
                });
                msgsUl.insertAdjacentHTML('beforeend',`<button id="get_more_msgs_btn_${offset}" class="get_more_msgs_btn" onclick="get_more_msgs()">get more</button>`)
            }
            scrollSmoothlyToBottom('msgs_div');
        },
    error: function (Xhr, textStatus, errorMessage) {
            console.log('Error' + errorMessage + ' status: '+ textStatus);
        }
                                            
    });

}
get_msgs();
setInterval(() => {
    $counter = $('#msgs_count').text();
    // console.log($counter)
    if($counter !=0){
        get_msgs();
    }
}, 1000);
    function Copy(calss){
                var msg_text = document.querySelector(calss).innerText;
                navigator.clipboard.writeText(msg_text);
                $('#alertbox_success').show(500);
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
}
    function unsecuredCopyToClipboard(calss) {
        if (window.isSecureContext && navigator.clipboard) {
            var msg_text = document.querySelector(calss).innerText;
                navigator.clipboard.writeText(msg_text);
                $('#alertbox_success').show(500);
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
        } else {
            text  = document.querySelector(calss).innerText;
            const textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy');
            } catch (err) {
                console.error('Unable to copy to clipboard', err);
            }
            document.body.removeChild(textArea);
            $('#alertbox_success').show(500);
            setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
        }
            
}
function scrollSmoothlyToBottom(id){
    const element = $(`#${id}`);
    element.animate({
        scrollTop: (100000)
    }, 500);
}

function DateStringToObject(DateString, return_Type = 'DateObj') {
        if(DateString !== null){

            var month, day, year, HH, MM, SS, H, PmAM;
            //var DateString = '10/13/2025, 8:57:39 AM';
            // var DTparts = DateString.split(',');
            var TheDate = DateString.slice(0, 10);//DTparts[0];
            var TheTime = DateString.slice(10);//DTparts[1];
            // console.log( TheDate,'---',TheTime);
            //geting the month day year
            /*
            it is y m d
            must be  m d y
            2023-02-10
            */
            var DateParts = TheDate.split('-');
            month = DateParts[1];
            day = DateParts[2];
            year = DateParts[0];
            month = Number(month);
            day = Number(day);
            year = Number(year);
            //console.log( month,'---',day,'---',year);// month day year
            //geting the HH MM SS PmAm
            var PmAmCheack = TheTime.endsWith("PM");
            if (PmAmCheack == true) {
                PmAm = 'PM';
                TheTime = TheTime.replace("PM", "");
            } else if (PmAmCheack == false) {
                PmAm = 'AM';
                TheTime = TheTime.replace("AM", "");
            }
            var TimeParts = TheTime.split(':');
            HH = TimeParts[0];
            MM = TimeParts[1];
            SS = TimeParts[2];
            HH = Number(HH);
            MM = Number(MM);
            SS = Number(SS);
            //console.log(HH,'---',MM,'---',SS,'---',PmAm)// '8 --- 57 --- 39'
            if (PmAm == 'PM') {
                if (HH == 12) {
                    H = 12
                } else {
                    H = HH + 12
                }
            } else {
                if (HH == 12) {
                    H = 0
                } else {
                    H = HH
                }
            }
            //console.log(H);
            var D = new Date();
            D.setFullYear(year);
            D.setMonth(month - 1);
            D.setDate(day);
            D.setHours(H);
            D.setMinutes(MM);
            D.setSeconds(SS);
            //console.log(D);
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
</script>
<?php
include 'compo/foot.php';
?>