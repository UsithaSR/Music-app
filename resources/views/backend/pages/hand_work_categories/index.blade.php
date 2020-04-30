@extends('backend.layouts.app', [
    'namePage' => 'Hand Work Categories',
    'class' => 'sidebar-mini',
    'activePage' => 'hand_work_category',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Hand Work Category List</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.hand_work_categories.create') }}">
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
                                @foreach($hand_work_categories as $hand_work_category)
                                    <tr>
                                        <td>{{ $hand_work_category->id }}</td>
                                        <td>{{ $hand_work_category->title_en }}</td>
                                        <td>{{ $hand_work_category->title_si }}</td>
                                        <td>{{ $hand_work_category->title_ta }}</td>
                                        <td>{{ $hand_work_category->status }}</td>
                                        <td>{{ $hand_work_category->created_at }}</td>
                                        <td>
                                            {{--                                            <button class="btn btn-warning" onclick="changeStatus({{ $restaurant->id }})">Approve / Reject</button>--}}
                                            <a href="{{ route('backend.hand_work_categories.edit',$hand_work_category->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                            </a>
                                            <form method="post" action="{{ route('backend.hand_work_categories.destroy',$hand_work_category->id) }}">
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
                        {{ $hand_work_categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
