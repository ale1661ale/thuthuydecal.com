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

});