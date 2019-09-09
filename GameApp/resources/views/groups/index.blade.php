@extends('layouts.app')
@section('content')
    <h2 class="text-center">Groups</h2>
                <table>
                <tr>
                    <th>@sortablelink('name') </th>
                    <th>@sortablelink('description')</th>  
                    <th>@sortablelink('age')</th>
                    <th>@sortablelink('gender')</th>
                    <th>@sortablelink('location')</th>
                    <th>@sortablelink('platform')</th>
                </tr>
@endsection