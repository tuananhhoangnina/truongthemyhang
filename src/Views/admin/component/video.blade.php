@if (!empty($configMan->video))
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0"> 
                {{ $configMan->video->label }}
            </h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="upload-file">
                    <label class="upload-file-label w-100 mb-2" for="file">
                        <div class="upload-file-video rounded mb-3">
                            <video controls autoplay muted class="w-100">
                              <source class="w-100" 
                              src="{{upload('photo',$fileDetail['video'])}}"  
                              id="video_here">
                                Your browser does not support HTML5 video.
                            </video>
                        </div>
                        <div class="custom-file my-custom-file">
                            <input type="file" class="custom-file-input file_upload_video" name="video-{{$key}}" id="video-{{$key}}" lang="vi" accept="{{$configMan->video->accept}}" >
                            <label class="custom-file-label mb-0" data-browse="Chọn" for="video-{{$key}}">Chọn file</label>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
@endif


<script>
    $(document).on("change", ".file_upload_video", function(evt) {
        alert(2);
        var $source = $('#video_here');
        $source[0].src = URL.createObjectURL(this.files[0]);
        $source.parent()[0].load();
    });
</script>