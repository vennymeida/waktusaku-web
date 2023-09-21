{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex"
    @if (Auth::user()->profile && Auth::user()->profile->foto != '') style="background-image: url('{{ Storage::url(Auth::user()->profile->foto) }}');"
        @else
        style="background-image: url('{{ asset('assets/img/avatar/avatar-1.png') }}');" @endif>
</div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Hapus obrolan</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Foto Bersama</span></p>
    <div class="shared-photos-list"></div>
</div>
