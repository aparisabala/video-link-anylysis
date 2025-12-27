$(document).ready(function(){
     new Swiper('.swiper', {
        direction: 'horizontal',
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        speed: 600,
    });
    $(".onClickProduct").on("click",function(){
        let id = $(this).attr('data-id');
        PX?.ajaxRequest({
            element: 'elment',
            dataType: 'json',
            body: {id},
            type: 'request',
            script: 'site/post-url',
            afterSuccess: {
                type: 'api_response',
                afterLoad: (req,res) => {
                    window.open(res?.extraData?.product?.product_url,'_blank');
                }
            }
        });
    })
})
