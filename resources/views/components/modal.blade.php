@props(['id', 'title'])

<div id="{{ $id }}" class="modal-dialog-backdrop" style="display:none;">
    <div class="card" style="max-width:500px;margin:10% auto;background:#fff;">
        <h3>{{ $title }}</h3>
        <div style="margin-top:16px;">{{ $slot }}</div>
    </div>
</div>
