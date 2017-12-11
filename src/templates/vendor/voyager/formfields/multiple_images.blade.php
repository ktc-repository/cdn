<br>
@if(isset($dataTypeContent->{$row->field}))
    <?php $images = json_decode($dataTypeContent->{$row->field}); ?>
    @if($images != null)
        @foreach($images as $image)
            <div class="img_settings_container" data-field-name="{{ $row->field }}">
                <img src="{{ CDN( $image ) }}" data-image="{{ $image }}" data-id="{{ $dataTypeContent->id }}" width="300">
                <a href="#" class="voyager-x remove-multi-image"></a>
            </div>
            <br>
        @endforeach
    @endif
@endif
<div class="clearfix"></div>
<input @if($row->required == 1) required @endif type="file" data-name="{{ $row->display_name }}"  name="{{ $row->field }}[]" multiple="multiple">
