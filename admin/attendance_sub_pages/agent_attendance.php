<?php
// session_start();
include '../compo/head.admin.php';
include '../../clasess/Attendance_Class.php';
include '../../clasess/Users_Class.php';
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
// echo $_GET['username'];
// echo '<br>';
// echo $_GET['userid'];
// echo '<br>';
// echo $_GET['month'];
$Attendance_Class = new Attendance_Class();
$get_attendance_log_for_user = $Attendance_Class->get_attendance_month_user($_GET['month'], $_GET['username'],$_GET['userid']);
$users_class = new Users_Class();
$in_out_timeing = $users_class->get_by_useranme($_GET['username'],array('target', 'salary', 'dedication', 'enter_time', 'leave_time'));
?>
<title><?=$_GET['username']?> Attendance</title>
<style>
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
</style>
</head>
<?php
// include '../compo/navbar.admin.php';
?>
<div class="container attendance_page">
      <!-- alert box  -->
        <div class="alert alert-danger mt-2 text-center text-capitalize for_in_out_btn" id="alertbox_danger" style='display:none;' role="alert">
            this is the alert danger box
        </div>
        <div class="alert alert-success mt-2 text-center for_in_out_btn text-capitalize" id="alertbox_success" style='display:none;' role="alert">
            this is the alert success box
        </div>
      <!--  ----------------------------------------------------------------/alert box  -->
      <!-- h3 header  -->
        <h3 class=" text-capitalize">agent <?=$_GET['username']?> Attendance for <span id='month_span'><?=$_GET['month']?></span></h3>
        <span class=" text-capitalize">entry time must be: <span id='entry_time'></span>, </span>
        <span class=" text-capitalize">leave time must be: <span id='leave_time'></span></span>
        <br>
        <span class=" text-capitalize">working days for this month are: <span id='working_days_count'></span></span>
        <br>
        <span class=" text-capitalize">late days are: <span id='late_days'></span>, </span>
        <span class=" text-capitalize">leave erly days are: <span id='erly_days'></span></span>
        <br>
        <span class=" text-capitalize">Baisc salary: <span id='salary_span'></span>, </span>
        <span class=" text-capitalize">target: <span id='target_span'></span>, </span>
        <span class=" text-capitalize">dedication: <span id='dedication_span'></span></span>
      <!----------------------------------------------------------------// h3 header  -->
      <!-- attendance table  -->
        <table class="table table-striped table-hover mt-3 attendancce_log_table" id="attendancce_log_table">
                  <thead>
                      <tr class="table-dark text-center">
                          <th class="table-dark text-center text-capitalize">date</th>
                          <th class="table-dark text-center text-capitalize">time in</th>
                          <th class="table-dark text-center text-capitalize">time out</th>
                          <th class="table-dark text-center text-capitalize">Excuse</th>
                          <th class="table-dark text-center text-capitalize">edit</th>
                      </tr>
                  </thead>
                  <tbody id='attendancce_log_tbody'>
                  
                  </tbody>
        </table>
      <!-- -------------------------------------------------------------// attendance table  -->

<script>
$(document).ready(function() {
    $('a.edit_btn').featherlight({
        targetAttr: 'href'
    });
});
// $('.edit_btn').featherlight({'<p>hhhh</p>'
// });

  var agent_name = '<?=$_GET['username']?>';
  var agent_id = '<?=$_GET['userid']?>';
  var sheet_month = <?=$_GET['month']?>;

  function GetMonthName(sheet_month) {
      var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    //   return months[monthNumber - 1];
      $('#month_span').text(months[sheet_month - 1])
    }
    GetMonthName(sheet_month);

  var all_data_obj = <?php if($get_attendance_log_for_user === 'no data'){echo 'null';}else{echo json_encode($get_attendance_log_for_user);}?>;
  var timeing_obj = <?=json_encode($in_out_timeing)?>;

  if(timeing_obj[0]['enter_time'] !== null && timeing_obj[0]['leave_time'] !== null){
    in_timeing_obj = DateStringToObject(timeing_obj[0]['enter_time']);
    out_timeing_obj = DateStringToObject(timeing_obj[0]['leave_time']);
      let in_timeing_str = in_timeing_obj.toLocaleString("en-US").split(',')
      let out_timeing_str = out_timeing_obj.toLocaleString("en-US").split(',')
      $('#entry_time').html(in_timeing_str[1])
      $('#leave_time').html(out_timeing_str[1])
  }else{
    console.log(timeing_obj[0]['enter_time'], timeing_obj[0]['leave_time']);
    in_timeing_obj = 'Not_Set';
    out_timeing_obj = 'Not_Set';
  }

  if(timeing_obj[0]['salary'] !== null){
        $('#salary_span').text(timeing_obj[0]['salary']);
  }
  if(timeing_obj[0]['target'] !== null){
        $('#target_span').text(timeing_obj[0]['target']);
  }
  if(timeing_obj[0]['dedication'] !== null){
        $('#dedication_span').text(timeing_obj[0]['dedication']);
  }
    
    let late_days_count = 0;
    let erly_leave_days_count = 0;
  if(all_data_obj !== null){
    $('#working_days_count').text(all_data_obj.length);
    // console.log(all_data_obj)
    drawTable(all_data_obj, 'attendancce_log_tbody');
    $('#late_days').text(late_days_count);
    $('#erly_days').text(erly_leave_days_count);
  }

  $.extend( $.fn.dataTable.defaults, {
      searching: false,
      ordering:  false,
      paging: false // Romove the pagination
    //   select: false
    //   scrollY: 400  // for horezentl scrooling
  });
  $('#attendancce_log_table').DataTable();


function drawTable(jsData, tbody) {
    // console.log(jsData)
	var tr, td;
	tbody = document.getElementById(tbody);
	tbody.innerHTML = '';
	for (var i = 0; i < jsData.length; i++) {

        
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
                
            }else if(compare === 'd1 = d2'){
                td.setAttribute("class", "table-primary text-center");
                
            }else{
                td.setAttribute("class", "table-danger text-center");
                late_days_count = ++late_days_count;
            }
        // var compare = compareDates(d, in_timeing_obj)
        // if(compare === 'good'){
        //     td.setAttribute("class", "table-primary text-center");
        // }else if (compare === 'bad'){
        //     td.setAttribute("class", "table-danger text-center");
        //     late_days_count = ++late_days_count;
        // }
        let time_only_in = d.toLocaleString("en-US").split(',');
        // console.log()
        td.innerHTML = time_only_in[1];
        
		td = tr.insertCell(tr.cells.length);
        if(jsData[i].time_out !== null){
            var d= DateStringToObject(jsData[i].time_out);
            var compare = compareDates_2(out_timeing_obj, d);
                if(compare === 'd1 before d2'){
                    td.setAttribute("class", "table-primary text-center");
                    
                }else if(compare === 'd1 = d2'){
                    td.setAttribute("class", "table-primary text-center");
                    
                }else{
                    td.setAttribute("class", "table-danger text-center");
                    erly_leave_days_count = ++erly_leave_days_count;
                }
            // var compare = compareDates(out_timeing_obj, d)
            // if(compare === 'good'){
            //     td.setAttribute("class", "table-primary text-center");
            // }else if (compare === 'bad'){
            //     td.setAttribute("class", "table-danger text-center");
            //     erly_leave_days_count = ++erly_leave_days_count;
            //   }
              let time_only_out = d.toLocaleString("en-US").split(',');
              td.innerHTML = time_only_out[1]
        }else{
            td.setAttribute("class", "table-primary text-center");
            // let time_only_out = '00:00:00';
            td.innerHTML = 'not set yet';
        }

        td = tr.insertCell(tr.cells.length);
        let excuse;
            if(jsData[i].excuse != null){
                td.setAttribute("class", "table-danger text-center ");
                td.innerHTML = jsData[i].excuse;
                excuse = jsData[i].excuse.replace(/ /g, "_");
            }else{
                td.setAttribute("class", "table-primary text-center ");
                td.innerHTML = 'no excuse';
                excuse = 'NO_Excuse'
            }

        td = tr.insertCell(tr.cells.length);
        td.setAttribute("class", "table-primary text-center");
        if(jsData[i].time_out !== null){
            td.innerHTML = `<a class="btn btn-outline-success text-capitalize edit_btn" href="test.php?entry_id=${jsData[i].id}&day_date=${jsData[i].day_date}&time_in=${jsData[i].time_in.replace(/ /g, "_")}&time_out=${jsData[i].time_out.replace(/ /g, "_")}&excuse=${excuse}">edit</a>`;
        }else{
            td.innerHTML = `<a class="btn btn-outline-success text-capitalize edit_btn" href="test.php?entry_id=${jsData[i].id}&day_date=${jsData[i].day_date}&time_in=${jsData[i].time_in.replace(/ /g, "_")}&time_out=0000-00-00_--:--:--&excuse=${excuse}">edit</a>`;
        }
        // text.replace(/ /g, "_");

       
		
	}
}


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
include '../compo/foot.admin.php';
?>


