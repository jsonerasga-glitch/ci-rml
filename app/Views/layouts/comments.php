<link href="/dashboardAsset/assets/css/comments.css" rel="stylesheet">

<div class="comments">
    <div class="commentsHeader">
        <h5>Comments from <?= str_replace("\n", "<br>", $verifier);?></h5>
    </div>
    <div class="commentsBody">
        <p class="" ><?php if(!$comment){echo 'No comment';}else{echo str_replace("\n", "<br>", $comment);} ?></p>
    </div>
</div>
