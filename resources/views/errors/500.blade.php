@extends('layouts.public')
@section('title', '500 - Internal Degradation')
@section('content')
<div class="container section" style="text-align:center;padding:120px 24px;">
    <span class="badge badge-dark">Status 500</span>
    <h1 style="font-size:3.5rem;margin:20px 0 12px;">System Error Detected</h1>
    <p style="max-width:480px;margin:0 auto 32px;color:var(--text-secondary);">A fatal invariant was violated. Our autonomous resilience agents have captured this stack trace.</p>
    <a href="{{ route('home') }}" class="btn btn-primary">&larr; Back to Platform</a>
</div>
@endsection
