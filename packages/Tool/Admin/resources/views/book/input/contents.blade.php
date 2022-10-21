@extends('admin::layouts.app')
@section('title', '冊子出力 - ' . config('myapp.site_name'))

@section('content')
  @include('admin::book.input.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      冊子出力
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        冊子出力データをダウンロードします
      </p>
    </div>
  </div>

  <div class="bg-white shadow-sm rounded mb-5 px-10 pt-6 pb-4">
    <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/book/publish/output"
          onsubmit="return confirm('冊子データを出力してもよろしいですか？')" method="get" accept-charset="UTF-8" id="PublishForm">

      <div class="pb-4 w-full flex">
        <div class="mr-6">
          <div class="label">出力対象</div>
          <div class="relative">
            <select name="area_section_id" id="AreaSectionId"
                    class="-mr-1 select select-bordered border-gray-200 bg-gray-100 text-xs lg:text-md lg:select-md">
              @foreach($data['area_sections'] as $key => $book)
                <option value="{{$key}}">{{$book}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div>
          <div class="label">開始ページ</div>
          <input id="InputStart"
                 name="start"
                 type="number"
                 value="1"
                 min="1"
                 max="400"
                 placeholder="開始"
                 class="mb-2 border text-base block text-gray-700 rounded-lg placeholder-gray-300 px-4 py-3 leading-normal focus:outline-primary focus:bg-white border-gray-200 bg-gray-100">
        </div>
        <div class="flex items-end justify-center pb-5 pl-3 pr-4">
          〜
        </div>
        <div>
          <div class="label">終了ページ</div>
          <input id="InputEnd"
                 name="end"
                 type="number"
                 value="1"
                 min="1"
                 max="400"
                 placeholder="終了"
                 class="mb-2 border w-full text-base block text-gray-700 rounded-lg placeholder-gray-300 px-4 py-3 leading-normal focus:outline-primary focus:bg-white border-gray-200 bg-gray-100">
        </div>
      </div>
      <div class=" w-full flex">
        <div class="pr-4">
          <div class="label">表示する開始ページ数</div>
          <div class="relative">
            <input type="number" min="1" name="startPage" value="16" placeholder="数字を入力" class="input bg-gray-50 border-gray-200">
          </div>
        </div>
        <div class="pr-4">
          <div class="label">横説明バーのページ数</div>
          <div class="relative">
            <input type="number" min="1" name="descriptionPage" value="12" placeholder="数字を入力" class="input bg-gray-50 border-gray-200">
          </div>
        </div>
      </div>

      <div class="pb-4 mb-4 pt-20">
        <div class="pr-4 flex justify-center">
          <button class="btn rounded-full">冊子書き出しをする</button>
        </div>
      </div>


    </form>
  </div>

  <p class="text-center w-full">
    <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/" class="link link-hover link-primary text-sm">管理画面トップに戻る</a>
  </p>
  </div>
@endsection

