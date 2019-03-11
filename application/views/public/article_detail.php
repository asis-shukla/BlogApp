<?php include_once('public_header.php'); ?>
 <div class="container">
     <h1>
         <?= $article->title ?>
     </h1>
     <span class="pull-right">
     <?= date('d M y H:i:s', strtotime($article->created_at)); ?>
        </span>
     <hr>
     <p>
         <?= $article->body ?>
    </p>
 </div>


<?php include_once('public_footer.php'); ?>
