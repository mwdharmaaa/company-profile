@if (session('success'))
    <div class="alert alert-success" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="alert-close" style="background:none;border:none;cursor:pointer;font-weight:700;font-size:16px;">&times;</button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error" role="alert">
        <span>{{ session('error') }}</span>
        <button type="button" class="alert-close" style="background:none;border:none;cursor:pointer;font-weight:700;font-size:16px;">&times;</button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-error" role="alert">
        <div>
            <strong>Please resolve the following:</strong>
            <ul style="margin-top:6px;padding-left:20px;font-size:13px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="alert-close" style="background:none;border:none;cursor:pointer;font-weight:700;font-size:16px;">&times;</button>
    </div>
@endif
