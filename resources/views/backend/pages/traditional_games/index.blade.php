@extends('backend.layouts.app', [
    'namePage' => 'Traditional Games',
    'class' => 'sidebar-mini',
    'activePage' => 'traditional_game',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Traditional Games List</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.traditional_games.create') }}">
                                <button class="btn btn-primary">Create</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>ID</th>
                                <th>Image Thumbnail</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($traditional_games as $traditional_game)
                                    <tr>
                                        <td>{{ $traditional_game->id }}</td>
                                        <td><img width="50px" src="{{ $traditional_game->image_thumbnail }}" alt=""></td>
                                        <td>{{ $traditional_game->title_en }}</td>
                                        <td><img width="50px" src="{{ $traditional_game->image }}" alt=""></td>
                                        <td>{{ $traditional_game->status }}</td>
                                        <td>{{ $traditional_game->created_at }}</td>
                                        <td>
                                            {{--                                            <button class="btn btn-warning" onclick="changeStatus({{ $restaurant->id }})">Approve / Reject</button>--}}
                                            <a href="{{ route('backend.traditional_games.edit',$traditional_game->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                            </a>
                                            <form method="post" action="{{ route('backend.traditional_games.destroy',$traditional_game->id) }}">
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
                        {{ $traditional_games->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
