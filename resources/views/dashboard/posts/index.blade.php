@extends('dashboard/layouts/main')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>

</div>

<div class="table-responsive-sm">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $index => $post)
            <tr>
                <td>{{ $index+1 }}</td>
                <td style="min-width: 180px;">{{ $post->title }}</td>
                <td style="min-width: 100px;">{{ $post->category->name }}</td>
                <td style="min-width: 100px;">{{ $post->created_at }}</td>
                <td style="min-width: 210px;">
                    <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline-block">
                        @csrf
                        <button class="badge bg-info"><span data-feather="eye"></span> view</button>
                    </form>
                    <form class="d-inline-block">
                        <button class="badge bg-warning"><span data-feather="edit"></span> edit</button>
                    </form>
                    <form class="d-inline-block">
                        <button class="badge bg-danger"><span data-feather="x-circle"></span> delete</button>
                    </form>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>
@endsection
