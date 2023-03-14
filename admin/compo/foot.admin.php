<div class="modal_loading"></div>
<!-- </div> -->
</div>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<!-- for the nav bar  -->
<script type='text/javascript'>
document.addEventListener("DOMContentLoaded", function(event) {
	const showNavbar = (toggleId, navId, bodyId, headerId) => {
		const toggle = document.getElementById(toggleId),
			nav = document.getElementById(navId),
			bodypd = document.getElementById(bodyId),
			headerpd = document.getElementById(headerId)
		// Validate that all variables exist
		if (toggle && nav && bodypd && headerpd) {
			toggle.addEventListener('click', () => {
				// show navbar
				nav.classList.toggle('show')
				// change icon
				toggle.classList.toggle('bx-x')
				// add padding to body
				bodypd.classList.toggle('body-pd')
				// add padding to header
				headerpd.classList.toggle('body-pd')
			})
		}
	}
	showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')
	/*===== LINK ACTIVE =====*/
	const linkColor = document.querySelectorAll('.nav_link')
	linkColor.forEach(function(link){
		var href = link.getAttribute("href");
		if(href === window.location.href){
			link.classList.add('active');
		}
	})
	
// show the alerts box	
$(document).on('click', function (e) {
if($(e.target)[0] == $("#alerts_icon_a > i")[0] || $(e.target)[0] == $("#alerts_icon_a > span")[0]){
	$("#alerts_ul").toggleClass("show");
	// console.log('toggleClass');
}
else if($(e.target).closest("#alerts_ul").length === 0) {
	$("#alerts_ul").removeClass("show");
	// console.log('removeClass');
	// console.log($(e.target)[0],$("#alerts_icon_a")[0]);
}
});

});


// get alerts cout
setInterval(
	function get_alerts_count() {
		var post_data = {
		needTo: 'get_alerts_count',
		};
		$.post('controlar/announcements.cont.admin.php', post_data).done(function(data) {
				// console.log(data);
				$('#alerts_count_span').text(data);
		}); 
	}
	, 1000);

	let alert_limit= 3,alert_offset=0;
	function get_alert_count(){ 
		var post_data = {
		needTo: 'get_alerts_count',
		};
		$.ajax({
			async: false,
			type: "POST",
			url: "controlar/announcements.cont.admin.php",
			data: post_data,
			success: function (data) {
				if(data > alert_limit){
					// console.log(data,' > ',alert_limit);
					alert_limit =Number(data);
					alert_offset=0;
					// console.log('get_alert_count() limit now is  ',alert_limit);
				}else{
					alert_limit= 3;
					alert_offset=0;
				}
			}
		});
		return alert_limit;
	}

	$('#alerts_icon_a').click(function (){
		let limit = get_alert_count();
		var post_data = {
			needTo: 'get_alerts',
			limit: limit,
			offset: alert_offset
		};
		// console.log('click(function) limit is  ',limit);
		$.post('controlar/announcements.cont.admin.php', post_data).done(function(data) {
				// console.log(data);
				$('#alerts_ul').html('');
				var res = JSON.parse(data);
				//  let jsD = _.sortBy(res.respond.reverse(), 'recipient');
				if(res.msg === "no alerts found"){
					var msgsUl = document.getElementById('alerts_ul');
					msgsUl.innerHTML = `<div class="no_more_div"><span class="no_more_span text-muted fw-light fs-6">No alerts found</span></div>`;
				}else{
					var msgs_obj = res.respond;
					msgs_obj = msgs_obj.reverse()
					$('#alerts_ul').html('');
					var msgsUl = document.getElementById('alerts_ul');
					msgs_obj.forEach(function (msg, i){
						let time = DateStringToObject(msg.date_send).toLocaleTimeString("en-US");
						msgsUl.innerHTML +=`<li class="alert_li border-bottom mb-1">
											<span class="alert_text_sapn d-block fs-5 text-capitalize fst-italic text-break">${msg.msg}</span>
											<span class="alert_time_sapn d-block text-muted fw-light fs-6">${time}</span>
											</li>`;
                	});
					
                	msgsUl.innerHTML +=`<div id="get_more_alerts_btn_${alert_offset}" class="get_more_msgs_btn" ><span onclick="get_more_alerts()">get more</span></div>`;
            	}
				// alert_limit= 2,alert_offset=0
		}); 
	});

function get_more_alerts(){
		// console.log('get_more_alerts() offset: ',alert_offset,'get_more_alerts() limit: ',alert_limit);
    	$(`#get_more_alerts_btn_${alert_offset}`).css('display','none');
		alert_offset = alert_offset + alert_limit;
		var post_data = {
			needTo: 'get_alerts',
			limit: alert_limit,
			offset: alert_offset
		};		
		// console.log('get_more_alerts() offset: ',alert_offset,'get_more_alerts() limit: ',alert_limit);
		// console.log(alert_offset , alert_limit);
		$.post('controlar/announcements.cont.admin.php', post_data).done(function(data) {
				// console.log(data)
				var res = JSON.parse(data);
				// console.log(res.msg,offset,limit);
				if(res.msg === "no alerts found"){
					var msgsUl = document.getElementById('alerts_ul');
					msgsUl.insertAdjacentHTML('beforeend', `<div class="no_more_div"><span class="no_more_span text-muted fw-light fs-6">No alerts found</span></div>`);
				}else{
					var msgs_obj = res.respond;
					// msgs_obj = msgs_obj.reverse()
					// $('#msgsUL').html('');
					var msgsUl = document.getElementById('alerts_ul');
					msgs_obj.forEach(function (msg, i){
						let time = DateStringToObject(msg.date_send).toLocaleTimeString("en-US");
						msgsUl.insertAdjacentHTML('beforeend',`<li class="alert_li border-bottom mb-1">
											<span class="alert_text_sapn d-block fs-5 text-capitalize fst-italic text-break">${msg.msg}</span>
											<span class="alert_time_sapn d-block text-muted fw-light fs-6">${time}</span>
											</li>`);
                });
                msgsUl.insertAdjacentHTML('beforeend',`<div id="get_more_alerts_btn_${alert_offset}" class="get_more_msgs_btn" ><span onclick="get_more_alerts()">get more</span></div>`)
            	}
            	// scrollSmoothlyToBottom('msgs_div');
			});
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
</body>
</html>