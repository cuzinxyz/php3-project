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

            <div id="type1">
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
