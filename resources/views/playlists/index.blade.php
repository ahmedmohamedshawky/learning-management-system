@extends('layouts.app')
@section('content')
    <!-- Search and Filter Section -->
    <section class="search-section">
        <div class="container">
            {{-- <div class="search-container">
                <input type="text" class="search-input" placeholder="ابحث عن دورة...">
                <button class="search-btn">🔍 بحث</button>
            </div> --}}
            @include('category.generator')
            <form class="filter-tags" action="{{ url()->current() }}" method="GET">
                @foreach ($categories as $category)
                    <button type="submit" name="filter" value="{{ $category->name }}" class="filter-tag @if(request('filter') == $category->name) active @endif">{{ $category->name . ' (' . $category->playlists_count . ')' }}</button>
                @endforeach
                <button type="submit" name="filter" value="all" class="filter-tag @if(!request('filter') || request('filter') == 'all') active @endif">الكل</button>
            </form>
        </div>
    </section>

    <!-- Courses Grid Section -->
    <section class="courses-grid">
        <div class="container">
            <div class="row g-4">
                @foreach ($playlists as $playlist)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="course-card" data-id="{{ $playlist->id }}">
                            <a  class="view-btn-badge">عرض</a>
                            <div class="course-image" style="background-image: url('{{ $playlist->thumbnail }}');"></div>
                            <div class="course-body">
                                <h3 class="course-title">{{ $playlist->title }}</h3>
                                <p class="course-provider">{{ $playlist->channel_name }}</p>
                            </div>
                            {{-- <div class="course-lessons-badge">36 درس</div> --}}
                        </div>
                    </div>

                @endforeach


            </div>
        </div>
    </section>

    
@endsection
