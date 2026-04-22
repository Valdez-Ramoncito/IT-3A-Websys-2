<html>
<head>
    <title>Photo Gallery</title>
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --green-deep: #1c3322;
            --green-mid: #2e5339;
            --green-sage: #6b8f71;
            --green-pale: #c8dbc9;
            --cream: #f4efe6;
            --cream-dark: #e8e0d2;
            --bark: #5a3e2b;
            --text-dark: #1a2b1e;
            --text-muted: #5c6e5e;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 300;
            background-color: var(--cream);
            color: var(--text-dark);
            min-height: 100vh;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                radial-gradient(ellipse 60% 40% at 10% 90%, rgba(44, 83, 57, 0.12) 0%, transparent 60%),
                radial-gradient(ellipse 50% 60% at 90% 10%, rgba(107, 143, 113, 0.10) 0%, transparent 60%);
            pointer-events: none;
            z-index: 0;
        }

        .wrapper {
            position: relative;
            z-index: 1;
            max-width: 960px;
            margin: 0 auto;
            padding: 60px 24px 80px;
        }

        header {
            text-align: center;
            margin-bottom: 56px;
        }

        header h1 {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 2.8rem;
            font-weight: 600;
            color: var(--green-deep);
            letter-spacing: 0.02em;
            line-height: 1.1;
        }

        header p {
            margin-top: 10px;
            font-size: 0.85rem;
            color: var(--text-muted);
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .divider {
            width: 48px;
            height: 2px;
            background: var(--green-sage);
            margin: 16px auto 0;
        }

        .flash {
            background: var(--green-mid);
            color: var(--cream);
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 0.85rem;
            letter-spacing: 0.04em;
            margin-bottom: 32px;
            text-align: center;
        }

        .upload-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 56px;
        }

        @media (max-width: 600px) {
            .upload-grid {
                grid-template-columns: 1fr;
            }
        }

        .upload-card {
            background: white;
            border: 1px solid var(--cream-dark);
            border-radius: 8px;
            padding: 28px 24px;
        }

        .upload-card h2 {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--green-deep);
            margin-bottom: 18px;
        }

        .file-label {
            display: block;
            border: 1.5px dashed var(--green-pale);
            border-radius: 6px;
            padding: 20px 16px;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.2s, background 0.2s;
            margin-bottom: 14px;
            background: var(--cream);
        }

        .file-label:hover {
            border-color: var(--green-sage);
            background: #f0f5f1;
        }

        .file-label span {
            display: block;
            font-size: 0.8rem;
            color: var(--text-muted);
            letter-spacing: 0.06em;
        }

        .file-label input[type="file"] {
            display: none;
        }

        .file-name {
            font-size: 0.78rem;
            color: var(--green-mid);
            margin-top: 4px;
            min-height: 16px;
        }

        .btn-upload {
            width: 100%;
            background: var(--green-deep);
            color: var(--cream);
            border: none;
            border-radius: 4px;
            padding: 11px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
        }

        .btn-upload:hover {
            background: var(--green-mid);
        }

        .gallery-section h2 {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--green-deep);
            margin-bottom: 24px;
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 16px;
        }

        .photo-card {
            background: white;
            border: 1px solid var(--cream-dark);
            border-radius: 8px;
            overflow: hidden;
        }

        .photo-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            display: block;
        }

        .photo-card-footer {
            padding: 10px 12px;
        }

        .btn-delete {
            width: 100%;
            background: transparent;
            border: 1px solid #c9b8b0;
            border-radius: 4px;
            padding: 7px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--bark);
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }

        .btn-delete:hover {
            background: var(--bark);
            color: var(--cream);
            border-color: var(--bark);
        }

        .empty-state {
            text-align: center;
            padding: 40px 0;
            color: var(--text-muted);
            font-size: 0.88rem;
            letter-spacing: 0.05em;
        }

        .pagination {
            margin-top: 32px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4px;
        }

        .page-btn {
            display: inline-block;
            font-size: 0.8rem;
            padding: 6px 12px;
            border-radius: 4px;
            border: 1px solid var(--cream-dark);
            color: var(--text-dark);
            text-decoration: none;
            background: white;
            transition: background 0.15s;
            cursor: pointer;
        }

        .page-btn:hover {
            background: var(--green-pale);
        }

        .page-btn.active {
            background: var(--green-deep);
            color: var(--cream);
            border-color: var(--green-deep);
        }

        .page-btn.disabled {
            color: var(--text-muted);
            background: var(--cream);
            cursor: default;
        }
    </style>
</head>
<body>
    <div class="wrapper">

        <header>
            <h1>Forest Gallery</h1>
            <p>Upload &amp; Manage Your Photos</p>
            <div class="divider"></div>
        </header>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        <div class="upload-grid">
            <div class="upload-card">
                <h2>Single Upload</h2>
                <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="file-label" for="single-file">
                        <span>Choose a file</span>
                        <input type="file" id="single-file" name="image" required onchange="showName(this, 'single-name')">
                    </label>
                    <div class="file-name" id="single-name"></div>
                    <button type="submit" class="btn-upload">Upload</button>
                </form>
            </div>

            <div class="upload-card">
                <h2>Multiple Upload</h2>
                <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="file-label" for="multi-file">
                        <span>Choose files</span>
                        <input type="file" id="multi-file" name="images[]" multiple required onchange="showName(this, 'multi-name')">
                    </label>
                    <div class="file-name" id="multi-name"></div>
                    <button type="submit" class="btn-upload">Upload</button>
                </form>
            </div>
        </div>

        <div class="gallery-section">
            <h2>Gallery</h2>

            @if ($photos->isEmpty())
                <div class="empty-state">No photos uploaded yet.</div>
            @else
                <div class="photo-grid">
                    @foreach ($photos as $image)
                        <div class="photo-card">
                            <img src="{{ asset('images/' . $image->image) }}" alt="photo">
                            <div class="photo-card-footer">
                                <form action="{{ route('photos.destroy', $image->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination">
                    @if ($photos->onFirstPage())
                        <span class="page-btn disabled">Previous</span>
                    @else
                        <a href="{{ $photos->previousPageUrl() }}" class="page-btn">Previous</a>
                    @endif

                    @foreach ($photos->getUrlRange(1, $photos->lastPage()) as $page => $url)
                        @if ($page == $photos->currentPage())
                            <span class="page-btn active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($photos->hasMorePages())
                        <a href="{{ $photos->nextPageUrl() }}" class="page-btn">Next</a>
                    @else
                        <span class="page-btn disabled">Next</span>
                    @endif
                </div>
            @endif
        </div>

    </div>

    <script>
        function showName(input, targetId) {
            const el = document.getElementById(targetId);
            if (input.files.length === 1) {
                el.textContent = input.files[0].name;
            } else if (input.files.length > 1) {
                el.textContent = input.files.length + ' files selected';
            } else {
                el.textContent = '';
            }
        }
    </script>
</body>
</html>
