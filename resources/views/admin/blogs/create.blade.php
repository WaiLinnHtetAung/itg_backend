@extends('layouts.app')
@section('title', 'Create Blog')

@section('content')
    <div class="card-head-icon">
        <i class='bx bx-edit' style="color: rgb(175, 20, 124);"></i>
        <div>Create {{ __('messages.blog.title') }}</div>
    </div>
    <div class="card mt-3 p-4 mt-3">
        <span class="mb-4">{{ __('messages.blog.title') }} Creation</span>
        <form action="{{ route('admin.blogs.store') }}" method="post" id="blog_create" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-5">
                        <label for="">{{ __('messages.blog.fields.title') }}</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-5">
                        <label for="">{{ __('messages.blog.fields.author') }}</label>
                        <select name="author_id" id="" class="form-control select2"
                            data-placeholder="--- Please Select ---">
                            <option value=""></option>
                            @foreach ($users as $key => $value)
                                <option value="{{ $key }}" {{ old('author_id') == $key ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-5">
                        <label for="">{{ __('messages.blog.fields.date') }}</label>
                        <input type="text" class="form-control date" name="date" value="{{ old('date') }}"
                            autocomplete="off" placeholder="YYYY-MM-DD">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-3">
                        <label for="">{{ __('messages.blog.fields.photo') }}</label>
                        <input type="file" class="form-control" name="photo" onchange="showPreview(this);">
                        <img src="" alt="" class="mt-3" id="imgPreview">
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                    <div class="form-group mb-3">
                        <label for="">{{ __('messages.blog.fields.content') }}</label>
                        <textarea name="content" id="" cols="30" rows="10" class="cke-editor">{{ old('content', '') }}</textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
    {!! JsValidator::formRequest('App\Http\Requests\Admin\StoreBlogRequest', '#blog_create') !!}

    <script>
        const showPreview = (input) => {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#imgPreview').attr('src', e.target.result).width(150).height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
