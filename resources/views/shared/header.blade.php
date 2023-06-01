{{--<nav class="bg-gray-800 p-2 mt-0 w-full"> <!-- Add this to make the nav fixed: "fixed z-10 top-0" -->--}}
{{--    <div class="container mx-auto flex flex-wrap items-center">--}}
{{--        <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">--}}
{{--            <a class="text-white no-underline hover:text-white hover:no-underline" href="#">--}}
{{--                <span class="text-2xl pl-2"><i class="em em-grinning"></i> Brand McBrandface</span>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">--}}
{{--            @if(request()->url('/messenger'))--}}
{{--                <input type="text" placeholder="найти пользователя" class="input input-bordered input-secondary w-full max-w-xs" />--}}
{{--            @endif--}}
{{--            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">--}}
{{--                <li class="mr-3">--}}
{{--                    <a class="{{request()->path() == '/' ? 'inline-block py-2 px-4 text-white no-underline' : 'inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4'}}" href="{{route('home')}}">Главная</a>--}}
{{--                </li>--}}
{{--                @if(auth()->user())--}}
{{--                <li class="mr-3">--}}
{{--                    <form action="{{route('logout')}}" method="POST">--}}
{{--                        @csrf--}}
{{--                    <button class="{{request()->path() == 'login' ? 'inline-block py-2 px-4 text-white no-underline' : 'inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4'}}">выход</button>--}}
{{--                    </form>--}}
{{--                </li>--}}
{{--                @else--}}
{{--                    <li class="mr-3">--}}
{{--                        <a class="{{request()->path() == 'tefdfsst' ? 'inline-block py-2 px-4 text-white no-underline' : 'inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4'}}" href="{{route('login')}}">вход</a>--}}
{{--                    </li>--}}

{{--                    <li class="mr-3">--}}
{{--                        <a class="{{request()->path() == 'fdsa' ? 'inline-block py-2 px-4 text-white no-underline' : 'inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4'}}" href="{{route('register')}}">регистрация</a>--}}
{{--                    </li>--}}
{{--                @endif--}}

{{--                <li class="mr-3">--}}
{{--                    <a class="{{request()->path() == 'test' ? 'inline-block py-2 px-4 text-white no-underline' : 'inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4'}}" href="{{route('messenger')}}">Чат</a>--}}
{{--                </li>--}}

{{--                <div class="avatar placeholder">--}}
{{--                        <a href="/user/profile"><img src="{{auth()->user()->avatar}}" /></a>--}}
{{--                </div>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<div class="navbar bg-base-100">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl">chaty</a>
    </div>

    <form method="GET" action="{{route('search.profile')}}">
        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">user name</span>     <input type="text" name="s" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
            </label>

        </div>
        <input type="submit" class="btn btn-ghost" value="искать">
    </form>





    <div>
        <a class="{{request()->path() == '/' ? 'inline-block py-2 px-4 text-white no-underline' : 'inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4'}}" href="{{route('home')}}">Главная</a>
    </div>
    @if(auth()->user())
        <div>
            <form action="{{route('logOut')}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="{{request()->path() == 'login' ? 'inline-block py-2 px-4 text-white no-underline' : 'inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4'}}">выход</button>
            </form>
        </div>
    @else
        <div class="mr-3">
            <a class="{{request()->path() == 'tefdfsst' ? 'inline-block py-2 px-4 text-white no-underline' : 'inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4'}}" href="{{route('login')}}">вход</a>
        </div>

        <div class="mr-3">
            <a class="{{request()->path() == 'fdsa' ? 'inline-block py-2 px-4 text-white no-underline' : 'inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4'}}" href="/signUp">регистрация</a>
        </div>
    @endif

    <div class="mr-3">
        <a class="{{request()->path() == 'test' ? 'inline-block py-2 px-4 text-white no-underline' : 'inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4'}}" href="{{route('messenger')}}">Чат</a>
    </div>

    <div class="mr-3">
        <a class="{{request()->path() == 'test' ? 'inline-block py-2 px-4 text-white no-underline' : 'inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4'}}" href="{{route('channel')}}">каналы</a>
    </div>

    <div class="flex-none gap-2">


        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <a href="/profile"><img src="{{auth()->user()->avatar?? ''}}" /></a>
                </div>
            </label>

        </div>
    </div>
</div>

@if($message = flash()->get())
    <div class="{{$message->class()}}">
        {{$message->message()}}
    </div>
@endif
