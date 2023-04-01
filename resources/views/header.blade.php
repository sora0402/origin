<div class="side_header header">
    <a href="{{ route('top')}}"><img src="./img/logo.png" alt=""></a>
    <a href="{{ route('write') }}">日記を書く</a>
    <a href="{{ route('read') }}">日記を読む</a>
    <a href="{{ route('explanation') }}">このサイトについて</a>
    <div class="side">
        <a href="{{ route('config') }}">設定</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </div>
</div>
