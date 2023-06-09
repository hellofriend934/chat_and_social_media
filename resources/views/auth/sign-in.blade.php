@extends('layouts.app')
@section('content')
   @include('shared.header')

   <section class="gradient-form h-full bg-neutral-200 dark:bg-neutral-700">
       <div class="container h-full p-10">
           <div
               class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
               <div class="w-full">
                   <div
                       class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                       <div class="g-0 lg:flex lg:flex-wrap">
                           <!-- Left column container-->
                           <div class="px-4 md:px-0 lg:w-6/12">
                               <div class="md:mx-6 md:p-12">
                                   <!--Logo-->
                                   <div class="text-center align-items-center">
                                       <?xml version="1.0"?>
                                       <svg  class="ml-2" width="600" height="200" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://web.resource.org/cc/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:svg="http://www.w3.org/2000/svg" id="svg2750" viewBox="0 0 474.23 355.54" version="1.0">
                                           <g id="layer1" transform="translate(-20.32 -125.63)">
                                               <g id="Layer_1" transform="translate(20.32 125.63)">
                                                   <path id="path2763" d="m474.18 59.672c-0.24 5.823 2.29 17.688-19.78 54.518-24.64 41.13-62.64 75.31-99.9 102.99-22.47 16.69-45.5 30.24-69.41 42.23-6.22-2.03-13.88-4.7-22.44-8.05-0.06-0.01-0.11-0.04-0.17-0.06 5.94-2.95 12.36-6.25 19.38-9.99 68.82-36.62 81.57-58.7 80.97-59.3s-17.9 19.56-77.22 54.1c-8.64 5.03-17.49 9.59-26.51 13.75-6.68-2.76-13.23-5.77-18.82-8.61 28.81-12.49 59.51-28.04 84.67-44.67 38.71-25.59 75.16-55.58 104.06-89.26 26.41-30.764 37.26-46.605 38.93-49.727 2.61-4.908 6.81-11.669 6.24 2.079zm-17.56 33.847c-0.82-0.278-6.65 14.981-27.47 40.501-20.77 25.47-39.41 40.78-38.57 41.61 0.83 0.83 16.75-10.46 41.07-40.78 21.88-27.27 25.81-41.056 24.97-41.331zm-153.38 19.541c-3.05 0.83-4.56-2.89-4.79-5.95-0.56-7.212 0.67-11.526 0.07-15.375-0.67-4.359 1.71-11.415-3.72-9.076-3.08 1.327-0.52 4.757 0.59 8.362 1.11 3.606 0.83 15.749 0.83 18.309 0 4.44 2.5 7.04 9.16 9.43 7.66 2.76 1.57 20.7-5.82 22.75-7.68 2.14-11.99-3.16-17.49-2.22-9.71 1.67-7.77 11.1-9.71 14.15s-1.94 3.05-5.27 6.38c-2.45 2.45-4.05 4.41-5.77 5.96 0.27 0.23 0.46 0.63 0.51 1.3 0.21 2.92 2.55 5.16 2.55 8.07s-0.93 3.95-4.68 4.78c-3.74 0.83-5.39-0.62-5.6-1.87s0.31-5.8 0.92-8.23c0.19-0.8 0.47-1.29 0.76-1.62-3.04 0.55-6.84 0.77-9.5 0.77h-0.3c0.64 0.43 1.34 1.16 1.78 2.5 1.06 3.16 1.22 5.54 1.43 7.41s-2.29 2.5-4.79 2.71-5.41-0.62-5.83-1.67c-0.41-1.04 0.27-5.37 0.7-7.62 0.26-1.37 1.65-2.55 2.73-3.27-2.82 0.06-5.81 0.16-8.87 0.21 0.81 0.87 1.61 1.95 1.8 2.99 0.42 2.24 1.35 5.62 1.15 7.07-0.22 1.45-0.84 1.87-4.79 2.08-3.96 0.21-5.29-0.41-5.71-1.24-0.42-0.84 0.3-5.83 0.8-7.89 0.27-1.1 1.09-2.19 1.85-3-2.47-0.02-4.93-0.12-7.32-0.32 0.59 1.63 3.27 4.42 2.56 8.91-0.4 2.49-1.57 3.53-6.97 3.54-3.12 0.01-4.56-2.08-4.57-3.53-0.02-3.99 1.67-6.78 2.56-9.63-3-0.34-4.82-0.58-6.3-1.2 0.21 1.35 1.01 4.9 1.45 8.53 0.28 2.29-0.83 3.54-3.54 3.54-2.7 0-4.37-1.45-4.37-2.7 0-3.33 4.89-9.52 5.29-9.79 0.04-0.03 0.09-0.07 0.14-0.1-0.28-0.17-0.57-0.37-0.85-0.59-2.5-1.94-5.55-4.7-7.17-11.74-1.63-7.04-1.05-11.33-6.47-14.58-5.41-3.25-15.17 4.52-20.05 4.01-5.43-0.57-12.3-11.43-12.74-16.55-0.52-5.98 5.32-3.2 8.64-10.77 2.11-4.82 0.01-10.85 0.01-24.382 0-13.538 4.66-20.431 7.6-27.074 2.14-4.835-0.83-8.43 2.95-21.065 3.22-10.79 6.13-14.804 6.13-14.804s-5.19 4.273-8.25 14.342c-2.7 8.911-1.87 13.404-4.04 20.443s-5.44 11.676-7.07 22.505c-1.62 10.83 1.1 24.035-1.62 28.405-1.84 2.95-7.92-0.24-8.71-11.1-0.68-9.328-1.89-27.765-0.27-38.594 1.63-10.83 2.59-6.803 8.32-26.716 6.75-23.469 36.19-37.757 71.34-38.236 30.71-0.419 41.93 9.528 51.96 19 10.46 9.88 17.76 23.698 19.98 32.576s4.16 12.562 5.55 20.054c1.39 7.489 0.64 18.368-0.72 23.778-1.5 6.018-4.46 16.548-8.44 17.638zm-84.23-23.841c-3.96-6.242-14.58-7.322-22.69-7.699-8.95-0.417-13.85 2.338-14.78 9.156-0.75 5.497 0.21 13.734 2.08 19.764 1.63 5.25 8.12 12.28 13.74 11.44 4.52-0.66 14.15-7.87 19.77-14.35 3.37-3.88 3.78-15.305 1.88-18.311zm12.49 16.851c-2.09 0.15-5.21 7.07-6.66 15.81-0.96 5.76-4.78 13.8-3.96 18.73 0.55 3.31 3.62 3.78 5.41 0.21 1.46-2.92 2.29-5.62 4.37-5.62s6.68 12.19 9.37 11.86c3.11-0.38 6.93-5.2 6.45-11.24-0.42-5.2-2.5-10.4-5.62-15.81s-7.3-14.08-9.36-13.94zm50.57-16.851c-3.12-4.163-8.53-7.699-19.15-7.074-8.78 0.516-17.52 4.062-18.31 9.986-0.83 6.242 0.94 9.499 4.37 13.729 3.54 4.37 13.53 12.9 19.98 13.32s12.07-1.04 12.9-7.49c0.84-6.45 3.33-18.311 0.21-22.471zm-14.36 101.33c5-5 4.17-13.53 6.25-24.35s5.82-14.15 8.32-17.89c2.5-3.75 8.46-3.24 9.16-1.67 0.83 1.88-1.71 14.51-4.17 22.68-3.74 12.49-3.95 17.48-4.16 23.93-0.17 5.51-8.95 9.78-13.53 14.15-4.58 4.36-8.74 12.48-14.36 14.14-5.62 1.67-13.53-1.24-22.06-1.04-8.53 0.21-17.07 2.29-21.64 0.62-4.58-1.66-9.79-9.36-15.62-14.56-5.82-5.2-12.69-8.32-14.77-13.31-2.08-5 0-11.03-0.42-18.73-0.41-7.7-2.49-12.48-4.58-17.06-2.08-4.58-0.69-7.88 2.71-9.15 4.99-1.87 8.53 2.29 11.03 10.19 2.61 8.25 4.92 13.1 5.41 19.98 0.63 8.73 1.88 10.4 4.79 13.52 1.66 1.78 4.72 2.84 7.93 3.73-0.59-1.56-1.12-3.59-0.85-7.27 0.13-1.88 1.66-2.5 4.99-2.71 3.33-0.2 5.54 0.63 5.62 2.3 0.28 5.48-1.06 7.83-2.02 9.67 1.8 0.28 4.44 0.44 7.48 0.53-1.13-2.26-2.33-4.86-2.34-9.17 0-2.46 1.88-2.08 5-2.28 3.12-0.21 6.33-0.25 6.45 1.87 0.24 4.28-1.22 7.06-2.56 9.67 2.25 0.01 4.53-0.01 6.71-0.04-0.91-2.82-1.71-6.46-1.24-9.63 0.19-1.26 2.92-1.67 5.42-1.87 2.49-0.21 5.53 1.02 5.62 2.49 0.18 3.24-0.8 6.38-1.93 8.85 1.5-0.04 2.8-0.08 3.79-0.11 0.95-0.03 1.89-0.09 2.84-0.2-1.07-2.02-2.12-4.58-2-6.66 0.09-1.68 3.75-5.21 6.66-5 2.32 0.17 4.81 0.66 4.94 1.91 0.27 2.63-0.56 5.5-1.57 7.89 3.26-1.22 6.27-3.01 8.7-5.42zm65.95 86.76s0.32 4.31-9.4 7.9c-5.72 2.12-6.81 3.23-37.28-7.7-9.18-3.29-59.19-17.59-99.77-41.4-58.88-34.54-75.64-54.9-76.64-54.1s12.06 22.68 80.35 59.3c54.06 28.98 72.92 32.25 95.23 40.15 27.36 9.7 30.16 9.9 33.88 14.36 4.06 4.86 2.48 15.4 2.48 15.4s-49.61-14.09-86.76-29.76c-41.51-17.49-79.94-36.61-116.92-64.28-36.975-27.68-74.694-61.86-99.154-102.99-21.896-36.831-19.383-48.695-19.623-54.518-0.57-13.748 3.598-6.987 6.198-2.079 1.652 3.121 12.42 18.962 38.627 49.727 28.693 33.68 64.862 63.67 103.28 89.26 35.28 23.49 73.7 40.59 110.76 55.66 41.02 16.69 74.74 25.07 74.74 25.07zm-284.49 11.44c8.753 0 14.154 6.86 14.154 15.18 0 13.95-12.428 13.21-12.694 15.61-0.267 2.4 3.628 4.09 9.78 3.12 4.18-0.66 7.978-7.06 9.576-5.2s-8.722 14.56-18.524 14.56c-10.615 0-20.815-9.15-20.815-22.26-0.001-14.98 8.118-21.01 18.523-21.01zm22.479-0.21c7.242 0 8.3 2.53 10.408 9.36 1.968 6.39 6.334 7.96 7.284 7.91s-2.657-2.83-4.58-8.12c-1.665-4.57-4.092-9.98 5.205-9.98 8.958 0 8.915 3.82 10.194 7.28 2.09 5.61 7.69 9.83 8.54 9.78 0.84-0.05-4.37-5.41-5.62-10.2-0.96-3.67-0.85-6.66 4.37-6.66 4.37 0 7.07 5 10.82 11.66 3.27 5.81 6.61 18.97 0.21 19.55-9.46 0.87-37.635 1.7-41.418-0.62-6.69-4.11-9.158-9.36-11.032-17.06-2.278-9.36-2.023-12.9 5.619-12.9zm32.261-15.19c-1.04 1.25-1.25 8.11-9.366 8.11s-13.943-5.82-13.943-16.22 7.284-15.82 17.064-15.82c9.785 0 17.695 4.37 25.395 13.32 7.63 8.87 10.31 19.62 14.15 22.89 5.56 4.72 13.12 3.49 13.65 4.56 0.54 1.06-6.99 4.59-6.87 14.66 0.1 8.75 0.71 18.23 3.42 22.81 2.71 4.57 5.83 7.9 6.87 7.69s1.24-7.28 7.91-7.28c7.28 0 11.03 4.78 11.03 14.77s-7.91 12.7-18.11 12.7c-10.19 0-18.94-6.24-22.27-17.48s-6.45-26.43-10.61-37.45c-4.17-11.03-11.45-23.3-13.53-25.39-2.08-2.08-3.75-3.12-4.79-1.87zm46.3 12.13c-10.42-0.64-11.37-8.17-11.37-8.17s20.12-5.94 48.1-15.58c6.87 3.89 10.51 5.83 17.92 8.98-10.28 3.47-16.68 5.8-19.78 6.8-24.08 7.8-28.54 8.35-34.87 7.97zm82.14-2.49c-37.74 15.44-83.07 28.23-83.07 28.23s-1.58-10.53 2.5-15.4c4.37-5.2 11.66-6.44 34.13-14.36 8.38-2.94 15.28-5.24 24.7-8.47 10.35 5.24 15.3 7.32 21.74 10zm77.35 45.08c6.62 0 6.81 7.07 7.85 7.28 1.03 0.21 4.13-3.12 6.82-7.69 2.68-4.58 4.13-15 3.72-23.74s-5.72-11.14-5.31-12.73c0.39-1.6 6.68-2.53 11.51-6.56 5.15-4.3 6.67-13.02 14.25-21.89 7.64-8.95 15.49-13.32 25.2-13.32 9.7 0 16.94 5.42 16.94 15.82s-5.79 16.22-13.85 16.22c-8.05 0-8.26-6.86-9.29-8.11s-2.69-0.21-4.75 1.87c-2.07 2.09-9.29 14.36-13.43 25.39-4.13 11.02-7.23 26.21-10.54 37.45-3.3 11.23-11.98 17.48-22.1 17.48s-17.97-2.71-17.97-12.7 3.72-14.77 10.95-14.77zm54.33-40.16c5.18 0 5.29 2.99 4.34 6.66-1.24 4.79-5.58 10.2-5.58 10.2s6.4-4.17 8.47-9.78c1.27-3.46 1.23-7.28 10.12-7.28 9.23 0 6.82 5.41 5.17 9.98-1.91 5.29-4.55 8.12-4.55 8.12s5.27-1.52 7.23-7.91c2.09-6.83 3.14-9.36 10.33-9.36 7.58 0 7.84 3.54 5.58 12.9-1.87 7.7-4.32 12.95-10.96 17.06-3.75 2.32-31.72 1.49-41.1 0.62-6.35-0.58-3.03-13.74 0.21-19.55 3.71-6.66 6.4-11.66 10.74-11.66zm46.68 34.75c6.17 0.51 9.91-1.32 9.71-3.12s-12.6-1.66-12.6-15.61c0-8.32 5.36-15.18 14.05-15.18 10.33 0 18.38 6.03 18.38 21.01 0 13.11-10.12 22.53-20.65 22.26-15.73-0.39-20.39-12.96-18.39-14.56s3.96 4.75 9.5 5.2z"/>
                                               </g>
                                           </g>
                                           <metadata>
                                               <rdf:RDF>
                                                   <cc:Work>
                                                       <dc:format>image/svg+xml</dc:format>
                                                       <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/>
                                                       <cc:license rdf:resource="http://creativecommons.org/licenses/publicdomain/"/>
                                                       <dc:publisher>
                                                           <cc:Agent rdf:about="http://openclipart.org/">
                                                               <dc:title>Openclipart</dc:title>
                                                           </cc:Agent>
                                                       </dc:publisher>
                                                       <dc:title>Calico Jack pirate logo</dc:title>
                                                       <dc:date>2007-03-31T01:30:01</dc:date>
                                                       <dc:description>High quality tracing of the original Calico Jack pirate flag</dc:description>
                                                       <dc:source>http://openclipart.org/detail/3710/calico-jack-pirate-logo-by-clue</dc:source>
                                                       <dc:creator>
                                                           <cc:Agent>
                                                               <dc:title>Clue</dc:title>
                                                           </cc:Agent>
                                                       </dc:creator>
                                                       <dc:subject>
                                                           <rdf:Bag>
                                                               <rdf:li>calico</rdf:li>
                                                               <rdf:li>clip art</rdf:li>
                                                               <rdf:li>clipart</rdf:li>
                                                               <rdf:li>flag</rdf:li>
                                                               <rdf:li>image</rdf:li>
                                                               <rdf:li>jack</rdf:li>
                                                               <rdf:li>logo</rdf:li>
                                                               <rdf:li>media</rdf:li>
                                                               <rdf:li>pirate</rdf:li>
                                                               <rdf:li>png</rdf:li>
                                                               <rdf:li>public domain</rdf:li>
                                                               <rdf:li>skull</rdf:li>
                                                               <rdf:li>svg</rdf:li>
                                                               <rdf:li>swords</rdf:li>
                                                           </rdf:Bag>
                                                       </dc:subject>
                                                   </cc:Work>
                                                   <cc:License rdf:about="http://creativecommons.org/licenses/publicdomain/">
                                                       <cc:permits rdf:resource="http://creativecommons.org/ns#Reproduction"/>
                                                       <cc:permits rdf:resource="http://creativecommons.org/ns#Distribution"/>
                                                       <cc:permits rdf:resource="http://creativecommons.org/ns#DerivativeWorks"/>
                                                   </cc:License>
                                               </rdf:RDF>
                                           </metadata>
                                       </svg>
                                       <h4 class="mb-12 mt-1 pb-1 text-xl font-semibold">
{{--                                           ваш текст--}}
                                       </h4>
                                   </div>

                                   <form action="{{route('signIn')}}" method="POST">
                                       @csrf
                                       <p class="mb-4">Please login to your account</p>
                                       <!--Username input-->
                                       <div class="relative mb-4" data-te-input-wrapper-init>
                                           <input
                                               name="email"
                                               type="text"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="exampleFormControlInput1"
                                               placeholder="email" />
                                           <label
                                               for="exampleFormControlInput1"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                           >Username
                                           </label>
                                       </div>

                                       <!--Password input-->
                                       <div class="relative mb-4" data-te-input-wrapper-init>
                                           <input
                                               name="password"
                                               type="password"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="exampleFormControlInput11"
                                               placeholder="Password" />
                                           <label
                                               for="exampleFormControlInput11"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                           >Password
                                           </label>
                                       </div>

                                       <div class="form-control">
                                           <label class="label cursor-pointer">
                                               <span class="label-text">Remember me</span>
                                               <input type="checkbox" checked="checked" name="remember" value="1" class="checkbox" />
                                           </label>
                                       </div>

                                       <a href="/auth/redirect" class="relative flex items-center h-14 px-12 rounded-lg border border-[#A07BF0] bg-white/20 hover:bg-white/20 active:bg-white/10 active:translate-y-0.5">
                                           <svg class="shrink-0 absolute left-4 w-5 sm:w-6 h-5 sm:h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                               <path fill-rule="evenodd" d="M10 0C4.475 0 0 4.475 0 10a9.994 9.994 0 0 0 6.838 9.488c.5.087.687-.213.687-.476 0-.237-.013-1.024-.013-1.862-2.512.463-3.162-.612-3.362-1.175-.113-.287-.6-1.175-1.025-1.412-.35-.188-.85-.65-.013-.663.788-.013 1.35.725 1.538 1.025.9 1.512 2.337 1.087 2.912.825.088-.65.35-1.088.638-1.338-2.225-.25-4.55-1.112-4.55-4.937 0-1.088.387-1.987 1.025-2.688-.1-.25-.45-1.274.1-2.65 0 0 .837-.262 2.75 1.026a9.28 9.28 0 0 1 2.5-.338c.85 0 1.7.112 2.5.337 1.912-1.3 2.75-1.024 2.75-1.024.55 1.375.2 2.4.1 2.65.637.7 1.025 1.587 1.025 2.687 0 3.838-2.337 4.688-4.562 4.938.362.312.675.912.675 1.85 0 1.337-.013 2.412-.013 2.75 0 .262.188.574.688.474A10.017 10.017 0 0 0 20 10c0-5.525-4.475-10-10-10Z" clip-rule="evenodd"/>
                                           </svg>
                                           <span class="grow text-xxs md:text-xs font-bold text-center">GitHub</span>
                                       </a>

                                       <!--Submit button-->
                                       <div class="mb-12 pb-1 pt-1 text-center">
                                           <button
                                               class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
                                               type="submit"
                                               data-te-ripple-init
                                               data-te-ripple-color="light"
                                               style="
                        background: #2d3748;
                      ">
                                               Log in
                                           </button>

                                           <!--Forgot password link-->
                                           <a href="#!">Forgot password?</a>
                                       </div>

                                       <!--Register button-->
                                       <div class="flex items-center justify-between pb-6">
                                           <p class="mb-0 mr-2">Don't have an account?</p>
                                           <a href="/signUp"
                                               type="button"
                                               class="inline-block rounded border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                               data-te-ripple-init
                                               data-te-ripple-color="light">
                                               Register
                                           </a>
                                       </div>
                                   </form>
                               </div>
                           </div>

                           <!-- Right column container with background and description-->
                           <div
                               class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none"
                               style="background: #1a202c">
                               <div class="px-4 py-6 text-white md:mx-6 md:p-12">
                                   <h4 class="mb-6 text-xl font-semibold">
                                       We are more than just a company
                                   </h4>
                                       <p class="text-sm">
                                           Lorem ipsum dolor sit amet, consectetur adipisicing
                                           elit, sed do eiusmod tempor incididunt ut labore et
                                           dolore magna aliqua. Ut enim ad minim veniam, quis
                                           nostrud exercitation ullamco laboris nisi ut aliquip ex
                                           ea commodo consequat.
                                   </p>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>

    @include('shared.footer')
@endsection
