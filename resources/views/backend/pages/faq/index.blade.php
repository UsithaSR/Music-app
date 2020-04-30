@extends('backend.layouts.app', [
    'namePage' => 'FAQ',
    'class' => 'sidebar-mini',
    'activePage' => 'faq',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> FAQ List</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.faq.create') }}">
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
                                <th>Content English</th>
                                <th>Content Sinhala</th>
                                <th>Content Tamil</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($faqs as $faq)
                                    <tr>
                                        <td>{{ $faq->id }}</td>
                                        <td>{{ $faq->title_en }}</td>
                                        <td>{{ $faq->title_si }}</td>
                                        <td>{{ $faq->title_ta }}</td>
                                        <td>{{ $faq->content_en }}</td>
                                        <td>{{ $faq->content_si }}</td>
                                        <td>{{ $faq->content_ta }}</td>
                                        <td>{{ $faq->status }}</td>
                                        <td>{{ $faq->created_at }}</td>
                                        <td>
{{--                                            <button class="btn btn-warning" onclick="changeStatus({{ $restaurant->id }})">Approve / Reject</button>--}}
                                            <a href="{{ route('backend.faq.edit',$faq->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                                </a>
                                            <form method="post" action="{{ route('backend.faq.destroy',$faq->id) }}">
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
                        {{ $faqs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
