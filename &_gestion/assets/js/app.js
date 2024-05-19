!(function () {
    "use strict";
    function i(t) {
        document.getElementById(t) && (document.getElementById(t).checked = !0);
    }
    var t, e;
    feather.replace(),
        window.sessionStorage && ((t = sessionStorage.getItem("is_visited")) ? document.querySelector("#" + t) : sessionStorage.setItem("is_visited", "layout-direction-ltr")),
        (function () {
            var e = document.body.getAttribute("data-sidebar-size");
            window.onload = function () {
                1024 <= window.innerWidth && window.innerWidth <= 1366 && (document.body.setAttribute("data-sidebar-size", "sm"), i("sidebar-size-small"));
            };
            for (var t = document.getElementsByClassName("vertical-menu-btn"), a = 0; a < t.length; a++)
                t[a] &&
                    t[a].addEventListener("click", function (t) {
                        t.preventDefault(),
                            document.body.classList.toggle("sidebar-enable"),
                            992 <= window.innerWidth
                                ? null == e
                                    ? null == document.body.getAttribute("data-sidebar-size") || "lg" == document.body.getAttribute("data-sidebar-size")
                                        ? document.body.setAttribute("data-sidebar-size", "sm")
                                        : document.body.setAttribute("data-sidebar-size", "lg")
                                    : "md" == e
                                    ? "md" == document.body.getAttribute("data-sidebar-size")
                                        ? document.body.setAttribute("data-sidebar-size", "sm")
                                        : document.body.setAttribute("data-sidebar-size", "md")
                                    : "sm" == document.body.getAttribute("data-sidebar-size")
                                    ? document.body.setAttribute("data-sidebar-size", "lg")
                                    : document.body.setAttribute("data-sidebar-size", "sm")
                                : initMenuItemScroll();
                    });
        })(),
        setTimeout(function () {
            var t = document.querySelectorAll("#sidebar-menu a");
            t &&
                t.forEach(function (t) {
                    var e,
                        a,
                        i,
                        n,
                        o,
                        s = window.location.href.split(/[?#]/)[0];
                    t.href == s &&
                        (t.classList.add("active"),
                        (e = t.parentElement) &&
                            "side-menu" !== e.id &&
                            (e.classList.add("mm-active"),
                            (a = e.parentElement) &&
                                "side-menu" !== a.id &&
                                (a.classList.add("mm-show"),
                                a.classList.contains("mm-collapsing") && console.log("has mm-collapsing"),
                                (i = a.parentElement) &&
                                    "side-menu" !== i.id &&
                                    (i.classList.add("mm-active"), (n = i.parentElement) && "side-menu" !== n.id && (n.classList.add("mm-show"), (o = n.parentElement) && "side-menu" !== o.id && o.classList.add("mm-active"))))));
                });
        }, 0),
        [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function (t) {
            return new bootstrap.Tooltip(t);
        }),
        [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function (t) {
            return new bootstrap.Popover(t);
        }),
        [].slice.call(document.querySelectorAll(".toast")).map(function (t) {
            return new bootstrap.Toast(t);
        }),
        (e = document.body),
        document.getElementById("right-bar-toggle").addEventListener("click", function (t) {
            e.classList.toggle("right-bar-enabled");
        }),
        e.addEventListener("click", function (t) {
            (!t.target.parentElement.classList.contains("right-bar-toggle-close") && t.target.closest(".right-bar-toggle, .right-bar")) || document.body.classList.remove("right-bar-enabled");
        }),
        (e = document.getElementsByTagName("body")[0]).hasAttribute("data-layout") && "horizontal" == e.getAttribute("data-layout")
            ? (i("layout-horizontal"), (document.getElementById("sidebar-setting").style.display = "none"))
            : i("layout-vertical"),
        document.querySelectorAll("input[name='layout'").forEach(function (t) {
            t.addEventListener("change", function (t) {
                t && t.target && t.target.value && (window.location.href = "vertical" == t.target.value ? "index.html" : "layouts-horizontal.html");
            });
        });
})();

