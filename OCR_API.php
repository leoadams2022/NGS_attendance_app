<?php
include 'compo/head.php';
// include 'clasess/Announcements_Class.php';
// include 'clasess/Users_Class.php';
// include 'clasess/Users_Class.php';
?>
<title>OCR_API</title>

</head>
<?php
include 'compo/navbar.php';
?>

<div class="input">
        <form action="" id="my-form" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file">
                <button type="submit">submit</button>
        </form>
</div>
<div id="output">
</div>
<script>
/**
 * Free OCR_API //---Get_Text_Out_Of_Images---//
 * https://ocr.space/OCRAPI#GettingStarted
 * Requests/month	25,000
 * Rate Limit**	500 calls/DAY
 */
$("#my-form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        console.log('submit');
        //Prepare form data
        var formData = new FormData();
        let fileToUpload = $('#file')[0].files[0];
        formData.append("file", fileToUpload);
        formData.append("url", "");
        formData.append("language"   , "eng");
        formData.append("apikey"  , "K82995868888957");
        formData.append("isOverlayRequired", true);
        //Send OCR Parsing request asynchronously
        jQuery.ajax({
                url: 'https://api.ocr.space/parse/image',
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (ocrParsedResult) {
                        //Get the parsed results, exit code and error message and details
                        var parsedResults = ocrParsedResult["ParsedResults"];
                        var ocrExitCode = ocrParsedResult["OCRExitCode"];
                        var isErroredOnProcessing = ocrParsedResult["IsErroredOnProcessing"];
                        var errorMessage = ocrParsedResult["ErrorMessage"];
                        var errorDetails = ocrParsedResult["ErrorDetails"];
                        var processingTimeInMilliseconds = ocrParsedResult["ProcessingTimeInMilliseconds"];
                        //If we have got parsed results, then loop over the results to do something
                        console.log(errorMessage,errorDetails)
                        if (parsedResults!= null) {
                                //Loop through the parsed results
                                $.each(parsedResults, function (index, value) {
                                        var exitCode = value["FileParseExitCode"];
                                        var parsedText = value["ParsedText"];
                                        var errorMessage = value["ParsedTextFileName"];
                                        var errorDetails = value["ErrorDetails"];

                                        var textOverlay = value["TextOverlay"];
                                        var pageText = '';
                                        switch (+exitCode) {
                                                case 1:
                                                pageText = parsedText;
                                                break;
                                                case 0:
                                                case -10:
                                                case -20:
                                                case -30:
                                                case -99:
                                                default:
                                                pageText += "Error: " + errorMessage;
                                                break;
                                        }
                                        document.getElementById('output').innerHTML = '';
                                        $.each(textOverlay["Lines"], function (index, value) {
                                                // LOOP THROUGH THE LINES AND GET WORDS TO DISPLAY ON TOP OF THE IMAGE AS OVERLAY
                                                console.log(' ',value['LineText'],' ')
                                                document.getElementById('output').innerHTML += ' '+value['LineText']+' ';
                                        });
                                        // YOUR CODE HERE
                                });
                        }
                }
        });
});



</script>
<?php
include 'compo/foot.php';
?>