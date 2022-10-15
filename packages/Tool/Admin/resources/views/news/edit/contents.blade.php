@extends('admin::layouts.app')
@section('title', $data['news']['name'].'｜お知らせ管理 - ' . config('myapp.site_name'))

@section('content')
  @include('admin::news.edit.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      お知らせ編集
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        {{$data['news']['name']}}の編集ができます
      </p>
    </div>
  </div>

  @include('common::form.errors')

  <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/news/{{$data['news']['id']}}"
        onsubmit="return confirm('変更を反映してもよろしいですか？')" method="post" accept-charset="UTF-8"
        id="NewsEditForm">
    @method('PUT')
    @csrf
    <div class="bg-white shadow-sm rounded mb-5 p-4">
      <table class="w-full text-sm text-left text-gray-500">
        <tbody>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            公開設定
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex">
              <input type="hidden" name="news[display]" value="0">
              <div class="form-control mr-6">
                <label class="label cursor-pointer">
                  <input type="checkbox" name="news[display]" value="1" id="NewsDisplay" class="toggle toggle-primary mr-2"
                          {{ (int)old('news.display', $data['news']['display']) === 1 ? 'checked' : '' }}>
                  <span class="label-text">一般公開</span>
                </label>
              </div>
              <input type="hidden" name="news[preview]" value="0">
              <div class="form-control mr-4">
                <label class="label cursor-pointer">
                  <input type="checkbox" name="news[preview]" value="1" id="NewsPreview" class="toggle toggle-primary mr-2"
                          {{ (int)old('news.preview', $data['news']['preview']) === 1 ? 'checked' : '' }}>
                  <span class="label-text">プレビュー</span>
                </label>
              </div>
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
            記事タイトル
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'news[name]',
              'id' => 'NewsName',
              'value' => old('news.name', $data['news']['name']),
              'placeholder' => '記事タイトルを入れてください',
              'ps' => '例：事業所が追加されました',
              'rows' => 5,
              'hasError' => $errors->has('news.name'),
              'errors' => $errors->get('news.name'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
            記事本文
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'news[body]',
              'id' => 'NewsBody',
              'value' => old('news.body', $data['news']['body']),
              'placeholder' => '記事本文を入れてください',
              'ps' => '',
              'rows' => 10,
              'hasError' => $errors->has('news.body'),
              'errors' => $errors->get('news.body'),
              ])
          </td>
        </tr>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            外部リンク
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'news[url]',
              'id' => 'NewsUrl',
              'value' => old('news.url', $data['news']['url']),
              'placeholder' => '関連外部リンクを入れてください',
              'ps' => '>例：https://www.sumutokoro.com',
              'hasError' => $errors->has('news.url'),
              'errors' => $errors->get('news.url'),
              ])
          </td>
        </tr>
        </tbody>
      </table>
    </div>

    <div class="w-full py-4 border-white bg-black bg-opacity-70
          fixed left-0 bottom-0
          flex justify-center items-center
          text-white
          z-200
          ">
      <input type="submit" value="お知らせを変更する"
             class="btn btn-wider px-12 text-lg rounded-full btn-hover tracking-wider" id="NewsSubmit">
    </div>
    <input type="hidden" id="NewsId" name="news[id]" value="{{$data['news']['id']}}">
  </form>

  <div class="bg-white shadow-sm rounded mb-5 p-4">
    <table class="w-full text-sm text-left text-gray-600">
      <tbody>
      <tr class="bg-white">
        <th class="py-4 px-4 w-1/5">
          最終更新
        </th>
        <td class="py-4 px-4 w-4/5">
          <p class="leading-6">
            {{date('Y/m/d H:i:s',  strtotime($data['news']['updated_at']))}}<br>
            {{$data['news']['user']['name']}}さん
          </p>
        </td>
      </tr>
      </tbody>
    </table>
  </div>

  <div class="bg-white shadow-sm rounded mb-10 p-4">
    <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/news/{{$data['news']['id']}}"
          onsubmit="return confirm('本当に{{$data['news']['name']}}を削除してもよろしいですか？（※元には戻せません）')" method="post"
          accept-charset="UTF-8" id="NewsDeleteForm">
      @method('DELETE')
      @csrf
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <tbody>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            記事の削除
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.delete', [
              'name' => 'お知らせ',
              'model' => 'news',
              'id' => 'NewsDelete',
              'dataId' => $data['news']['id'],
              'value' => old('news_delete.code'),
              'ps' => '※半角英数字で入力してください',
              'hasError' => $errors->has('news_delete.code'),
              'errors' => $errors->get('news_delete.code'),
              'hasConfirmationError' => $errors->has('news_delete.confirmation'),
              'confirmationErrors' => $errors->get('news_delete.confirmation'),
              ])
          </td>
        </tr>
        </tbody>
      </table>
    </form>
  </div>
@endsection

