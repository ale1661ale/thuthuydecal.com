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
		//update category
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

		//show edit product-type form
		$('.editProType').click(function() {

			let id = $(this).data('id');
			
			$.ajax({
				url : 'thuthuy/product-types/' + id + '/edit',
				dataType : 'json',
				type : 'get',
				success : function(data) 
				{
					$('.productTypeName').text(data.producttype.name);

					$('.name').val(data.producttype.name);

					$('.slug').val(data.producttype.slug);

					if (data.producttype.status == 1)
					{
						$('.hien').attr('selected','selected');
						$('.an').removeAttr('selected','selected');
					}
					else
					{
						$('.an').attr('selected','selected');
						$('.hien').removeAttr('selected','selected');
					}

					var getCategory = '';
					$.each(data.category, function($key, $value) {

						if ($value['id'] == data.producttype.id_cate)
						{
							getCategory += '<option value=" '+ $value['id']+' " selected>';

								getCategory += $value['name'];

							getCategory += '</option>';
						}
						else
						{
							getCategory += '<option value=" '+ $value['id']+' ">';

								getCategory += $value['name'];

							getCategory += '</option>';
						}
					});
					$('.id_cate').html(getCategory);

					if (data.producttype.hot == 1)
					{
						$('.noibat').attr('selected','selected');

						$('.thuong').removeAttr('selected','selected');
					}
					else
					{
						$('.thuong').attr('selected','selected');

						$('.noibat').removeAttr('selected','selected');
					}
				}
			});
			
			// update producttype
			$('.updateProType').click(function() {
				let name = $('.name').val();
			
				let hot = $('.hot').val();
				
				let id_cate = $('.id_cate').val();
				
				let status = $('.status').val();

				$.ajax({
					url : 'thuthuy/product-types/'+id,
					dataType : 'json',
					data : 
					{
						name : name,
						hot : hot,
						id_cate : id_cate,
						status : status
					},
					type : 'put',
					success : function(data)
					{
						console.log(data);
						if (data.error == 'true')
						{
							$('.errorName').text(data.message.name[0])
						}
						else
						{
							$('#editProType').modal('hide');
							location.reload();
						}
					}
				});
			});
		});

		
	
  	 	
});

































