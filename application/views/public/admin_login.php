<?php include("public_header.php"); ?>
<div class="container"> 
<?php echo form_open('login/admin_login', ['class'=>'form-horizontal']); ?>
<style>
.temp{
    margin-left: 180px;
}
</style>

<form >
  <fieldset>
    <legend>Admin Login</legend>
  <br>
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      
      <?php echo form_input(['name'=>'username', 'class'=>'form-control','placeholder'=>'Username', 'value'=>set_value('username')]); ?>
      <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username"> -->
      <small id="emailHelp" class="form-text text-muted">We'll never share your user name with anyone else.</small>
    </div>
   
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <?php echo form_password(['name'=>'password', 'class'=>'form-control','placeholder'=>'Password', 'value'=>set_value('password')]); ?>
      <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
    </div>
    
      </div>
    </fieldset>
    <br>
    <!-- <button type="submit" class="temp btn btn-primary">Submit</button> -->
    <?php echo form_submit(['name'=>'submit', 'class'=>'temp btn btn-primary','value'=>'Login']); ?>
  </fieldset>
</form>
<?php

echo validation_errors();

?>
</div>


<?php include("public_footer.php"); ?>