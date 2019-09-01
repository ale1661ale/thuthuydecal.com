$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){

	//show edit category form
	$('.editCategory').click(function(){
        let id = $(this).data('id');
        //alert(id);
		$.ajax({
			url : 'thuthuy/categories/'+id+'/edit',
			dataType : 'json',
			type : 'get',
			success : function(data){
                console.log(data);
				$('.name').val(data.name);
				$('.categoryName').text(data.name);
				if(data.status == 1){
					$('.hien').attr('selected','selected');
					$('.an').removeAttr('selected','selected');
				}else{
					$('.an').attr('selected','selected');
					$('.hien').removeAttr('selected','selected');
				}
			}
		});
		//edit category
		$('.updateCategory').click(function(){
			let name = $('.name').val();
			let status = $('.status').val();
			$.ajax({
				url : 'thuthuy/categories/'+id,
				dataType : 'json',
				data : {
					name : name,
					status : status,
				},
				type : 'put',
				success : function(data){
					if(data.error == 'true'){
						$('.error').show();
						$('.error').text(data.message.name[0]);
					}else{
                        $('#editCategory').modal('hide');
                        location.reload();
					}
				}
			});
		});
	});

	$('#check_all').on('click', function(e) {

		if($(this).is(':checked',true))  

		{

		   $(".checkbox").prop('checked', true);  

		} else {  

		   $(".checkbox").prop('checked',false);  

		}  

	   });

		$('.checkbox').on('click',function(){

		   if($('.checkbox:checked').length == $('.checkbox').length){

			   $('#check_all').prop('checked',true);

		   }else{

			   $('#check_all').prop('checked',false);

		   }

		});

	
  	 	
});

































