@extends('layouts.admin.app')

@section('title', translate('Add New Chef'))

@push('css_or_js')

@endpush

@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="d-flex flex-wrap gap-2 align-items-center mb-4">
        <h2 class="h1 mb-0 d-flex align-items-center gap-2">
            <img width="20" class="avatar-img" src="{{asset('public/assets/admin/img/icons/cooking.png')}}" alt="">
            <span class="page-header-title">
                {{translate('Add_New_Chef')}}
            </span>
        </h2>
    </div>
    <!-- End Page Header -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.kitchen.add-new')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="input-label" for="exampleFormControlSelect1">{{translate('Select Branch')}} <span class="text-danger">*</span></label>
                                    <select name="branch_id" class="custom-select" required>
                                        <option value="" selected disabled>{{ translate('--Select_Branch--') }}</option>
                                        @foreach($branches as $branch)
                                            <option value="{{$branch['id']}}">{{$branch['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">{{translate('First Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="f_name" class="form-control" id="f_name"
                                           placeholder="{{translate('Ex')}} : {{translate('John')}}" value="{{old('f_name')}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name">{{translate('Last Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="l_name" class="form-control" id="l_name"
                                           placeholder="{{translate('Ex')}} : {{translate('Doe')}}" value="{{old('l_name')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">{{translate('Phone')}} <span class="text-danger">*</span> {{translate('(with country code)')}}</label>
                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="phone"
                                           placeholder="{{translate('Ex')}} : +88017********" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name">{{translate('Email')}} <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email"
                                           placeholder="{{translate('Ex')}} : ex@gmail.com" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">{{translate('password')}} <span class="text-danger">*</span> {{translate('(minimum length will be 6 character)')}}</label>
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="{{translate('Password')}}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="confirm_password">{{translate('confirm_Password')}}<span class="text-danger">*</span></label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password"
                                       placeholder="{{translate('confirm Password')}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="name">{{translate('image')}} <span class="text-danger">*</span></label>
                                <span class="badge badge-soft-danger">( {{translate('ratio')}} 1:1 )</span>
                                <div class="form-group">
                                    <div class="custom-file text-left">
                                        <input type="file" name="image" id="customFileUpload" class="custom-file-input"
                                               accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                                        <label class="custom-file-label" for="customFileUpload">{{translate('choose')}} {{translate('file')}}</label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <img class="upload-img-view" id="viewer"
                                         src="{{asset('public\assets\admin\img\400x400\img2.jpg')}}" alt="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-3">
                            <button type="reset" id="reset" class="btn btn-secondary">{{translate('reset')}}</button>
                            <button type="submit" class="btn btn-primary">{{translate('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="{{asset('public/assets/admin')}}/js/select2.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });

        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>
@endpush
