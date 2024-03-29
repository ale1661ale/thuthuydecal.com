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
				success : function(data) {
					if(data.error == 'true')
					{
						$('.error').show();
						$('.error').text(data.message.name[0]);
					}
					else
					{
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
		
		// delete producttype
		$('.deleteProductType').click(function() {
			let id = $(this).data('id');
			$('.delProductType').click(function() {
				$.ajax({
					url : 'thuthuy/product-types/'+id,
					dataType : 'json',
					type : 'delete',
					success : function(data)
					{
						location.reload();
					}
				});
			});
		});

		// delete product
		$('.deleteProduct').click(function() {
			let id = $(this).data('id');
			$('.delProduct').click(function() {
				$.ajax({
					url : 'thuthuy/products/'+id,
					dataType : 'json',
					type : 'delete',
					success : function(data)
					{
						location.reload();
					}
				});
			});
		});

		// get producttype from category
		$('.id_cate').change(function() {
			let id_cate = $(this).val();

			$.ajax({
				url : 'get-product-type',
				dataType : 'json',
				type : 'get',
				data : 
				{
					id_cate : id_cate,
				},
				success : function(data)
				{
					//console.log(data);
					let html = '';
					$.each(data,function($key,$value){
						html += '<option value="'+$value['id']+'" selected >';
							html += $value['name'];
						html += '</option>';
					});
					$('.id_protype').html(html);
				}
			});
			
		});

		// get edit product form
		$('.editProduct').click(function () {
			let id = $(this).data('id');
			
			$.ajax({
				url : 'thuthuy/products/'+ id + '/edit',
				dataType : 'json',
				type : 'get',
				success : function(data)
				{
					$('.name').val(data.product.name);

					$('.imageThum').attr('src', 'img/upload/product/' + data.product.image);

					var id_cate = '';
					$.each(data.category, function($key, $value) {
						if (data.product.id_cate == $value['id'])
						{
							id_cate += '<option value=" ' + $value['id'] + ' " selected >';
								id_cate += $value['name'];
							id_cate += '</option>';
						}
						else
						{
							id_cate += '<option value=" ' + $value['id'] + ' " >';
								id_cate += $value['name'];
							id_cate += '</option>';
						}
					});
					$('.id_cate').html(id_cate);

					var id_protype = '';
					$.each(data.productType, function($key, $value) {
						if (data.product.id_protype == $value['id'])
						{
							id_protype += '<option value=" ' + $value['id'] + ' " selected >';
								id_protype += $value['name'];
							id_protype += '</option>';
						}
						else
						{
							id_protype += '<option value=" ' + $value['id'] + ' " >';
								id_protype += $value['name'];
							id_protype += '</option>';
						}
					});
					$('.id_protype').html(id_protype);

					if (data.product.status == 1)
					{
						$('.hien').attr('selected','selected');
						$('.an').removeAttr('selected','selected');
					}
					else
					{
						$('.an').attr('selected','selected');
						$('.hien').removeAttr('selected','selected');
					}
				}
			});
			$('#updateProduct').on('submit', function(event) {

				event.preventDefault();

				$.ajax({
					url : 'thuthuy/update-products/' +id,
					
					data : new FormData(this),

					contentType : false,

					processData : false,

					cache : false,

					type : 'post',

					success : function(data)
					{
						if (data.error == 'true')
						{
							if (data.message.name)
							{
								$('.errorName').show();

								$('.errorName').html(data.message.name[0]);
							}
							if (data.message.image)
							{
								$('.errorImage').show();

								$('.errorImage').html(data.message.image[0]);
							}
						}
						else
						{
							location.reload();
						}
					} 
				});
			});

		});

		// delete introduce
		$('.deleteIntroduce').click(function() {
			let id = $(this).data('id');
			$('.delIntroduce').click(function() {
				$.ajax({
					url : 'thuthuy/introduces/'+id,
					dataType : 'json',
					type : 'delete',
					success : function(data)
					{
						location.reload();
					}
				});
			});
		});

		$('.deleteAdmin').click(function() {

			let id = $(this).data('id');

			$('.delAdmin').click(function() {
				$.ajax({
					url : 'thuthuy/admins/'+id,
					dataType : 'json',
					type : 'delete',
					success : function(data)
					{
						location.reload();
					}
				});
			});
		});

		//show edit content type form
	$('.editContentType').click(function(){

		let id = $(this).data('id');
		
		//alert(id);
		
		$.ajax({
			url : 'thuthuy/content-types/' + id + '/edit',

			dataType : 'json',

			type : 'get',

			success : function (data)
			{
				$('.name').val(data.name);

				$('.contentTypeName').text(data.name);

				if (data.status == 1)
				{
					$('.hien').attr('selected','selected');
					$('.an').removeAttr('selected','selected');
				}
				else
				{
					$('.an').attr('selected','selected');
					$('.hien').removeAttr('selected','selected');
				}
			}
		});
		//update content type
		$('.updateContentType').click(function(){

			let name = $('.name').val();

			let status = $('.status').val();

			$.ajax({
				url : 'thuthuy/content-types/' +id,

				dataType : 'json',

				data : 
				{
					name : name,
					status : status,
				},

				type : 'put',
				success : function (data) 
				{
					if (data.error == 'true')
					{
						$('.error').show();
						$('.error').text(data.message.name[0]);
					}
					else
					{
						$('#editContentType').modal('hide');
						
                        location.reload();
					}
				}
			});
		});
	});

	// delete contents
	$('.deleteContent').click(function() {

		let id = $(this).data('id');

		$('.delContent').click(function() {
			$.ajax({
				url : 'thuthuy/contents/'+id,

				dataType : 'json',

				type : 'delete',

				success : function(data)
				{
					location.reload();
				}
			});
		});
	});

	// show edit ale form
	$('.editAle').click(function() {

		let id = $(this).data('id');

		//alert(id);

		$('.errorTitle').hide();
		$('.errorImage').hide();

		$.ajax({
			
			url : 'thuthuy/ales/' + id + '/edit',

			dataType : 'json',

			type : 'get',

			success : function(data)
			{
				$('.title').val(data.title);
				$('.key_name').val(data.key_name);
				$('.description').val(data.description);
				if (data.status == 1)
				{
					$('.hien').attr('selected','selected');
					$('.an').removeAttr('selected','selected');
				}
				else
				{
					$('.an').attr('selected','selected');
					$('.hien').removeAttr('selected','selected');
				}
				CKEDITOR.instances['demon'].setData(data.content);
  				$('.imageThum').attr('src','img/upload/ale/'+data.image);
			}
		});
		$('#updateAle').on('submit',function(event){

			event.preventDefault();

			$.ajax({
				url : 'thuthuy/update-ales/' +id,

				data : new FormData(this),

				contentType : false,

				processData : false,

				cache : false,

				type : 'post',

				success : function(data){
					//console.log(data);
					if (data.error == 'true')
					{
						if (data.message.title)
						{
							$('.errorTitle').show();
							$('.errorTitle').text(data.message.title[0]);
						}
						if (data.message.image)
						{
							$('.errorImage').show();
							$('.errorImage').text(data.message.image[0]);
						}
					}
					else
					{
						location.reload();
					}
				}
			});
		});
	});

	// delete ales
	$('.deleteAle').click(function() {

		let id = $(this).data('id');

		$('.delAle').click(function() {

			$.ajax({

				url : 'thuthuy/ales/' +id,
				
				dataType : 'json',
	
				type : 'delete',
	
				success : function(data)
				{
					location.reload();
				}
			});
		});
	});

	// delete image types
	$('.deleteImageType').click(function() {

		let id = $(this).data('id');

		$('.delImageType').click(function() {

			$.ajax({

				url : 'thuthuy/image-types/' +id,
				
				dataType : 'json',
	
				type : 'delete',
	
				success : function(data)
				{
					location.reload();
				}
			});
		});
	});


	$('#back').on('click', function(event) {

		event.preventDefault();
		
		history.go(-1);
	});

	// show edit logo form

	$('.editLogo').click(function() {

		let id = $(this).data('id');


		$('.errorName').hide();
		$('.errorImage').hide();

		$.ajax({

			url : 'thuthuy/logos/' +id+ '/edit',

			dataType : 'json',

			type : 'get',

			success : function(data)
			{
				$('.name').val(data.name);

				$('.link').val(data.link);

				$('.imageThum').attr('title', data.name);

				$('.description').val(data.description);

				if (data.status == 1)
				{
					$('.hien').attr('selected','selected');
					$('.an').removeAttr('selected','selected');
				}
				else
				{
					$('.an').attr('selected','selected');
					$('.hien').removeAttr('selected','selected');
				}

				if (data.id_image_type == 1)
				{
					$('.logo').attr('selected','selected');
					$('.doitac').removeAttr('selected','selected');
				}
				else
				{
					$('.doitac').attr('selected','selected');
					$('.logo').removeAttr('selected','selected');
				}

  				$('.imageThum').attr('src','img/upload/ale/'+data.image);
			}
		});
		$('#updateLogo').on('submit',function(event){

			event.preventDefault();

			$.ajax({
				url : 'thuthuy/update-logos/' +id,

				data : new FormData(this),

				contentType : false,

				processData : false,

				cache : false,

				type : 'post',

				success : function(data)
				{
					console.log(data);
					if (data.error == 'true')
					{
						if (data.message.name)
						{
							$('.errorName').show();
							$('.errorName').text(data.message.name[0]);
						}
						if (data.message.image)
						{
							$('.errorImage').show();
							$('.errorImage').text(data.message.image[0]);
						}
					}
					else
					{
						location.reload();
					}
				}
			});
		});
	});


	// delete logos
	$('.deleteLogo').click(function() {

		let id = $(this).data('id');

		$('.delLogo').click(function() {

			$.ajax({

				url : 'thuthuy/logos/' +id,
				
				dataType : 'json',
	
				type : 'delete',
	
				success : function(data)
				{
					location.reload();
				}
			});
		});
	});

	// show edit banner form

	$('.editBanner').click(function() {

		let id = $(this).data('id');


		$('.errorName').hide();
		$('.errorImage').hide();

		$.ajax({

			url : 'thuthuy/banners/' +id+ '/edit',

			dataType : 'json',

			type : 'get',

			success : function(data)
			{
				$('.name').val(data.name);
				$('.key_name').val(data.key_name);
				$('.link').val(data.link);
				$('.imageThum').attr('title', data.name);
				$('.description').val(data.description);
				if (data.status == 1)
				{
					$('.hien').attr('selected','selected');
					$('.an').removeAttr('selected','selected');
				}
				else
				{
					$('.an').attr('selected','selected');
					$('.hien').removeAttr('selected','selected');
				}
  				$('.imageThum').attr('src','img/upload/ale/'+data.image);
			}
		});
		$('#updateBanner').on('submit',function(event){

			event.preventDefault();

			$.ajax({
				url : 'thuthuy/update-banners/' +id,

				data : new FormData(this),

				contentType : false,

				processData : false,

				cache : false,

				type : 'post',

				success : function(data)
				{
					console.log(data);
					if (data.error == 'true')
					{
						if (data.message.name)
						{
							$('.errorName').show();
							$('.errorName').text(data.message.name[0]);
						}
						if (data.message.image)
						{
							$('.errorImage').show();
							$('.errorImage').text(data.message.image[0]);
						}
					}
					else
					{
						location.reload();
					}
				}
			});
		});
	});


	// delete banners
	$('.deleteBanner').click(function() {

		let id = $(this).data('id');

		$('.delBanner').click(function() {

			$.ajax({

				url : 'thuthuy/banners/' +id,
				
				dataType : 'json',
	
				type : 'delete',
	
				success : function(data)
				{
					location.reload();
				}
			});
		});
	});

	// show edit slide form

	$('.editSlide').click(function() {

		let id = $(this).data('id');


		$('.errorName').hide();
		$('.errorImage').hide();

		$.ajax({

			url : 'thuthuy/slides/' +id+ '/edit',

			dataType : 'json',

			type : 'get',

			success : function(data)
			{
				$('.name').val(data.name);
				$('.link').val(data.link);
				$('.imageThum').attr('title', data.name);
				$('.description').val(data.description);
				CKEDITOR.instances['demon'].setData(data.content);
				if (data.status == 1)
				{
					$('.hien').attr('selected','selected');
					$('.an').removeAttr('selected','selected');
				}
				else
				{
					$('.an').attr('selected','selected');
					$('.hien').removeAttr('selected','selected');
				}
  				$('.imageThum').attr('src','img/upload/ale/'+data.image);
			}
		});
		$('#updateSlide').on('submit',function(event){

			event.preventDefault();

			$.ajax({
				url : 'thuthuy/update-slides/' +id,

				data : new FormData(this),

				contentType : false,

				processData : false,

				cache : false,

				type : 'post',

				success : function(data)
				{
					//console.log(data);
					if (data.error == 'true')
					{
						if (data.message.name)
						{
							$('.errorName').show();
							$('.errorName').text(data.message.name[0]);
						}
						if (data.message.image)
						{
							$('.errorImage').show();
							$('.errorImage').text(data.message.image[0]);
						}
					}
					else
					{
						location.reload();
					}
				}
			});
		});
	});


	// delete slides
	$('.deleteSlide').click(function() {

		let id = $(this).data('id');

		$('.delSlide').click(function() {

			$.ajax({

				url : 'thuthuy/slides/' +id,
				
				dataType : 'json',
	
				type : 'delete',
	
				success : function(data)
				{
					location.reload();
				}
			});
		});
	});

	// delete messages
	$('.deleteMessage').click(function() {

		let id = $(this).data('id');

		$('.delMessage').click(function() {

			$.ajax({

				url : 'thuthuy/customer-messages/' +id,
				
				dataType : 'json',
	
				type : 'delete',
	
				success : function(data)
				{
					location.reload();
				}
			});
		});
	});

		


		
		
		
	
  	 	
});

































