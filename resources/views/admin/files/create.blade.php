@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            @lang('models/notes.singular')
{{--            <img src="{{\Storage::url('/projects/vDNHUDGmxGUqTJHZhRs0hsSHeeuSK9V8KHc0SzoB.jpeg')}}" >--}}
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">

                    <h3 class="jumbotron"> {{__('models/files.msg')}}</h3>
                    <form method="post" action="{{url('file/upload/store')}}" enctype="multipart/form-data"
                          class="dropzone" id="dropzone">
                        <input type="number" hidden name="project_id" value="{{$project_id}}">
                        @csrf
                    </form>
                    @push('scripts')
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
                        <script type="text/javascript">
                            var storageLink = '{{ Storage::url('/') }}';
                            var name = '';
                            Dropzone.options.dropzone =
                                {
                                    maxFilesize: 12,
                                    renameFile: function (file) {
                                        var dt = new Date();
                                        var time = dt.getTime();
                                        return time + file.name;
                                    },
                                    acceptedFiles: ".jpeg,.jpg,.png,.gif,.txt,.docx,.pdf,.mp4",
                                    addRemoveLinks: true,
                                    timeout: 5000, removedfile: function (file) {
                                        $.ajax({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                            },
                                            type: 'POST',
                                            url: '{{ url("file/destroy") }}',
                                            data: {filename: name},
                                            success: function (data) {
                                                console.log("File has been successfully removed!!");
                                            },
                                            error: function (e) {
                                                console.log(e);
                                            }
                                        });
                                        var fileRef;
                                        return (fileRef = file.previewElement) != null ?
                                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                                    },
                                    success: function (file, response) {
                                        name = response;
                                        console.log(name);
                                        var link = storageLink +response;
                                        console.log(link) ;
                                        if(response != 0){
                                            // Download link
                                            var anchorEl = document.createElement('a');
                                            anchorEl.setAttribute('href',link);
                                            anchorEl.setAttribute('download','download');
                                            anchorEl.innerHTML = "<br>Download";
                                            file.previewTemplate.appendChild(anchorEl);
                                        }
                                    },
                                    error: function (file, response) {
                                        return false;
                                    }
                                };
                        </script>

                    @endpush

                </div>
            </div>
        </div>
    </div>
@endsection
