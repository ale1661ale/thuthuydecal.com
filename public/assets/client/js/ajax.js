$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {

    $('.exampleModal').click(function() {
        let id = $(this).data('id');

        $.ajax({
            url : 'detail/' +id,
            type : 'get',
            dataType : 'json',
            success : function(data)
            {
                $('.productName').html(data.name);

                $('.productPromotion').html(data.promotion.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')+' VNĐ');

                $('.productPrice').html(data.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')+' VNĐ');

                $('.productDescription').html(data.description);

                $('.productImage').attr('src', 'img/upload/product/'+data.image);

                $('.addToCart').attr('href', 'add-to-cart/'+id);

                if (data.sold_out == 1)
                {
                    $('.sold_out').val('CÒN HÀNG');
                }
                else
                {
                    $('.sold_out').val('HẾT HÀNG');
                }
            }
        });
    });

    $('.qty').blur(function() {

        let rowId = $(this).data('id');

        $.ajax({

            url : 'carts/' +rowId,

            dataType : 'json',

            type : 'put',
            
            data : 
            {
                qty : $(this).val(),
            },

            success : function(data)
            {
                location.reload();
            }

        });
    });

    $('.deleteCart').click(function() {
        
        let rowId = $(this).data('id');

        $('.delCart').click(function() {
            
            $.ajax({

                url : 'carts/' +rowId,
                dataType : 'json',
                type : 'delete',
                success : function(data)
                {
                    toastr.success(data.thongbao, 'Thông báo', {timeOut : 5000});
                    
                    location.reload();
                }
            });
        });
    });

});