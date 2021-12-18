function reload(){
    $.confirm({
        title: '',
        content: 'Terdapat kesalahan saat pengiriman data, Segarkan halaman ini?',
        icon: 'icon icon-all_inclusive',
        theme: 'supervan',
        closeIcon: true,
        animation: 'scale',
        type: 'orange',
        autoClose: 'ok|10000',
        escapeKey: 'cancelAction',
        buttons: {   
            ok: {
                text: "ok!",
                btnClass: 'btn-primary',
                keys: ['enter'],
                action: function(){
                    document.location.reload();
                }
            },
            cancel: function(){
                console.log('the user clicked cancel');
            }
        }
    });
}