@extends('layouts.app')

@section('content')

<div class="container">
    <div class="content">
        <div class="col-md-8 col-md-offset-2">
            <div id="ibijumba">
                <router-view></router-view>
            </div>
        </div>
    </div>
</div>

<script src="{{ mix('js/ViewMaResult.js') }}"   type="text/javascript"> </script>

@endsection