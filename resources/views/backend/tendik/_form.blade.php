<div class="form-group">
    <label for="nama">Nik</label>
    {{ Form::text('nik', null, ['class' => 'form-control', 'id' => 'nik', 'placeholder' => 'Nik']) }}
</div>

<div class="form-group">
    <label for="nim">Nama</label>
    {{ Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Nama']) }}
</div>

<div class="form-group">
    <label for="angkatan">Nip</label>
    {{ Form::text('nip', null, ['class' => 'form-control', 'id' => 'nip', 'placeholder' => 'Nip']) }}
</div>

<div class="form-group">
    <label for="tempat_lahir">Tempat Lahir</label>
    {{ Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'tempat_lahir', 'placeholder' => 'Tempat Lahir Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    {{ Form::input('date', 'tanggal_lahir', null, ['class' => 'form-control', 'id' => 'tanggal_lahir', 'placeholder' => 'Tanggal Lahir Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="email">email</label>
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
</div>

<div class="form-group">
    <label for="nohp">No hp</label>
    {{ Form::text('nohp', null, ['class' => 'form-control', 'id' => 'nohp', 'placeholder' => 'Nohp']) }}
</div>

<div class="form-group">
    <label for="nohp">Photo</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Photo</label>
    </div>
</div>

