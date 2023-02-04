
$(function () {
  $(".js-example-basic-single").select2({
    tags:false
  });
$(".js-species-select").select2({
    tags:false
});
});
$('.checkbox_wrapper').on('click',function(){
  $(this).parents('.card').find('.checkbox_children').prop('checked',$(this).prop('checked'));
});
$('.checkall').on('click',function(){
  $(this).parents().find('.checkbox_children').prop('checked',$(this).prop('checked'));
  $(this).parents().find('.checkbox_wrapper').prop('checked',$(this).prop('checked'));
});