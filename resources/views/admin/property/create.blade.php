@extends('admin.layout.app')

@section('title', 'Add new property | PH24363')
@section('heading-title', 'Add Property')

@section('heading-button')
    <a href="{{ route('property-type.create') }}" class="mr-2 btn btn-primary">Add type</a>
@endsection

@section('script')
    <script src="{{ asset('adm/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <script>
        tinymce.init({
            selector: 'textarea#default-editor',
            menubar: false,
            height: 230
        });
    </script>
    <script>
        $(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>
@endsection

@section('content')

    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Property Infomation</h3>
        </div>
        <div class="card-body">
            <form accept="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-8">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="title"
                            placeholder="Enter property name">
                    </div>
                    <div class="col-md-4">
                        <label for="property_type_id">Property Type:</label>
                        <select class="form-control" id="property_type_id" name="property_type_id">
                            <option value="">Select property type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row my-3">
                    <div class="col-md-8">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="default-editor" name="description" placeholder="Enter property description"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="area">Area:</label>
                        <input type="text" class="form-control" id="area" name="area" placeholder="Enter area">
                    </div>
                </div>

                <div class="form-row my-3">
                    <div class="col-md-4">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
                    </div>
                    <div class="col-md-4">
                        <label for="beds">Beds:</label>
                        <input type="text" class="form-control" id="beds" name="beds"
                            placeholder="Enter number of beds">
                    </div>
                    <div class="col-md-4">
                        <label for="baths">Baths:</label>
                        <input type="text" class="form-control" id="baths" name="baths"
                            placeholder="Enter number of baths">
                    </div>
                </div>

                <div class="form-row my-3">
                    <div class="col-md-8">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Enter property address">
                    </div>
                    <div class="col-md-4">
                        <label for="phone_number">Phone Number:</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            placeholder="Enter phone number">
                    </div>
                </div>

                <div class="form-row my-3">
                    <div class="col-md-8">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                </div>

                <style>
                    .upload__inputfile {
                        width: 0.1px;
                        height: 0.1px;
                        opacity: 0;
                        overflow: hidden;
                        position: absolute;
                        z-index: -1;
                    }

                    .upload__btn {
                        display: inline-block;
                        font-weight: 600;
                        color: #fff;
                        text-align: center;
                        min-width: 116px;
                        padding: 5px;
                        transition: all 0.3s ease;
                        cursor: pointer;
                        border: 2px solid;
                        background-color: #4045ba;
                        border-color: #4045ba;
                        border-radius: 10px;
                        line-height: 26px;
                        font-size: 14px;
                    }

                    .upload__btn:hover {
                        background-color: unset;
                        color: #4045ba;
                        transition: all 0.3s ease;
                    }

                    .upload__btn-box {
                        margin-bottom: 10px;
                    }

                    .upload__img-wrap {
                        display: flex;
                        flex-wrap: wrap;
                        margin: 0 -10px;
                    }

                    .upload__img-box {
                        width: 200px;
                        padding: 0 10px;
                        margin-bottom: 12px;
                    }

                    .upload__img-close {
                        width: 24px;
                        height: 24px;
                        border-radius: 50%;
                        background-color: rgba(0, 0, 0, 0.5);
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        text-align: center;
                        line-height: 24px;
                        z-index: 1;
                        cursor: pointer;
                    }

                    .upload__img-close:after {
                        content: '\2716';
                        font-size: 14px;
                        color: white;
                    }

                    .img-bg {
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;
                        position: relative;
                        padding-bottom: 100%;
                    }
                </style>
                <div class="form-row">
                    {{-- <div class="col-md-8">
                        <label for="images">Images:</label>
                        <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                    </div> --}}

                    <div class="upload__box mt-3 col-md-12">
                        <div class="upload__btn-box">
                            <label class="upload__btn">
                                <span>Upload images</span>
                                <input type="file" multiple="" class="upload__inputfile" name="images[]">
                            </label>
                        </div>
                        <div class="upload__img-wrap"></div>
                    </div>

                </div>
                @csrf
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
        <div class="card-footer">
            Property Infomation
        </div>
    </div>




@endsection
