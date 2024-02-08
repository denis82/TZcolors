@extends('layouts.main')

@section('content')
<div class="col-12">
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">Ekko Lightbox</h4>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($files as $file)
                <div class="col-sm-6">
                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                        <img src="{{ $file['wm_image'] }}" class="img-fluid mb-2" alt="white sample">
                    </a>
                    <div style="color: white; height: 20px; width:100%; background: {{ $file['main_color'] }}">
                        <p>Основной цвет: {{ $file['main_color'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection()
