@extends("layouts.app")

@section("title", $blog->title)

@section("content")

<section class="breadcrumb-area d-flex align-items-center"
         style="background-image:url({{ asset('assets/img/testimonial/test-bg.png') }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        @if(\Illuminate\Support\Facades\Lang::has('header.blogs'))
                        <h2>{{ __('header.blogs') }}</h2>
                        @endif
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @if(\Illuminate\Support\Facades\Lang::has('header.home'))
                                    <li class="breadcrumb-item"><a href="/">{{ __('header.home') }}</a></li>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Lang::has('header.blogs'))
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('header.blogs') }}</li>
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
<section class="inner-blog b-details-p pt-120 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-wrap">
                    <div class="details__content pb-30">
                        <h2>
                            {{ $blog->title }}
                        </h2>
                        <div class="meta-info">
                            <ul>
                                <li><i class="fal fa-calendar-alt"></i>{{ $blog->created_at->format('d-M-Y H:i') }}</li>
                            </ul>
                        </div>
                        <div class="details__content-img">
                            <img src="{{ asset('laravel/public/uploads/' . $blog->image) }}" style="width:100%;" alt="">
                        </div>
                        <p>{!! $blog->{'content' . (app()->getLocale() === 'az' ? '_az' : '')} !!}</p>
                    </div>
                    @if(count($blogs) > 1)
                    <div class="related__post mt-45 mb-85">
                        <div class="post-title">
                            @if(\Illuminate\Support\Facades\Lang::has('third.releated_post'))
                            <h4>{{ __("third.releated_post") }}</h4>
                            @else
                            <h4></h4>
                            @endif
                        </div>
                        <div class="row">
                            @foreach($blogs as $blog)
                            <div class="col-md-6">
                                <div class="related-post-wrap mb-30">
                                    <div class="post-thumb">
                                        <img src="{{ asset('laravel/public/uploads/' . $blog->image) }}" alt="">
                                    </div>
                                    <div class="rp__content">
                                        <h3>
                                            <a asp-action="Detail" asp-route-id="@item.Id">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
