@extends('admin.index')
@push('scripts')
    <!-- dropify js -->
    <script src="{{ asset('admin/assets/libs/dropify/dropify.min.js') }}"></script>
    <!-- form-upload init -->
    <script src="{{ asset('admin/assets/js/pages/form-fileupload.init.js') }}"></script>
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

        $('.form-horizontal').submit(function(e) {
            e.preventDefault();
            let data = new FormData(this);
            data.set('m_desc', CKEDITOR.instances.m_desc.getData());
            data.set('m_content', CKEDITOR.instances.m_content.getData());
              $.ajax({
                url: '{{ url('api/user') }}',
                type: 'post',
                data,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    $(':reset').click();
                    $('.dropify-clear:first').click();
                    toastr.success('Thêm thành công!', 'Xem danh sách để kiểm tra')
                },
                error: function(error) {
                    console.log(error);
                    toastr.error('Lỗi thêm bài viết!', 'Vui lòng kiểm tra lại thông tin')
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
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <input type="hidden" value="{{Auth::id()}}" name="m_id_user">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Họ và tên</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nhập họ và tên"
                                                    name="m_title">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nhập email"
                                                    name="m_slug">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Số điện thoại</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nhập số điện thoại"
                                                    name="m_meta_keyword">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Phân quyền</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nhập quyền"
                                                    name="m_meta_desc">
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Trạng thái hiển thị</label>
                                            <div class="col-md-10 row mt-1">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="hidden" name="m_status" value="0"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="hidden">Ẩn</label>
                                                </div>
                                                <div class="custom-control custom-radio ml-4">
                                                    <input type="radio" id="show" name="m_status" value="1"
                                                        class="custom-control-input" @checked(true)>
                                                    <label class="custom-control-label" for="show">Hiện</label>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Avatar</label>
                                            <div class="col-md-4">
                                                <div class="card-box">
                                                    <input type="file" name="m_image" class="dropify"
                                                        data-default-file="" />
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                Thêm tài khoản
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                                Hủy
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