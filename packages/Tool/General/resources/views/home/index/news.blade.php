<section class="container mx-auto max-w-6xl px-6 pt-12 sm:px-8 md:px-12" id="News">
  <h2 class="text-center text-2xl sm:text-3xl md:text-4xl font-bold mb-8 md:mb-12">お知らせ</h2>
  <div class="shadow bg-white rounded-xl px-4 py-4 md:px-14 md:py-14">
    @if(!empty($data['news'][0]))
      <div class="w-full mb-10">
        <ul class="text-left">
          @foreach($data['news'] as $news)
            <li class="border-b border-gray-200">
              <a href="{{asset('/')}}news/{{$news['id']}}" class="block hover:bg-gray-50 px-1 py-3 md:px-3 md:py-6">
                <span class="text-gray-500 text-xs md:text-sm">{{$news['created_at']->format('Y年m月d日')}}</span><br>
                <span class="text-base md:text-lg">{{$news['name']}}</span>
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    @endif

    <p class="text-center">
      <a href="{{asset('/')}}news" class="btn btn-primary">すむところのお知らせをもっと見る</a>
    </p>
  </div>
</section>

