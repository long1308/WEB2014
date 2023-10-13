<div class="container accordion accordion-flush" id="accordionFlushExample">
    <h1>List Comments</h1>
    <?php foreach ($comments as $index => $comment) : ?>
        <div class="accordion-item">
            <div>
                <h2 class="accordion-header" id="flush-heading<?php echo $index; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $index; ?>">
                        Comment Product id#<?php echo $comment['idProduct']; ?>
                    </button>
                </h2>
                <div id="flush-collapse<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $index; ?>" data-bs-parent="#accordionFlushExample">

                    <div>
                        <div class="p-1">content: <?php echo $comment['content']; ?></div>
                        <div class="p-1">id User: <?php echo $comment['idUser']; ?></div>
                        <div class="p-1">time: <?php echo $comment['created_at']; ?></div>
                        <a type="button" href="http://localhost/duanmau/index.php?act=productDetail&id=<?php echo $comment['idProduct'] ?>" class="btn btn-link p-1" target="_blank">View Product</a>
                    </div>
                    <a href="index.php?act=removeComment&idComment=<?php echo $comment['id'] ?>" class="btn btn-danger mb-2">Remove
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>