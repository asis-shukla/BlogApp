<?php include_once('admin_header.php')?>

<div class="container"> 
<?php echo form_open('Admin/store_article', ['class'=>'form-horizontal']); ?>
<?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>

<style>
.temp{
    margin-left: 180px;
}
</style>

<form >
  <fieldset>
    <legend>Add Article</legend>
  <br>

    <div class="form-group">
      <label for="exampleInputEmail1">Article Title</label>
      
      <?php echo form_input(['name'=>'title', 'class'=>'form-control','placeholder'=>'Article Title', 'value'=>set_value('title')]); ?>
      <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username"> -->
    </div>
   
    <div class="form-group">
      <label for="exampleInputPassword1">Article Body</label>
      <?php echo form_textarea(['name'=>'body', 'class'=>'form-control','placeholder'=>'Article Body', 'value'=>set_value('body')]); ?>
      <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
    </div>
    
      </div>
    </fieldset>
    <br>
    <!-- <button type="submit" class="temp btn btn-primary">Submit</button> -->
    <?php echo form_submit(['name'=>'submit', 'class'=>'temp btn btn-primary','value'=>'Submit']); ?>
  </fieldset>
</form>
<?php

echo validation_errors();

?>
</div>




<?php include_once('admin_footer.php');