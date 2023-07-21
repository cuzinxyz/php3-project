@extends('admin.layout.app')

@section('title', 'Edit banner | PH24363')
@section('heading-title', 'Edit banner')
@section('heading-button')
    <a href="{{ route('banner.create') }}" class="mr-2 btn btn-primary">Add Banner</a>
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
            background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0, 0, 0, 0.5)), url({{ asset('storage/'.$banner->image_url) }});
        }
    </style>
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Banner</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('banner.update', $banner) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="type_name">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" onchange="loadTitle(event)" value="{{ $banner->title }}">
                </div>

                <input class="form-control form-control-sm" type="file" onchange="loadFile(event)" name="image_url" style="border: none">

                    <div class="w-100 rounded my-4" id="image">
                        <h1 id="titleRender">{{ $banner->title }}</h1>
                    </div>

                <div class="row w-100">
                    <button type="submit" class="btn btn-primary">Update banner</button>
                </div>
            </form>

            <div class="row d-flex justify-content-end">
                <form action="{{route('banner.destroy', $banner)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn text-danger" onclick="return confirm('Are you sure!')" type="submit">Remove <i class="fas fa-trash-alt"></i> </button>
                </form>
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
  </script>
@endsection
