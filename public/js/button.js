document.addEventListener('DOMContentLoaded', function () {
  document.querySelector('button[name="favorite"]').addEventListener('click', function () {
    var type = this.getAttribute('data-type');
    var id = this.getAttribute('data-id');
    var urlOrigin = window.location.origin;
    let url = '';
    // alert(type + "aa" + id)
    switch (type) {
      case '1':
        url = `${urlOrigin}/likeMix/${id}`;
        break;
      case '2':
        url = `${urlOrigin}/likeMuscle/${id}`;
        break;
      case '3':
        url = `${urlOrigin}/likeStretch/${id}`;
        break;
      default:
        console.error('Unknown type:', type);
        return;
    }
    alert(url);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: url,
      type: 'POST',
      data: id,
      success: function (data) {
        console.log(data, 'お気に入りに追加しました');
      },
      error: function (xhr, status, error) {
        console.error(error);
        alert('お気に入りの追加に失敗しました');
      }
    });
  });
});