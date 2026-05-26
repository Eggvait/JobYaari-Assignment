<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; margin: 0; color: #334155; }
        .sidebar { width: 250px; background: #1e293b; height: 100vh; position: fixed; padding: 20px 0; color: white; }
        .sidebar h2 { text-align: center; font-size: 20px; letter-spacing: 1px; color: #38bdf8; margin-bottom: 30px; }
        .sidebar a { display: block; color: #cbd5e1; padding: 15px 25px; text-decoration: none; transition: 0.3s; }
        .sidebar a:hover { background: #334155; color: white; border-left: 4px solid #38bdf8; }
        
        .main-content { margin-left: 250px; padding: 40px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .btn-primary { background: #38bdf8; color: #0f172a; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: 600; }
        
        .card { background: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f1f5f9; padding: 15px; text-align: left; font-size: 14px; color: #64748b; font-weight: 600; }
        td { padding: 15px; border-bottom: 1px solid #e2e8f0; vertical-align: middle; }
        tr:hover { background: #f8fafc; }
        
        .img-thumb { width: 60px; height: 40px; object-fit: cover; border-radius: 4px; }
        .btn-action { padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 13px; font-weight: 600; }
        .btn-edit { background: #fef08a; color: #854d0e; margin-right: 5px; }
        .btn-delete { background: #fecdd3; color: #be123c; }
        .alert { background: #dcfce7; color: #166534; padding: 15px; border-radius: 6px; margin-bottom: 20px; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>JobYaari Admin</h2>
        <a href="{{ route('home') }}">← View Live Site</a>
        <a href="{{ route('admin.index') }}" style="background: #334155; border-left: 4px solid #38bdf8; color: white;">Manage Blogs</a>
        <a href="{{ route('admin.create') }}">Add New Blog</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h2>Blog Management</h2>
            <a href="{{ route('admin.create') }}" class="btn-primary">+ Create Post</a>
        </div>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <div class="card">
            <table>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                @foreach($blogs as $blog)
                <tr>
                    <td>
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" class="img-thumb">
                        @else
                            <div style="width: 60px; height: 40px; background:#e2e8f0; border-radius:4px; font-size:10px; display:flex; align-items:center; justify-content:center; color:#94a3b8">None</div>
                        @endif
                    </td>
                    <td style="font-weight: 600;">{{ $blog->title }}</td>
                    <td><span style="background: #e0e7ff; color: #3730a3; padding: 4px 8px; border-radius: 4px; font-size: 12px;">{{ $blog->category }}</span></td>
                    <td style="color: #64748b; font-size: 14px;">{{ $blog->date }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $blog->id) }}" class="btn-action btn-edit">Edit</a>
                        <a href="{{ route('admin.destroy', $blog->id) }}" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>
</html>