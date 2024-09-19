document.addEventListener("scroll", function () {
    const progressBar = document.querySelector(".barrescroll");
    const windowHeight = window.innerHeight;
    const fullHeight = document.body.scrollHeight;
    const scrolled = window.scrollY;

    const width = (scrolled / (fullHeight - windowHeight)) * 100;
    progressBar.style.width = width + "%";
});
