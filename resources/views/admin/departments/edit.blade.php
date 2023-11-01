@extends('layouts.app')
@section('title', 'Edit Department')

@section('content')
    <div class="card-head-icon">
        <i class='bx bxs-door-open' style="color: rgb(175, 20, 124);"></i>
        <div>Edit {{ __('messages.dep.title') }}</div>
    </div>
    <div class="card mt-3 p-4 mt-3">
        <span class="mb-4">{{ __('messages.dep.title') }} Edition</span>
        <form action="{{ route('admin.departments.update', $department->id) }}" method="post" id="department_update">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-3">
                        <label for="">{{ __('messages.dep.fields.name') }}</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ old('name', $department->name) }}">
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
    {!! JsValidator::formRequest('App\Http\Requests\Admin\UpdateDepartmentRequest', '#department_update') !!}
@endsection
