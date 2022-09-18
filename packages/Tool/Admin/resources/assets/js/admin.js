/**
 *
 * 共通処理
 *
 */

$(document).ready(function () {

    /**
     * スムーススクロール
     *
     */
    $('#PageTopBtn').on("click", function () {
        var speed = 500; //移動完了までの時間(sec)を指定
        var target = $("#Top");
        var position = target.offset().top;
        console.log('dsfaass');
        $("html, body").animate({scrollTop: position}, speed, "swing");
        return false;
    });

    // 背景をクリック（通常ダイアログ）
    $("#AdminDateInputBg").on("click", function () {
        $("#AdminDateInputArea").hide('fast');
    });

    // 背景をクリック（エラーダイアログ）
    $("#AdminDateNoBg").on("click", function () {
        $("#AdminDateNotInputArea").hide('fast');
    });

    /**
     * ログアウトボタン
     */
    $('#LogoutBtn').on("click", function () {
        if(!confirm('ログアウトしますか？')) {
            return false;
        }
    });
});


/**
 * ローディングを表示
 */
function showLoading()
{
    $("#LoadingArea").show();
}

/**
 * ローディングを非表示
 */
function hideLoading()
{
    $("#LoadingArea").hide();
}

/**
 * 画像をアップロードする
 */
function uploadImage(data)
{
  // ファイルリーダーインスタンス
  var fr = new FileReader();
  // 無名関数
  fr.onload=function(env) {
    document.getElementById("photoImage").src = env.target.result;
    document.getElementById("photoNoImage").style.display = "none";
  }
  // 実行
  fr.readAsDataURL(data);
}
