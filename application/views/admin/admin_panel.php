<?php include_once('admin_header.php'); ?>
<?php
// print_r($art);

?>

<div class="container">
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

