@extends('layouts.app')
@section('title', 'Edit Position')

@section('content')
    <div class="card-head-icon">
        <i class='bx bxs-user-check' style="color: rgb(175, 20, 124);"></i>
        <div>Edit {{ __('messages.positions.title') }}</div>
    </div>
    <div class="card mt-3 p-4 mt-3">
        <span class="mb-4">{{ __('messages.positions.title') }} Edition</span>
        <form action="{{ route('admin.positions.update', $position->id) }}" method="post" id="position_create">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-3">
                        <label for="">{{ __('messages.positions.fields.name') }}</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ old('name', $position->name) }}">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-3">
                        <label for="">{{ __('messages.positions.fields.dep') }}</label>
                        <select name="department_id" id="" class="select2 form-control">
                            <option value=""></option>
                            @foreach ($departments as $key => $value)
                                <option value="{{ $key }}"
                                    {{ old('department_id') || $position->department_id == $key ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-secondary back-btn">Cancel</button>
                    <button class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\StorePositionRequest', '#position_create') !!}
@endsection
