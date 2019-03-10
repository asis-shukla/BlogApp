<?php include_once('admin_header.php'); ?>
<?php
// print_r($art);

?>

<div class="container">
<br>
<div class="row">
    <div class="col-lg-6 col-lg-offset-6">
        <?= anchor('admin/store_article','Add Article',['class'=>"btn btn-primary pull-right"]) ?>
    </div>
</div>

<?php if( $feedback = $this->session->flashdata('feedback')): ?>
<?php $feedback_class = $this->session->flashdata('feedback_class'); ?>
  <div class="alert alert-dismissible <?= $feedback_class ?>">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo $feedback; ?>
</div>
<?php endif; ?>


    <table class="table">
    <thead>
    <th>Sr. No.</th>
    <th>Title</th>
    <th> Action </th>
    </thead>
<tbody>
    <?php if(count($art)):  ?>
    <?php foreach ($art as $article):  ?>

    <tr>
        <td>1</td>
        <td><?php echo $article->title ?> </td>
        <td>
            <a href="" class="btn btn-primary">Edit</a>
            <a href="" class="btn btn-danger">Delete</a>
        </td>
    </tr>

    <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="3">
            No records found
        </td>
    </tr>
    <?php endif;?>
</tbody>
    </table>

</div>


<?php include_once('admin_footer.php'); ?>

