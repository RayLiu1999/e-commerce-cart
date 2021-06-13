<?php require 'layouts/header.php'; ?>

<div class="container" style="flex-grow: 1;">
    <div class="alert alert-success" role="alert" style="display: none;">
        加入購物車成功!
    </div>
    <div class="row">
        <?php foreach ($products as $product) : ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <a href="products/<?= $product->id ?>">
                        <img src="<?= $product->image_url ?>" class="img-fluid img-thumbnail">
                    </a>
                    <div class="card-body">
                        <h5 class="card-text"><?= $product->name ?></h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text text-danger">NT$<?= $product->price ?></p>
                            <button 
                                type="submit"
                                class="btn btn-sm btn-outline-secondary"
                                data-id="<?= $product->id ?>"
                                <?= $product->quantity == 0 ? 'disabled' : '' ?>
                            ><?= $product->quantity == 0 ? '已售完' : '加入購物車' ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script>
    $(document).ready(() => {
        $('.btn').click((e) => {
            $.ajax({
                type: "POST",
                url: "",
                data: {
                    product_id: e.target.dataset.id
                },
                success: (data) => {
                    console.log(data);
                    $('.alert').show();
                    setTimeout(() => {
                        $('.alert').hide();
                    }, 3000);
                },
                error: () => {
                    alert('失敗');
                }
            })
        })
    })
</script>

<?php require 'layouts/footer.php'; ?>