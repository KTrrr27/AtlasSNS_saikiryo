        <div id="head">
            <!-- nameのtop(home)を探すように指定する -->
            <h1><a href="{{ route('top') }}"><img src="images/atlas.png"></a></h1>
            <div id="accordionMenu">
                <div id="accordionButton">
                    <p>〇〇さん
                        <span id="arrow"
                            data-bs-toggle="collapse"
                            data-bs-target="#menuContent"
                            role="button"
                            aria-expanded="false"
                            aria-controls="menuContent">∨</span>
                    </p>
                </div>
                <ul id="menuContent" class="collapse">
                    <li><a href="">ホーム</a></li>
                    <li><a href="">プロフィール</a></li>
                    <li><a href="">ログアウト</a></li>
                </ul>
            </div>
        </div>
