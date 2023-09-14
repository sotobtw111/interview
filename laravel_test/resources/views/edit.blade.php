<form action="/laravel_test/user/edit_action" method="post">
    @csrf
    名稱 <input type="text" name="name" value="{{$user[0]["name"]}}" />
    <br />
    帳號 <input type="text" name="email" value="{{$user[0]["email"]}}" readonly />
    <br />
    <input type="hidden" name="id" value="{{$user[0]["id"]}}" />
    <input type="submit" value="送出" />
</form>