@extends('client.layout.app')

@section('title')
{{ $blog->title . ' - ' . $blog->category_name }} | EstatePing
@endsection

@section('content')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{ $blog->title }}</h1>
            <span class="color-text-a">{{ $blog->category_name }}</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('category', $blog->category_id) }}">
                  {{ $blog->category_name }}
                </a>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ News Single Star /-->
  <section class="news-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="news-img-box text-center">
            <img src="{{ asset('storage/'.$blog->thumbnail) }}" style="height: 474px;object-fit:contain" alt="" class="img-fluid">
          </div>
        </div>
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
          <div class="post-information">
            <ul class="list-inline text-center color-a">
              <li class="list-inline-item mr-2">
                <strong>Author: </strong>
                <span class="color-text-a">{{ $blog->user_id }}</span>
              </li>
              <li class="list-inline-item mr-2">
                <strong>Category: </strong>
                <span class="color-text-a">{{ $blog->category_name }}</span>
              </li>
              <li class="list-inline-item">
                <strong>Date: </strong>
                <span class="color-text-a">{{ $blog->created_at->diffForHumans() }}</span>
              </li>
            </ul>
          </div>
          <div class="post-content color-text-a">
            {!! $blog->content !!}
            {{-- <p class="post-intro">
              Sed porttitor lectus nibh. Lorem ipsum dolor sit amet, consectetur
              <strong>adipiscing</strong> elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
              Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
            </p>
            <p>
              Proin eget tortor risus. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum
              porta. Pellentesque
              in ipsum id orci porta dapibus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet
              dui. Lorem ipsum dolor sit amet.
            </p>
            <p>
              Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac
              lectus. Curabitur
              non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Curabitur non
              nulla sit amet nisl tempus convallis quis ac lectus. Donec rutrum congue leo eget malesuada.
              Quisque velit nisi.
            </p>
            <blockquote class="blockquote">
              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              <footer class="blockquote-footer">
                <strong>Albert Vargas</strong>
                <cite title="Source Title">Author</cite>
              </footer>
            </blockquote>
            <p>
              Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit. Vivamus suscipit
              tortor eget felis
              porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim.
            </p> --}}
          </div>
          <div class="post-footer">
            <div class="post-share">
              <span>Share: </span>
              <ul class="list-inline socials">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ News Single End /-->

@endsection
