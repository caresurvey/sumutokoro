/**
 *
 * 管理画面の画像追加処理
 *
 */

$(document).ready(function () {
  // 削除候補ボタンクリック
  $('#UploadPhotoDeleteBtn').off('click');
  $("#UploadPhotoDeleteBtn").on('click', function(){
    // 非表示にする
    $("#UploadNotWillDelete").hide();
    // 表示にする
    $("#UploadWillDelete").show();
    // 削除flgをオンにする
    $("#UploadDeletePhotoHiddenFlg").val('true');
  });

  // 削除キャンセルボタンクリック
  $('#UploadPhotoCancelDeleteBtn').off('click');
  $("#UploadPhotoCancelDeleteBtn").on('click', function(){
    $("#UploadNotWillDelete").show();
    $("#UploadWillDelete").hide();
    // 削除flgをオフにする
    $("#UploadDeletePhotoHiddenFlg").val('false');
  });

  // 追加ボタンクリック
  $("#UploadPhotoFileForm").change(function(e){
    // ファイル情報を取得
    var fileData = e.target.files[0];

    // 画像ファイル以外は処理を止める
    if (!fileData.type.match('image.*')) {
      // アラートを出す
      alert('画像を選択してください');
      // 処理を止める
      return false;
    }

    // アップロード候補を表示する
    $("#UploadAddPhotoArea").show();

    // アップロード用のFileフォームをLabelごと非表示にする
    $("#UploadAddFormArea").hide();

    // アップロード候補キャンセルボタンが押されたら
    $('#UploadAddPhotoCancelBtn').off('click');
    $("#UploadAddPhotoCancelBtn").on('click', function(){
      // 確認メッセージを出して
      if(!confirm("この写真のアップロードをキャンセルしますか？")) return false;
      // アップロード候補を非表示にして
      $("#UploadAddPhotoArea").hide();
      // Fileフォームの値をクリアにして
      $("#UploadPhotoFileForm").val(null);
      // アップロードフォームを表示する
      $("#UploadAddFormArea").show();
    });

    // 選択したファイルをhiddenに書き込む
    uploadImage(fileData);
  });
});

/**
 * 画像をアップロードする
 */
function uploadImage(data)
{
  // ファイルリーダーインスタンス
  var fr = new FileReader();
  // 無名関数
  fr.onload=function(env) {
    document.getElementById("UploadAddPhoto").src = env.target.result;
    document.getElementById("UploadAddPhotoHiddenData").value = env.target.result;
  }
  // 実行
  fr.readAsDataURL(data);
}

