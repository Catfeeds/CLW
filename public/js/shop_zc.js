webpackJsonp([6],{

/***/ 114:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(115);


/***/ }),

/***/ 115:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(15);

$(function () {
  $(window).scroll(function () {
    var nowTop = $(window).scrollTop();
    if (nowTop >= getTop($('.banner2'))) {
      $('.header2').removeClass('black');
      $('.header2').addClass('white');
    } else {
      $('.header2').removeClass('white');
      $('.header2').addClass('black');
    }
    if (nowTop >= getTop($('.banner2')) / 2) {
      $('.banner2_des').fadeIn(2000);
    }
    if (nowTop >= getTop($('.banner3')) / 7 * 5) {
      $('.banner3_des').fadeIn(2000);
      $('.start_back').addClass('opacity');
      $('.start1').addClass('startLeft');
      $('.start2').addClass('startRight');
      $('.start3').addClass('startCenter');
      var timer = setInterval(function () {
        $('.second_back').addClass('second_back_a');
        var timer1 = setInterval(function () {
          $('.js_gray').addClass('grayShow');
          var act = true;
          if (act) {
            clearInterval(timer1);
          }
        }, 2000);
        var act = true;
        if (act) {
          clearInterval(timer);
          var timer2 = setInterval(function () {
            $('.guest_list').addClass('formShow');
            var act = true;
            if (act) {
              clearInterval(timer2);
              var timer3 = setInterval(function () {
                $('.add').addClass('addShow');
                var act = true;
                if (act) {
                  clearInterval(timer3);
                  var timer4 = setInterval(function () {
                    $('.check').addClass('checkShow');
                    $('.add').fadeOut(1000);
                    var act = true;
                    if (act) {
                      clearInterval(timer4);
                      $('.guest_list').fadeOut(2000);
                      $('.check').fadeOut(2000);
                      $('.second_back').fadeOut(3000);
                      $('.js_gray').fadeOut(3000);
                      var timer5 = setInterval(function () {
                        $('.rw').addClass('task');
                        var act = true;
                        if (act) {
                          clearInterval(timer5);
                          var timer6 = setInterval(function () {
                            $('.xl').addClass('checkShow');
                            $('.rc').addClass('checkShow');
                            $('.kfy').addClass('checkShow');
                            var act = true;
                            if (act) {
                              clearInterval(timer6);
                            }
                          }, 3000);
                        }
                      }, 3000);
                    }
                  }, 500);
                }
              }, 500);
            }
          }, 2000);
        }
      }, 2000);
    }
    if (nowTop >= getTop($('.banner4')) / 7 * 6) {
      console.log(1);
      $('.banner4').addClass('banner4_sca');
      $('.banner4_des').addClass('titleShow');
    }

    if (nowTop >= getTop($('.banner5')) / 7 * 6) {
      $('.banner5_des').addClass('titleShow');
      $('.phone1').addClass('phone1_act');
      $('.phone2').addClass('phone2_show');
      $('.phone3').addClass('phone3_act');
    }
    if (nowTop >= getTop($('.banner6')) / 7 * 6) {
      $('.banner6_des').addClass('titleShow');
    }
    if (nowTop >= getTop($('.banner7')) / 7 * 6) {
      $('.banner7_des').addClass('titleShow');
      $('.icon').fadeIn(100);
    }
  });
});
// showIn($('.banner3'),$('.banner3>.banner3_des'))


function getTop(el) {
  return el.offset().top;
}

function showIn(el1, el2) {
  $(window).scroll(function () {
    var nowTop = $(window).scrollTop();
    if (nowTop >= getTop(el1) / 2) {
      el2.fadeIn(2000);
    }
  });
}

/***/ })

},[114]);