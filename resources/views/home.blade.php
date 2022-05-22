@extends('layouts.app')

@section('content')

                    @if(Auth::user()->hasRole('admin'))
                    <script>window.location = "/adminUser/public/admin";</script>
                    @else
                    <script>window.location = "/adminUser/public/users";</script>
                    @endif
                    
                
@endsection
