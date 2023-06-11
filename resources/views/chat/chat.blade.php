@extends('layouts.app')
@section('content')
    @include('shared.header')

<div class="flex align-items-center">
@if(request()->session()->has('notice'))
    <div class="flex items-left bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>{{request()->session()->get('notice')}}</p>
    </div>
@endif

@if(!isset($group_id))
    <div class="position-relative">
    <form action="{{route('search.group')}}" method="get">
    <div class="form-control mb-4 ">
        <div class="input-group">
            <input type="text" placeholder="Search…" name="s" class="input input-bordered" />
        </div>
        <button type="submit" class="btn btn-square">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
        </button>
    </div>

    </form>
    </div>
@endif

    @if(request()->path() == 'messenger')
        <div class="dropdown dropdown-end w-1/4">
            <label tabindex="0" class="btn m-1">Создать свой чат</label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box ">
                <form action="{{route('create.group')}}" method="post">
                    @csrf
                    <div class="editor  w-100 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-3xl">
                        <p class="text-green-200 focus:text-info mb-4">Создать свой чат</p>
                        <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text" name="title">
                        <textarea class="textarea textarea-ghost" placeholder="post" name="description"></textarea>
                        <label>Приватный чат?</label>
                        <input type="radio" value="0" name="is_public">да
                        <input type="radio" value="1" name="is_public">нет

                        <!-- icons -->
                        <div class="icons flex text-gray-500 m-2">
                            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                            <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
                        </div>



                        <!-- buttons -->
                        @if($errors->any())
                            <div class="stack mb-2">
                                <div class="card shadow-md bg-primary text-primary-content">
                                    <div class="card-body">
                                        <h2 class="card-title">Notification 1</h2>
                                        @foreach($errors->all() as $error) @endforeach
                                        <p>{{$error}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif



                        <div class="buttons flex">
                            <input type="submit" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500" value="post">
                        </div>
                    </div>
                    @endif
                </form>
            </ul>
        </div>




    <div id="app">
        @if(isset($group_id) )
            @if(isset($users))
                <div class="desc m-2"> Описание чата : s{{$group->description}}</div>
            <div class="collapse">

                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium">
                    показать пользователей
                </div>

                <div class="collapse-content">
                    @if(\App\Models\group::is_admin(auth()->user(),$group_id) or auth()->id() == $group->creater_id)
                        <div class="overflow-x-auto">
                            <table class="table table-compact w-full">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td><a href="/profile/{{$user->id}}">{{$user->name}}</a> </td>
                                    <td>{{$user->status}}</td>
                                    @if($user->status == 'blocked_user')
                                        <td><a href="{{route('unBlockUserChat',[$user, $group_id])}}">разблокировать</a></td>
                                    @elseif($group->creater_id == auth()->id() && $user->id !== auth()->id())
                                        <td><a href="{{route('blockUserChat',[$user, $group_id])}}">заблокировать</a></td>
                                    @elseif($user->status !== 'creater' or $user->status !== 'admin' && $user->id !== auth()->id())
                                        <td><a href="{{route('blockUserChat',[$user, $grou_id])}}">заблокировать</a></td>

                                    @else

                                        @endif
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="table table-compact w-full">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @if($user!== null)
                                    <tr>
                                        <td><a href="/profile/{{$user->id}}">{{$user->name}}</a> </td>
                                        <td>{{$user->status}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            @endif

                 <index-chat group_id="{{$group_id}}"  my_id="{{auth()->id()}}" ></index-chat>


        @else

@if(session()->has('result'))
            @foreach(session()->get('result') as $chat)
                <div class="w-full">
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                        <tr>

                            <th>title</th>
                            <th>desc</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row 1 -->
                        <tr>
                            <td><a href="messenger/{{$chat->id}}">{{$chat->title}}</a></td>
                            <td>{{$chat->description}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            @endforeach
            @elseif(isset($result))
    <div class="sort m-3">
                <form action="{{route('messenger')}}" method="get">
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">показывать только личные сообщения </span>
                            <input type="radio" name="sort_my_chats"  value="not party" class="radio checked:bg-red-500"   />
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">показывать все чаты</span>
                            <input type="radio" name="sort_my_chats" value="not" class="radio checked:bg-blue-500" checked />
                        </label>
                    </div>
                    <input type="submit" value="применить">
                </form>
    </div>
                @foreach($result as $chat)
                <div class="w-full">
                    <table class="table w-full max-w-full">
                        <!-- head -->
                        <thead>
                        <tr>
                            <th>title</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row 1 -->
                        <tr>
                            <td><a href="messenger/{{$chat->id}}">{{$chat->title}}</a></td>
                         <td>
                             @if($chat->creater_id !== auth()->id())
                             <a href="{{route('leave_group',$chat->id)}}" class="btn btn-outline btn-secondary">покинуть чат</a>
                             @else
                                 <i class="btn btn-outline btn-secondary">Вы создатель</i>
                             @endif
                         </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
            @endif

        <index-chat></index-chat>
        @endif


    </div>
@if(isset($group_id))
        <form  method="POST" class="mb-4" action="{{route('chat.send_image',$group_id)}}" enctype="multipart/form-data" >
            @csrf
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Pick a file</span>
                </label>
                <input type="file" id="file"  class="file-input file-input-bordered w-full max-w-xs" name="image"/>

            </div>

            <input class="btn btn-outline btn-accent" type="submit" value="send">

        </form>
        @endif
</div>
    @include('shared.footer')
@endsection
