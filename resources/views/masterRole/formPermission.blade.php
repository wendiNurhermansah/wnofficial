@extends('layouts.main')
@section('title', 'Show Role')

@section('content')
<div class="page has-sidebar-left bg-light">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-key4 mr-2"></i>Show Role | {{ $role->name }}
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pegawai-tab" role="tablist">
                    <li>
                        <a class="nav-link" href=""><i class="icon icon-arrow_back"></i>Semua Role</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid my-3">
        <div id="alert"></div>
        <div class="card no-b">
            <div class="card-body">
                <div id="formPermission">
                    <div class="row">
                        <div class="col-6">
                            <form class="needs-validation" id="form" method="POST" novalidate>
                                {{ method_field('POST') }}
                                <input type="hidden" id="id" name="id" value="{{ $role->id }}"/>
                                <div class="form-row form-inline">
                                    <div class="col-md-12">
                                        <div class="form-group m-0">
                                            <label for="permission" class="col-form-label col-md-3">Permission :</label>
                                            <div class="col-md-9">
                                                <select name="permission[]" id="permission" placeholder="" class="select2 form-control r-0 light s-12" multiple="multiple" required>
                                                    @foreach($permission as $key=>$permission)
                                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                                    @endforeach
                                                <select>
                                            </div>
                                        </div>
                                        <div class="mt-3" style="margin-left: 27%">
                                            <button type="submit" class="btn btn-primary btn-sm" id="action2"><i class="icon-save mr-2"></i>Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-6 mt-2">
                            <strong>List Permission:</strong>
                            <ol id="viewPermission" class=""></ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script type="text/javascript">
    getPermission();
    $('#form').on('submit', function (e) {
        console.log($('#id').val());

        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            $('#action').attr('disabled', true);
            $.post("{{ route('MasterRole.storePermissions') }}", $(this).serialize(), function(data){
                $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                getPermission();
                location.reload();
            }, "JSON").fail(function(data){
                err = ''; respon = data.responseJSON;
                $.each(respon.errors, function( index, value ) {
                    err += "<li>" + value +"</li>";
                });
            }).always(function(){
                $('#action').removeAttr('disabled');
            });
            return false;
        }
        $(this).addClass('was-validated');
    });

    function getPermission(){
        $('#viewPermission').html("Loading...");
        urlPermission = "{{ route('MasterRole.getPermissions', ':id') }}".replace(':id', $('#id').val());
        $.get(urlPermission, function(data){
            $('#viewPermission').html("");
            if(data.length > 0){
                $.each(data, function(index, value){
                    val = "'" + value.name + "'";
                    $('#viewPermission').append('<li>' + value.name + ' <a href="#" onclick="removePermission(' + val + ')" class="text-danger" title="Hapus Data"><i class="icon-remove"></i></a></li>');
                });
            }else{
                $('#viewPermission').html("<em>Data permission kosong.</em>");
            }
        });
    }

    function removePermission(name){
        $.confirm({
            title: '',
            content: 'Apakah Anda yakin akan menghapus role ini?',
            icon: 'icon icon-question amber-text',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'red',
            buttons: {
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                        $.post("{{ route('MasterRole.destroyPermission', ':name') }}".replace(':name', name), {'_method' : 'DELETE', 'id' : $('#id').val()}, function(data){
                            getPermissions();
                            location.reload();
                        }, "JSON").fail(function(){
                            reload();
                        });
                    }
                },
                cancel: function(){
                    console.log('the user clicked cancel');
                }
            }
        });
    }




</script>
@endsection
