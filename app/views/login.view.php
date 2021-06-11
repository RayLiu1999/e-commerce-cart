<?php require 'layouts/header.php'; ?>

<div class="container" style="flex-grow: 1;">
    <div class=" row justify-content-center" style="padding-top: 50px">
    <div class=" card" style="width: 24rem">
        <div class="card-body">
            <div class="card-title">
                <h2 class="d-flex justify-content-center">會員登入</h2>
            </div>
            <form action="/e-commerce-cart/login" method="POST">
                <div class="form-group">
                    <label for="email">電子信箱</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="請輸入電子信箱" autocomplete="off">
                    <p id="error_email" class="text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="password">密碼</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼">
                    <p id="error_password" class="text-danger"></p>
                </div>
                <button class="btn btn-secondary" type="submit">登入</button>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(() => {
        $('.btn').click(() => {
            var a = 1;
            $.ajax({
                type: 'POST',
                url: '/e-commerce-cart/login',
                data: {
                    email: $('#email').val(),
                    password: $('#password').val()
                },
                success: (data) => {
                    if (data == 1) {
                        window.location.href = '/e-commerce-cart';
                    } else {
                        console.log(data);
                        $('#error_email').html('');
                        $('#error_password').html('');
                        if (data.includes('信箱')) {
                            $('#error_email').append(data);
                        } else {
                            $('#error_password').append(data);
                        }
                    }
                },
                error: () => {
                    alert('fail');
                }
            })
            return false;
        })
    })
</script>

<?php require 'layouts/footer.php'; ?>