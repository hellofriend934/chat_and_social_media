@extends('layouts.app')
@section('content')
    @include('shared.header')
    <!-- component -->
    <!-- component -->
    <!-- component -->


@if(!$data)
    <form action="{{route('search.channel')}}">
    <input type="text" name="s" placeholder="Type here" class="input input-bordered input-accent w-full max-w-xs" />

        <select class="select select-info w-full max-w-xs" name="cat">
            <option disabled selected>Категория?</option>
            @foreach($categories as $category)
                <option>{{$category->title}}</option>
            @endforeach
        </select>

        <select class="select select-info w-full max-w-xs" name="sort">
            <option disabled selected>Сортировать по популярности </option>
            <option value="title">по имени</option>
            <option value="created_at desc">по дате создания[cтарые]</option>
            <option value="created_at asc">по дате создания [новые]</option>
        </select>

        <button type="submit" class="btn btn-active btn-ghost ml-1">Искать</button>
    </form>




    @if(session()->has('info'))
        <div class="alert alert-info shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{session()->get('info')}}.</span>
            </div>
        </div>
    @endif

    @if(session()->has('warning'))
        <div class="alert alert-error shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{session()->get('info')}}.<.</span>
            </div>
        </div>
    @endif

    @if(session()->has('result'))
    <div class="mockup-code" >
        <div >
            @foreach(session()->get('result') as $channel)
            <a href="/channel/{{$channel->slug}}"><pre><code class="text-blue-800"> {{$channel->title}}</code></pre></a>
            @endforeach
        </div>
    </div>
@endif

    @if(isset($channels) && !session()->has('result'))
        <div class="mockup-code pl-4" >
            <p>Ваши каналы</p>
        @foreach($channels as $channel)
            <a href="/channel/{{$channel->slug}}"><pre><code class="text-blue-800"> {{$channel->title}}</code></pre></a>
        @endforeach
        </div>
    @endif

    {{--    <p>Top 1000</p> todo  --}}
@endif



    @if($data)
    <div class=" bg-gray-200 flex items-center justify-center px-5 py-5">
        <div class="rounded-lg shadow-xl bg-gray-900 text-white w-full">
            <div class="border-b border-gray-800 px-8 py-3">
                <div class="inline-block w-3 h-3 mr-2 rounded-full bg-red-500"></div><div class="inline-block w-3 h-3 mr-2 rounded-full bg-yellow-300"></div><div class="inline-block w-3 h-3 mr-2 rounded-full bg-green-400"></div>
            </div>
            <div class="px-8 py-6">
                <p><em class="text-blue-400">const</em> <span class="text-green-400">aboutMe</span> <span class="text-pink-500">=</span> <em class="text-blue-400">function</em>() {</p>
                <p>&nbsp;&nbsp;<span class="text-pink-500">return</span> {</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;name: <span class="text-yellow-300">'{{$data->title}}</span>,</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;description: <span class="text-yellow-300">'{{$data->description}}'</span>,</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/channel/category/{{$data->categories[0]->title}}">категория: <span class="text-yellow-300">'{{$data->categories[0]->title}}'</span></a>,</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{route('follow',$data->id)}}" class="text-blue-800 text-xl">follow</a></p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;website: <span class="text-yellow-300">'<a href="https://scottwindon.com" target="_blank" class="text-yellow-300 hover:underline focus:border-none">https://scottwindon.com</a>'</span>,</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;followers: <span class="text-yellow-300">{{$data->followers->count()}}</span>,</p>
                <p>&nbsp;&nbsp;}</p>
                <p>}</p>
            </div>
        </div>
    </div>
{{-- TODO Сделать проверку через гейты и позволить писать админам и создателю--}}
@if(auth()->id() == $data->creater_id)

    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">New Post</div>
    <style>
        body {background:white !important;}
    </style>
    <form action="{{route('create.post',$data->slug)}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text" name="title">
            <textarea class="textarea textarea-ghost" placeholder="post" name="text"></textarea>
            <!-- icons -->
            <div class="icons flex text-gray-500 m-2">
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
            </div>

            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Pick a file</span>
                    <span class="label-text-alt">Alt label</span>
                </label>
                <input type="file" class="file-input file-input-bordered w-full max-w-xs"  name="image"/>
                <label class="label">
                    <span class="label-text-alt">Alt label</span>
                    <span class="label-text-alt">Alt label</span>
                </label>
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

    </form>
@endif

    <!-- component -->
    <!-- post card -->
{{--        <div class="mt-5 flex gap-2	 justify-center border-b pb-4 flex-wrap	">--}}
{{--            <img src="https://images.unsplash.com/photo-1610147323479-a7fb11ffd5dd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1534&q=80" class="bg-red-500 rounded-2xl w-1/3 object-cover h-96 flex-auto" alt="photo">--}}
{{--            <img src="https://images.unsplash.com/photo-1614914135224-925593607248?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1534&q=80" class="bg-red-500 rounded-2xl w-1/3 object-cover h-96 flex-auto" alt="photo">--}}
{{--        </div>--}}
    @foreach($posts as $post)

        <div class="pt-6 pb-12 bg-gray-300">
        <div id="card" class="">
            <!-- container for all cards -->
            <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
                <!-- card -->
                <div v-for="card in cards" class="flex flex-col md:flex-row overflow-hidden
                                        bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">
                    <!-- media -->
                    @if($post->image)
                    <div class="h-64 w-auto md:w-1/2">
                        <img class="inset-0 h-full w-full object-cover object-center" src="http://127.0.0.1:8000/storage/{{$post->image}}" />
                    </div>
                    @endif
                    <!-- content -->
                    <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                        <h3 class="font-semibold text-lg leading-tight truncate">{{$post->title}}</h3>
                        <p class="mt-2">
                                {{$post->text}}
                        </p>
                        <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                            {{$post->created_at->format('D.M.Y')}}
                        </p>

                        @if(auth()->id() == $data->creater_id)
                        <div class="relative h-32 w-32 ...">
                            <a href="/grud/update/{{$post->channel[0]->slug}}/post/{{$post->id}}">
                                    <?xml version="1.0" encoding="iso-8859-1"?>
                                    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                <svg height="40px" width="50px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     viewBox="0 0 392.681 392.681" xml:space="preserve">
<polyline style="fill:#56ACE0;" points="21.851,55.185 21.851,110.91 283.022,110.91 283.022,55.185 "/>
                                    <polyline style="fill:#FFFFFF;" points="283.022,132.761 21.851,132.761 21.851,370.918 283.022,370.918 "/>
                                    <polygon style="fill:#FFC10D;" points="181.786,290.11 172.671,322.433 204.929,313.189 328.792,189.391 305.584,166.312 "/>
                                    <path style="fill:#FFFFFF;" d="M342.82,129.076l-21.85,21.85l23.079,23.079l21.85-21.85c6.4-6.4,6.4-16.743,0-23.079
	C359.822,122.87,349.026,122.87,342.82,129.076z"/>
                                    <path style="fill:#194F82;" d="M327.434,113.561l-22.626,22.626V44.195c0-6.012-4.848-10.925-10.925-10.925h-41.956V10.967
	c0-6.012-4.848-10.925-10.925-10.925c-6.077,0-10.925,4.848-10.925,10.925V33.27H192.84V10.967c0-6.012-4.848-10.925-10.925-10.925
	c-6.012,0-10.925,4.848-10.925,10.925V33.27h-37.236V10.967c-0.065-6.012-4.913-10.925-10.99-10.925
	c-6.077,0-10.925,4.848-10.925,10.925V33.27H74.796V10.967c0-6.012-4.913-10.925-10.99-10.925S52.881,4.89,52.881,10.967V33.27
	H10.925C4.913,33.27,0,38.118,0,44.195v337.519c0,6.012,4.848,10.925,10.925,10.925h283.022c6.012,0,10.925-4.848,10.925-10.925
	V244.146l76.606-76.606c14.545-14.998,15.321-38.4,0-53.915C366.933,99.015,342.174,98.757,327.434,113.561z M21.851,55.12h31.095
	v22.303c0,6.012,4.848,10.925,10.925,10.925S74.796,83.5,74.796,77.423V55.12h37.236v22.303c0,6.012,4.848,10.925,10.925,10.925
	s10.925-4.848,10.925-10.925V55.12h37.236v22.303c0,6.012,4.848,10.925,10.925,10.925c6.012,0,10.925-4.848,10.925-10.925V55.12
	h37.236v22.303c0,6.012,4.848,10.925,10.925,10.925s10.925-4.848,10.925-10.925V55.12h31.095v55.79H21.98V55.12
	C21.98,55.12,21.851,55.12,21.851,55.12z M283.022,370.853H21.851V132.696h261.172v25.277l-26.634,26.634
	c-1.616-3.943-5.56-6.659-10.02-6.659H58.634c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.848,10.925,10.925,10.925h182.497
	l-43.248,43.378H58.634c-6.012,0-10.925,4.848-10.925,10.925c0,6.077,4.913,10.796,10.925,10.796h117.463l-11.636,11.636
	c-1.293,1.293-2.263,2.909-2.78,4.719l-7.693,26.958H58.634c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.848,10.99,10.925,10.99
	h89.277l-1.487,5.107c-1.099,3.814,0,7.887,2.78,10.667c2.715,2.715,6.206,3.685,10.667,2.78l53.786-15.192
	c1.745-0.517,3.426-1.487,4.719-2.78l64.646-64.646V370.853L283.022,370.853z M204.929,313.189l-32.194,9.115l9.115-32.323
	l123.733-123.733l23.079,23.079L204.929,313.189z M366.028,152.09l-21.85,21.85l-23.079-23.079l21.85-21.85
	c6.206-6.206,16.937-6.206,23.079,0C371.459,134.765,373.333,144.656,366.028,152.09z"/>
</svg>
                            </a>
                        </div>
                        @endif
<div class="views">
    {{$post->views}}
</div>


        <?xml version="1.0" encoding="iso-8859-1"?>
        <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
    <svg height="40px" width="50px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         viewBox="0 0 512 512" xml:space="preserve">
<g>
    <rect x="71.968" y="55.016" style="fill:#E21B1B;" width="208.48" height="119.12"/>
    <rect x="245.192" y="119.024" style="fill:#E21B1B;" width="208.48" height="119.12"/>
</g>
        <g>
            <rect x="57.752" y="375.808" style="fill:#CCCCCC;" width="29.616" height="29.616"/>
            <rect x="110.16" y="427.368" style="fill:#CCCCCC;" width="29.616" height="29.616"/>
            <rect x="162.576" y="375.808" style="fill:#CCCCCC;" width="29.616" height="29.616"/>
            <rect x="214.984" y="427.368" style="fill:#CCCCCC;" width="29.616" height="29.616"/>
            <rect x="267.392" y="375.808" style="fill:#CCCCCC;" width="29.616" height="29.616"/>
            <rect x="319.808" y="427.368" style="fill:#CCCCCC;" width="29.616" height="29.616"/>
            <rect x="372.216" y="375.808" style="fill:#CCCCCC;" width="29.616" height="29.616"/>
            <rect x="372.216" y="303.952" style="fill:#CCCCCC;" width="82.032" height="101.472"/>
        </g>
        <path d="M256.216,89.232C149.424,87.384,50.552,145.344,0,239.424c50.312,94.104,149.088,152.104,255.784,150.184
	C362.568,391.464,461.448,333.504,512,239.424C461.688,145.32,362.912,87.32,256.216,89.232z"/>
        <path style="fill:#999999;" d="M256,356.616c-64.72,0-117.192-52.472-117.192-117.192S191.28,122.232,256,122.232
	s117.184,52.464,117.192,117.184C373.128,304.12,320.696,356.552,256,356.616z M256,130.224
	c-60.304,0-109.192,48.888-109.192,109.192S195.696,348.608,256,348.608s109.184-48.88,109.192-109.184
	c-0.072-60.28-48.92-109.12-109.192-109.192V130.224z"/>
        <circle style="fill:#E21B1B;" cx="256" cy="239.424" r="95.32"/>
        <circle style="fill:#FFFFFF;" cx="256" cy="239.424" r="64.56"/>
        <circle cx="256" cy="239.424" r="32"/>
</svg>

</div>
                    </div>
                </div><!--/ card-->

            </div><!--/ flex-->

        </div>

        </div>
    @endforeach
    {{ $posts->links() }}
    @endif

    @if(request()->path() == 'channel')
        <div class="dropdown dropdown-end w-1/4">
            <label tabindex="0" class="btn m-1">Создать свой канал</label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box ">
                <form action="{{route('store.channel')}}" method="post">
                    @csrf
                    <div class="editor  w-100 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-3xl">
                        <p class="text-green-200 focus:text-info mb-4">Создать свой канал</p>
                        <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text" name="title">
                        <textarea class="textarea textarea-ghost" placeholder="post" name="description"></textarea>
                        <!-- cat -->
                        <div class="category mb-20 text-white">
                         <p>Выберите категорию</p>
                        @foreach($categories as $category)
                           <input type="radio" name="category_id" value="{{$category->id}}" class="ml-3"> {{$category->title}}

                        @endforeach
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

                </form>
                @endif
            </ul>
        </div>

    @include('shared.footer')
@endsection
