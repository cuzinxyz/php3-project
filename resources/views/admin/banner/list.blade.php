@extends('admin.layout.app')

@section('title', 'List banner | PH24363')
@section('heading-title', 'Banner Manager')
@section('heading-button')
    <a href="{{ route('banner.create') }}" class="btn btn-primary">Add Banner</a>
@endsection

@section('content')
    <blockquote class="quote-warning">
        <p id="note">Di chuột vào và click để <b>sửa</b> và <b>xoá</b> banner!</p>
    </blockquote>
    @foreach ($banners as $banner)
        <div class="image-container my-2">
            <a href="{{ route('banner.edit', $banner) }}" class="w-100">
                <img class="w-100 rounded" src="{{ asset('storage/' . $banner->image_url) }}" alt="">
                <div class="overlay">
                    <span class="titleBanner" title="{{ $banner->title }}">{{ $banner->title }}</span>
                </div>
            </a>
        </div>

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
                background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0, 0, 0, 0.5));
            }
            .image-container {
                position: relative;
                overflow: hidden;
            }
            .image-container img {
                height: 260px;
                object-fit: cover;
                transition: transform 0.3s ease;
            }
            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            .overlay span {
                color: #fff;
                font-size: 24px;
                font-weight: bold;
            }
            .image-container:hover img {
                transform: scale(1.1);
            }
            .image-container:hover .overlay {
                opacity: 1;
            }
        </style>
    @endforeach
@endsection
