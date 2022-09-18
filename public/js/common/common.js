$(function(){

    /**
     * ログアウトボタン
     */
    $(".logoutBtn").on('click', function(){
      if(!confirm("ログアウトしますか？")) return false;
    });
});

