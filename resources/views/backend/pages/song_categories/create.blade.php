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
                    <div class="pull-right">
                        <a href="{{ route('backend.song_categories.index') }}">
                            <button class="btn btn-dark" style="margin-right: 15px;">Back</button>
                        </a>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title"> Create Song Category</h4>
                    </div>
                    <div class="card-body">
                        <form id="song_category_create" method="post" action="{{ route('backend.song_categories.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('backend.alerts.success')
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Title English")}}</label>
                                        <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}">
                                        @include('backend.alerts.feedback', ['field' => 'title_en'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Title Sinhala")}}</label>
                                        <input type="text" name="title_si" class="form-control" value="{{ old('title_si') }}">
                                        @include('backend.alerts.feedback', ['field' => 'title_si'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Title Tamil")}}</label>
                                        <input type="text" name="title_ta" class="form-control" value="{{ old('title_ta') }}">
                                        @include('backend.alerts.feedback', ['field' => 'title_ta'])
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary btn-round">{{__('Create')}}</button>
                            </div>
                            <hr class="half-rule"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--        <!-- Laravel Javascript Validation -->--}}
{{--        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>--}}
{{--        {!! JsValidator::formRequest('App\Http\Requests\CMS\SongCategoryCreateRequest', '#song_category_create') !!}--}}
@endsection
