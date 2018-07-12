$(function () {
    $(document).scroll(function () {
        const nav = $(".sticky-top")
        const down = $(".goDown")
        nav.toggleClass('scrolled', $(this).scrollTop() > nav.height())
        down.toggleClass('scrolled', $(this).scrollTop() > down.height())
    })
})