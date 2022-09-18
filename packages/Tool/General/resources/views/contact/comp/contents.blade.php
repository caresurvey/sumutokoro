@extends('general::layouts.app')
@section('title', session('title'))

@section('content')
  @include('general::contact.comp.breadcrumb')

  <div class="container mx-auto px-5 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      {{ session('title') }}
    </h1>
  </div>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8 text-center">
        <p>
          {!! nl2br(session('message')) !!}
        </p>
      </div>
      <p class="text-center">
        <a href="{{asset('/')}}" class="btn btn-primary">トップに戻る</a>
      </p>
    </div>
  </section>


@endsection

