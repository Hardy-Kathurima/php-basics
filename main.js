$(document).ready(function () {
    let btn = document.querySelector(".box");
    let body = document.querySelector("#body");
    btn.addEventListener('click', scrollUp);

    function scrollUp() {
        document.documentElement.scrollTop = 0;



    }
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            btn.style.display = "block";
        } else {
            btn.style.display = "none";
        }
    }
    // $(".comment-area").click(function () {
    //     window.location = $(this).find("a").attr("href");
    //
    //
    // });

    // $(".submit").attr('disabled', true);
  



});
