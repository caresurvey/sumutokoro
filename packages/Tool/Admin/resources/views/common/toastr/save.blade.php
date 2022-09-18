@if($errors->any())
    <?php // 入力内容があってかつ、バリデーションエラーの場合のtoastr ?>
    <script type="text/javascript">
        if ($('#ErrorMessages').length > 0) {
            toastr.error('お手数ですが入力内容をご確認下さい', 'エラーが発生しました');
        }
    </script>
@endif

@if(!empty(session('message')))
  @if(session('result')=== true)
      <?php // 入力内容があってかつ、保存成功の場合のtoastr ?>
      <script type="text/javascript">
          toastr.success('{{session('message')}}', '{{session('title')}}');
      </script>
  @else
      <?php // 入力内容があってかつ、保存成功の場合のtoastr ?>
      <script type="text/javascript">
          toastr.error('{{session('message')}}', '{{session('title')}}');
      </script>
  @endif
@endif
