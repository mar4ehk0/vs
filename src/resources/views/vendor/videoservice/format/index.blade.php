@extends('layouts.app')

@section('content')
    <table>
        @foreach($items as $item)
            <tr>
                <td>{{$item->name}}</td>
            </tr>
        @endforeach
    </table>
@endsection
