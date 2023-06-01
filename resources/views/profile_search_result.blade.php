@extends('Layouts.app')
@section('content')
@include('shared.header')

    @if(isset($users))
        <div>
            @foreach($users as $user)
                <a
                    href="/profile/{{$user->id}}"
                    class="block w-full cursor-pointer rounded-lg p-4 transition duration-500 hover:bg-neutral-100 hover:text-neutral-500 focus:bg-neutral-100 focus:text-neutral-500 focus:ring-0 dark:hover:bg-neutral-600 dark:hover:text-neutral-200 dark:focus:bg-neutral-600 dark:focus:text-neutral-200">
                    {{$user->name}}
                </a>
            @endforeach
        </div>
    @else
    ничего не найдено
    @endif

    @include('shared.footer')
@endsection
