<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        
        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #ffd1dc, #ffe4ec, #e0c3fc, #c2e9fb);
            background-size: 400% 400%;
            animation: pastelBG 18s ease infinite;
        }

        @keyframes pastelBG {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        /*  Title */
        .title {
            text-align: center;
            font-weight: 800;
            color: #ffffff;
            text-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }

        .subtitle {
            text-align: center;
            color: rgba(255,255,255,0.9);
            margin-bottom: 20px;
        }

        /*  Glass soft card */
        .card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            border: 1px solid rgba(255,255,255,0.4);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        /*  Inputs */
        .form-control {
            border-radius: 15px;
            border: none;
            padding: 12px;
        }

        .form-control:focus {
            box-shadow: 0 0 10px rgba(255,182,193,0.8);
        }

        /*  Buttons */
        .btn {
            border-radius: 15px;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .btn-primary {
            background: linear-gradient(45deg, #ff9a9e, #fad0c4);
            border: none;
            color: white;
        }

        .btn-success {
            background: linear-gradient(45deg, #a1ffce, #faffd1);
            border: none;
            color: #333;
        }

        .btn-warning {
            background: linear-gradient(45deg, #fbc2eb, #a6c1ee);
            border: none;
            color: white;
        }

        .btn-danger {
            background: linear-gradient(45deg, #ff6a88, #ff99ac);
            border: none;
        }

        /*  Table */
        table {
            border-radius: 15px;
            overflow: hidden;
        }

        thead {
            background: rgba(255, 182, 193, 0.7);
            color: white;
        }

        tbody tr {
            transition: 0.3s ease;
        }

        tbody tr:hover {
            background: rgba(255,255,255,0.4);
            transform: scale(1.01);
        }

        /*  Badge */
        .badge-year {
            background: rgba(255,255,255,0.6);
            color: #d63384;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        /*  Container */
        .container {
            max-width: 1100px;
        }

        /*  Fade animation */
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(15px);}
            to {opacity: 1; transform: translateY(0);}
        }

        /*  Alert */
        .alert {
            border-radius: 15px;
        }
    </style>
</head>

<body class="container py-5">

<div class="fade-in">

    <!-- HEADER -->
    <h2 class="title"> Student Information System</h2>
    <p class="subtitle"></p>

    <!-- SUCCESS -->
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- SEARCH -->
    <div class="card p-3 mb-4">
        <form action="{{ route('students.index') }}" method="GET" class="row g-2">
            <div class="col-md-9">
                <input type="text" name="search" class="form-control"
                    placeholder=" Search student..."
                    value="{{ $search }}">
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button class="btn btn-primary w-100">Search</button>
                <a href="{{ route('students.index') }}" class="btn btn-warning w-100">Clear</a>
            </div>
        </form>
    </div>

    <!-- ADD -->
    <div class="card p-4 mb-4">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder=" Name" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="course" class="form-control" placeholder=" Course" required>
                </div>
                <div class="col-md-2">
                    <input type="number" name="year_level" class="form-control" placeholder=" Year" required>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success w-100">Add</button>
                </div>
            </div>
        </form>
    </div>

    <!-- TABLE -->
    <div class="card p-3">
        <table class="table table-hover text-center align-middle mb-0">
            <thead>
                <tr>
                    <th> ID</th>
                    <th> Name</th>
                    <th> Course</th>
                    <th> Year</th>
                    <th> Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td class="fw-bold">{{ $student->name }}</td>
                    <td>{{ $student->course }}</td>
                    <td><span class="badge-year">Year {{ $student->year_level }}</span></td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this student?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No students yet </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

</body>
</html>