@extends('backend.layouts.app', [
    'namePage' => 'Proverbs',
    'class' => 'sidebar-mini',
    'activePage' => 'proverb',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Proverb List</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.proverbs.create') }}">
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
                                @foreach($proverbs as $proverb)
                                    <tr>
                                        <td>{{ $proverb->id }}</td>
                                        <td>{{ $proverb->title_en }}</td>
                                        <td>{{ $proverb->title_si }}</td>
                                        <td>{{ $proverb->title_ta }}</td>
                                        <td>{{ $proverb->status }}</td>
                                        <td>{{ $proverb->created_at }}</td>
                                        <td>
                                            {{--                                            <button class="btn btn-warning" onclick="changeStatus({{ $restaurant->id }})">Approve / Reject</button>--}}
                                            <a href="{{ route('backend.proverbs.edit',$proverb->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                            </a>
                                            <form method="post" action="{{ route('backend.proverbs.destroy',$proverb->id) }}">
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
                        {{ $proverbs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
