<section class="container mx-auto max-w-6xl mb-6 px-6 pt-12 sm:px-8 md:px-12 md:mb-20" id="News">
  <h2 class="text-center text-2xl sm:text-3xl md:text-4xl font-bold mb-8 md:mb-12">種類で選ぶ</h2>
  <div class="shadow bg-white rounded-xl p-4 md:px-10 md:py-14">

    @if(!empty($search['categories']))
      <ul class="grid gap-x-8 sm:gap-x-12 sm:grid-cols-2">
        @foreach($search['categories'] as $category)
          <li class="text-left tracking-wide text-sm sm:text-base">
            <a href="{{asset('/')}}spot?search[category]={{$category['id']}}&search[simple]=1"
               class="link-primary w-full inline-block rounded-full hover:bg-primary hover:text-white py-1 px-4 sm:py-2" id="CategoryId{{$category['id']}}">{{$category['name']}}（{{$category['spots_count']}}）</a>
          </li>
        @endforeach
      </ul>
    @endif

  </div>
</section>
