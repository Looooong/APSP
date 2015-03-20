$(document).ready(function()
{						
//Pagination			
function loading_show(){
$('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast');
}
function loading_hide(){
$('#loading').fadeOut('fast');
}                
function loadData(page){
loading_show();                    
$.ajax
({
type: "POST",
url: "load_datau.php",
data: "page="+page,
success: function(msg)
{
$("#containerdu").ajaxComplete(function(event, request, settings)
{
loading_hide();
$("#containerdu").html(msg);
$('table#filterTable2').columnFilters({alternateRowClassNames:['rowa','rowb']});
		$('table#filterTable2 > tbody > tr').click(function(){
			var url = "editrowu.php?id="+$(this).attr('rel')+"&height=130&width=520";
			tb_show("My Caption", url);
		});
});
}
});
}
loadData(1);  // For first time page load default results
$('#containerdu .pagination li.active').live('click',function(){
var page = $(this).attr('p');
loadData(page);
});           
$('#go_btn').live('click',function(){
var page = parseInt($('.goto').val());
var no_of_pages = parseInt($('.total').attr('a'));
if(page != 0 && page <= no_of_pages){
loadData(page);
}else{
alert('Enter a PAGE between 1 and '+no_of_pages);
$('.goto').val("").focus();
return false;
}
});
});