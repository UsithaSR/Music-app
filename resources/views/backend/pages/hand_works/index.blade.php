@extends('backend.layouts.app', [
    'namePage' => 'Hand Works',
    'class' => 'sidebar-mini',
    'activePage' => 'hand_work',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Hand Work List</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.hand_works.create') }}">
                                <button class="btn btn-primary">Create</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>ID</th>
                                <th>Hand Work Category</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($hand_works as $hand_work)
                                    <tr>
                                        <td>{{ $hand_work->id }}</td>
                                        <td>{{ $hand_work->category->title_en }}</td>
                                        <td>{{ $hand_work->title_en }}</td>
                                        <td>{{ $hand_work->content_en }}</td>
                                        <td>{{ $hand_work->status }}</td>
                                        <td>{{ $hand_work->created_at }}</td>
                                        <td>
                                            {{--                                            <button class="btn btn-warning" onclick="changeStatus({{ $restaurant->id }})">Approve / Reject</button>--}}
                                            <a href="{{ route('backend.hand_works.edit',$hand_work->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                            </a>
                                            <form method="post" action="{{ route('backend.hand_works.destroy',$hand_work->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $hand_works->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
