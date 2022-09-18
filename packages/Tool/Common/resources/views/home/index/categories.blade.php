<div class="bg-gray-100 py-12 sm:py-14 lg:py-20">
    <div class="max-w-4xl flex flex-col items-center text-center mx-auto">
      <h2 class="text-brown text-2xl sm:text-3xl md:text-4xl font-bold mb-8 md:mb-12">種類で選ぶ</h2>
      @if(!empty($data['categories']))
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-4 md:gap-x-6">
          @foreach($data['categories'] as $category_id => $category_name)
          <div class="text-left tracking-wide">
                <a href="{{asset('/')}}search/?category={{$category_id}}" class="text-accent hover:text-accent_light block hover:bg-gray-50 px-3 py-1">{{$category_name}}</a>
          </div>
            @endforeach
        </div>
      @endif
  </div>
</div>



