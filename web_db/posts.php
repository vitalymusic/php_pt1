<?php 
// te izvadām postus
$postsData = getPosts();
// print_r($postsData);
?>

<div class="container mt-5 posts">
    <?php foreach($postsData as $post):?>
        <div class="post">
            <h3><?=$post["post_name"]?></h3>
            <p><?=$post["post_content"]?></p>
            <div class="comments" data-post_id="<?=$post["id"]?>">

            </div>
            <div class="add_comment_form d-none">
                <form action="" >
                    <input type="hidden" name="post_id" value="<?=$post["id"]?>">
                    <input type="text" name="comment_name" id="name<?=$post["id"]?>">
                    <textarea name="comment_content" id="content<?=$post["id"]?>"></textarea>
                    <button type="submit">Pievienot komentāru</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
            // functions.php?action=getComments&postId=1

            

    </script>
</div>




