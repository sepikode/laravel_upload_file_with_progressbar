@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload File With Progressbar') }}</div>

                <div class="card-body">

                    <form id="uploadForm" method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <input name="file" type="file" class="form-control" required>
                        </div>
                        <div class="d-grid mb-3">
                            <input type="submit" value="Submit" id="subdata" class="btn btn-primary">
                        </div>
                        <div class="form-group">
                            <div class="progress sepik">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        $(document).ready(function () {

            $('#uploadForm').ajaxForm({
                beforeSend: function () {
                    var percentage = '0';
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    var percentage = percentComplete;
                    $('.progress .progress-bar').css("width", percentage+'%', function() {
                      return $(this).attr("aria-valuenow", percentage) + "%";
                    })
                },
                complete: function (xhr) {
                    window.location = '{{ url('home') }}';

                }
            });
        });
    });
</script>
@endpush
