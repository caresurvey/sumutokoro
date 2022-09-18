  @include('common::form.mapischanged')

            <div class="border border-gray-200 bg-gray-100 rounded mb-5 h-96 z-20 shadow" id="{{$id}}Map">
            </div>
            <div class="grid grid-cols-3 gap-4">
              <div class="mr-2">
                <span class="inline-block leading-6 text-gray-600 text-ms tracking-widest">緯度(LAT)</span>
                <input id="{{$id}}Lat"
                       type="text"
                       maxlength="20"
                       name="{{$name}}[lat]"
                       placeholder="43.0000"
                       value="{{$lat}}"
                       class="@error('hasLatError') bg-red-100 text-red-700 placeholder-red-300 border-red-500 @else border-gray-200 bg-gray-100 @enderror mb-1 appearance-none border border-gray-200 w-full text-sm block bg-gray-100 rounded p-2 leading-normal focus:outline-primary focus:bg-white">
                <span class="inline-block leading-6 text-gray-300 text-xs">例：43.0000</span>
                <input type="hidden" value="{{$lat}}" id="{{$id}}LatOld">
              </div>
              <div class="mr-3">
                <span class="inline-block leading-6 text-gray-600 text-ms tracking-widest">経度(LNG)</span>
                <input id="{{$id}}Lng"
                       type="text"
                       maxlength="20"
                       name="{{$name}}[lng]"
                       placeholder="143.00000"
                       value="{{$lng}}"
                       class="@error('hasLngError') bg-red-100 text-red-700 placeholder-red-300 border-red-500 @else border-gray-200 bg-gray-100 @enderror mb-1 appearance-none border border-gray-200 w-full text-sm block bg-gray-100 rounded p-2 leading-normal focus:outline-primary focus:bg-white">
                <span class="inline-block leading-6 text-gray-300 text-xs">例：143.0000</span>
                <input type="hidden" value="{{$lng}}" id="{{$id}}LngOld">
              </div>
              <div class="mr-2 space-x-4 flex items-center">
                <a class="btn btn-hover btn-sm"
                   id="GeoCodingBtn">住所から取得</a>
                <a class="btn btn-hover btn-sm"
                   id="BackToPosition">位置を戻す</a>
              </div>
            </div>

