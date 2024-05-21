function likeMix(trainingMix){
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: '/likeMix/${trainingMix}',
    type: "POST",
  })
  .done(function(data,status,xhr){
    console.log(data);
  })
  .fail(function(xhr,status,error){
    console.log();
  });
}
function likeMix() {
  console.log("動いてる？");
}