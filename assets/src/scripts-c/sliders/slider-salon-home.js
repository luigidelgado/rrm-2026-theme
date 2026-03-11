let configSlider = {
  infinite: false,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  prevArrow:"<div class='slick-prev pull-left'><i class='icon-arrow_back_ios' aria-hidden='true'></i></div>",
  nextArrow:"<div class='slick-next pull-right'><i class='icon-arrow_forward_ios' aria-hidden='true'></i></div>",
  autoplay: false,
  centerMode: false,
  centerPadding: "0px",
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        //dots: true
      }
    },
    // {
    //   breakpoint: 992,
    //   settings: {
    //     slidesToShow: 2,
    //     slidesToScroll: 1
    //   }
    // },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
}

export { configSlider };