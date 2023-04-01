@extends('layouts.admin')

@section('content')
    <div>
        <h2>ユーザー全件</h2>
        <div>
            {{ $all_contacts }}
            <table class="admin_table">
                <tr>
                    <th>お問い合わせID</th>
                    <th>ユーザーネーム</th>
                    <th>デフォルトメールアドレス</th>
                    <th>お問い合わせ連絡用メールアドレス</th>
                    <th>内容</th>
                </tr>

                @foreach ($all_contacts as $num => $contact)
                    <tr>
                        <td>{{ $contact['id'] }}</td>
                        <td>{{ $user_info[$num]['name']}}</td>
                        <td>{{ $user_info[$num]['email']}}</td>
                        <td>{{ $contact['other_email']}}</td>
                        <td class="w-6/12">{{ $contact['body'] }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
