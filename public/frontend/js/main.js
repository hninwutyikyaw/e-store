function scrollHeader() {
    const header = document.getElementById("header");
    if (this.scrollY >= 200) header.classList.add("scroll-header");
    else header.classList.remove("scroll-header");
}
