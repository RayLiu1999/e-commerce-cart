<?php require 'layouts/header.php'; ?>

<div class="container" style="flex-grow: 1;">
    <div class="alert alert-success" role="alert" style="display: none;">
        加入購物車成功!
    </div>
    <div class="card flex-md-row shadow-sm mt-5">
        <div class="card-body col">
            <img src="<?= $product->image_url ?>" class="img-fluid">
        </div>
        <div class="card-body col">
            <div class="col-md-auto">
                <h2 class="col-md-auto"><?= $product->name ?></h2>
                <ul>
                    <?php foreach ($descs as $desc) : ?>
                        <li><?= $desc ?></li>
                    <?php endforeach ?>
                </ul>
                <h3 class="col-md-auto text-danger">NT$<?= $product->price ?></h3>

                <div class="d-flex justify-content-end">
                    <h6 class="my-4 p-2"><?= $product->quantity == 0 ? '已售完，無法購買' : '庫存<' . ((int)($product->quantity) + 1) ?></h4>
                        <select id="count" class="my-4 p-2" style="margin-right: 5px" <?= $product->quantity == 0 ? 'disabled' : '' ?>>
                            <?php for ($i = 1; $i <= 10; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <button type="button" id="addToCart" class="my-4 btn btn-secondary" data-id="<?= $product->id ?>" style="margin-right: 5px" <?= $product->quantity == 0 ? 'disabled' : '' ?>>
                            加入購物車
                        </button>
                        <button type="submit" class="my-4 btn btn-secondary" disabled>
                            結帳
                        </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $('#addToCart').click((e) => {
            $.ajax({
                type: "POST",
                url: "/ecommerce/products",
                data: {
                    product_id: e.target.dataset.id,
                    quantity: $('#count').val()
                },
                success: (data) => {
                    console.log(data);
                    $('.alert').show();
                    setTimeout(() => {
                        $('.alert').hide();
                    }, 3000);
                },
                error: () => {
                    alert('fail');
                }
            })
        })
    })
</script>

<?php require 'layouts/footer.php'; ?>