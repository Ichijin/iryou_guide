$(function () {
// 親
$('.drop_link_menu p').click(function() {
 $(this).next('ul').slideToggle('fast');
 });

 // 子
$('.med li').click(function() {
$(this).next('ul').slideToggle('fast');
});
});