@extends('backend.layouts.app', [
    'namePage' => 'Settings',
    'class' => 'sidebar-mini',
    'activePage' => 'settings',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Update Settings</h4>
                    </div>
                    <div class="card-body">
                        <form id="setting_update" method="post" action="{{ route('backend.settings.update') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-10 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" App Settings")}}</label>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center item-raw-title" width="10%">Flatform</th>
                                                <th class="text-center item-raw-title" width="20%">Latest Version</th>
                                                <th class="text-center item-raw-title" width="20%">Force Update</th>
                                            </tr>
                                            </thead>
                                            <tbody id="ingredients_table">
                                            <tr>
                                                <td class="text-center">
                                                    <i class="fab fa-apple fa-2x"></i>
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-control" type="text" name="ios_new_version"
                                                           value="{{ old('ios_new_version', $app_settings["ios"]["new_version"]) }}">
                                                    @error('ios_new_version')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="ios_update_required"
                                                               value="1" {{ $app_settings["ios"]["update_required"]==1?"checked":"" }}>
                                                        <label class="form-check-label" for="ios_update_required">
                                                            Required
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="ios_update_required"
                                                               value="0" {{ $app_settings["ios"]["update_required"]==0?"checked":"" }}>
                                                        <label class="form-check-label" for="ios_update_required">
                                                            Not Required
                                                        </label>
                                                    </div>
                                                    @error('ios_update_required')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <i class="fab fa-android fa-2x"></i>
                                                </td>
                                                <td class="text-center">
                                                    <input class="form-control" type="text" name="android_new_version"
                                                           value="{{ old('android_new_version', $app_settings["android"]["new_version"]) }}">
                                                    @error('android_new_version')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="android_update_required"
                                                               value="1" {{ $app_settings["android"]["update_required"]==1?"checked":"" }}>
                                                        <label class="form-check-label" for="android_update_required">
                                                            Required
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="android_update_required"
                                                               value="0" {{ $app_settings["android"]["update_required"]==0?"checked":"" }}>
                                                        <label class="form-check-label" for="android_update_required">
                                                            Not Required
                                                        </label>
                                                    </div>
                                                    @error('android_update_required')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary btn-round">{{__('Update')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
