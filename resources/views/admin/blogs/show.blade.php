@extends('layouts.app')
@section('title', 'Blog Detail')

@section('content')
    <div class="card-head-icon">
        <i class='bx bx bx-edit' style="color: rgb(175, 20, 124);"></i>
        <div>{{ __('messages.blog.title') }} Detail</div>
    </div>

    <div class="card mt-3">
        <div class="d-flex justify-content-between m-3">
            <span>{{ __('messages.blog.title') }} Detail</span>

        </div>
        <div class="card-body">
            <div class="text-center blog-detail">
                <img src="{{ $blog->getUrl() }}" alt="">
            </div>
            <div class="my-3 d-flex flex-column align-tiems-start blog-content">
                <p><b>Author - </b>{{ $blog->author->name }}</p>
                <p><b>Date - </b> {{ $blog->date }}</p>
                <h3 class="mt-2">{{ $blog->title }}</h3>
                <div class="my-3">
                    {!! $blog->content !!}
                </div>
            </div>
            <button class="btn btn-outline-secondary mt-3 back-btn">Back to List</button>
        </div>
    </div>
@endsection
