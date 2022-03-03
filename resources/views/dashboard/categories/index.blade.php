@extends('dashboard/layouts/main')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Categories</h1>

</div>

<form action="/dashboard/categories/create" class="mb-3">
    @csrf
    <button class="btn btn-success">Create New Category</button>
</form>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@elseif(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-lg-8">
        <div class="table-responsive-sm my-4">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="min-width: 100px;">{{ $category->name }}</td>
                        <td style="min-width: 210px;">
                            <form action="/dashboard/categories/{{ $category->slug }}" class="d-inline-block">
                                @csrf
                                <button class="badge bg-info border-0"><span data-feather="eye"></span> view</button>
                            </form>
                            <form action="/dashboard/categories/{{ $category->slug }}/edit" class="d-inline-block">
                                @csrf
                                <button class="badge bg-warning border-0"><span data-feather="edit"></span>
                                    edit</button>
                            </form>
                            <form action="/dashboard/categories/{{ $category->slug }}" method="post"
                                class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Are You Sure To Delete It?')"><span
                                        data-feather="x-circle"></span>
                                    delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
