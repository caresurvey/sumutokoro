<div class="w-full mb-4 px-3 lg:w-xl xl:container xl:mx-auto">
  <div class="breadcrumbs">
    <ul class="text-xs sm:text-sm">
      <li><a href="{{asset('/')}}">ホーム</a></li>
      <li><a href="{{asset('/')}}user/">マイページ</a></li>
      <li><a href="{{asset('/')}}user/company">法人管理</a></li>
      <li><a href="{{asset('/')}}user/company/{{$data['company']['id']}}">法人編集</a></li>
    </ul>
  </div>
</div>