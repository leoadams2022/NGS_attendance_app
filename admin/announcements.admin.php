<?php
include 'compo/head.admin.php';
/************  Dont forget you have acsess to ****************
    $id =  $_SESSION["id"];
    $first_name = $_SESSION["first_name"] ;
    $last_name = $_SESSION["last_name"] ;
    $email = $_SESSION["email"];
    $user_name = $_SESSION["user_name"];
    $gender = $_SESSION["gender"];
    $phone = $_SESSION["phone"] ;
    $address = $_SESSION["address"];
    $password =  $_SESSION["password"];
    $rank = $_SESSION["rank"];
    $campaign = $_SESSION['campaign'];
    $education = $_SESSION["education"];
    $experience = $_SESSION["experience"];
    $created_at = $_SESSION["created_at"];
*/

?>
<title>Admin Announcements</title>

<!-- adding the search plugin  -->
<script src="<?=ROOT?>admin/compo/assets/js/jquery-search.js"></script>
 <!-- jquery cookeis plugin  -->
 <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
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
            .blog-comment,.y_scrol_div_cont,.new_msg_div{
                /* height: 60vh !important; */
                /* border: 1px solid red !important; */
            }

            .blog-comment{
                /* padding-left: 15%; */
                /* padding-right: 15%; */
                height: 54.5vh !important;
                overflow-y: scroll;
                /* border: 1px solid red !important; */
                padding: 5px;
                margin-top: 20px;
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
                width: 35px;
                height: 35px;
                border-radius: 50%;
                outline: 0.1px #00000045 solid;
            }

            .blog-comment .post-comments{
                border: 1px solid #eee;
                margin-bottom: 20px;
                margin-left: 40px;
                margin-right: 0px;
                padding: 10px 20px;
                position: relative;
                -webkit-border-radius: 10px;
                  -moz-border-radius: 10px;
                    -o-border-radius: 10px;
                        border-radius: 10px;
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
            .icons_div {
                position: absolute;
                bottom: 0px;
                right: 0px;
            }
            .icons_div > span {
                font-size: 20px;
                float: right;
                color: #9e9e9e70;
                text-transform: capitalize;
                transition: color 0.5s;
                cursor: pointer;
            }
            .icons_div > span.copy_span:hover,
            .icons_div > span.edit_span:hover{
                color: blue;
            }
            .icons_div > span.update_span:hover{
                color: green;
            }
            .icons_div > span.delete_span:hover,
            .icons_div > span.clsoe_span:hover{
                color: red;
            }
            .alert_for_Copy_func {
                position: fixed;
                top: 60px;
                right: 5px;
                z-index: 100;
            }
            /* for the taps */
            .tab-content>.active {
                display: block;
                width: 100%;
            }
            /* icons div  */
            .icons_div > span {
                margin: 0.3rem;
            }
            .nav-pills .myNavLink.active {
                background: #7f7e7e;
                color: white;
                font-weight: 600;
            }
            .nav-pills .myNavLink {
                    background: none;
                    color: #198754;
                    font-weight: 500;
            }
            span.slelect_all_rec_span,
            span.slelect_all_cam_span{
                background: #ffffff63;
                border: 0.5px solid white;
                border-radius: 5px;
                padding: 3px;
                transition: 0.2s;
            }
            span.slelect_all_rec_span:hover,
            span.slelect_all_cam_span:hover{
                    background: white;
                    color: black;
                }
            .include_th:before,
            .include_th:after {
                display: none !important;
            }
            .recipients_table_th::before,
            .recipients_table_th::after{
                color: white;
            }
            .dataTables_length, .dataTables_filter{
                margin-bottom: 0.5rem;
                /* color: black; */
            }
            .dataTables_length label , .dataTables_filter label{
                color: black;
            }
            div .dataTables_info {
                color: black !important;
            }
            a.paginate_button.current {
                background: #7f7e7e !important;
            }
            .date_span {
                font-size: 13px !important;
                color: #aaaaaa !important;
                /* float: left !important; */
                /* padding-bottom: 8px !important;
                margin-bottom: 10px !important; */
                /* border-bottom: 1px solid #eee !important; */
            }
            p.msg_p{
                word-wrap: break-word; /* IE>=5.5 */
                white-space: pre; /* IE>=6 */
                white-space: -moz-pre-wrap; /* For Fx<=2 */
                white-space: pre-wrap; /* Fx>3, Opera>8, Safari>3*/
            }
            /* temp borders-------------------------------------------------------------------  */
            .contacts,.chat_header,.blog-comment {
                /* border: 1px solid black; */
            }
            /*-------------------------------------------------------------------// temp borders  */
            .chat_header{
                z-index: 100;
            }
            .agent_img {
                width: 50px;
                height: 50px;
            }
            .wrap:hover,
            .wrap.selected {
                background: var(--bs-dark-bg-subtle)!important;
            }
            .y_scrol_div_cont {
                height: 60vh !important;
                overflow-y: scroll;
                /* border: 1px solid red; */
            }
            .chat_header, .chat_tabs {
                /* height: 55px; */
            }
            ul.chat_tabs {
                flex-wrap: nowrap !important;
                height: 50px !important;
            }
            .chat_contact_tab_btn {
                height: 48px;
            }
            .new_msg_textarea {
                height: 40px;
                width: 85% !important;
                max-height: 100px;
                z-index: 100;
            }
            .new_msg_div {
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                align-content: center;
                justify-content: center;
                align-items: center;
            }
            .chat_send_msg_btn {
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 100%;
                font-size: 20px;    
                transition: 0.5s;
                /* background: green; */
            }
            .chat_send_msg_btn:hover {
                background-color: var(--bs-info)!important;
            }
            .modal_loading{
                background: none !important;
            }
            @media (max-width: 768px) { 
                .sidebar_div{
                    display: none;
                }
            }
            .show_sidebar_btn {
                width: 60px;
                height: 30px;
                font-size: 25px;
                border: none;
            }
            .show_sidebar_btn:hover {
                background-color: var(--bs-success)!important;
                color: white;
            }
            div#chat_header_div,.agents_warp {
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: flex-start;
                align-items: center;
            }
            .name_usernam_spans,.fullname_username_li_div {
                display: flex;
                flex-direction: column;
                flex-wrap: nowrap;
                justify-content: center;
                align-items: flex-start;
            }
            img.chat_landing_img {
                width: 100%;
                height: 95%;
                object-fit: contain;
            }
            /** 
            .get_more_msgs_btn {
                border: none;
                width: 100%;
                color: #0d6efd;
                text-transform: capitalize;
                transition: 0.5s
            }
            .get_more_msgs_btn:hover:after{
                //margin-left: 37.5%;
                width: 25%;
            }
            .get_more_msgs_btn:after {
                margin-left: 37%;//37.5%
                content: '';
                width: 0%;//25%
                height: 2px;
                border-radius: 36px;
                background: #44a579;
                display: block;
            }
            */
</style>
</head>
<?php
include 'compo/navbar.admin.php';
/*
   add the agents and campgins  part and get it working
   add the msg has been seen futcher
   style the new msg part  in a better way
   get the cout of the AutoGenerated messages
*/
?>
<div class="container-fluid announcements_page"> <!--container-->
    <!-- alert box's  -->
    <div class="alert alert-success mt-2 text-center alert_for_Copy_func" id="alertbox_success" style='display:none;' role="alert">Message Copied</div>
    <div class="alert alert-danger text-center alert_for_Copy_func" id="alertbox_danger" style='display:none;' role="alert">alert-danger</div>

            <!-- previous announcements -->
            <div class="w-100 pt-3 text-dark " >
                    <div class="row">

                        <button id="show_sidebar_btn" class="show_sidebar_btn d-md-none mb-1 bg-success-subtle rounded-2"><i class='bx bx-menu'></i></button>

                        <div id="sidebar_div" class="sidebar_div col-sm-12  d-md-block col-md-4 ps-0 pe-0 contacts">
                                <ul class="nav nav-tabs justify-content-center nav-fill chat_tabs " role="tablist">
                                    <li class="nav-item" role="presentation">
                                    <button class="chat_contact_tab_btn nav-link active" id="agents-tab" data-bs-toggle="tab" data-bs-target="#agents-tab-pane" type="button" role="tab" aria-controls="agents-tab-pane" aria-selected="true">agents</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                    <button class="chat_contact_tab_btn nav-link " id="camp-group-tab" data-bs-toggle="tab" data-bs-target="#camp-group-tab-pane" type="button" role="tab" aria-controls="camp-group-tab-pane" aria-selected="false">campaigns</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="">
                                <!-- tab-1-agents---------------------------------------------------- --->
                                    <div class="tab-pane fade show active" id="agents-tab-pane" role="tabpanel" aria-labelledby="agents-tab" tabindex="0"  style="color:black;">
                                        <!-- tab-1-agents -->
                                        <div class="search_div">
                                            <input type="text" id="agents_search_input" class="agents_search_input form-control mt-1 " placeholder="Search By Agent">
                                        </div>
                                        <div class="y_scrol_div_cont">
                                            <ul id="chat_agents_ul" class="contects_ul ps-1 pe-1 mt-2" style="list-style: none;">
                                            <!-- agents_list li's tags -->
                                            </ul>
                                        </div>
                                         <!-- //tab-1-agents -->
                                    </div>
                                <!------------------------------------------------------ // tab-1-agents -->

                                <!-- tab-2-camp-group ------------------------------------------------------>
                                    <div class="tab-pane fade" id="camp-group-tab-pane" role="tabpanel" aria-labelledby="camp-group-tab" tabindex="0"  style="color:black;">
                                        <!-- tab-2-camp-group -->
                                        <div class="search_div">
                                            <input type="text" id="camps_search_input" class="camps_search_input form-control mt-1" placeholder="Search By Campaign">
                                        </div>
                                        <div class="y_scrol_div_cont">
                                            <ul id="chat_camps_ul" class="camp_group_ul ps-1 pe-1 mt-2" style="list-style: none;">
                                            <!-- camps_list li's tsgs  -->
                                            </ul>
                                        </div>
                                        <!-- // tab-2-camp-group -->
                                    </div>
                                <!-------------------------------------------------------// tab-2-camp-group -->
                                </div>
                        </div>

                        <div id="content_div" class="col-sm-12 d-md-block col-md-8 ps-0 pe-0">
                            <div id="chat_header_div" class="chat_header m-1 p-2 border border-dark-subtle rounded-2 shadow bg-primary-subtle" style="visibility:hidden">
                                <img  id="header_agent_img" src="no src yet" class="rounded-circle me-2 agent_img" alt="Image not found" onerror="this.onerror=null;this.src='<?=ROOT?>images/user.png';">
                                <div class="name_usernam_spans">
                                    <span id="header_agent_name_span">-----</span>
                                    <span id="header_agent_username_span" class="userName_span text-muted fw-light" style="font-size: 12px;"></span>
                                </div>
                            </div>
                            <div id="msges_div" class="blog-comment" >
                                
                                <ul class="comments" id='msgsUL'>
                                         <div class="landing_chat_div">
                                            <img src="https://images2.imgbox.com/85/2d/kNcNovFf_o.png" class="chat_landing_img img-fluid" alt="" srcset="">
                                         </div>
                                </ul>
                               <!-- it was here   onkeyup-->
                            </div>
                            <div class="new_msg_div ">
                                <textarea class="new_msg_textarea form-control rounded-1 shadow " placeholder="Write your message here" id="chat_msg_textarea" wrap="soft" onkeyup="textAreaAdjust('chat_msg_textarea')" onfocusout="textAreaAdjust('chat_msg_textarea')" ></textarea>
                                <button class="chat_send_msg_btn bg-success-subtle m-1" id="chat_send_msg_btn" onclick="Send_new_msg()"><i class='bx bx-send'></i></button>
                            </div>
                        </div>
                    </div> 
                <!-- ------------------------------------------------------  previous announcements  -->
            </div>



<script>
// chating ----------------------------------------------------------
// snend msg with enter btn
$('#chat_msg_textarea').keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		// alert('You pressed a "enter" key in textbox');	
        $('#chat_send_msg_btn').click();
	}
});
// toggle btween sidebar and content in small screens
$("#show_sidebar_btn").click(function(){ 
    $('#sidebar_div').toggle(500)
    $('#content_div').toggle(500);    
});
// change textarea height when input is to long
function textAreaAdjust(elementID) {
  element = document.getElementById(elementID);
  element.style.height = "1px";
  element.style.height = (4+element.scrollHeight)+"px";
  $height =  $("#chat_msg_textarea").css("height").replace("px", " ");
    if(Number($height) > 100){
        $("#chat_msg_textarea").css('overflow','scroll');
    }
}
// scroll Smoothly To Bottom
function scrollSmoothlyToBottom(id){
    const element = $(`#${id}`);
    element.animate({
        scrollTop: (100000)
    }, 500);
}
// get all agents and camps
$.ajax({
    url: 'controlar/announcements.cont.admin.php',
    type: 'POST', 
    data: {
        needTo: 'get_all_agints'
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
        var res = JSON.parse(data);
        DrawAgents(res.respond,'chat_agents_ul')     
        DrawCamps(res.msg,'chat_camps_ul')        
    },
    error: function (Xhr, textStatus, errorMessage) {
        console.log('Error' + errorMessage + ' status: '+ textStatus);
    }                                       
});
// Draw Agents
function DrawAgents(jsData,agentsUlId){
    let Container = document.getElementById(agentsUlId);
    Container.innerHTML = '';
    
    for(let i=0;i<jsData.length;i++){
        $body = $("body");
        $body.addClass("loading");
        // let sel = '';
        // if(i === 0){sel = ''}//'selected';}
        Container.innerHTML +=`
            <li class=""  data-search-data="${jsData[i].first_name+' '+jsData[i].last_name}">
                <div id="agent_warp_div_${i}" class="wrap agents_warp  bg-secondary-subtle mb-1 w-100" onclick="
                        open_agent_chat('${jsData[i].user_name}','#agent_warp_div_${i}','${jsData[i].first_name+' '+jsData[i].last_name}')
                        ">
                    <img src="<?=ROOT?>images/${jsData[i].user_name}_profile_image.jpg" class="rounded-circle m-2 agent_img" alt="" onerror="this.onerror=null;this.src='<?=ROOT?>images/user.png';">
                    <div class="fullname_username_li_div">
                        <span class="name">${jsData[i].first_name+' '+jsData[i].last_name}</span>
                        <span class="userName_span text-muted fw-light" style="font-size: 12px;">${jsData[i].user_name}</span>
                    </div>
                </div>
            </li>
        `;
    }
    $('#chat_agents_ul > li').jqSearch({
        searchInput: '#agents_search_input',
        searchTarget: 'data'
    });
    $body = $("body");
    $body.removeClass("loading");
}
// Draw Camps
function DrawCamps(jsData,campsUlId){
    let Container = document.getElementById(campsUlId);
    Container.innerHTML = '';
    for(let i=0;i<jsData.length;i++){
        $body = $("body");
        $body.addClass("loading");
        let sel = '';
        if(i === 0){sel = ''}//'selected';}
        Container.innerHTML +=`
        <li class="" data-search-data="${jsData[i]}">
            <div id="camp_warp_div_${i}" class="wrap camps_warp ${sel} bg-secondary-subtle mb-1 w-100" onclick="
            open_camp_chat('${jsData[i]}','#camp_warp_div_${i}')
            ">
                <img src="<?=ROOT?>images/group-icon.png" class="rounded-circle m-2 agent_img" alt="Camp image">
                <span class="name">${jsData[i]}</span>
            </div>
        <li>
        `;
    }
    $('#chat_camps_ul > li').jqSearch({
        searchInput: '#camps_search_input',
        searchTarget: 'data'
    });
    $body = $("body");
    $body.removeClass("loading");
}
// vars to send new msgs
   let resipients = [];
   let sendBy = '';
// agent
function open_agent_chat(userName,agent_warp_div_id,fullName){
    $('#chat_header_div').css("visibility",`visible`)
    $('#header_agent_name_span').text(fullName)
    $('#header_agent_username_span').text(userName)
    $("#header_agent_img").attr("src",`<?=ROOT?>images/${userName}_profile_image.jpg`)
    $("#header_agent_img").attr("onerror",`this.onerror=null;this.src='<?=ROOT?>images/user.png';`)

    $('.agents_warp').each(function(){$(this).removeClass("selected");});
    $(agent_warp_div_id).addClass("selected");

    get_msgs_by_userName(userName);
    scrollSmoothlyToBottom('msges_div');
    $('#chat_msg_textarea').val('');
    textAreaAdjust('chat_msg_textarea');
    // reset and set the send new msgs vars
    resipients = [];
    sendBy = '';
    resipients.push(userName);
    sendBy = 'resipients'
    // rest the offset
    offset = 0;
    // for smale screens
    if($("#show_sidebar_btn").css('display') != 'none'){
        $('#sidebar_div').toggle(500)
        $('#content_div').toggle(500);    
    }

}
function get_msgs_by_userName(userName){
    $.ajax({
            url: 'controlar/announcements.cont.admin.php',
            type: 'POST',
            data: {
                needTo: 'get_msgs_by_userName',
                user_name: userName,
                limit: limit,
                offset: 0,
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
                // console.log('get_msgs_by_userName tregerd',data)
                DrawMsgs(data);   
                },
            error: function (Xhr, textStatus, errorMessage) {
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                                       
    });
}
function DrawMsgs(data){
    var res = JSON.parse(data);
    // Update the page with the response
    // console.log(res.respond);
    if(res.respond === 'no messages were found :('){
        var msgsUl = document.getElementById('msgsUL');
        msgsUl.innerHTML = `<div class="no_more_div"><span class="no_more_span text-muted fw-light fs-6">No Messages found</span></div>`;//'No Messages found';
    }else{
        var msgs_obj = res.respond;
        $('#msgsUL').html('');
        var msgsUl = document.getElementById('msgsUL');
        msgsUl.innerHTML = '';
        msgsUl.innerHTML = `<div class="get_more_msgs_btn" id="get_more_msgs_btn_${offset}"><span onclick="get_more_msgs()">get more</span></div>`;
        let Cuernt_user = '<?=$user_name?>';
        msgs_obj.forEach(function (msg, i){
                let recipient = '';
                let name = '';
                let seen_icon ='';
                if(Object.is(msg.recipient, null)){
                    name = 'Campaign';
                    recipient = msg.campaign
                    seen_icon ='';
                }else{
                    name = 'Recipient';
                    recipient = msg.recipient
                    seen_icon = `<i class='bx bx-check-double fs-6' style='color:black' ></i>`;
                    if(msg.status === 'yes'){
                        // msg have been seen
                        seen_icon = `<i class='bx bx-check-double fs-6' style='color:blue' ></i>`;
                    }
                }
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
                let Msg_auther = 'Me';
                if(msg.auther != Cuernt_user){
                    Msg_auther = msg.auther;
                }
                msgsUl.innerHTML +=`
                <li class="clearfix">
                    <img class="avatar" alt="" src="<?=ROOT?>images/${msg.auther}_profile_image.jpg" onerror="this.onerror=null; this.src='<?=ROOT?>images/user.png'" >
                    
                    <div class="post-comments">
                        <div id="msg" class="msg msg_${i}">
                            <textarea type="text" class="form-control msg_textarea" placeholder="message" value="" style="display:none;" id="msg_input_${msg.id}" >${msg.msg}</textarea>
                            <p id="msg_p_${i}" class="msg_p">${fullMsg}</p>
                            
                        </div>
                        <br> 
                        <div class='icons_div  text-center d-flex justify-content-end '>  

                            <span id="clsoe_span_${i}"  class='clsoe_span'  style="display:none;" title="clsoe" onclick="
                            clsoe_msg('#msg_input_${msg.id}','#msg_p_${i}','#update_span_${i}','#edit_span_${i}','#clsoe_span_${i}','#edit_span_${i}','#delete_span_${i}','#copy_span_${i}')
                            "><i class='bx bx-x' ></i></span>

                            <span id="edit_span_${i}" class='edit_span' title="edit" onclick="
                            edit_msg('#msg_input_${msg.id}','#msg_p_${i}','#update_span_${i}','#edit_span_${i}','#clsoe_span_${i}','#edit_span_${i}','#delete_span_${i}','#copy_span_${i}');
                            "><i class='bx bx-edit-alt'></i></span>

                            <span id="copy_span_${i}" class="copy_span" title="Copy" onclick="
                            unsecuredCopyToClipboard('#msg_p_${i}');
                            "><i class="bx bxs-copy-alt"></i></span>
                                
                            <span id="update_span_${i}" class='update_span' title="Update" style="display:none;" onclick="
                            update_msg('${msg.id}','${recipient}','${name}');
                            "><i class="bx bx-mail-send"></i></span>


                            <span id="delete_span_${i}" class="delete_span" style="display:none;" title="Delete" onclick="
                            delete_msg('${msg.id}','${recipient}','${name}');
                            "><i class="bx bxs-message-x"></i></span>
                        </div>
                        <span id="date" class='date_span'>${send_time}  ${seen_icon}  By: ${Msg_auther}</span>
                    </div>
                </li> 
                `;
        });
        }
}
//---------------
// camp
function open_camp_chat(campName,camp_warp_div_id){
    $('#chat_header_div').css("visibility",`visible`)
    $('#header_agent_name_span').text(campName)
    $('#header_agent_username_span').text('')
    $("#header_agent_img").attr("src",`<?=ROOT?>images/group-icon.png`)

    $('.camps_warp').each(function(){$(this).removeClass("selected");});
    $(camp_warp_div_id).addClass("selected");

    get_msgs_by_camp(campName);
    scrollSmoothlyToBottom('msges_div');
    $('#chat_msg_textarea').val('');
    // reset and set the send new msgs vars
    resipients = [];
    sendBy = '';
    resipients.push(campName);
    sendBy = 'campaign';
    // rest the offset
    offset = 0;
    // for smale screens
    if($("#show_sidebar_btn").css('display') != 'none'){
        $('#sidebar_div').toggle(500)
        $('#content_div').toggle(500);    
    }
}
function get_msgs_by_camp(campName){
    $.ajax({
            url: 'controlar/announcements.cont.admin.php',
            type: 'POST', 
            data: {
                needTo: 'get_msgs_by_camp',
                camp_name: campName,
                limit: limit,
                offset: 0,
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
                // console.log('get_msgs_by_camp trgerd',data)
                DrawMsgs(data);  
                // DrawCamps(data)
                },
            error: function (Xhr, textStatus, errorMessage) {
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                                       
    });
}
//---------------
// msg edit functios
function edit_msg(inputID,parID,sendiconID,editiconID,closeSpanID,editSpanID,deletSpanID,copySpanID){
    //edit_msg('#msg_input_${msg.id}','#msg_p_${i}','#update_span_${i}','#edit_span_${i}','#clsoe_span_${i}','#edit_span_${i}','#copy_span_${i}')
    $(parID).hide(500)
    $(editSpanID).hide()
    $(copySpanID).hide()
    $(inputID).show(500)
    $(sendiconID).show()
    $(closeSpanID).show()
    $(deletSpanID).show()
}
function clsoe_msg(inputID,parID,sendiconID,editiconID,closeSpanID,editSpanID,deletSpanID,copySpanID){
    //clsoe_msg('#msg_input_${msg.id}','#msg_p_${i}','#update_span_${i}','#edit_span_${i}','#clsoe_span_${i}','#edit_span_${i},','#copy_span_${i}')
    $(parID).show(500)
    $(editSpanID).show()
    $(copySpanID).show()
    $(inputID).hide(500)
    $(sendiconID).hide()
    $(closeSpanID).hide()
    $(deletSpanID).hide()
    $(inputID).val($(parID).text())
}
function update_msg(msg_id,userName,campOrAgent){
    // Campaign or Recipient
        let inputID =  '#msg_input_'+msg_id;
        $.ajax({
            url: 'controlar/announcements.cont.admin.php',
            type: 'POST', 
            data: {
                new_msg: $(inputID).val(),
                msg_id: msg_id,
                needTo: 'update_msg'
                  },  
            beforeSend: function() { 
                //code goes here
                $body = $("body");
                $body.addClass("loading"); 
                },
            complete: function() {
                $body = $("body");
                $body.removeClass("loading");
                },
            success: function(data, status, xhr){
                // get_msgs();
                if(campOrAgent ==='Recipient'){
                    get_msgs_by_userName(userName)
                }else if(campOrAgent ==='Campaign'){
                    get_msgs_by_camp(userName)
                }
                $('#alertbox_success').text('Message Updated');
                $('#alertbox_success').show(500);
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);     
                },
            error: function (Xhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                                       
        });
}
function delete_msg(msg_id,userName,campOrAgent){
    $.ajax({
        url: 'controlar/announcements.cont.admin.php',
        type: 'POST', 
        data:{
            msg_id: msg_id,
            needTo: 'delete_msg'
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
                // get_msgs();
                if(campOrAgent ==='Recipient'){
                    get_msgs_by_userName(userName)
                }else if(campOrAgent ==='Campaign'){
                    get_msgs_by_camp(userName)
                }
                $('#alertbox_success').text('Message Deleted');
                $('#alertbox_success').show(500);
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);   
            },
        error: function (Xhr, textStatus, errorMessage) {
                //xhr object , status text
                console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
            });
}
function unsecuredCopyToClipboard(id) {
            if (window.isSecureContext && navigator.clipboard) {
                var msg_text = $(id).text();//document.querySelector(calss).value;
                    navigator.clipboard.writeText(msg_text);
                    $('#alertbox_success').text('Message Copied');
                    $('#alertbox_success').show(500);
                    setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
            } else {
                var msg_text = $(id).text();//document.querySelector(calss).value;
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
                $('#alertbox_success').text('Message Copied');
                $('#alertbox_success').show(500);
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
            }
                
}
// send new msg
function Send_new_msg(){
    /*
        resipients array
        sendBy string 'resipients' or 'campaign'
        $(`#${inputId}`); the id of the text area to get the msg
    */
    $.ajax({
        // the url
        url: 'controlar/announcements.cont.admin.php',
        type: 'POST', 
        data: {
            needTo: 'send_msg',
            resipientsArray: resipients,
            // send to camp or agent values are: 'resipients' or 'campaign'
            sendTo:  sendBy,
            msg: $('#chat_msg_textarea').val()
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
            var res = JSON.parse(data);
            if(res.state  === 'bad'){
                $('#alertbox_danger').text(res.msg);
                $('#alertbox_danger').show(500);
                setTimeout(() => { $('#alertbox_danger').hide(500);  }, 2000);
            }else if(res.state  === 'good'){
                $('#alertbox_success').text(res.msg);
                $('#alertbox_success').show(500);
                $('#msg_textarea').val('');
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
                if(sendBy ==='resipients'){
                    get_msgs_by_userName(resipients[0])
                    scrollSmoothlyToBottom('msges_div');
                    $('#chat_msg_textarea').val('');
                }else if(sendBy ==='campaign'){
                    get_msgs_by_camp(resipients[0])
                    scrollSmoothlyToBottom('msges_div');
                    $('#chat_msg_textarea').val('');
                }
            }
            },
        error: function (Xhr, textStatus, errorMessage) {
            console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
    });
}
// get more msgs
let limit = 5
let offset = 0
function get_more_msgs(){
    $(`#get_more_msgs_btn_${offset}`).css('display','none')
    // console.log(offset)
    offset = offset + limit
    if(sendBy === 'resipients' ){
    //    console.log(resipients,sendBy)
       $.ajax({
            url: 'controlar/announcements.cont.admin.php',
            type: 'POST',
            data: {
                needTo: 'get_msgs_by_userName',
                user_name: resipients[0],
                limit: limit,
                offset: offset,
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
                // DrawMsgs(data);
                var res = JSON.parse(data);
                var msgsUl = document.getElementById('msgsUL');  
                if(res.respond != 'no messages were found :('){
                    var msgs_obj = res.respond;
                    // console.log(msgs_obj)
                    msgs_obj = msgs_obj.reverse();
                    msgs_obj.forEach(function (msg, i){
                    // for(let i = msgs_obj){
                        let recipient = '';
                        let name = '';
                        if(Object.is(msg.recipient, null)){
                            name = 'Campaign';
                            recipient = msg.campaign
                        }else{
                            name = 'Recipient';
                            recipient = msg.recipient
                        }
                        let seen_icon = `<i class='bx bx-check-double fs-6' style='color:black' ></i>`;
                        if(msg.status === 'yes'){
                            // msg have been seen
                            seen_icon = `<i class='bx bx-check-double fs-6' style='color:blue' ></i>`;
                        }
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
                        msgsUl.insertAdjacentHTML('afterbegin',`
                            <li class="clearfix">
                            <img class="avatar" alt="" src="<?=ROOT?>images/${msg.auther}_profile_image.jpg" onerror="this.onerror=null; this.src='<?=ROOT?>images/user.png'" >
                            
                            <div class="post-comments">
                                <div id="msg" class="msg msg_${i}">
                                    <textarea type="text" class="form-control msg_textarea" placeholder="message" value="" style="display:none;" id="msg_input_${msg.id}" >${msg.msg}</textarea>
                                    <p id="msg_p_${i}" class="msg_p">${fullMsg}</p>
                                    
                                </div>
                                <br> 
                                <div class='icons_div  text-center d-flex justify-content-end '>  

                                    <span id="clsoe_span_${i}"  class='clsoe_span'  style="display:none;" title="clsoe" onclick="
                                    clsoe_msg('#msg_input_${msg.id}','#msg_p_${i}','#update_span_${i}','#edit_span_${i}','#clsoe_span_${i}','#edit_span_${i}','#delete_span_${i}','#copy_span_${i}')
                                    "><i class='bx bx-x' ></i></span>

                                    <span id="edit_span_${i}" class='edit_span' title="edit" onclick="
                                    edit_msg('#msg_input_${msg.id}','#msg_p_${i}','#update_span_${i}','#edit_span_${i}','#clsoe_span_${i}','#edit_span_${i}','#delete_span_${i}','#copy_span_${i}');
                                    "><i class='bx bx-edit-alt'></i></span>

                                    <span id="copy_span_${i}" class="copy_span" title="Copy" onclick="
                                    unsecuredCopyToClipboard('#msg_p_${i}');
                                    "><i class="bx bxs-copy-alt"></i></span>
                                        
                                    <span id="update_span_${i}" class='update_span' title="Update" style="display:none;" onclick="
                                    update_msg('${msg.id}','${recipient}','${name}');
                                    "><i class="bx bx-mail-send"></i></span>


                                    <span id="delete_span_${i}" class="delete_span" style="display:none;" title="Delete" onclick="
                                    delete_msg('${msg.id}','${recipient}','${name}');
                                    "><i class="bx bxs-message-x"></i></span>
                                </div>
                                <span id="date" class='date_span'>${send_time} ${seen_icon}</span>
                            </div>
                        </li> `);
                    });
                    msgsUl.insertAdjacentHTML('afterbegin',`<div class="get_more_msgs_btn" id="get_more_msgs_btn_${offset}"><span onclick="get_more_msgs()">get more</span></div>`);
                }else{
                    msgsUl.insertAdjacentHTML('afterbegin',`<div class="no_more_div"><span class="no_more_span text-muted fw-light fs-6">There is no more messsges</span></div>`);
                }
                    },
            error: function (Xhr, textStatus, errorMessage) {
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                                       
        });
   }else if(sendBy === 'campaign'){
        // console.log(resipients,sendBy);
        $.ajax({
            url: 'controlar/announcements.cont.admin.php',
            type: 'POST',
            data: {
                needTo: 'get_msgs_by_camp',
                camp_name: resipients[0],
                limit: limit,
                offset: offset,
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
                // DrawMsgs(data);
                var res = JSON.parse(data);
                var msgsUl = document.getElementById('msgsUL');  
                if(res.respond != 'no messages were found :('){
                    var msgs_obj = res.respond;
                    // console.log(msgs_obj)
                    msgs_obj = msgs_obj.reverse();
                    msgs_obj.forEach(function (msg, i){
                    // for(let i = msgs_obj){
                        let recipient = '';
                        let name = '';
                        if(Object.is(msg.recipient, null)){
                            name = 'Campaign';
                            recipient = msg.campaign
                        }else{
                            name = 'Recipient';
                            recipient = msg.recipient
                        }
                        
                        msgsUl.insertAdjacentHTML('afterbegin',`
                            <li class="clearfix">
                            <img class="avatar" alt="" src="<?=ROOT?>images/${msg.auther}_profile_image.jpg" onerror="this.onerror=null; this.src='<?=ROOT?>images/user.png'" >
                            
                            <div class="post-comments">
                                <p class="meta" style='display:none;'>
                                    <span id="date">${msg.created_at}</span>
                                    auther :
                                    <span id="auther" style="color: black;">${msg.auther}</span>
                                    ${name} :
                                    <span id="recipient" style="color: black;">${recipient}</span>
                                </p>
                                <div id="msg" class="msg msg_${i}">
                                    <textarea type="text" class="form-control msg_textarea" placeholder="message" value="" style="display:none;" id="msg_input_${msg.id}" >${msg.msg}</textarea>
                                    <p id="msg_p_${i}" class="msg_p">${msg.msg}</p>
                                    
                                </div>
                                <br> 
                                <div class='icons_div  text-center d-flex justify-content-end '>  

                                    <span id="clsoe_span_${i}"  class='clsoe_span'  style="display:none;" title="clsoe" onclick="
                                    clsoe_msg('#msg_input_${msg.id}','#msg_p_${i}','#update_span_${i}','#edit_span_${i}','#clsoe_span_${i}','#edit_span_${i}','#delete_span_${i}','#copy_span_${i}')
                                    "><i class='bx bx-x' ></i></span>

                                    <span id="edit_span_${i}" class='edit_span' title="edit" onclick="
                                    edit_msg('#msg_input_${msg.id}','#msg_p_${i}','#update_span_${i}','#edit_span_${i}','#clsoe_span_${i}','#edit_span_${i}','#delete_span_${i}','#copy_span_${i}');
                                    "><i class='bx bx-edit-alt'></i></span>

                                    <span id="copy_span_${i}" class="copy_span" title="Copy" onclick="
                                    unsecuredCopyToClipboard('#msg_p_${i}');
                                    "><i class="bx bxs-copy-alt"></i></span>
                                        
                                    <span id="update_span_${i}" class='update_span' title="Update" style="display:none;" onclick="
                                    update_msg('${msg.id}','${recipient}','${name}');
                                    "><i class="bx bx-mail-send"></i></span>


                                    <span id="delete_span_${i}" class="delete_span" style="display:none;" title="Delete" onclick="
                                    delete_msg('${msg.id}','${recipient}','${name}');
                                    "><i class="bx bxs-message-x"></i></span>
                                </div>
                                <span id="date" class='date_span'>${msg.created_at}</span>
                            </div>
                        </li> `);
                    });
                    msgsUl.insertAdjacentHTML('afterbegin',`<button class="get_more_msgs_btn"  id="get_more_msgs_btn_${offset}" onclick="get_more_msgs()">get more</button>`);
                }else{
                    msgsUl.insertAdjacentHTML('afterbegin',`<div class="no_more_div"><span class="no_more_span text-muted fw-light fs-6">There is no more messsges</span></div>`);
                }
                    },
            error: function (Xhr, textStatus, errorMessage) {
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                                       
        });
   }
}
//----------------------------------------------------------//chating

// i have not add this btn
$('#delete_all_AutoGenerated_btn').click(function(){
    $.ajax({
        // the url
        url: 'controlar/announcements.cont.admin.php',
            // http method
        type: 'POST', 
            // data to submit
        data: {
            needTo: 'delete_all_AutoGenerated'
            },  
        // function to run BEFORE sending the request
        beforeSend: function() { 
            //code goes here
            $body = $("body");
            $body.addClass("loading"); 
        },
        // function to run AFTER sending the request
        complete: function() {
            //code goes here
            $body = $("body");
            $body.removeClass("loading");
            },
        // function to run if the request was success
        success: function(data, status, xhr){
                //alertbox_danger
                // get_msgs(); // i wil make it to get msgs onclik for old msgs tsb button
                // console.log(data)
                var res = JSON.parse(data);
                if(res.state  === 'good'){
                    $('#alertbox_success').text(res.msg);
                    $('#alertbox_success').show(500);
                    $('#msg_textarea').val('');
                    setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
                }
            },
        error: function (Xhr, textStatus, errorMessage) {
            //xhr object , status text
            console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
    });
});


</script>
<?php
include 'compo/foot.admin.php';
?>