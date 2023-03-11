<?php
include 'compo/head.admin.php';
?>
<title>files upleoad</title>
<style>
/* page css code */
/* progress-bar  */
    #progress-wrp {
    border: 1px solid #0099CC;
    padding: 1px;
    position: relative;
    height: 30px;
    border-radius: 3px;
    margin: 10px;
    text-align: left;
    background: #fff;
    box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
    }

    #progress-wrp .progress-bar {
    height: 100%;
    border-radius: 3px;
    background-color: #f39ac7;
    width: 0;
    box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
    }

    #progress-wrp .status {
    top: 3px;
    left: 50%;
    position: absolute;
    display: inline-block;
    color: #000000;
    }
/*  //progress-bar  */

</style>
</head>
<?php
include 'compo/navbar.admin.php';
?>
<div class="container">
<!-- progress-bar  -->
    <div id="progress-wrp">
        <div class="progress-bar"></div>
        <div class="status">0%</div>
    </div>
<!-- //progress-bar  -->
    <div class="new_msg_div ">
        <textarea class="new_msg_textarea form-control rounded-1 shadow " placeholder="Write your message here" id="chat_msg_textarea" wrap="soft" ></textarea>
        <button class="chat_send_msg_btn bg-success-subtle m-1" id="chat_send_msg_btn" onclick="Send_new_msg(['broUS'],'resipients')"><i class="bx bx-send"></i></button>
    </div>

    <div class="input">
        <form action="" id="my-form" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file">
                <button type="submit">submit</button>
        </form>
    </div>

    <div class="file_div bg-secondary bg-opacity-25 d-flex flex-column flex-nowrap justify-content-center align-items-center" style="width:150px;">
        <img src="<?=ROOT?>images/file_icon.png" alt="" class="w-100 file_icon_img">
        <a href="http://localhost/LoginAgain/upload/sample.pdf" class="download_a" download>
            <span class="download_span">download</span>
        </a>
    </div>
<script>
// page js code

function Send_new_msg(resipients,sendBy){
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
                    // get_msgs_by_userName(resipients[0])
                    // scrollSmoothlyToBottom('msges_div');
                    $('#chat_msg_textarea').val('');
                }else if(sendBy ==='campaign'){
                    // get_msgs_by_camp(resipients[0])
                    // scrollSmoothlyToBottom('msges_div');
                    $('#chat_msg_textarea').val('');
                }
            }
            },
        error: function (Xhr, textStatus, errorMessage) {
            console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
    });
}

//file upload class
    var Upload = function (file) {
        this.file = file;
    };

    Upload.prototype.getType = function() {
        return this.file.type;
    };
    Upload.prototype.getSize = function() {
        return this.file.size;
    };
    Upload.prototype.getName = function() {
        return this.file.name;
    };
    Upload.prototype.doUpload = function () {
        var that = this;
        var formData = new FormData();

        // add assoc key values, this will be posts values
        formData.append("pdf", this.file, this.getName());
        formData.append("upload_file", true);

        $.ajax({
            type: "POST",
            url: "controlar/file_upload.cont.admin.php",
            xhr: function () {
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {
                    myXhr.upload.addEventListener('progress', that.progressHandling, false);
                }
                return myXhr;
            },
            success: function (data) {
                // your callback here
                console.log(data);
            },
            error: function (error) {
                // handle error
                console.log(data);
            },
            async: true,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            timeout: 60000
        });
    };

    Upload.prototype.progressHandling = function (event) {
        var percent = 0;
        var position = event.loaded || event.position;
        var total = event.total;
        var progress_bar_id = "#progress-wrp";
        if (event.lengthComputable) {
            percent = Math.ceil(position / total * 100);
        }
        // update progressbars classes so it fits your code
        $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
        $(progress_bar_id + " .status").text(percent + "%");
    };
//------//file upload class

//Change id to your id
$("#my-form").submit(function(event){
    // Stop form from submitting normally
    event.preventDefault();
    console.log('submit');

    var file = $('#file')[0].files[0];
    var upload = new Upload(file);

    // maby check size or type here with upload.getSize() and upload.getType()

    // execute upload
    upload.doUpload();
});

</script>
<?php
include 'compo/foot.admin.php';
?>