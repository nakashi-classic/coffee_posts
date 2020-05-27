<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-success"> 
        <a class="navbar-brand" href="/">Co.ffee</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザー', [], ['class' => 'nav-link text-white']) !!}</li>
                    <li class="nav-item">{!! link_to_route("coffee_posts.create","投稿する",[],["class"=>"nav-link text-white"]) !!}</li>
                    <li class="nav-item">{!! link_to_route("users.show","投稿をみる",['id' => Auth::id()],["class"=>"nav-link text-white"]) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link text-white']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link text-white']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>