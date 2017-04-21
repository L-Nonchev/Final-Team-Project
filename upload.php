<?php session_start();
	require_once 'logInHeader.php';
?>

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 upload-page">

                <div class="u-area">
	                <form id='formUpload' enctype='multipart/form-data' action="uploadController.php" method="post">
	                   	<input name="video" id ='video' type="file" accept="video/*"  /><i class="cv cvicon-cv-upload-video" onclick ="javascript:document.getElementById('video').click();"></i>
	                    <input type='hidden' id='MAX_FILE_SIZE'  name='MAX_FILE_SIZE' value='1000000000' />
	                    
	                    <p class="u-text1">Select Video files to upload</p>
	                    <p class="u-text2">or drag and drop video files</p>
	                    <p id='type-error'></p>
	                    <input type='submit' id='UploadForm' name='uploadEdit' value='Upload Video' class="btn btn-primary u-btn" onfocus = 'checkMimeType()'>
	                    
	                </form>
                </div>

                <div class="u-terms">
                    <p>By submitting your videos to circle, you acknowledge that you agree to circle's <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.</p>
                    <p>Please be sure not to violate others' copyright or privacy rights. Learn more</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
	require_once 'footer.php';
?>