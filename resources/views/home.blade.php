@extends('layouts.app')

@section('content')

                    @if(Auth::user()->hasRole('admin'))
                    <script>window.location = "/admin2/public/admin";</script>
                    @else
                    <script>window.location = "/admin2/public/users";</script>
                    @endif
                    
                
@endsection
