@extends('layouts.public')
@section('title', '403 - Access Prohibited')
@section('content')
<div class="container section" style="text-align:center;padding:120px 24px;">
    <span class="badge badge-dark">Status 403</span>
    <h1 style="font-size:3.5rem;margin:20px 0 12px;">Unauthorized Boundary</h1>
    <p style="max-width:480px;margin:0 auto 32px;color:var(--text-secondary);">Elevated cryptographic credentials are required to interface with this domain route.</p>
    <a href="{{ route('home') }}" class="btn btn-outline">&larr; Return to Safety</a>
</div>
@endsection
