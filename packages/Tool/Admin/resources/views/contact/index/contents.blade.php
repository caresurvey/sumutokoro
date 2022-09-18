@extends('admin::layouts.app')
@section('title', 'お問い合わせ｜' . config('myapp.site_name'))

@section('content')
  @include('admin::user.index.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      お問い合わせ
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        ユーザーのお問い合わせ一覧を閲覧できます。
      </p>
    </div>
  </div>

  @if(!empty($data['contacts'][0]))
    <div class="bg-white shadow-sm rounded p-4">
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
        <tr>
          <th class="py-2 px-2 w-1/12">
            <div class="tooltip sortable-link" data-tip="IDを基準に並び替えます">
              @sortablelink('id','ID')
            </div>
          </th>
          <th class="py-2 px-2 w-2/12">
            <div class="tooltip sortable-link" data-tip="問合せ日を基準に並び替えます">
              @sortablelink('created_at','問合せ日')
            </div>
          </th>
          <th class="py-2 px-2 w-5/12">
            <div class="tooltip sortable-link" data-tip="お名前を基準に並び替えます">
              @sortablelink('name','お名前')
            </div>
          </th>
          <th class="py-2 px-2 w-3/12">
            <div class="tooltip sortable-link" data-tip="希望する返答方法を基準に並び替えます">
              @sortablelink('reply','返答方法')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">
            操作
          </th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['contacts'] as $value)
          <tr class="bg-white border-b even:bg-gray-50">
            <td class="py-2 px-2">{{$value['id']}}</td>
            <td class="py-2 px-2">{{$value['created_at']->format("y/m/d H:m")}}</td>
            <td class="py-2 px-2"><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/contact/{{$value['id']}}" class="link link-primary link-hover">{{$value['name']}}さん</a></td>
            <td class="py-2 px-2">{{$value['reply']}}</td>
            <td><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/contact/{{$value['id']}}" class="btn btn-hover btn-xs rounded-full">確認</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>

      {!! $data['linkTag'] !!}

    </div>
  @else
    <div class="bg-white shadow-sm rounded px-4 py-40 text-center">
      ログが見つかりませんでした。
    </div>
  @endif
@endsection

