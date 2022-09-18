<div class="bg-white py-12 sm:py-14 lg:py-20">
<div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
    <div class="max-w-4xl flex flex-col items-center text-center mx-auto">

      <h2 class="text-brown text-2xl sm:text-3xl md:text-4xl font-bold mb-8 md:mb-12">お知らせ</h2>

      @if(!empty($data['news'][0]))
        <div class="w-full mb-10 gap-2.5">
          <ul class="mb-5 border-t border-gray-200 text-left">
            @foreach($data['news'] as $news)
              <li class="border-b border-gray-200">
                <a href="{{asset('/')}}news/{{$news['id']}}" class="block hover:bg-gray-50 px-3 py-6">
                  <span class="text-gray-500 text-sm">{{$news['created_at']->format('Y年m月d日')}}</span><br>
                  <span class="text-accent hover:text-accent_light">{{$news['name']}}</span>
                </a>
              </li>
            @endforeach
          </ul>
          <p class="text-right"><a href="{{asset('/')}}news" class="text-accent hover:text-accent_light">過去のお知らせを見る</a></p>
        </div>
      @endif
    </div>
  </div>
</div>



