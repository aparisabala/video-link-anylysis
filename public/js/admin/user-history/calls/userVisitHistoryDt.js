$(document).ready(function(){

    if ($("#dtUserVisitHistory").length > 0) {
        const {pageLang={}} = PX?.config;
        const {table={},btns={},text={}} = pageLang;
        let trigVieIpList = {
            body: {},
            modalCallback: 'loadModal',
            element: 'loadModal',
            script: 'admin/user-history/dt/user-visit-history/user-ip-list/display',
            title: text?.ip_list_title,
            globLoader: false
        };
        let col_draft = [
            {
                data: 'id',
                title: table?.id
            },
            {
                data: 'query_date',
                title: table?.query_date
            },
            {
                data: 'image',
                title: table?.product_image
            },
            {
                data: 'product.product_url',
                title: table?.product_url
            },

            {
                data: 'ips_count',
                title: table?.ips_count
            },
            {
                data: 'click_count',
                title: table?.click_count
            },
            {
                data: 'created_at',
                title: table?.created
            },

            {
                data: null,
                title: table?.action,
                class: 'text-end',
                render: function (data, type, row) {
                    trigVieIpList = {
                        ...trigVieIpList,
                        body: {id: data?.id},
                        title: text?.ip_list_title+"  - "+data?.product?.name
                    };
                    return `<span  data-bs-toggle='modal' data-bs-target='.editmodal' data-edit-prop='${JSON.stringify(trigVieIpList)}' class="btn btn-outline-info btn-sm edit" title="Edit">
                        ${btns?.check}
                    </span>`;
                }
            },
        ];
        PX.renderDataTable('dtUserVisitHistory', {
            select: true,
            url: 'admin/user-history/user-visit-history/list',
            columns: col_draft,
            pdf: [1, 2]
        });
    }
})

function dtUserVisitHistory(table, api, op) {
}
