$(function(){
  // ------------------------
  // Tabs
  // ------------------------
  $("#ListTypeGeneralBtn").on('click', function(){
    hideTabs();
    $("#ListTypeGeneral").removeClass('hidden');
    $("#ListTypeGeneralBtn").addClass('border-b-2');
    $("#ListTypeGeneralBtn").addClass('border-primary');
    $("#ListTypeGeneralBtn").addClass('text-primary');
  });

  $("#ListTypeSimpleBtn").on('click', function(){
    hideTabs();
    $("#ListTypeSimple").removeClass('hidden');
    $("#ListTypeSimpleBtn").addClass('border-b-2');
    $("#ListTypeSimpleBtn").addClass('border-primary');
    $("#ListTypeSimpleBtn").addClass('text-primary');
  });

  $("#ListTypeTextBtn").on('click', function(){
    hideTabs();
    $("#ListTypeText").removeClass('hidden');
    $("#ListTypeTextBtn").addClass('border-b-2');
    $("#ListTypeTextBtn").addClass('border-primary');
    $("#ListTypeTextBtn").addClass('text-primary');
  });

});

function hideTabs()
{
  $(".list-type-tab").addClass('hidden');
  $(".list-type-buttons").removeClass('border-b-2')
  $("#ListTypeGeneralBtn").addClass('border-primary');
  $(".list-type-buttons").removeClass('text-accent')
}
