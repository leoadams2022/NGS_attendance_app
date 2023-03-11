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
<!-- adding the search plugin  -->
<script src="<?=ROOT?>admin/compo/assets/js/jquery-search.js"></script>
 <!-- jquery cookeis plugin  -->
 <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<title>Admin Dashboard</title>
<style>
    .dataTables_length, .dataTables_filter{
        margin-bottom: 0.5rem;
    }
    .campaign_th:before , .target_th:before  , .salary_th:before  , .dedication_th:before  , .update_th:before ,
    .campaign_th:after , .target_th:after  , .salary_th:after  , .dedication_th:after  , .update_th:after {
        display: none !important;
    }
    .in_time_th:before , .out_time_th:before  , .in_time_th:after , .out_time_th:after{
        display: none !important;
    }
    .agints_table_th::before,
    .agints_table_th::after{
        color: white;
    }
    @media only screen and (max-width: 768px) {
        .for_in_out_btn {
            /* position: fixed; 
            top: 5px;  */
            left: 5px !important;
        }
    }
    .for_in_out_btn {
        position: fixed;
        top: 4rem;
        left: 4.5rem;
    }
    /* for the cards drawer */
    .agent_img{
        width:100px;
        height:100px
    }
    span.username_span {
        color: #787878;
        line-height: 0.5rem;
    }
    span.fullname_sapn.d-block {
        font-size: 18px;
        font-weight: 600;    
    }
    .collapse_icon{
        font-size: 18px;
    }
    span.th_input_span {
        float: left;
        font-weight: 600;
    }
    span.th_time_span {
        font-weight: 600;
        word-wrap: normal;
    }
    .open_timesheet_btn:hover {
            background: #4723d9 !important;
            color: white !important;
        }
    /* for the model  */
    .modal-backdrop.fade.show{
        width:100%;
    }
    .agint_cont:hover {
        background-color: var(--bs-primary-bg-subtle)!important;
    }
</style>
</head>
<?php
include 'compo/navbar.admin.php';
?>
<div class="container"> <!--  dashboard_page-->
<!-- Model ----------------------------------------------------------->
   <!-- Modal -->
    <div class="modal fade w-100" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Alert</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" id="alert_close_btn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="alert_save_btn" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
<!-----------------------------------------------------------// Model-->
<!-- alert box's -------------------------------------------------- -->
    <div class="alert alert-danger mt-2 text-center text-capitalize for_in_out_btn" id="alertbox_danger" style='display:none;' role="alert">
                    this is the alert danger box
    </div>
    <div class="alert alert-success mt-2 text-center for_in_out_btn text-capitalize" id="alertbox_success" style='display:none;' role="alert">
                    this is the alert success box
    </div>
<!----------------------------------------------------// alert box's -->
<!-- search & update all -------------------------------------------------- -->            
    <div class="row mb-3 justify-content-between">
        <div class="col-9">
            <input type="text" id="search" class="form-control" placeholder="Search By Agent Name Or Campgain..."  />
        </div>
        <div class="text-center col-3">
                <button class="btn btn-outline-success update_all_agints_btn" type="button" id="update_all_agints_btn">Update All Agints</button>
        </div>
    </div>
<!----------------------------------------------------//  search & update all -->
<!-- reset all inputs -------------------------------------------------- -->
    <a class="text-capitalize" data-bs-toggle="collapse" href="#collapseResetAll" role="button" aria-expanded="false" aria-controls="collapseResetAll" id="collapseResetAll_a">
        Reset Tools
        <i class="bx bx-chevrons-down collapse_icon"></i>
    </a>

    <div class="collapse w-100 mb-3" id="collapseResetAll">
        <div class="card card-body">
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-outline-danger" id="reset_all_target_btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Reset Target's for all agents</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-outline-danger" id="reset_all_salary_btn"  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Reset Salary's for all agents</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-outline-danger" id="reset_all_dedication_btn"  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Reset Dedication's for all agents</button>
                    </div>
                </div>
        </div>
    </div>
<!----------------------------------------------------// reset all inputs    -->
<!-- agents cards -------------------------------------------------- --> 
    <div class="container" id="cardsContainer">
    </div>
<!----------------------------------------------------// agents cards-->

<script>
    
// console.log(typeof Cookies.get('whatever'));
// $(document).ready(function(){
    // for delete_AutoGenerated_and_admin_alert
    if(typeof Cookies.get('clear_AutoGenerated_and_admin_alert') == 'undefined'){
        Cookies.set('clear_AutoGenerated_and_admin_alert', 'ture',{ expires: 1 }) // exp at Session
    }
    let clear_AutoGenerated_and_admin_alert = Cookies.get('clear_AutoGenerated_and_admin_alert')
    //get_all_agints
    function get_all_agints(){
        $.post('controlar/dashboard.cont.admin.php',
                    //the psot data to send
                    {
                    // Thismonth: Thismonth,
                    needTo: 'get_all_agints',
                    clear_AutoGenerated_and_admin_alert: clear_AutoGenerated_and_admin_alert
                    },
                    // function to ran after the requst
                    function(data){
                        // Display the returned data in browser
                        var res = JSON.parse(data);
                        console.log(clear_AutoGenerated_and_admin_alert);
                        
                        if(res.state == 'good'){
                            // console.log(res.respond);
                            // drawTable(res.respond, 'agints_tbody');
                            drawCards(res.respond, 'cardsContainer');
                            // for delete_AutoGenerated_and_admin_alert
                            Cookies.set('clear_AutoGenerated_and_admin_alert', 'false',{ expires: 1 })
                        }else{
                        console.log('requst returned bad');
                        }

        });
    }
    get_all_agints();
    // draw Cards
    function drawCards(jsData, divId){
        cardsContainer = document.getElementById(divId);
        cardsContainer.innerHTML = '';
        for (var i = 0; i < jsData.length; i++) {
            let odd_or_even;
            let Bg_color_class;
            if(((i+1) % 2)){
                odd_or_even = 'even';
                Bg_color_class = 'bg-success-subtle';
            }else{
                odd_or_even = 'odd';
                Bg_color_class = 'bg-secondary-subtle';
            }
            // console.log(odd_or_even)
            let d= new Date();
            let timein_input;
            if(jsData[i].enter_time !== null){
                let time_in = jsData[i].enter_time;
                time_in = time_in.split(' ');
                time_in = time_in[1]
                // console.log(time_in)
                timein_input = ` <input class="form-control" type="time" id="in_time_${i}" name="appt" value='${time_in}'>`;
            }else{ 
                timein_input = ` <input class="form-control" type="time" id="in_time_${i}" name="appt"  value=''>`;
            }
            let timeout_input;
            if(jsData[i].leave_time !== null){
                let time_out = jsData[i].leave_time;
                time_out = time_out.split(' ');
                time_out = time_out[1];
                timeout_input = ` <input class="form-control" type="time" id="out_time_${i}" name="appt" value="${time_out}">`;
            }else{ 
                timeout_input = `<input class="form-control" type="time" id="out_time_${i}" name="appt" value="">`;
            }
        $body = $("body");
        $body.addClass("loading"); 
        cardsContainer.innerHTML +=`
            <div data-search-data="${jsData[i].first_name+' '+jsData[i].last_name} ${jsData[i].campaign}" style>
                <div class="container mb-3 text-center p-2 shadow-sm ${Bg_color_class} agint_cont border border-dark-subtle  border-opacity-75">
                    <div class="row  align-items-center">
                        <div class="col-md-2">
                            <img src="<?=ROOT?>images/${jsData[i].user_name}_profile_image.jpg" class='rounded-circle agent_img' alt="Image not found" onerror="this.onerror=null;this.src='<?=ROOT?>images/user.png';">
                            <span class="fullname_sapn d-block text-capitalize">${jsData[i].first_name+' '+jsData[i].last_name}</span>
                            <span class="username_span d-block small">${jsData[i].user_name}</span>
                        </div>
                        <div class="col-md-10">
                            <div class="row g-3 align-items-center justify-content-end">
                                <!-- the first row -------------------------------------------------------------------------->
                                <div class="col-md-3">
                                    <span class="th_input_span text-capitalize">campaign:</span>
                                    <input class="form-control campaign" type="text" placeholder="Default input" aria-label="default input example" value="${jsData[i].campaign}" id="campaign_${i}" for-username="${jsData[i].user_name}" for-userid="${jsData[i].id}">
                                </div>
                                <div class="col-md-3">
                                    <span class="th_input_span text-capitalize">target:</span>
                                    <input class="form-control target" type="number" placeholder="Default input" aria-label="default input example" value="${jsData[i].target}" id="target_${i}" for-username="${jsData[i].user_name}" for-userid="${jsData[i].id}" min="0">
                                </div>
                                <div class="col-md-3">
                                    <span class="th_input_span text-capitalize">salary:</span>
                                    <input class="form-control salary" type="number" placeholder="Default input" aria-label="default input example" value="${jsData[i].salary}" id="salary_${i}" for-username="${jsData[i].user_name}" for-userid="${jsData[i].id}" min="0">
                                </div>
                                <div class="col-md-3">
                                    <span class="th_input_span text-capitalize">dedication:</span>
                                    <input class="form-control d-inline-block dedication" type="number" placeholder="Default input" aria-label="default input example" value="${jsData[i].dedication}" id="dedication_${i}" for-username="${jsData[i].user_name}" for-userid="${jsData[i].id}" min="0">
                                </div>
                                <!--------------------------------------------------------------------------// the first row-->

                                <!-- the scound row -------------------------------------------------------------------------->


                                <div class="col-md-2 ">
                                    <div>
                                        <a class="attendance_a text-capitalize" data-bs-toggle="collapse" href="#collapse_${i}" role="button" aria-expanded="false" aria-controls="collapse_${i}">
                                            Attendance
                                            <!--<i class='bx bx-chevrons-down collapse_icon'></i>-->
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <a role="button" class="update_agint_btn text-capitalize" onclick="update_agint_data('${jsData[i].id}','campaign_${i}','target_${i}','salary_${i}','dedication_${i}','in_time_${i}','out_time_${i}')
                                                        ">
                                        update
                                        <i class='bx bx-check-double'></i>
                                    </a>
                                </div>
                                <!-------------------------------------------------------------------------- //the scound row -->

                                <!-- the thered row -------------------------------------------------------------------------->
                                <div class="col-md-12">
                                    <div class="collapse w-100" id="collapse_${i}">
                                        <div class="card card-body">
                                            <!--some things to add leater-->
                                            <div class='row'>
                                                <div class="col-md-4">
                                                    <span class="th_time_span d-block in_span text-capitalize">Entry:</span>
                                                    ${timein_input}
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="th_time_span d-block out_sapn text-capitalize">Leave:</span>
                                                    ${timeout_input}
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="th_time_span out_sapn text-capitalize">Month:</span>
                                                    <input class="form-control" type="number" id='month_input_${i}' min='1' max='12' value='${d.getMonth()+1}'>
                                                </div>
                                                <div class="col-md-2 align-self-center">
                                                    <span class="th_time_span out_sapn text-capitalize">TimeSheet:</span>
                                                    <a class="btn bg-primary-subtle open_timesheet_btn" onclick="open_timesheet('month_input_${i}','${jsData[i].user_name}','${jsData[i].id}')">
                                                        <i class='bx bx-window-open'></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-------------------------------------------------------------------------- //the thered row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
         `;
        }
        $('#cardsContainer > div').jqSearch({
            searchInput: '#search',
            searchTarget: 'data'
          });
        $body = $("body");
        $body.removeClass("loading");
    }      
// });

function open_timesheet(month_id,username,userid){
    let month =  document.getElementById(month_id).value;
    var win = window.open(`<?=ROOT?>admin/attendance_sub_pages/agent_attendance.php?username=${username}&userid=${userid}&month=${month}`, '_blank');
        if (win) {
            //Browser has allowed it to be opened
            win.focus();
        } else {
            //Browser has blocked it
            alert('Please allow popups for this website');
        }   
}

function resets_all_dedication_valuse(){
    let dedBtns = document.querySelectorAll('.dedication');
    for(let i=0;i < dedBtns.length;i++){
        dedBtns[i].value= '0';
    }
}

 //CTSD stands for => campaign	target	salary	dedication
let add_loading_class = 'yes'
function update_agint_data(agint_id,campaign_id,target_id,salary_id,dedication_id,id_1,id_2){
    // let dedication = document.getElementById(dedication_id).value
    $.ajax({
        // async: false,
        url: 'controlar/dashboard.cont.admin.php',
        type: 'POST',  // http method
        data: {
                campaign: document.getElementById(campaign_id).value,
                target: document.getElementById(target_id).value,
                salary: document.getElementById(salary_id).value,
                dedication: document.getElementById(dedication_id).value,
                agint_id: agint_id,
                in_time: '2023-01-01 '+document.getElementById(id_1).value,
                out_time: '2023-01-01 '+document.getElementById(id_2).value,
                needTo: 'upadate_agints_data'
            },  // data to submit
        beforeSend: function() {
            if(add_loading_class === 'yes'){
                $body = $("body");
                $body.addClass("loading"); 
            } else if(add_loading_class === 'no'){

            }
            // console.log('ajax start') 
        },
        complete: function() {
            if(add_loading_class === 'yes'){
                $body = $("body");
                $body.removeClass("loading");
            }else if(add_loading_class === 'no'){

            }
            // location.reload(true);
            // console.log('ajax end') 
            },
        success: function(data, status, xhr){
                    // Display the returned data in browser
                    var res = JSON.parse(data);
                    // console.log(res.respond);
                    
                    if(res.state == 'good'){
                      if(res.msg === 'successfully updated data '){
                        $('#alertbox_success').html(res.msg);
                        $('#alertbox_success').show(500);
                        if(add_loading_class === 'no'){
                            ++counter;
                            if(counter === nodeLength){
                                get_all_agints();
                                add_loading_class = 'yes';
                                // console.log('get_all_agints add_loading_class:',add_loading_class)
                                // console.log('get_all_agints counter:',counter,'  nodeLength:',nodeLength)
                            }
                        }else{
                            get_all_agints();
                        }
                        setTimeout(() => { 
                            $('#alertbox_success').hide(500); 
                            
                        }, 1000);
                        // setTimeout(() => { 
                        //     $('#alertbox_success').hide(500); 
                        //     if(add_loading_class === 'yes'){
                        //         location.reload(true);
                        //     }else if(add_loading_class === 'no'){

                        //     }
                        // }, 1000);
                      }else{
                        $('#alertbox_danger').html(res.msg);
                        $('#alertbox_danger').show(500);
                        setTimeout(() => { $('#alertbox_danger').hide(500);  }, 3000);
                      }
                    }else{
                    console.log('requst returned bad');
                    }

            },
        error: function (jqXhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage);
            }
                                                
        });      
}
let counter,nodeLength;
function update_all_agint_data(){
    var update_agint_btns  = document.querySelectorAll('.update_agint_btn');
    nodeLength = update_agint_btns.length
    counter = 0;
    // console.log('update_all_agint_data nodeLength',nodeLength,'counter ',counter)
    $body = $("body");
    $body.addClass("loading"); 
    add_loading_class = 'no';
    update_agint_btns.forEach(function (btn, index) { 
        // console.log(btn.attributes.onclick.nodeValue)
        btn.click();
    });
    // $body.removeClass("loading");
    // add_loading_class = 'yes';
    // location.reload(true);
}

$('#update_all_agints_btn').click(function (){ update_all_agint_data(); });

//reset all functions
$('#reset_all_target_btn').click(function(){
    $('.target').each(function( index ) {
        $('.modal-body').text('All Targets will be set to Zero are you sure ?')
        $('#alert_close_btn').click(function(){/*will do nothing*/ });
        $('#alert_save_btn').attr("onclick","reset_all_target()");
    });
});
function reset_all_target(){
    add_loading_class='no'
    $body = $("body");
    $body.addClass("loading"); 
    $('#alert_close_btn').click();
    $('.target').each(function(){
        $( this ).val(0)
    })
    update_all_agint_data();
    $body.removeClass("loading");
    add_loading_class= 'yes'
    
}

$('#reset_all_salary_btn').click(function(){
    $('.salary').each(function( index ) {
        $('.modal-body').text('All Targets will be set to Zero are you sure ?')
        $('#alert_close_btn').click(function(){/*will do nothing*/ });
        $('#alert_save_btn').attr("onclick","reset_all_salary()");
    });
});

function reset_all_salary(){
    add_loading_class='no'
    $body = $("body");
    $body.addClass("loading"); 
    $('#alert_close_btn').click();
    $('.salary').each(function(){
        $( this ).val(0)
    })
    update_all_agint_data();
    $body.removeClass("loading");
    add_loading_class= 'yes'
}

$('#reset_all_dedication_btn').click(function(){
    $('.dedication').each(function( index ) {
        $('.modal-body').text('All Targets will be set to Zero are you sure ?')
        $('#alert_close_btn').click(function(){/*will do nothing*/ });
        $('#alert_save_btn').attr("onclick","reset_all_dedication()");
    });
});

function reset_all_dedication(){
    add_loading_class='no'
    $body = $("body");
    $body.addClass("loading"); 
    $('#alert_close_btn').click();
    $('.dedication').each(function(){
        $( this ).val(0)
    })
    update_all_agint_data();
    $body.removeClass("loading");
    add_loading_class= 'yes'
}
 
</script>
<?php
include 'compo/foot.admin.php';
?>