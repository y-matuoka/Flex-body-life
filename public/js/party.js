

document.querySelector('.btn-1').addEventListener('click', function(e){
  party.sparkles(this, {
    //粒子の大きさ1~3倍
    size: party.variation.range(1, 3),
    //粒子の持続時間2~4秒持続する
    lifetime: party.variation.range(2, 4),
    //粒子の数20~50個
    count: party.variation.range(20, 50),
  });
  document.querySelector('.btn-1').style.background = '#FF82B2';
  this.textContent = 'お気に入りしました';

});


document.querySelector('.btn-2').addEventListener('click', function(e){
  party.confetti(this, {
    size: party.variation.range(1, 3),
    // lifetime: party.variation.range(0, 1),
    count: party.variation.range(20, 40),
  });
});
