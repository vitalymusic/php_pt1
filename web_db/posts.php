<?php 
$postsData = getPosts();
?>

<div class="container my-5 posts">

    <?php foreach($postsData as $post): ?>
        <div class="card mb-4 shadow-sm post">

            <!-- POST -->
            <div class="card-body">
                <h4 class="card-title">
                    <?= htmlspecialchars($post["post_name"]) ?>
                </h4>
                <p class="card-text">
                    <?= $post["post_content"] ?>
                </p>
            </div>

            <!-- COMMENTS -->
            <div class="card-body border-top">
                <h6 class="mb-3 text-muted">Komentāri</h6>

                <div 
                    class="comments list-group mb-3"
                    data-post_id="<?= $post["id"] ?>"
                >
                    <div class="text-muted small">Ielādē komentārus…</div>
                </div>

                <!-- ADD COMMENT FORM -->
                <form class="add_comment_form mt-3" style="max-width: 420px;">
    <input type="hidden" name="post_id" value="<?= $post["id"] ?>">

    <div class="mb-2">
        <input 
            type="text"
            name="comment_name"
            class="form-control form-control-sm"
            placeholder="Tavs vārds"
            required
        >
    </div>

    <div class="mb-2">
        <textarea
            name="comment_content"
            class="form-control form-control-sm"
            placeholder="Tavs komentārs"
            rows="3"
            required
        ></textarea>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-sm btn-primary">
            💬 Pievienot
        </button>
    </div>
</form>

            </div>
        </div>
    <?php endforeach; ?>

</div>


    <script>
const loadAllComments = () => {
    document.querySelectorAll(".comments").forEach(commentDiv => {
        const postId = commentDiv.dataset.post_id;

        fetch(`functions.php?action=getComments&postId=${postId}`)
            .then(resp => resp.json())
            .then(comments => {
                commentDiv.innerHTML = "";

                if (comments.length === 0) {
                    commentDiv.innerHTML = `
                        <div class="list-group-item text-muted">
                            Nav komentāru
                        </div>`;
                    return;
                }

                comments.forEach(item => {
                    commentDiv.innerHTML += `
                        <div class="list-group-item">
                            <strong>${item.comment_name}</strong>
                            <div class="small text-muted">
                                ${item.comment_content}
                            </div>
                        </div>
                    `;
                });
            });
    });
};

loadAllComments();

// form submit
document.querySelectorAll(".add_comment_form").forEach(form => {
    form.addEventListener("submit", e => {
        e.preventDefault();

        fetch("functions.php?action=saveComment", {
            method: "POST",
            body: new FormData(form)
        })
        .then(resp => resp.json())
        .then(data => {
            if (data.success) {
                form.reset();
                loadAllComments();
            } else {
                console.error(data.error);
                alert("Kļūda saglabājot komentāru");
            }
        });
    });
});
</script>

</div>




