<html>
<head>
    <title>Add New Book</title>
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
            max-width: 560px;
            margin: 0 auto;
            padding: 60px 24px 80px;
        }

        header {
            margin-bottom: 36px;
        }

        header h1 {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 2.2rem;
            font-weight: 600;
            color: var(--green-deep);
            letter-spacing: 0.02em;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 16px;
            font-size: 0.8rem;
            color: var(--text-muted);
            text-decoration: none;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: var(--green-mid);
        }

        .card {
            background: white;
            border: 1px solid var(--cream-dark);
            border-radius: 8px;
            padding: 32px 28px;
        }

        .field {
            margin-bottom: 22px;
        }

        .field label {
            display: block;
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 8px;
        }

        .field input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--cream-dark);
            border-radius: 4px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.9rem;
            color: var(--text-dark);
            background: var(--cream);
            transition: border-color 0.2s;
            outline: none;
        }

        .field input:focus {
            border-color: var(--green-sage);
            background: white;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 28px;
        }

        .btn-submit {
            background: var(--green-deep);
            color: var(--cream);
            border: none;
            border-radius: 4px;
            padding: 11px 24px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-submit:hover {
            background: var(--green-mid);
        }

        .btn-cancel {
            background: transparent;
            border: 1px solid var(--cream-dark);
            border-radius: 4px;
            padding: 11px 24px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--text-muted);
            text-decoration: none;
            transition: background 0.2s;
            display: inline-block;
        }

        .btn-cancel:hover {
            background: var(--cream-dark);
        }
    </style>
</head>
<body>
    <div class="wrapper">

        <a href="{{ route('books.index') }}" class="back-link">Back to Books</a>

        <header>
            <h1>Add New Book</h1>
        </header>

        <div class="card">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required value="{{ old('title') }}">
                </div>

                <div class="field">
                    <label for="author">Author</label>
                    <input type="text" id="author" name="author" required value="{{ old('author') }}">
                </div>

                <div class="field">
                    <label for="published_date">Published Date</label>
                    <input type="date" id="published_date" name="published_date" required value="{{ old('published_date') }}">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">Save</button>
                    <a href="{{ route('books.index') }}" class="btn-cancel">Cancel</a>
                </div>
            </form>
        </div>

    </div>
</body>
</html>
