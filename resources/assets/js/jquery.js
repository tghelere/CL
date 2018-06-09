$(function () {
    $(document).scroll(function () {
        const nav = $(".sticky-top")
        nav.toggleClass('scrolled', $(this).scrollTop() > nav.height())
    })
})