            <div class="flex items-center mb-3">
              <input id="{{$id}}"
                     type="text"
                     maxlength="255"
                     name="{{$model}}_delete[code]"
                     value="{{$value}}"
                     placeholder="「{{$model}}_{{$dataId}}」と入力して下さい"
                     class="mr-2 appearance-none border border-gray-200 w-2/4 text-ms block text-gray-700 placeholder-gray-300 rounded p-2 leading-normal focus:outline-primary focus:bg-white @if($hasError || $hasConfirmationError) bg-red-100 text-red-700 placeholder-red-300 border-red-500 @else border-gray-200 bg-gray-100 @endif">
              <button class="btn btn-sm bg-red-800 text-white border-red-800 border-none rounded px-4 py-2 cursor-pointer hover:bg-red-600"><i
                        class="fa-solid fa-trash-can mr-2" id="DeleteSubmit"></i>削除する
              </button>
            </div>
            @if($hasError)
              @foreach($errors as $error)
                <div class="text-red-700 text-sm flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                  </svg>
                  {{ $error }}
                </div>
              @endforeach
            @endif

            @if($hasConfirmationError)
              @foreach($confirmationErrors as $error)
                <div class="text-red-700 text-sm flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                  </svg>
                  {{ $error }}
                </div>
              @endforeach
            @endif

            <span class="inline-block leading-6 text-gray-500 text-xs">このデータを削除する場合は、上の入力項目に「<strong>{{$model}}_{{$dataId}}</strong>」と半角英数字で入力して「削除する」ボタンをクリックして下さい。また、{{$name}}データは一度消すと元には戻せませんのでご注意下さい。</span>

            <input type="hidden" name="{{$model}}_delete[id]" value="{{$dataId}}">
            <input type="hidden" name="{{$model}}_delete[confirmation]" value="{{$model}}_{{$dataId}}">