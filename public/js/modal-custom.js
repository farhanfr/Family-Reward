$('#editReward').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var desc = button.data('desc')
    var point = button.data('point')
    var photo = button.data('photo')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #desc').val(desc);
    modal.find('.modal-body #point').val(point);
    modal.find('.modal-body #test').prop("src","{{asset('img/')}}"+'/'+photo);

})
