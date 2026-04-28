@extends('layouts.adminlayout')

@section('title')
    Home
@endsection

@section('content')
<main class="p-4">
    <div class="container-fluid">
        <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Article</h2>
        
        <div class="card p-4 shadow-sm">
            <div class="row">
                <div class="col-md-6 border p-4 rounded bg-light">
                    <form action="{{route('admin.keyword.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">Title*</label>
                            <input
                                type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                name="title"
                                id="title"
                                placeholder="Please enter a title*"
                                value="{{old('title')}}"
                            />
                            @error('title')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="desc" class="form-label fw-bold">Description*</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror summernote" name="desc" id="desc" rows="3">{{old('desc')}}</textarea>
                            @error('desc')
                                <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image-input" class="form-label fw-bold">Choose Thumbnail:</label>
                            <input type="file" name="thumbnail" id="image-input" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="preview-container">
                                <p class="text-muted small mb-1" id="preview-text" style="display: none;">Chosen Thumbnail:</p>
                                <img id="image-preview" src="" alt="Önizleme" class="img-thumbnail" style="display: none; max-width: 100%; height: 200px; object-fit: cover;">
                            </div>
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-plus-circle"></i> Add Article
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image-input');
        const imagePreview = document.getElementById('image-preview');
        const previewText = document.getElementById('preview-text');

        if (imageInput) {
            imageInput.addEventListener('change', function() {
                const file = this.files[0];

                if (file) {
                    // Geçici URL oluştur (new kelimesi olmadan)
                    const objectUrl = URL.createObjectURL(file);
                    
                    // Önizleme elemanlarını güncelle
                    imagePreview.src = objectUrl;
                    imagePreview.style.display = 'block';
                    previewText.style.display = 'block';

                    // Bellek temizliği (Opsiyonel ama iyi bir pratik)
                    imagePreview.onload = () => {
                        URL.revokeObjectURL(objectUrl);
                    }
                } else {
                    // Dosya seçilmediyse gizle
                    imagePreview.style.display = 'none';
                    previewText.style.display = 'none';
                    imagePreview.src = "";
                }
            });
        }
    });
</script>
@endsection