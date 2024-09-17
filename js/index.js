/* ナビゲーションイメージ */
document.write('<script src="/js/jquery.imageNavigation.js" type="text/javascript"></script>');

/* パンフレット一覧 */
document.write('<script src="/js/index_pamph.js" type="text/javascript"></script>');


//学校更新情報
function schoolup(){
document.write('<script src="http://www.ishin.jp/school/up/?top" type="text/javascript"></script>');
}

//スライドバナー
document.write('<script src="/js/slidewrapper.js" type="text/javascript"></script>');
document.write('<script src="/js/modernizr-2.6.2.min.js" type="text/javascript"></script>');
document.write('<script src="/js/jquery.carouFredSel-6.2.1.js" type="text/javascript"></script>');
document.write('<script src="/js/swfobject.js" type="text/javascript"></script>');

//ローテーションバナー
function rotaFlash_ver2(str) {
  document.write('<iframe width="220" height="380" frameborder="0" title="おすすめ学校紹介" marginheight="0" marginwidth="0" scrolling="no" src="/rtbnr/rtbnr_ver2.php"></iframe>');
}