@if(isset($dataTypeContent->{$row->field}))
<br>
    <img src="@if( !filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL)){{ CDN( $dataTypeContent->{$row->field} ) }}@else{{ CDN($dataTypeContent->{$row->field}) }}@endif"
        width="300">
@endif
<br>
<input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif type="file" data-name="{{ $row->display_name }}"  name="{{ $row->field }}">
