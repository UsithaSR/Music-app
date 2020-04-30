@extends('backend.layouts.app', [
    'namePage' => 'Song Categories',
    'class' => 'sidebar-mini',
    'activePage' => 'song_category',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Song Category List</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.song_categories.create') }}">
                                <button class="btn btn-primary">Create</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>ID</th>
                                <th>Title English</th>
                                <th>Title Sinhala</th>
                                <th>Title Tamil</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($song_categories as $song_category)
                                    <tr>
                                        <td>{{ $song_category->id }}</td>
                                        <td>{{ $song_category->title_en }}</td>
                                        <td>{{ $song_category->title_si }}</td>
                                        <td>{{ $song_category->title_ta }}</td>
                                        <td>{{ $song_category->status }}</td>
                                        <td>{{ $song_category->created_at }}</td>
                                        <td>
                                            {{--                                            <button class="btn btn-warning" onclick="changeStatus({{ $restaurant->id }})">Approve / Reject</button>--}}
                                            <a href="{{ route('backend.song_categories.edit',$song_category->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                            </a>
                                            <form method="post" action="{{ route('backend.song_categories.destroy',$song_category->id) }}">
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
                        {{ $song_categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
