@if(isset($dataTypeContent->{$row->field}))
    @if(json_decode($dataTypeContent->{$row->field}))
        @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
   
        <br><a href="{{ CDN($file->download_link) }}" target="_blank"><img src="{{ CDN($file->download_link) }}" width="300"></a>
        @endforeach
    @else
        <a class="fileType" target="_blank" href="{{ Storage::disk(config('voyager.storage.disk'))->url($dataTypeContent->{$row->field}) }}"> Download </a>
    @endif
@endif
<input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif type="file"  data-name="{{ $row->display_name }}"  name="{{ $row->field }}[]" multiple="multiple">
