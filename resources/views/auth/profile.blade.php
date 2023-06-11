@extends('layouts.app')
@section('content')
    @include('shared.header')
    <!-- component -->
    <div style="background-color : #f4f4f0" class=" sm:mx-32 lg:mx-32 xl:mx-72 mb-12 ">
        <div class="flex justify-between container mx-auto">
            <div class="w-full">
                <div class="mt-4 px-4">
                    @if($user->id === auth()->id())
                    <h1 class="text-3xl font-semibold py-7 px-5">your profile</h1>
                    @else
                        <h1 class="text-3xl font-semibold py-7 px-5">Profile of {{$user->name}}</h1>

                    @endif
                    <h1 class="font-thinner flex text-4xl pt-10 px-5">
                    </h1>

                    <form class="mx-5 my-5" method="post" action="{{route('profile.update')}}">
                        @csrf
                        <label class="relative block p-3 border-2 border-black rounded" htmlFor="name">
                              <span class="text-md font-semibold text-zinc-900" htmlFor="name">
                                {{$user->name}}
                              </span>
                            <input class="w-full bg-transparent p-0 text-sm  text-gray-500 focus:outline-none" id="name" type="text" name="name" value="{{$user->name}}" placeholder="Your name" />
                        </label>




                        <label class="relative block p-3 border-2 mt-5 border-black rounded" htmlFor="name">
                                 @if($user->bio)
                                  <span class="text-md font-semibold text-zinc-900" htmlFor="name">
                                    {{$user->bio}}
                                  </span>
                                   @endif

                            <input class="w-full   p-0 text-sm border-none bg-transparent text-gray-500 focus:outline-none" id="name" name="bio" type="text" placeholder="Write Your Bio" />
                        </label>
                        @if($user->id !== auth()->id())
                            <p class="text-black text-sm font-normal flex gap gap-2 pt-2">
                                <a href="/group/with/{{$user->id}}" class="border-2 border-black rounded-md border-b-4 border-l-4 font-black px-2">написать</a>
                            </p>
                        @endif
                        @if($user->id == auth()->id())
                         Включить 2fa?
                        @if(auth()->user()->TwoFa == 1)
                        <input type="radio" name="TwoFa" value="0"> Нет
                        <input type="radio" name="TwoFa" class="radio" value="1" checked>ДА
                        @else
                            <input type="radio" name="TwoFa" value="0" checked>  Нет
                            <input type="radio" name="TwoFa" class="radio" value="1" >ДА
                        @endif

                        @endif
                        <Button class="mt-5 border-2 px-5 py-2 rounded-lg border-black border-b-4 font-black translate-y-2 border-l-4 mb-4">
                            Submit
                        </Button>
                        <a href="/videocall">позвонить</a>
                    </form>
                </div>
            </div>


        </div>
    </div>

    </div>
    @include('shared.footer')
@endsection
