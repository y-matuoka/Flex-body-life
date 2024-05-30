document.addEventListener('DOMContentLoaded', function () {
  document.querySelector('button[name="favorite"]').addEventListener('click', function () {
  const type = this.getAttribute('data-type');
  const id = this.getAttribute('data-id');
  let url = '';
  switch(type){
    case '1':
      url = `/likeMix/${id}`;
      break;
      case '2':
        url = `/likeMuscle/${id}`;
        break;
        case '3':
          url = `/likeStretch/${id}`;
          break;
          default:
            console.error('Unknown type:', type);
            return;
  }
   $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: 'POST',
            success: function(data) {
                console.log(data,'お気に入りに追加しました');
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.log('お気に入りの追加に失敗しました');
            }
        });
    });
});