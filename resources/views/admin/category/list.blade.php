@extends('admin.layout.app')

@section('heading-title', 'Category Manager')
@section('heading-button') 
<a href="{{ route('categories.create') }}" class="btn btn-primary">Add category</a>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Categories</h3>
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
                        <td>Title</td>
                        <td>Description</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $index = 1;
                    @endphp

                    @foreach ($categories as $category)     
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->getDescription() }}</td>
                            <td>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location.href='{{ route('categories.edit', $category) }}'">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Are you sure?')" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button> 

                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
