<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobYaari Portal</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; margin: 0; padding: 0; background-color: #f3f4f6; color: #333; }
        .navbar { background: #ffffff; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); text-align: center; }
        .navbar h1 { margin: 0; color: #2563eb; font-weight: 600; letter-spacing: 1px; }
        .container { max-width: 1100px; margin: 40px auto; padding: 0 20px; }
        
        /* Modern Filter Bar */
        .filters { background: #ffffff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 30px; display: flex; gap: 15px; flex-wrap: wrap; align-items: center; justify-content: space-between; }
        .filter-group { display: flex; gap: 15px; flex: 1; }
        select, input[type="date"] { padding: 12px 15px; border: 1px solid #e5e7eb; border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 14px; width: 100%; max-width: 250px; background: #f9fafb; outline: none; transition: 0.3s; }
        select:focus, input[type="date"]:focus { border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }
        
        /* Modern Grid & Cards */
        .blog-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 25px; }
        .blog-card { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.3s ease, box-shadow 0.3s ease; display: flex; flex-direction: column; }
        .blog-card:hover { transform: translateY(-5px); box-shadow: 0 12px 20px rgba(0,0,0,0.1); }
        .blog-card img { width: 100%; height: 220px; object-fit: cover; border-bottom: 3px solid #2563eb; }
        .card-content { padding: 20px; display: flex; flex-direction: column; flex-grow: 1; }
        .category-badge { display: inline-block; background: #e0e7ff; color: #3730a3; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; margin-bottom: 10px; align-self: flex-start; }
        .blog-card h3 { margin: 0 0 10px 0; font-size: 18px; color: #1f2937; }
        .meta-date { font-size: 13px; color: #6b7280; margin-bottom: 15px; }
        .blog-card p { font-size: 14px; color: #4b5563; line-height: 1.6; margin-bottom: 20px; flex-grow: 1; }
        .btn { text-align: center; display: block; padding: 12px; background: #2563eb; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background 0.3s; }
        .btn:hover { background: #1d4ed8; }
        .no-results { grid-column: 1 / -1; text-align: center; padding: 40px; color: #6b7280; background: white; border-radius: 12px; }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>JobYaari Updates</h1>
    </div>

    <div class="container">
        <div class="filters">
            <div class="filter-group">
                <select id="categoryFilter">
                    <option value="">All Categories</option>
                    <option value="Admit Card">Admit Card</option>
                    <option value="Result">Result</option>
                    <option value="Jobs">Jobs</option>
                </select>
                <input type="date" id="dateFilter">
            </div>
            <div>
                <a href="{{ route('admin.index') }}" style="color: #6b7280; text-decoration: none; font-size: 14px;">Admin Login →</a>
            </div>
        </div>

        <div class="blog-grid" id="blogContainer">
            @include('frontend.partials.blog_list', ['blogs' => $blogs])
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#categoryFilter, #dateFilter').on('change', function() {
                let category = $('#categoryFilter').val();
                let date = $('#dateFilter').val();

                // Add a little fade out effect while fetching
                $('#blogContainer').css('opacity', '0.5');

                $.ajax({
                    url: "{{ route('blog.filter') }}",
                    type: "GET",
                    data: { category: category, date: date },
                    success: function(response) {
                        $('#blogContainer').html(response).css('opacity', '1');
                    }
                });
            });
        });
    </script>
</body>
</html>