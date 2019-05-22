<div class="form-group">
    <label for="nik">NIK</label>
    {{ Form::text('nik', null, ['class' => 'form-control', 'id' => 'nik', 'placeholder' => 'NIK Tendik']) }}
</div>

<div class="form-group">
    <label for="nama">Nama</label>
    {{ Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Nama Tendik']) }}
</div>

<div class="form-group">
    <label for="nip">NIP</label>
    {{ Form::text('nip', null, ['class' => 'form-control', 'id' => 'nip', 'placeholder' => 'NIP Tendik']) }}
</div>

<div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    {{ Form::input('date', 'tanggal_lahir', null, ['class' => 'form-control', 'id' => 'tanggal_lahir', 'placeholder' => 'Tanggal Lahir Tendik']) }}
</div>

<div class="form-group">
    <label for="tempat_lahir">Tempat Lahir</label>
    {{ Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'tempat_lahir', 'placeholder' => 'Tempat Lahir Tendik']) }}
</div>

<div class="form-group">
    <label for="email">Email</label>
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email Tendik']) }}
</div>

<div class="form-group">
    <label for="nohp">No. HP</label>
    {{ Form::text('nohp', null, ['class' => 'form-control', 'id' => 'nohp', 'placeholder' => 'No HP Tendik']) }}
</div>

<div class="form-group">
    <label for="nohp">Photo</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Photo</label>
    </div>
</div>


