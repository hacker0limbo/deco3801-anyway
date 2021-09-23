<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>User Profile</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/datepicker/datepicker.css" type="text/css" />


</head>
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>service">Home Page</a></li>
      <li class="breadcrumb-item active" aria-current="page">User profile</li>
    </ol>
  </nav>
</div>

<div class="container" style="margin-bottom: 6rem;">
  <div class="row">
    <div class="col-md-2">
      
     
      <div class="leftpanel">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
          <img class="logo" width="30" height="30" src="<?php echo base_url(); ?>assets/img/logo.png"/>
          <span>Anyway</span>
        </a>

    
    <div class="leftpanelinner">
            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="profile.html"> <span>Profile</span></a></li>
              
            </ul>
        </div>
    </div>
  </div>
 
  <div class="col-md-10">
      <h3>My details</h3>
      <p class="lead text-secondary">
        You can change your details here
      </p>

      <div class="border rounded p-4">
        <ul class="nav nav-tabs nav-fill mb-3" id="clinicTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="clinic-tab" data-toggle="tab" href="#clinic" role="tab" aria-controls="clinic" aria-selected="true">Profile</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="hospital-tab" data-toggle="tab" href="#hospital" role="tab" aria-controls="hospital" aria-selected="false">Account Setting</a>
          </li>
        </ul>
        <div class="tab-content" id="clinicTabContent">
          <div class="tab-pane fade show active" id="clinic" role="tabpanel" aria-labelledby="clinic-tab">
            <!-- 在这写 -->
            
      <form action="<?php echo base_url().'Profile/update'; ?>" method="post">
      <div class="details_username">
			<h5>Username</h5>
			<input type="text" class="form-control" name="username" placeholder="<?php if(isset($username)) echo $username;?>">
			<?php echo form_error('username'); ?>
</div>
            <div class="details_gender">
			<h5>Gender</h5>
      <div>
  <input type="radio" name="my-input" value="Male" <?php if($gender == "Male"){print("checked");};?>>
  <label for="male">Male</label>

  <input type="radio" name="my-input" value="Female" <?php if($gender == "Female"){print("checked");};?>>
  <label for="female">Female</label>

  <input type="radio" name="my-input" value="Other" <?php if($gender == "Other"){print("checked");};?>>
  <label for="other">Other</label>
  </div>
</div>
            <div class="details_DOB">
                    <div class="form-group">
                      <h5>Date of birth</h5>
                      
                      <div class="col-sm-10">
                        <input class="input-sm input-s datepicker-input form-control" size="16" type="text" value="<?php if(isset($username)) echo $DOB;?>" data-date-format="dd-mm-yyyy" name="DOB" >
                      </div>
                    </div>
</div>
<div class="detail_stauts">
<h5>Choose your language</h5>

                      <div class="col-sm-10">
                        <select name="my-select" class="form-control m-b">
                            <option value="<?php if($language == "English"){
                              print("English");
                            }else{
                              print("Chinese");
                            };?>"><?php if($language == "English"){
                              print("English");
                            }else{
                              print("Chinese");
                            };?></option>
                            <option value="<?php if($language == "English"){
                              print("Chinese");
                            }else{
                              print("English");
                            };?>"><?php if($language == "English"){
                              print("Chinese");
                            }else{
                              print("English");
                            };?></option>  
                        </select>
                        </div>
                        </div>
                        <div class="detail_stauts">
<h5>Medicare Status</h5>
                      <div class="col-sm-10">
                        <select name="status" class="form-control m-b">
                          <option value="<?php if($medicare_status == "Student"){
                              print("Student");
                            }if($medicare_status == "Visitor"){
                              print("Visitor");
                            }if($medicare_status == "Citizen"){
                              print("Citizen");
                            }if($medicare_status == ""){
                              print("Student");
                            };?>"><?php if($medicare_status == "Student"){
                              print("Student");
                            }if($medicare_status == "Visitor"){
                              print("Visitor");
                            }if($medicare_status == "Citizen"){
                              print("Citizen");
                            }if($medicare_status == ""){
                              print("Student");
                            };?></option>
                          <option value="<?php if($medicare_status == "Student"){
                              print("Visitor");
                            }if($medicare_status == "Visitor"){
                              print("Citizen");
                            }if($medicare_status == "Citizen"){
                              print("Student");
                            }if($medicare_status == ""){
                              print("Citizen");
                            };?>"><?php if($medicare_status == "Student"){
                              print("Visitor");
                            }if($medicare_status == "Visitor"){
                              print("Citizen");
                            }if($medicare_status == "Citizen"){
                              print("Student");
                            }if($medicare_status == ""){
                              print("Citizen");
                            };?></option>
                          <option value="<?php if($medicare_status == "Student"){
                              print("Citizen");
                            }if($medicare_status == "Visitor"){
                              print("Student");
                            }if($medicare_status == "Citizen"){
                              print("Visitor");
                            }if($medicare_status == ""){
                              print("Visitor");
                            };?>"><?php if($medicare_status == "Student"){
                              print("Citizen");
                            }if($medicare_status == "Visitor"){
                              print("Student");
                            }if($medicare_status == "Citizen"){
                              print("Visitor");
                            }if($medicare_status == ""){
                              print("Visitor");
                            };?></option>
                    
                        </select>
                        </div>
                        </div>
                        <br>
                        <div class="save_button">
<button type="submit" class="btn btn-outline-primary btn-block">
				Save All
</button>
</div>
                          </form>
            
          </div>
          <div class="tab-pane fade" id="hospital" role="tabpanel" aria-labelledby="hospital-tab">
            <!--在这写另一个-->
            <div class="details_email">
            
      <form action="<?php echo base_url().'Profile/email'; ?>" method="post">
			<label>Email</label>
			<input type="text" class="form-control" name="new_email" placeholder="<?php if(isset($email)) echo $email;?>"></br>
      <?php echo form_error('email') ?>
      <div class="change_button">
      <button type="submit" class="btn btn-outline-primary btn-block">
				Change
</button>
    </div>
    </form><!--email-->
    <form action="<?php echo base_url().'Profile/password'; ?>" method="post">
    <div class="password_detail">
			<label>Password</label>
      <div id="password_details">
      <input type="password" class="form-control" name="od_password" placeholder=" Old Password"></br>
      <input type="password" class="form-control" name="new_password1" placeholder=" New Password"></br>
      <input type="password" class="form-control" name="new_password2" placeholder=" Confirm Password"></br>
      <div>
      <div class="change_button">
      <button type="submit" class="btn btn-outline-primary btn-block">
				Change
</button>
    </div>
    </div>
    </form>
          </div>
        </div>
        
      </div>
    </div>
    
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  
  
  <!-- datepicker -->
  <script src="<?php echo base_url(); ?>assets/js/datepicker/bootstrap-datepicker.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/app.plugin.js"></script>
  </html>