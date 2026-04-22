<html>
<head>
    <title>Books</title>
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
            max-width: 860px;
            margin: 0 auto;
            padding: 60px 24px 80px;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 16px;
        }

        header h1 {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 2.2rem;
            font-weight: 600;
            color: var(--green-deep);
            letter-spacing: 0.02em;
        }

        .btn-primary {
            background: var(--green-deep);
            color: var(--cream);
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s;
            display: inline-block;
        }

        .btn-primary:hover {
            background: var(--green-mid);
        }

        .flash {
            background: var(--green-mid);
            color: var(--cream);
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 0.85rem;
            letter-spacing: 0.04em;
            margin-bottom: 28px;
            text-align: center;
        }

        .book-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid var(--cream-dark);
        }

        .book-table thead {
            background: var(--green-deep);
            color: var(--cream);
        }

        .book-table thead th {
            padding: 14px 18px;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .book-table tbody tr {
            border-bottom: 1px solid var(--cream-dark);
            transition: background 0.15s;
        }

        .book-table tbody tr:last-child {
            border-bottom: none;
        }

        .book-table tbody tr:hover {
            background: #f9f6f1;
        }

        .book-table tbody td {
            padding: 14px 18px;
            font-size: 0.88rem;
            color: var(--text-dark);
            vertical-align: middle;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .btn-edit {
            background: transparent;
            border: 1px solid var(--green-sage);
            border-radius: 4px;
            padding: 6px 14px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--green-mid);
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
            display: inline-block;
        }

        .btn-edit:hover {
            background: var(--green-mid);
            color: var(--cream);
            border-color: var(--green-mid);
        }

        .btn-delete {
            background: transparent;
            border: 1px solid #c9b8b0;
            border-radius: 4px;
            padding: 6px 14px;
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
            padding: 48px 0;
            color: var(--text-muted);
            font-size: 0.88rem;
            letter-spacing: 0.05em;
            background: white;
            border: 1px solid var(--cream-dark);
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="wrapper">

        <header>
            <h1>All Books</h1>
            <a href="{{ route('books.create') }}" class="btn-primary">Add New Book</a>
        </header>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($books->isEmpty())
            <div class="empty-state">No books found. Add one to get started.</div>
        @else
            <table class="book-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->published_date }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn-edit">Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</body>
</html>
