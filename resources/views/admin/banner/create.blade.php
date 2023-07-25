@extends('admin.layout.app')

@section('title', 'Add new banner | PH24363')
@section('heading-title', 'Add banner')
@section('heading-button')
    <a href="{{ route('banner.list') }}" class="btn btn-primary">Back</a>
@endsection

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap');

        #image {
            color: white;
            font-size: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Kaushan Script', cursive;
            height: 233px;
            background-position: center;
            background-size: cover;
            background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0, 0, 0, 0.5)), url(https://images.pexels.com/photos/1449767/pexels-photo-1449767.jpeg?cs=srgb&dl=pexels-asad-photo-maldives-1449767.jpg&fm=jpg);
        }
    </style>
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Banner</h3>
        </div>
        <div class="card-body">
                <style>
                    .list {
                        list-style-type: none;
                        flex: 0 0 20rem;
                    }
                    .list__item {
                        position: relative;
                    }
                    .list__item:hover > .label {
                        color: #009688;
                    }
                    .list__item:hover > .label::before {
                        border: 0.5rem solid #009688;
                        margin-right: 2rem;
                    }
                    .radio-btn {
                        position: absolute;
                        opacity: 0;
                        visibility: hidden;
                    }
                    .radio-btn:checked + .label {
                        color: #009688;
                    }
                    .radio-btn:checked + .label::before {
                        margin-right: 2rem;
                        border: 0.5rem solid #009688;
                        background: #fff;
                    }
                    .label {
                        display: flex;
                        align-items: center;
                        padding: 0.75rem 0;
                        color: #000b16;
                        font-size: 1.25rem;
                        text-transform: lowercase;
                        cursor: pointer;
                        transition: all 0.25s linear;
                        font-family: 'Kaushan Script', cursive;
                    }
                    .label::before {
                        display: inline-block;
                        content: "";
                        height: 2.125rem;
                        width: 2.125rem;
                        margin-right: 0.625rem;
                        border: 0.5rem solid #000;
                        border-radius: 50%;
                        transition: all 0.25s linear;
                    }
                </style>
                <ul class="list row">
                    <li class="list__item col-6 d-flex justify-content-center">
                        <input id="bannerType1" value="1" type="radio" class="radio-btn" name="banner_type" onchange="showBannerType(event)" />
                        <label for="bannerType1" class="label">Banner title!</label>
                    </li>

                    <li class="list__item col-6 d-flex justify-content-center">
                        <input id="bannerType2" value="2" type="radio" class="radio-btn" name="banner_type" onchange="showBannerType(event)" />
                        <label for="bannerType2" class="label">Banner product!</label>
                    </li>
                </ul>

            <div id="type1" style="display: none;">
                <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="type_name">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" onchange="loadTitle(event)">
                    </div>

                    <input class="form-control form-control-sm" type="file" onchange="loadFile(event)" name="image_url" style="border: none">

                    <div class="w-100 rounded my-4" id="image">
                        <h1 id="titleRender">Vacation!</h1>
                    </div>

                    <button type="submit" class="btn btn-primary">Add banner</button>
                </form>
            </div>

            <div id="type2" style="display: none;">
                <blockquote class="quote-primary">
                    <p id="note"><i>Enter để <b>tìm kiếm</b> bất động sản!</i></p>
                </blockquote>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form id="searchForm">
                            <div class="input-group">
                                <input type="search" id="search" class="form-control form-control-lg" name="search" placeholder="Type your property here">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-8" id="propertyList">

                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer">
            Banner
        </div>
    </div>

@endsection

@section('script')
<script>
    function loadFile(event) {
      const image = document.getElementById('image');
      const file = event.target.files[0];
      const reader = new FileReader();

      reader.onload = function() {
        image.style.backgroundImage = `linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0, 0, 0, 0.5)), url(${reader.result})`;
      }

      if (file) {
        reader.readAsDataURL(file);
      }
    }
    function loadTitle(event) {
        const titleInput = event.target;
        const title = titleInput.value;
        const heading = document.getElementById('image').querySelector('h1');
        heading.textContent = title;
    }
    function showBannerType(event) {
        const selectedType = event.target.value;
        const bannerType1Container = document.getElementById('type1');
        const bannerType2Container = document.getElementById('type2');

        if (selectedType === '1') {
            bannerType1Container.style.display = 'block';
            bannerType2Container.style.display = 'none';
        } else if (selectedType === '2') {
            bannerType1Container.style.display = 'none';
            bannerType2Container.style.display = 'block';
        }
    }

    // API
    $(document).ready(function () {
        $("#searchForm").on("submit", function (event) {
            event.preventDefault();

            var searchText = $("#search").val().trim();
            $.ajax({
                url: "/api/properties",
                method: "GET",
                dataType: "json",
                data: {
                    search: searchText
                },
                success: function (response) {
                    var propertyList = $("#propertyList");
                    propertyList.empty();

                    if (response.length > 0) {
                        $.each(response, function (index, property) {
                            propertyList.append(`
                            <div class="custom-control custom-radio my-3">
                                <input class="custom-control-input custom-control-input-danger"
                                type="radio"
                                id="${property.title}${property.id}"
                                name="property_id"
                                value="${property.id}">
                                <label
                                    for="${property.title}${property.id}"
                                    class="custom-control-label">
                                        ${property.title}
                                </label>
                                |
                                ${property.address}
                                |
                                ${property.price}
                            </div>
                            `);
                        });
                    } else {
                        propertyList.append("<p>No properties found.</p>");
                    }
                },
                error: function (error) {
                    console.error("Error:", error);
                }
            });
        });
    });
</script>
@endsection
