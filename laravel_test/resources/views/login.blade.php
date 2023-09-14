<form action="/laravel_test/user/login_action" method="post">
    @csrf
    帳號 <input type="text" name="email" />
    <br />
    密碼 <input type="password" name="password" />
    <br />
    <input type="submit" value="送出" />
</form>