window.addEventListener(
    "scroll",
    () => {
        document.body.style.setProperty(
            "--scroll",
            // window.pageYOffset /
            window.scrollY / (document.body.offsetHeight - window.innerHeight)
        );
    },
    false
);

$(".pelayanan").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
});
$(".pelayanan1").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
});
