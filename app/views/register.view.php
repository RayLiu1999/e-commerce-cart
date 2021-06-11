<?php require 'layouts/header.php'; ?>

<div class="container" style="flex-grow: 1;">
    <div class="row justify-content-center" style="padding-top: 30px">
        <div class="card" style="width: 24rem">
            <div class="card-body">
                <div class="card-title ">
                    <h2 class="d-flex justify-content-center">會員註冊</h2>
                </div>
                <form action="/ecommerce/register" method="POST">
                    <div class="form-group">
                        <label for="username">使用者名稱</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="請輸入名稱" autocomplete="off">
                        <p id="error_user" class="text-danger"></p>
                    </div>
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
                    <div class="form-group">
                        <label for="confirm_password">確認密碼</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="請再一次輸入密碼">
                        <p id="error_confirm" class="text-danger"></p>
                    </div>
                    <button class="btn btn-secondary" type="submit">註冊</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btn').click(function() {
            $.ajax({
                type: 'POST',
                url: '/ecommerce/register',
                data: {
                    username: $('#username').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    confirm_password: $('#confirm_password').val()
                },
                success: function(data) {
                    $('#error_user').html('');
                    $('#error_email').html('');
                    $('#error_password').html('');
                    $('#error_confirm').html('');

                    if (data.includes('使用者') === true) {
                        $('#error_user').append(data);
                    } else if (data.includes('信箱') === true) {
                        $('#error_email').append(data);
                    } else {
                        $('#error_password').append(data);
                    };

                    if (!data) {
                        window.location.href = '/ecommerce';
                    }
                },
                error: function() {
                    alert('fail');
                }

            });
            return false;
        })
    })
</script>

<?php require 'layouts/footer.php'; ?>