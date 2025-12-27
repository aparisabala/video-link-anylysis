@if($data['item'] != null)
    @if(count($data['items']) > 0)
        <table class="table table-striped dataTable">
            <thead>
                <tr>
                    <th>{{pxLang($data['lang'],'table.user_ip')}}</th>
                    <th>{{pxLang($data['lang'],'table.click_count')}}</th>
                    <th>{{pxLang($data['lang'],'table.created')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['items'] as $item)
                    <tr>
                        <td>{{$item?->user_ip}}</td>
                        <td>{{$item?->click_count}}</td>
                        <td>{{\Carbon\Carbon::parse($item?->creatd_at)->format('d M Y H:i a')}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p> No dada found</p>
    @endif
@else
    <div class='row'>
        <div class='col-md-12'>
            404 not found
        </div>
    </div>
@endif
