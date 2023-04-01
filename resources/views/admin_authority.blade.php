@extends('layouts.admin')

@section('content')
    <div>
        <h2 class="text-center text-xl m-5">ユーザー全件</h2>
        <div>
            {{ $all_user_list }}
            <table class="admin_table bg-white">
                <tr>
                    <th>ユーザーID</th>
                    <th>ユーザーネーム</th>
                    <th>ユーザー権限</th>
                    <th>強制共有不可設定</th>
                </tr>

                @foreach ($all_user_list as $user_list)
                    <tr>
                        <td>{{ $user_list['id'] }}</td>
                        <td>{{ $user_list['name'] }}</td>
                        <td>
                        <input type="radio" class="radio" name="{{$user_list['id']}}" value="user" @if ($user_list['role'] == 'user') checked @endif>
                        <label for="{{$user_list['id']}}">一般</label>
                        <input type="radio" class="radio" name="{{$user_list['id']}}" value="admin" @if ($user_list['role'] == 'admin') checked @endif>
                        <label for="{{$user_list['id']}}">管理者</label>
                        </td>
                        <td><input type="checkbox" class="checkbox" id="{{$user_list['id']}}" @if ($user_list['hide_share_mode'] == '1') checked @endif><label for="share_mode">共有不許可</label></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
