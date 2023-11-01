@extends('layouts.app')
@section('title', 'Department Detail')

@section('content')
    <div class="card-head-icon">
        <i class='bx bxs-door-open' style="color: rgb(175, 20, 124);"></i>
        <div>{{ __('messages.dep.title') }} Detail</div>
    </div>

    <div class="card mt-3">
        <div class="d-flex justify-content-between m-3">
            <span>{{ __('messages.dep.title') }} Detail</span>

        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="DataTable">
                <tr>
                    <td width="20%">ID</td>
                    <td>{{ $department->id }}</td>
                </tr>
                <tr>
                    <td>{{ __('messages.dep.fields.name') }}</td>
                    <td>{{ $department->name }}</td>
                </tr>
            </table>
            <button class="btn btn-outline-secondary mt-3 back-btn">Back to List</button>
        </div>
    </div>
@endsection
