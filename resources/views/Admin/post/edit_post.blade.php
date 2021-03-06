@extends('admin.index')
@push('scripts')
    <!-- dropify js -->
    <script src="{{ asset('admin/assets/libs/dropify/dropify.min.js') }}"></script>
    <script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('m_desc');
        CKEDITOR.replace('m_content');
    </script>
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        const renderPost = () => {
            $.ajax({
                type: "get",
                url: "{{ url('api/post/' . $data['id']) }}",
                success: function(response) {
                    $('input[name=m_title]').val(response.m_title);
                    $('input[name=m_slug]').val(response.m_slug);
                    CKEDITOR.instances.m_desc.setData(response.m_desc);
                    CKEDITOR.instances.m_content.setData(response.m_content);
                    $('input[name=m_meta_keyword]').val(response.m_meta_keyword);
                    $('input[name=m_meta_desc]').val(response.m_meta_desc);
                    response.m_status == 0 ? $('#hidden').prop("checked", true) : '';
                    $('.dropify').attr('data-default-file',
                        `{{ asset('uploads/post/${response.m_image}') }}`)
                    $('.dropify').dropify({
                        messages: {
                            'default': 'Drag and drop a file here or click',
                            'replace': 'Drag and drop or click to replace',
                            'remove': 'Remove',
                            'error': 'Ooops, something wrong appended.'
                        },
                        error: {
                            'fileSize': 'The file size is too big (1M max).'
                        }
                    });
                },
                error: function(error) {
                    toastr.error('L???i l???y th??ng tin b??i vi???t!', 'Vui l??ng ki???m tra l???i th??ng tin')
                }
            });
        }
        renderPost();

        $('.form-horizontal:first').submit(function(e) {
            e.preventDefault();
            let data = new FormData(this);
            data.set('m_desc', CKEDITOR.instances.m_desc.getData());
            data.set('m_content', CKEDITOR.instances.m_content.getData());
            $.ajax({
                url: '{{ url('api/post/' . $data['id']) }}',
                type: 'post',
                data,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success('S???a th??nh c??ng!', 'Xem danh s??ch ????? ki???m tra'),
                        renderPost();
                },
                error: function(error) {
                    console.log(error);
                    toastr.error('L???i s???a b??i vi???t!', 'Vui l??ng ki???m tra l???i th??ng tin')
                }
            });
        });
    </script>
@endpush
@push('styles')
    <!-- dropify -->
    <link href="{{ asset('admin/assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Ti??u ?????</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nh???p ti??u ?????"
                                                    name="m_title">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Slug</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nh???p slug"
                                                    name="m_slug">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">T??m t???t b??i vi???t</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" id="m_desc"  rows="5" placeholder="Nh???p t??m t???t b??i vi???t" name="m_desc"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">N???i dung b??i vi???t</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" id="m_content" rows="5" placeholder="Nh???p n???i dung b??i vi???t" name="m_content"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Meta t??? kh??a</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nh???p meta t??? kh??a"
                                                    name="m_meta_keyword">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Meta n???i dung</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nh???p meta n???i dung"
                                                    name="m_meta_desc">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Tr???ng th??i hi???n th???</label>
                                            <div class="col-md-10 row mt-1">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="hidden" name="m_status" value="0"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="hidden">???n</label>
                                                </div>
                                                <div class="custom-control custom-radio ml-4">
                                                    <input type="radio" id="show" name="m_status" value="1"
                                                        class="custom-control-input" @checked(true)>
                                                    <label class="custom-control-label" for="show">Hi???n</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">H??nh ???nh</label>
                                            <div class="col-md-4">
                                                <div class="card-box">
                                                    <input type="file" name="m_image" class="dropify"
                                                        data-default-file="" />
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                S???a b??i vi???t
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                                H???y
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                    </div> <!-- end card-box -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
