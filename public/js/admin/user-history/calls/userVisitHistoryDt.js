$(document).ready(function(){

    if ($("#dtUserVisitHistory").length > 0) {
        const {pageLang={}} = PX?.config;
        const {table={}} = pageLang;
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
                    return `<span class="btn btn-outline-secondary btn-sm edit" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
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
