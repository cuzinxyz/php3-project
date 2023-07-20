@extends('admin.layout.app')

@section('heading-title', 'News Manager')
@section('heading-button') 
<a href="{{ route('blog.create') }}" class="btn btn-primary">Add news</a>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">News</h3>
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="300">Thumbnail</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $index = 1;
                    @endphp

                    @foreach ($blogs as $blog)     
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>
                                <img class="rounded" style="width: 200px; height: 200px; object-fit:cover" src="{{ asset('storage/'.$blog->thumbnail) }}" alt="">
                            </td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->getContent() }}</td>
                            <td>{{ $blog->getTime() }}</td>
                            <td>
                                <form action="{{ route('blog.destroy', $blog) }}" method="POST">
                                    @method('DELETE')

                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location.href='{{ route('blog.edit', $blog) }}'">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Are you sure?')" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button> 

                                    @csrf
                                </form>
                            </td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
