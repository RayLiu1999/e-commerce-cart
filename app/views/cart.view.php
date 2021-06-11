<?php require 'layouts/header.php'; ?>

<h1 class="d-flex justify-content-center mt-4">購物車清單</h1>
<div class="container" style="flex-grow: 1;">
    <div class="row justify-content-center">
        <div class="col-md-9 mt-4">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col">
                                    <img src="<?= $product->image_url ?>" class="img-fluid img-thumbnail" width="200px">
                                </div>
                                <h5 class="col"><?= $product->name ?></h5>
                                <h5 class="col-sm">單價NT$<?= $product->price ?></h5>
                                <select class="count" style="margin-right: 5px" data-id="<?= $product->id ?>">
                                    <?php for ($i = 1; $i <= 10; $i++) : ?>
                                        <option value="<?= $i ?>" <?= $cart[$product->id] == $i ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <div class="col-sm-2">
                                    <button type="submit" class="delete btn btn-danger" data-id="<?= $product->id ?>">刪除
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                <?php endforeach ?>
            <?php else : ?>
                <li class="card p-2">
                    <h1 class="text-center">無商品資料</h1>
                </li>
            <?php endif; ?>
        </div>

        <div class="col-md-3 mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="font-weight-bold">
                            <p>商品共計</p>
                            <p>合計</p>
                        </div>
                        <div class="text-danger">
                            <p>NT$<?= $total_price ?></p>
                            <p>NT$<?= $total_price ?></p>
                        </div>
                    </div>
                    <button class="btn btn-dark col" disabled>結帳</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $(".delete").click((e) => {
            $.ajax({
                type: "DELETE",
                url: `/ecommerce/cart/${e.target.dataset.id}`,
                success: (data) => {
                    window.location.href = "/ecommerce/cart";
                },
                error: () => {
                    alert("fail");
                }
            })
        })
    })

    $(document).ready(() => {
        $(".count").change((e) => {
            $.ajax({
                type: "POST",
                url: `/ecommerce/cart/${e.target.dataset.id}`,
                data: {
                    quantity: e.target.value
                },
                success: (data) => {
                    window.location.href = "/ecommerce/cart";
                },
                error: () => {
                    alert("fail");
                }
            })
        })

    })
</script>

<?php require 'layouts/footer.php'; ?>