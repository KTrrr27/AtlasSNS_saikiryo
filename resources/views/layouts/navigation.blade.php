        <div id="head">
            <!-- nameのtop(home)を探すように指定する -->
            <h1><a href="{{ route('top') }}"><img src="images/atlas.png"></a></h1>
            <div id="accordionMenu">
                <div id="accordionButton">
                    <p>{{ Auth::user()->username }}さん
                        <span id="arrow"
                            data-bs-toggle="collapse"
                            data-bs-target="#menuContent"
                            role="button"
                            aria-expanded="false"
                            aria-controls="menuContent">∨</span>
                    </p>
                </div>
                <ul id="menuContent" class="collapse">
                    <li><a href="{{ route('top') }}">ホーム</a></li>
                    <li class="menuContent_li"><a href="/profile">プロフィール</a></li>
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                        <!-- ログアウトボタンを押したら見えないformにPOSTで送信されて、ルート名logoutをさがす -->
                        <form id="logout-form" action="{{route ('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                <img src="{{ 'images/' . Auth::user()->icon_image }}" alt="ユーザーアイコン" class="user_icon">
            </div>
        </div>
