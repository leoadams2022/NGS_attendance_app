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
                height: 60vh !important;
                overflow-y: scroll;
                border: 1px solid red !important;
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
                border: 1px solid red;
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
<div class=" announcements_page"> <!--container-->
    
    <div class="alert alert-success mt-2 text-center alert_for_Copy_func" id="alertbox_success" style='display:none;' role="alert">Message Copied</div>
    <div class="alert alert-danger text-center alert_for_Copy_func" id="alertbox_danger" style='display:none;' role="alert">alert-danger</div>
        <ul class="nav nav-pills flex-row  nav-fill" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Previous Announcements</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">New Announcement</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <!-- previous announcements -->
            <div class="tab-pane fade show active text-dark mt-2" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <!-- previous announcements ------------------------------------------------------  -->
                <div class=" "><!--container-->
                    <div class="row">
                        <div class="col-md-4 ps-0 pe-0 contacts">
                            
                            <div class="tabs">
                                <ul class="nav nav-tabs justify-content-center nav-fill chat_tabs " role="tablist">
                                    <li class="nav-item" role="presentation">
                                    <button class="chat_contact_tab_btn nav-link active" id="agents-tab" data-bs-toggle="tab" data-bs-target="#agents-tab-pane" type="button" role="tab" aria-controls="agents-tab-pane" aria-selected="true">agents</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                    <button class="chat_contact_tab_btn nav-link " id="camp-group-tab" data-bs-toggle="tab" data-bs-target="#camp-group-tab-pane" type="button" role="tab" aria-controls="camp-group-tab-pane" aria-selected="false">campaigns</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="">
                                        <!-- tab-1-agents -->
                                        <div class="tab-pane fade show active" id="agents-tab-pane" role="tabpanel" aria-labelledby="agents-tab" tabindex="0"  style="color:black;">
                                            <!-- tab-1-agents -->
                                            <div class="search_div">
                                                <input type="text" id="agents_search_input" class="agents_search_input form-control mt-1" placeholder="Search By Agent">
                                            </div>
                                            <div class="y_scrol_div_cont">
                                                <ul id="chat_agents_ul" class="contects_ul ps-1 pe-1 mt-2" style="list-style: none;">
                                                <!-- 
                                                    <li class="">
                                                        <div class="wrap selected bg-secondary-subtle mb-1 w-100">
                                                            <img src="no src yet" class="rounded-circle m-2 agent_img" alt="" onerror="this.onerror=null;this.src='<?=ROOT?>images/user.png';">
                                                            <span class="name">Louis Litt</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="wrap bg-secondary-subtle mb-1 w-100">
                                                            <img src="no src yet" class="rounded-circle m-2 agent_img" alt="" onerror="this.onerror=null;this.src='<?=ROOT?>images/user.png';">
                                                            <span class="name">Louis Litt</span>
                                                        </div>
                                                    </li>
                                                 -->

                                                </ul>
                                            </div>
                                        </div>
                                        <!-- tab-1-agents -->
                                        <!-- tab-2-camp-group -->
                                        <div class="tab-pane fade" id="camp-group-tab-pane" role="tabpanel" aria-labelledby="camp-group-tab" tabindex="0"  style="color:black;">
                                            <!-- // tab-2-camp-group -->
                                            <div class="search_div">
                                                <input type="text" id="camps_search_input" class="camps_search_input form-control mt-1" placeholder="Search By Campaign">
                                            </div>
                                            <div class="y_scrol_div_cont">
                                                <ul id="chat_camps_ul" class="camp_group_ul ps-1 pe-1 mt-2" style="list-style: none;">
                                                <!-- 
                                                    <li class="">
                                                        <div class="wrap selected bg-secondary-subtle mb-1 w-100">
                                                            <img src="<?=ROOT?>images/group-icon.png" class="rounded-circle m-2 agent_img" alt="" onerror="this.onerror=null;this.src='<?=ROOT?>images/group-icon.png';">
                                                            <span class="name">Louis Litt</span>
                                                        </div>
                                                    <li>
                                                        <div class="wrap bg-secondary-subtle mb-1 w-100">
                                                            <img src="<?=ROOT?>images/group-icon.png" class="rounded-circle m-2 agent_img" alt="" onerror="this.onerror=null;this.src='<?=ROOT?>images/group-icon.png';">
                                                            <span class="name">Louis Litt</span>
                                                        </div>  
                                                    </li>
                                                 -->
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- tab-2-camp-group -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 ps-0 pe-0">
                            <div id="chat_header_div" class="chat_header m-1 p-2 border border-dark-subtle rounded-2 shadow bg-primary-subtle" style="visibility:hidden">
                                <img  id="header_agent_img" src="no src yet" class="rounded-circle me-2 agent_img" alt="Image not found" onerror="this.onerror=null;this.src='<?=ROOT?>images/user.png';">
                                <span id="header_agent_name_span">-----</span>
                            </div>
                            <div class="blog-comment">
                                
                                <ul class="comments" id='msgsUL'>
                                         <div class="landing_chat_div">
                                            pick an agent or a campaign :)
                                         </div>
                                </ul>
                               <!-- it was here  -->
                            </div>
                            <!-- <div class="form mt-3"> -->
                                    <!-- <div class="row "> -->
                                        <div class=" p-0">
                                            <!-- style="height: 100px" -->
                                            <textarea class="form-control" placeholder="Write your message here" id="chat_msg_textarea"></textarea>
                                            <!-- <label for="chat_msg_textarea">Message</label> -->
                                        </div>
                                        <div class=" p-0">
                                            <button class="btn btn-outline-success rounded-pill" id="chat_send_msg_btn">Send</button>
                                        </div>
                                    </div>
                                    <!-- <hr style="border-top: 1px solid #000000;">
                                    <div class="mt-3">
                                            <button class="btn btn-outline-danger rounded-pill" id="delete_all_AutoGenerated_btn">Delete all AutoGenerated messages</button>
                                    </div> -->
                            <!-- </div> -->
                        </div>
                    </div> 
                </div>
                <!-- ------------------------------------------------------  previous announcements  -->
            </div>
            <!-- New Announcement -->
            <div class="tab-pane fade text-dark mt-2" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <!-- New Announcement ------------------------------------------------------  -->
                    <div class="tabs mt-2">
                        <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Recipients-tab-pane" role="tabpanel" aria-labelledby="Recipients-tab" tabindex="0">
                                    <div class="recipients w-100 mt-2">
                                        <table class="table table-striped table-hover agints_table" id="recipients_table">
                                            <thead>
                                                <tr class="table-dark text-center">
                                                    <th class="table-dark text-center text-capitalize Full_Name_th recipients_table_th">Full Name</th>
                                                    <th class="table-dark text-center text-capitalize user_name_th recipients_table_th">user name</th>
                                                    <th class="table-dark text-center text-capitalize include_th recipients_table_th">
                                                    <span class='slelect_all_rec_span' id="slelect_all_rec_span" onclick="select_all('resipients');">Check all</sapn>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id='recipients_tbody'>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Campaign-tab-pane" role="tabpanel" aria-labelledby="Campaign-tab" tabindex="0">
                                    <div class="campaign mt-2">
                                        <table class="table table-striped table-hover campaign_table" id="campaign_table">
                                            <thead>
                                                <tr class="table-dark text-center">
                                                    <th class="table-dark text-center text-capitalize Full_Name_th campaign_table_th">campaign</th>
                                                    <th class="table-dark text-center text-capitalize include_th campaign_table_th"><span class='slelect_all_cam_span' id="slelect_all_cam_span" onclick="select_all('campaign');">Check all</sapn></th>
                                                </tr>
                                            </thead>
                                            <tbody id='campaign_tbody'>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                        <ul class="nav nav-pills " id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <button class="nav-link myNavLink active" id="Recipients-tab" data-bs-toggle="tab" data-bs-target="#Recipients-tab-pane" type="button" role="tab" aria-controls="Recipients-tab-pane" aria-selected="true">To Recipients</button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link myNavLink" id="Campaign-tab" data-bs-toggle="tab" data-bs-target="#Campaign-tab-pane" type="button" role="tab" aria-controls="Campaign-tab-pane" aria-selected="false">To Campaign</button>
                            </li>
                        </ul> 
                    </div>
                    <div class="form mt-3">
                        <div class="row g-3">
                            <div class="form-floating mt-3 col-md-11">
                                <!-- style="height: 100px" -->
                                <textarea class="form-control" placeholder="Write your message here" id="msg_textarea"></textarea>
                                <label for="msg_textarea">Message</label>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-outline-success rounded-pill" id="new_msg_send_btn">Send</button>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid #000000;">
                        <div class="mt-3">
                                <button class="btn btn-outline-danger rounded-pill" id="delete_all_AutoGenerated_btn">Delete all AutoGenerated messages</button>
                        </div>
                    </div>
                <!-- ------------------------------------------------------  New Announcement  -->
            </div>

        </div>


<script>
// chating ----------------------------------------------------------

// get all agents
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
        console.log(res)
        DrawAgents(res.respond,'chat_agents_ul')     
        DrawCamps(res.msg,'chat_camps_ul')        
    },
    error: function (Xhr, textStatus, errorMessage) {
        console.log('Error' + errorMessage + ' status: '+ textStatus);
    }                                       
});

function DrawAgents(jsData,agentsUlId){
    let Container = document.getElementById(agentsUlId);
    Container.innerHTML = '';
    for(let i=0;i<jsData.length;i++){
        $body = $("body");
        $body.addClass("loading");
        let sel = '';
        if(i === 0){sel = ''}//'selected';}
        Container.innerHTML +=`
            <li class=""  data-search-data="${jsData[i].first_name+' '+jsData[i].last_name}">
                <div id="agent_warp_div_${i}" class="wrap agents_warp ${sel} bg-secondary-subtle mb-1 w-100" onclick="
                        open_agent_chat('${jsData[i].user_name}','#agent_warp_div_${i}','${jsData[i].first_name+' '+jsData[i].last_name}')
                        ">
                    <img src="<?=ROOT?>images/${jsData[i].user_name}_profile_image.jpg" class="rounded-circle m-2 agent_img" alt="" onerror="this.onerror=null;this.src='<?=ROOT?>images/user.png';">
                    <span class="name">${jsData[i].first_name+' '+jsData[i].last_name}</span>
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
// agent
function open_agent_chat(userName,agent_warp_div_id,fullName){
    $('#chat_header_div').css("visibility",`visible`)
    $('#header_agent_name_span').text(fullName)
    $("#header_agent_img").attr("src",`<?=ROOT?>images/${userName}_profile_image.jpg`)
    $("#header_agent_img").attr("onerror",`this.onerror=null;this.src='<?=ROOT?>images/user.png';`)

    $('.agents_warp').each(function(){$(this).removeClass("selected");});
    $(agent_warp_div_id).addClass("selected");

    get_msgs_by_userName(userName);
}
function get_msgs_by_userName(userName){
    $.ajax({
            url: 'controlar/announcements.cont.admin.php',
            type: 'POST', 
            data: {
                needTo: 'get_msgs_by_userName',
                user_name: userName
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
        msgsUl.innerHTML = 'No Messages found';
    }else{
        var msgs_obj = res.respond;
        $('#msgsUL').html('');
        var msgsUl = document.getElementById('msgsUL');
        msgs_obj.forEach(function (msg, i){
        let recipient = '';
        let name = '';
        if(Object.is(msg.recipient, null)){
            name = 'Campaign';
            recipient = msg.campaign
        }else{
            name = 'Recipient';
            recipient = msg.recipient
        }
        msgsUl.innerHTML +=`
        <li class="clearfix">
            <img class="avatar" alt="" src="<?=ROOT?>images/${msg.auther}_profile_image.jpg" onerror="this.onerror=null; this.src='<?=ROOT?>images/user.png'" >
            
            <div class="post-comments">
                <p class="meta" style='display:none;'>
                    <span id="date">${msg.date_send}</span>
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
                <span id="date" class='date_span'>${msg.date_send}</span>
            </div>
        </li> 
        `;
        });
        }
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
// camp
function open_camp_chat(campName,camp_warp_div_id){
    $('#chat_header_div').css("visibility",`visible`)
    $('#header_agent_name_span').text(campName)
    $("#header_agent_img").attr("src",`<?=ROOT?>images/group-icon.png`)

    $('.camps_warp').each(function(){$(this).removeClass("selected");});
    $(camp_warp_div_id).addClass("selected");

    get_msgs_by_camp(campName);
}
function get_msgs_by_camp(campName){
    $.ajax({
            url: 'controlar/announcements.cont.admin.php',
            type: 'POST', 
            data: {
                needTo: 'get_msgs_by_camp',
                camp_name: campName
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
                console.log(data)
                DrawMsgs(data);   
                },
            error: function (Xhr, textStatus, errorMessage) {
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                                       
    });
}
//----------------------------------------------------------//chating
function get_msgs(){
        
            $.ajax({
            // the url
            url: 'controlar/announcements.cont.admin.php',
            // http method
            type: 'POST', 
            // data to submit
            data: {
                needTo: 'get_msgs'
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
                    // console.log(data);
                    var res = JSON.parse(data);
                    // Update the page with the response
                    // console.log(res.respond);
                    if(res.respond === 'no messages were found :('){
                        var msgsUl = document.getElementById('msgsUL');
                        msgsUl.innerHTML = 'No Messages found';
                    }else{
                        var msgs_obj = res.respond;
                        $('#msgsUL').html('');
                        var msgsUl = document.getElementById('msgsUL');
                        msgs_obj.forEach(function (msg, i){
                            let recipient = '';
                            let name = '';
                            if(Object.is(msg.recipient, null)){
                                name = 'Campaign';
                                recipient = msg.campaign
                            }else{
                                name = 'Recipient';
                                recipient = msg.recipient
                            }
                            msgsUl.innerHTML +=`
                            <li class="clearfix">
                                        <img class="avatar" alt="" src="<?=ROOT?>images/${msg.auther}_profile_image.jpg" onerror="this.onerror=null; this.src='<?=ROOT?>images/user.png'" >
                                        
                                        <div class="post-comments">
                                            <p class="meta" style='display:none;'>
                                                <span id="date">${msg.date_send}</span>
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

                                                <span id="clsoe_span_${i}"  class='clsoe_span'  style="display:none;" title="clsoe" onclick="clsoe_msg('#msg_input_${msg.id}','#msg_p_${i}','#update_span_${i}','#edit_span_${i}','#clsoe_span_${i}','#edit_span_${i}','#delete_span_${i}','#copy_span_${i}')"><i class='bx bx-x' ></i></span>

                                                <span id="edit_span_${i}" class='edit_span' title="edit" onclick="edit_msg('#msg_input_${msg.id}','#msg_p_${i}','#update_span_${i}','#edit_span_${i}','#clsoe_span_${i}','#edit_span_${i}','#delete_span_${i}','#copy_span_${i}');"><i class='bx bx-edit-alt'></i></span>

                                                <span id="copy_span_${i}" title="Copy" onclick="unsecuredCopyToClipboard('#msg_p_${i}');"><i class="bx bxs-copy-alt"></i></span>
                                                    
                                                <span id="update_span_${i}" class='update_span' title="Update" style="display:none;" onclick="update_msg('${msg.id}');"><i class="bx bx-mail-send"></i></span>


                                                <span id="delete_span_${i}" class="delete_span" style="display:none;" title="Delete" onclick="delete_msg('${msg.id}');"><i class="bx bxs-message-x"></i></span>
                                            </div>
                                            <span id="date" class='date_span'>${msg.date_send}</span>
                                        </div>
                                    </li> 
                            `;
                        });
                    }
                },
            error: function (Xhr, textStatus, errorMessage) {
                //xhr object , status text
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                }
                                                    
            });
       
}
// get_msgs();



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

// $( "#home-tab" ).click(function(){ get_msgs() });
// ------------------------------------------New Messages

function get_agints_and_campagin(){
    $.ajax({
            // the url
            url: 'controlar/announcements.cont.admin.php',
            // http method
            type: 'POST', 
            // data to submit
            data: {
                needTo: 'get_all_agints'
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
                    var res = JSON.parse(data);

                    var objResipients = res.respond;
                    var objCampaigns = res.msg;

                   
                    
                    //this is for the data table defaults
                    $.extend( $.fn.dataTable.defaults, {
                            searching: true,
                            ordering:  true
                        } );

                    drawTable(objResipients, 'recipients_tbody', 'resipients');
                    $('#recipients_table').DataTable();
                    
                    drawTable(objCampaigns, 'campaign_tbody', 'campaign');
                    $('#campaign_table').DataTable();                   
                },
            error: function (Xhr, textStatus, errorMessage) {
                //xhr object , status text
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                }
                                                    
            });
}

// get_agints_and_campagin();
$("#profile-tab").click(function(){ get_agints_and_campagin() });

$("#new_msg_send_btn").click(function() {
    var resipients = get_resipients_or_campaigns();
    // console.log(sendBy);
    
    // console.log(sendBy);
    $.ajax({
        // the url
        url: 'controlar/announcements.cont.admin.php',
            // http method
        type: 'POST', 
            // data to submit
        data: {
            needTo: 'send_msg',
            resipientsArray: resipients,
            sendTo:  sendBy,
            msg: $('#msg_textarea').val()
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
            // console.log(res.msg);
            if(res.state  === 'bad'){
                $('#alertbox_danger').text(res.msg);
                $('#alertbox_danger').show(500);
                setTimeout(() => { $('#alertbox_danger').hide(500);  }, 2000);
            }else if(res.state  === 'good'){
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
    sendBy = 'null';
});

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
            console.log(data)
            var res = JSON.parse(data);
            if(res.state  === 'good'){
                $('#alertbox_success').text(res.msg);
                $('#alertbox_success').show(500);
                $('#msg_textarea').val('');
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
            }
            // console.log(res.msg);
            // if(res.state  === 'bad'){
            //     $('#alertbox_danger').text(res.msg);
            //     $('#alertbox_danger').show(500);
            //     setTimeout(() => { $('#alertbox_danger').hide(500);  }, 2000);
            // }else if(res.state  === 'good'){
            //     $('#alertbox_success').text(res.msg);
            //     $('#alertbox_success').show(500);
            //     $('#msg_textarea').val('');
            //     setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
            // }
            },
        error: function (Xhr, textStatus, errorMessage) {
            //xhr object , status text
            console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
    });
});

var sendBy = 'null';
function get_resipients_or_campaigns(){
  var resipientArray = [];
  var campaignArray = [];
  var resipiebtTabBtn = document.getElementById('Recipients-tab');
  var isResipientsTabActive = resipiebtTabBtn.classList.contains('active');
  var campaignTabBtn = document.getElementById('Campaign-tab');
  var iscampaignTabActive = campaignTabBtn.classList.contains('active');
  if(isResipientsTabActive){
      sendBy = 'resipients';
      var markedCheckbox = document.getElementsByName('rerecipient_checkbox');  
      for (var checkbox of markedCheckbox) {  
        if (checkbox.checked)  
        //   document.body.append(checkbox.value + ' ');  
        // let resipient = checkbox.value;
        resipientArray.push(checkbox.value);
      }  
    //   console.log(resipientArray);
      return resipientArray;
  }else if(iscampaignTabActive){
    sendBy = 'campaign';
    var markedCheckbox = document.getElementsByName('campaign_checkbox');  
      for (var checkbox of markedCheckbox) {  
        if (checkbox.checked)  
        //   document.body.append(checkbox.value + ' ');  
        // let resipient = checkbox.value;
        campaignArray.push(checkbox.value);
      }  
    //   console.log(campaignArray);
      return campaignArray;
  }
}

function select_all(resCam){
        if(resCam === 'resipients'){
            if( $('#slelect_all_rec_span').text()==='Un Check All'){
                var markedCheckbox = document.getElementsByName('rerecipient_checkbox');  
                for (var checkbox of markedCheckbox) {  
                        if (checkbox.checked){
                            // inputs[i].checked = true;  
                            checkbox.checked = false;
                        } else{
                            
                        }
                    } 
                    $('#slelect_all_rec_span').text('Check all'); 
            }else{
                var markedCheckbox = document.getElementsByName('rerecipient_checkbox');  
                for (var checkbox of markedCheckbox) {  
                        if (checkbox.checked){
                            // inputs[i].checked = true;  
                        } else{
                            checkbox.checked = true;
                            
                        }
                    }  
                    $('#slelect_all_rec_span').text('Un Check All');
            }
           
     
        }else if(resCam === 'campaign'){
            if( $('#slelect_all_cam_span').text()==='Un Check All'){
                var markedCheckbox = document.getElementsByName('campaign_checkbox');  
                for (var checkbox of markedCheckbox) {  
                    if (checkbox.checked){
                        checkbox.checked = false; 
                    }else{
                        
                    }
                }  
                $('#slelect_all_cam_span').text('Check All');
            }else{
                var markedCheckbox = document.getElementsByName('campaign_checkbox');  
                for (var checkbox of markedCheckbox) {  
                    if (checkbox.checked){
                
                    }else{
                        checkbox.checked = true; 
                
                    }
                }  
                $('#slelect_all_cam_span').text('Un Check All');
            }
        }

}

function drawTable(jsData, tbody, resCam) { 
    if(resCam ==='resipients'){
        var tr, td;
        tbody = document.getElementById(tbody);
        tbody.innerHTML = '';
        for (var i = 0; i < jsData.length; i++) {
            tr = tbody.insertRow(tbody.rows.length);
            tr.setAttribute("class", "table-primary text-center");

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = jsData[i].first_name+' '+jsData[i].last_name;

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = jsData[i].user_name;

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = `<input class="form-check-input rerecipient_checkbox" name="rerecipient_checkbox" type="checkbox" value="${jsData[i].user_name}">`; 
        }
    }else if(resCam === 'campaign'){
        var tr, td;
        tbody = document.getElementById(tbody);
        tbody.innerHTML = '';
        for (var i = 0; i < jsData.length; i++) {
            tr = tbody.insertRow(tbody.rows.length);
            tr.setAttribute("class", "table-primary text-center");

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = jsData[i];

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = `<input class="form-check-input campaign_checkbox" name="campaign_checkbox" type="checkbox" value="${jsData[i]}">`; 
        }
    }

        
}

</script>
<?php
include 'compo/foot.admin.php';
?>