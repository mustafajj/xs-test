@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('items.index') }}" method="GET">
                <div class="form-group">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-12" id="selected-filters"></div>
                        </div>
                    </div>
                    <hr />
                    <div class="input-group">
                        <input class="form-control border-end-0 border" type="text" placeholder="Search by keyword"
                            id="filter-search">
                        <span class="input-group-append">
                            <button class="btn btn-primary border-start-0 border ms-n3" type="button" id="search-button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    {{-- <input type="text" id="filter-search" class="form-control" placeholder="Search by keyword"> --}}
                </div>
                <div class="form-group">
                    <label data-toggle="collapse" href="#solutionCollapse" role="button" aria-expanded="false"
                        aria-controls="solutionCollapse" style="cursor: pointer;">
                        <i class="fa fa-chevron-down" id="solutionArrow"></i> Solution
                    </label>
                    <div class="collapse show" id="solutionCollapse">
                        @foreach ($categories as $category)
                            <div class="form-check filter-item">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                    class="form-check-input" id="category_{{ $category->id }}"
                                    {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="category_{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label data-toggle="collapse" href="#contentFormatsCollapse" role="button" aria-expanded="false"
                        aria-controls="contentFormatsCollapse" style="cursor: pointer;">
                        <i class="fa fa-chevron-down" id="contentFormatsArrow"></i> Content Formats
                    </label>
                    <div class="collapse show" id="contentFormatsCollapse">
                        @foreach ($content_formats as $content_format)
                            <div class="form-check filter-item">
                                <input type="checkbox" name="content_formats[]" value="{{ $content_format->id }}"
                                    class="form-check-input" id="content_format_{{ $content_format->id }}"
                                    {{ in_array($content_format->id, request('content_formats', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="content_format_{{ $content_format->id }}">
                                    {{ $content_format->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr />
                <button type="submit" class="btn btn-primary col-md-12"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
            </form>
        </div>
        <div class="col-md-8">
            <hr />
            <div class="mb-3 mt-3">
                Result: {{ $items->total() }}
            </div>
            <hr />
            <div class="row">
                @foreach ($items as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-0" style="width: 18rem;">
                            <img class="card-img-top text-center" src="{{ $item->image_path }}" alt="{{ $item->title }}"
                                onerror="handleImageError(this)">
                            @php
                                if ($item->content_format_id == 1) {
                                    $font_awesome_icon = 'fa-video-camera';
                                } elseif ($item->content_format_id == 3) {
                                    $font_awesome_icon = 'fa-file-text';
                                } else {
                                    $font_awesome_icon = 'fa-users';
                                }

                            @endphp

                            <i class="fa {{ $font_awesome_icon }} fa-5x fallback-icon text-center"
                                style="display: none;"></i>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                                <a href="{{ $item->external_url }}" target="_blank" class="">Read more ></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-3">
                {{ $items->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>

    <script src="js/items.js"></script>
    <script>
        function handleImageError(img) {
            $(img).hide();
            $(img).siblings('.fallback-icon').show();
        }
    </script>
@endsection
