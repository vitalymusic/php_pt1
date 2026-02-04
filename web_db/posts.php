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
            <div class="add_comment_form">
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
        
        const loadAllComments = ()=>{
            // functions.php?action=getComments&postId=1
            let commentsDivs = document.querySelectorAll(".comments");
            for(let commentDiv of commentsDivs){
                const postId = commentDiv.dataset.post_id;
                fetch(`functions.php?action=getComments&postId=${postId}`)
                    .then((data)=>{return data.json()})
                    .then((comments)=>{
                            comments.forEach((item)=>{
                                  commentDiv.innerHTML+=`
                                        <h3>${item.comment_name}</h3>
                                        <p>${item.comment_content}</p>
                                  `;  
                            })
                    })
            }

    }

      loadAllComments();


      const forms = document.querySelectorAll('form');

      for( form of forms){
        form.onsubmit = (e)=>{
            e.preventDefault();
            fetch('functions.php?action=saveComment',{
                method:"POST",
                body: new FormData(e.target)
            })
            .then((resp)=>{return resp.json})
            .then((data)=>{console.log(data)})
        }

      }


    </script>
</div>




