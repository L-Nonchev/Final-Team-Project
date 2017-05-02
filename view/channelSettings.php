<?php
include 'header.php';
?>
<div class="content-wrapper">
	<div class="container">
	<h1 style="font-size: 3em">General Account Settings: </h1>
	</div>
    <div class="container">
        <div class="row">
        	<div class="col-lg-5">
            <h1>Change Username:</h1>
            </div>
            <div class="col-lg-6">
            <h1>Change E-mail:</h1>
            </div>
            <div class="col-lg-5">
                <div class="login-window">
	                <div class="l-form">
	                    <form action="#" method="post" onsubmit="event.preventDefault();">
	                         <div class="form-group">
	                            <label for="username" id ="username-new-label">New Username</label>
	                            <input name="username" type="text" class="form-control" id="newUsername" placeholder="New Username" required maxlength="20" size="20">
	                        </div>
	                    	 <div class="form-group">
	                            <label for="username" id ="username-old-label">Old Username</label>
	                            <input name="username" type="text" class="form-control" id="oldUsername" placeholder="Old Username" required maxlength="20" size="20">
	                        </div>
	    
	                        <div class="row">
	                            <div class="col-lg-5"><button type="submit" class="btn btn-cv1" name="username-button" id="username-button">Change</button></div>
	                        </div>
	                    </form>
	                </div>
	            </div>
            </div>
            <div class="col-lg-5">
                <div class="login-window">
	                <div class="l-form">
	                    <form action="#" method="post" onsubmit="event.preventDefault();">
	                    <!-- proverka za mejlite !!!! -->
	                         <div class="form-group">
	                            <label for="email" id ="email-new-label">New Email</label>
	                            <input name="email" type="email" class="form-control" id="newEmail" placeholder="sample@gmail.com" required maxlength="40">
	                        </div>
	                        <div class="form-group">
	                            <label for="email" id ="email-old-label">Old Email</label>
	                            <input name="email" type="email" class="form-control" id="oldEmail" placeholder="sample@gmail.com" required maxlength="40">
	                        </div>
	                        <div class="row">
	                            <div class="col-lg-5"><button type="submit" class="btn btn-cv1" name="email-button" id="email-button">Change</button></div>
	                        </div>
	                    </form>
	                    
	                </div>
	            </div>
            </div>
            <div class="col-lg-5">
            <h1>Change Password:</h1>
            </div>
            <div class="col-lg-6">
            <h1>Change Profile Picture</h1>
            </div>
             <div class="col-lg-5">
                <div class="login-window">
	                <div class="l-form">
	                    <form action="#" method="post" onsubmit="event.preventDefault();">
	                        <div class="form-group">
	                            <label for="password" id ="new-password-label">New Password</label>
	                            <input name="password" type="password" class="form-control" id="new-password" placeholder="**********" required maxlength="40">
	                        </div>
	                        <div class="form-group">
	                            <label for="password" id ="re-new-password-label">Re-type Password</label>
	                            <input name="re-password" type="password" class="form-control" id="re-newPassword" placeholder="**********" required maxlength="40">
	                        </div>
	                        <div class="form-group">
	                            <label for="password" id ="password-old-label">Old Password</label>
	                            <input name="password" type="password" class="form-control" id="old-password" placeholder="**********" required maxlength="40">
	                        </div>
	                        <div class="row">
	                            <div class="col-lg-5"><button type="submit" class="btn btn-cv1" name="password-button" id="password-button">Change</button></div>
	                        </div>
	                    </form>
	                    
	                </div>
	            </div>
            </div>
            <div class="col-lg-5">
                <div class="login-window">
	                <div class="l-form">
	                    <form enctype='multipart/form-data' action="#" method="post" onsubmit="event.preventDefault();" id="imageUploadForm">
	                        <!-- IMAGE -->
	                        <div class="form-group">
	                           	<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
								<label>File profile picture</label>
								<input type="file" name="picture"  id="uploadPic" accept="image/jpeg" class="loader"/>
							<!-- <label for=""><?= $error ?></label>  -->		
	                        </div>

	                        <div class="row">
	                            <div class="col-lg-5"><button type="submit" class="btn btn-cv1" name="picture-button" id="picture-button">Change</button></div>
	                        </div>
	                    </form>
	                </div>
	            </div>
            </div>
             <div class="col-lg-5">
             <h1>Change Banner Picture</h1>
             </div>
            <div class="col-lg-5">
                <div class="login-window">
	                <div class="l-form">
	                    <form enctype='multipart/form-data' action="#" method="post" onsubmit="event.preventDefault();" id="bannerUploadForm">
	                        <!-- IMAGE -->
	                        <div class="form-group">
	                           	<input type="hidden" name="MAX_FILE_SIZE" value="15000000" />
								<label>File banner picture</label>
								<input type="file" name="banner" accept="image/jpeg" class="loader"/>
							<!-- <label for=""><?= $error ?></label>  -->		
	                        </div>
	                        <div class="row">
	                            <div class="col-lg-5"><button type="submit" class="btn btn-cv1" name="banner-button" id="banner-button">Change</button></div>
	                        </div>
	                    </form>
	                </div>
	            </div>
            </div>
        </div>
    </div>
</div>

<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
<?php 
	require 'view//footer.php';
?>
