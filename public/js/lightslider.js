$('#recipeCarouselmichelin').carousel({
  interval: 10000
})
$('#recipeCarouselgoodrich').carousel({
  interval: 10000
})
$('#recipeCarouselyokohama').carousel({
  interval: 10000
})
$('#recipeCarouselbridgstone').carousel({
  interval: 10000
})
$('#recipeCarouselotani').carousel({
  interval: 10000
})
$('#recipeCarouselmaxxis').carousel({
  interval: 10000
})
$('#recipeCarouseltoyo').carousel({
  interval: 10000
})
$('#recipeCarouselnitto').carousel({
  interval: 10000
})
$('#recipeCarouselkumho').carousel({
  interval: 10000
})
$('#recipeCarouselGoodyear').carousel({
  interval: 10000
})
$('#recipeCarouselkenda').carousel({
  interval: 10000
})
$('#recipeCarouselraiden').carousel({
  interval: 10000
})
$('#recipeCarouselcastrol').carousel({
  interval: 10000
})
$('#recipeCarouselmotul').carousel({
  interval: 10000
})
$('#recipeCarouselvisco').carousel({
  interval: 10000
})
$('#recipeCarouselmf').carousel({
  interval: 10000
})
$('#recipeCarouselgold').carousel({
  interval: 10000
})
$('#recipeCarouselbrake').carousel({
  interval: 10000
})
$('#recipeCarouselvaleo').carousel({
  interval: 10000
})
$('#recipeCarouselmichelinR').carousel({
  interval: 10000
})


$('#recipeCarouselprojectd').carousel({
  interval: 10000
})
$('#recipeCarouselmaxx').carousel({
  interval: 10000
})
$('#recipeCarouselvenom').carousel({
  interval: 10000
})
$('#recipeCarouselsamurai').carousel({
  interval: 10000
})
$('#recipeCarouselconquista').carousel({
  interval: 10000
})
$('#recipeCarouselmax').carousel({
  interval: 10000
})
$('#recipeCarouselroad').carousel({
  interval: 10000
})
$('#recipeCarouselintimidator').carousel({
  interval: 10000
})
$('#recipeCarouseljager').carousel({
  interval: 10000
})
$('#recipeCarouselangel').carousel({
  interval: 10000
})
$('#recipeCarouselother').carousel({
  interval: 10000
})

$('.carousel .carousel-item').each(function(){
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<2;i++) {
        next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        
        next.children(':first-child').clone().appendTo($(this));
      }
});
