@extends('layouts.public')
@section('title', '404 - Specification Not Located')
@section('content')
<div class="container section" style="text-align:center;padding:120px 24px;">
    <span class="badge badge-dark">Status 404</span>
    <h1 style="font-size:3.5rem;margin:20px 0 12px;">Endpoint Not Found</h1>
    <p style="max-width:480px;margin:0 auto 32px;color:var(--text-secondary);">The requested resource specification does not exist in our active routing architecture.</p>
    <a href="{{ route('home') }}" class="btn btn-primary">&larr; Return to Core</a>
</div>
@endsection
