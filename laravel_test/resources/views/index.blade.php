<a href="/laravel_test/user/logout">登出</a>
<br />
<br />
<table border="1" width="40%">
    <tr>
        <th>ID</th>
        <th>名稱</th>
        <th>email</th>
        <th>&nbsp;</th>
    </tr>
    @foreach($users as $user)
        <tr align="center">
            <td>{{$user["id"]}}</td>
            <td>{{$user["name"]}}</td>
            <td>{{$user["email"]}}</td>
            <td>
                @if ( $check_permissions["edit"] == 1 )
                    <a href="/laravel_test/user/edit?id={{$user["id"]}}">編輯</a>
                @endif 
            </td>
        </tr>
    @endforeach
</table>