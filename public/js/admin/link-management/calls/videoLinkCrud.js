$(document).ready(function(){

    // if($("#image").length > 0) {
    //     PX?.initCropper('image',{
    //        outputWidth: 640,
    //        outputHeight: 360,
    //        mimeType: 'image/jpeg',
    //        maxFileSize: 200000,
    //        boundingBox: { width: 200, height: 113 },
    //        quality: 1
    //    });
    // }

    if ($('#frmStoreVideoLink').length > 0) {
        let rules = {
            name: {
                required: true,
                maxlength: 253
            },
            product_url: {
                required: true,
                maxlength: 253
            },
            image: {
                required: true,
                maxlength: 253
            },
            content: {
                required: false,
            }
        };
        PX.ajaxRequest({
            element: 'frmStoreVideoLink',
            validation: true,
            script: 'admin/link-management',
            rules,
            afterSuccess: {
                type: 'inflate_reset_response_data',
            }
        });
    }

    if ($('#frmUpdateVideoLink').length > 0) {
        let rules = {
            name: {
                required: true,
                maxlength: 253
            },
            product_url: {
                required: true,
                maxlength: 253
            },
            content: {
                required: false,
            }
        };
        PX.ajaxRequest({
            element: 'frmUpdateVideoLink',
            validation: true,
            script: 'admin/link-management/'+$("#patch_id").val(),
            rules,
            afterSuccess: {
                type: 'inflate_redirect_response_data',
            }
        });
    }

    if ($("#dtVideoLink").length > 0) {
        const {pageLang={}} = PX?.config;
        const {table={}} = pageLang;
        let col_draft = [
            {
                data: 'id',
                title: table?.id
            },
            {
                data: null,
                title: table?.serial,
                class: 'text-center',
                width: '200px',
                render: function (data, type, row) {
                    return `<input type="number" value="` + data.serial + `" class="form-control serial"><input type="hidden" value="` + data.id + `" class="form-control ids">`;
                }
            },
            {
                data: 'name',
                title: table?.name
            },
            {
                data: 'image',
                title: table?.image
            },
            {
                data: 'product_url',
                title: table?.product_url
            },
            {
                data: 'unique_count',
                title: table?.unique_count
            },
            {
                data: 'total_click',
                title: table?.total_click
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
                    return `<a href="${baseurl}admin/link-management/${data.id}/edit" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                    </a>`;
                }
            },
        ];
        PX.renderDataTable('dtVideoLink', {
            select: true,
            url: 'admin/link-management/list',
            columns: col_draft,
            pdf: [1, 2]
        });
    }
})

function dtVideoLink(table, api, op) {
    PX.deleteAll({
        element: "deleteAllVideoLink",
        script: "admin/link-management/delete-list",
        confirm: true,
        api,
    });
    PX.updateAll({
        element: "updateAllVideoLink",
        script: "admin/link-management/update-list",
        confirm: true,
        dataCols: {
            key: "ids",
            items: [
                {
                    index: 1,
                    name: "ids",
                    type: "input",
                    data: [],
                },
                {
                    index: 1,
                    name: "serial",
                    type: "input",
                    data: []
                }
            ]
        },
        api,
        afterSuccess: {
            type: "inflate_response_data"
        }
    });
    PX?.dowloadPdf({ ...op, btn: "downloadVideoLinkPdf", dataTable: "yes" })
    PX?.dowloadExcel({ ...op, btn: "downloadVideoLinkExcel", dataTable: "yes" })
}
