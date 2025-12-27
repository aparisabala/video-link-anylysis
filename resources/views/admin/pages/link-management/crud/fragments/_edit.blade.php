<div class="bg-info pl-2 page-fragment-bar">
    <span class="text-light"> <a href="{{url('admin/link-management')}}"><span class="badge badge-info cursor-pointer"> <i class='fa-solid fa-arrow-left fs-16'></i></span></a> <span class="pt-1"> {{pxLang($data['lang'],'update')}}   </span> </span>
</div>
<div class="mt-4 p-3">
    <form id="frmUpdateVideoLink" autocomplete="off">
        @method('PATCH')
        <input type="hidden" id="patch_id" value="{{$data['item']?->id}}" />
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-2 shadow-card card-border">
                            <div class="form-group text-left mb-3">
                                <label class="form-label"> <b>{{pxLang($data['lang'],'fields.name')}}</b> <em class="required">*</em> <span id="name_error"></span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" id="name" value="{{$data['item']?->name}}">
                                </div>
                            </div>
                            <div class="form-group text-left mb-3">
                                <label class="form-label"> <b>{{pxLang($data['lang'],'fields.product_url')}}</b> <em class="required">*</em> <span id="product_url_error"></span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="product_url" id="product_url" value="{{$data['item']?->product_url}}">
                                </div>
                            </div>
                             <div class="form-group text-left mb-3">
                                <label class="form-label"> <b>{{pxLang($data['lang'],'fields.image')}}</b> <em class="required">*</em> <span id="image_error"></span></label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="image" id="image"/>
                                </div>
                            </div>
                            <div>
                                <img src="{{getRowImage(row: $data['item'],col:'image', ext: '80X80')}}" class="img-fluid" />
                            </div>
                            <div class="form-group text-left mb-3">
                                <label class="form-label"> <b>{{pxLang($data['lang'],'fields.content')}}</b> <em class="required">*</em> <span id="content_error"></span></label>
                                <div class="input-group">
                                    <textarea rows="4"  class="form-control" name="content" id="content">{{$data['item']?->content}}</textarea>
                                </div>
                            </div>
                            <div class="form-group text-left mb-3">
                                <label class="form-label"> <b>{{pxLang($data['lang'],'fields.keywords')}}</b> <em class="required">*</em> <span id="keywords_error"></span></label>
                                <div class="input-group">
                                    <textarea rows="4"  class="form-control" name="keywords" id="keywords">{{$data['item']?->keywords}}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 mt-3 text-end">
                                <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-save"></i> {{pxLang($data['lang'],'','common.btns.crud_action_update')}} </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
