@extends('layouts.app')

@section('title', __('header.blogs') . ' -')

@section('content')
    <section class="breadcrumb-area d-flex align-items-center"
             style="background-image:url({{ asset('assets/img/testimonial/test-bg.png') }})">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-left">
                        <div class="breadcrumb-title">
                            @if(\Illuminate\Support\Facades\Lang::has('header.blogs'))
                                <h2>{{ __('header.blogs') }}</h2>
                            @else
                                <h2></h2>
                            @endif
                            <div class="breadcrumb-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @if(\Illuminate\Support\Facades\Lang::has('header.home'))
                                            <li class="breadcrumb-item"><a href="/">{{ __('header.home') }}</a></li>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Lang::has('header.blogs'))
                                            <li class="breadcrumb-item active"
                                                aria-current="page">{{ __('header.blogs') }}
                                            </li>
                                        @endif
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="inner-blog pt-120 pb-120">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4">

                        <div class="bsingle__post mb-50" style="margin-top: -80px;">
                            <a href="{{ url('/blogs/' . $blog->id . '-' . slug($blog->title)) }}">
                                <div class="bsingle__post-thumb">
                                    <img src="{{ asset('laravel/public/uploads/' . $blog->image) }}"
                                         alt="{{ $blog->title }}">
                                </div>
                                <div class="bsingle__content">
                                    <div class="admin d-none">
                                        <a><i class="far fa-user"></i> {{ ($blog->user->name ?? '') .' ' . ($blog->user->surname ?? '') }}
                                        </a>
                                    </div>
                                    <h4>
                                        <a href="{{ url('/blogs/' . $blog->id . '-' . slug($blog->title)) }}">
                                            {{$blog->title}}
                                        </a>
                                    </h4>
                                    <div class="mt-3 col-lg-12 col-md-12 d-flex justify-content-center">
                                        <a class="btn btn-show-more btn-success"
                                           style="padding: 14px 36px;font-size: 15px;"
                                           href="{{ url('/blogs/' . $blog->id . '-' . slug($blog->title)) }}">{{__('header.moree')}}</a>
                                    </div>

                                    @php
                                        $category = $blog->blog_category;

                                    @endphp

                                    <div class="meta-info" style="margin-top: 15px;">
                                        <ul style="display: flex; justify-content: center;">
                                            @if(\Illuminate\Support\Facades\Lang::has('header.category'))
                                                <li class="breadcrumb-item breadcrumb-category"><a href="/"
                                                                                                   style="color: inherit;">{{
                                            __('header.category') }}</a>
                                                </li>
                                            @endif
                                            <li class="cat-item cat-item-16">
                                                <a style="color: inherit !important;"
                                                   href="{{ url('/blogs/category/' . $category->id . '-' . slug($category->title)) }}">{{
                                                    $category->title }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="meta-info" style="margin-top: 15px;">
                                        <ul style="text-align: center;">
                                            <li>
                                                <i class="fal fa-calendar-alt"></i>{{ $blog->created_at->format('d m, Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>
                @endforeach

            </div>
            {{ $blogs->links() }}
            <aside class="sidebar-widget">
            </aside>
        </div>
    </section>
@endsection
