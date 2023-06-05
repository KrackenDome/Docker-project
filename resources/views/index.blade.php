@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
            .navbar {
                background-color: rgba(255, 255, 255, 0.7);
            }

            .navbar .nav-link {
                color: #333;
            }

            .nav-link{
                color: #000;
                margin: 0 10px;
                text-decoration: none;
            }

            .navbar .nav-link:hover {
                background-color: lightgray;
            }

            .has-text-centered {
                text-align: center;
            }
        </style>

        <nav class="navbar py-0 navbar-expand-lg navbar-light navbar-laravel" role="navigation" aria-label="main navigation">
            <div class="container div2" id="navbarBasicExample navbar-menu">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    @guest
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    @endguest

                </div>
            </div>
        </nav>

        <div class="container">
            <div class="mb-3">
                <a href="{{ route('students.create') }}" class="btn btn-success">Create</a>
            </div>
<div class="push-top">
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Password</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $students)
        <tr>
            <td>{{$students->id}}</td>
            <td>{{$students->name}}</td>
            <td>{{$students->email}}</td>
            <td>{{$students->phone}}</td>
            <td>{{$students->password}}</td>
            <td class="text-center">
                <a href="{{ route('students.edit', $students->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('students.destroy', $students->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
