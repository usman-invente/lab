@extends('layouts.app')
@section('contect')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.bootstrap5.css">
      <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .table {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .table thead th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .table tbody tr {
            transition: background-color 0.3s;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .table tbody td {
            vertical-align: middle;
        }
        .action-buttons a {
            margin-right: 5px;
        }
    </style>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .table {
            border-radius: 15px;
            overflow: hidden;
        }

        .table thead th {
            background-color: #007bff;
            color: black;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    </head>

    <body>

        <div class="container">
            <h2 class="text-center mb-4">Active Users List</h2>
          <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if ($user->activeStatus === 'active')
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->activeStatus }}</td>
                        <td class="action-buttons">
      <form action="{{ route('user.softDelete', $user->id) }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to mark this user as deleted?');">Delete</button>
    </form>
                            {{-- <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
        </div>

        @include('layouts.scripts')

        <script>
            new DataTable('#example')
        </script>
    @endsection
