@extends('layouts.app')
@section('content')
    <h2 class="text-center">Groups</h2>
                <table>
                <tr>
                    <th>@sortablelink('name') </th>
                    <th>@sortablelink('game')</th>  
                    <th>@sortablelink('type')</th>
                    <th>@sortablelink('description')</th>
                    <th>@sortablelink('created at')</th>
                    <th>@sortablelink('updated at')</th>
                </tr>
@endsection