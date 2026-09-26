<!-- DEBUG-VIEW START 7 APPPATH/Views/spinner/index.php -->
<!-- DEBUG-VIEW START 6 APPPATH/Views/layouts/template.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <script id="debugbar_loader" data-time="1790421695.265413" src="http://localhost:8081/index.php?debugbar"></script>
    <script id="debugbar_dynamic_script"></script>
    <style id="debugbar_dynamic_style"></style>
    <script class="kint-rich-script">
    "use strict";
    (() => {
        function m(n) {
            if (!(n instanceof Element))
                throw new Error("Invalid argument to dedupeElement()");
            let t = n.ownerDocument,
                e = E(n);
            for (let s of t.querySelectorAll(e))
                n !== s && s.parentNode.removeChild(s)
        }
        function d(n) {
            return n instanceof Element ? n.ownerDocument.contains(n) : !1
        }
        function E(n) {
            if (!(n instanceof Element))
                throw new Error("Invalid argument to buildClassSelector()");
            return [n.nodeName, ...n.classList].join(".")
        }
        function f(n) {
            if (!(n instanceof Element))
                throw new Error("Invalid argument to selectText()");
            let t = n.ownerDocument,
                e = t.getSelection(),
                s = t.createRange();
            s.selectNodeContents(n),
            e.removeAllRanges(),
            e.addRange(s)
        }
        function I(n, t) {
            let e;
            return function(...s) {
                clearTimeout(e),
                e = setTimeout(function() {
                    n(...s)
                }, t)
            }
        }
        function x(n) {
            if (!(n instanceof Element))
                throw new Error("Invalid argument to offsetTop()");
            return n.offsetTop + (n.offsetParent ? x(n.offsetParent) : 0)
        }
        var u = class n {
            static #e = new Set;
            static toggleSearchBox(t, e)
            {
                let s = t.querySelector(".kint-search"),
                    i = t.parentNode;
                if (s)
                    if (s.classList.toggle("kint-show", e)) {
                        if (s.focus(), s.select(), !n.#e.has(s)) {
                            let r = i.querySelectorAll("dl").length,
                                o = 200;
                            r > 1e4 && (o = 700),
                            s.addEventListener("keyup", I(n.#t.bind(null, s), o)),
                            n.#e.add(s)
                        }
                        n.#t(s)
                    } else
                        i.classList.remove("kint-search-root")
            }
            static #t(t)
            {
                let e=t.closest(".kint-parent")?.parentNode;
                if (e)
                    if (t.classList.contains("kint-show") && t.value.length) {
                        let s = e.dataset.lastSearch;
                        if (e.classList.add("kint-search-root"), s !== t.value) {
                            e.dataset.lastSearch = t.value,
                            e.classList.remove("kint-search-match");
                            for (let i of e.querySelectorAll(".kint-search-match"))
                                i.classList.remove("kint-search-match");
                            n.#s(e, t.value.toUpperCase())
                        }
                    } else
                        e.classList.remove("kint-search-root")
            }
            static #s(t, e)
            {
                let s = t.cloneNode(!0);
                for (let c of s.querySelectorAll(".access-path"))
                    c.remove();
                if (!s.textContent.toUpperCase().includes(e))
                    return;
                t.classList.add("kint-search-match");
                let i = t.firstElementChild;
                for (; i && i.tagName !== "DT";)
                    i = i.nextElementSibling;
                if (!i)
                    return;
                let r = a.getChildContainer(i);
                if (!r)
                    return;
                let o,
                    l;
                for (let c of r.children)
                    c.tagName === "DL" ? n.#s(c, e) : c.tagName === "UL" && (c.classList.contains("kint-tabs") ? o = c.children : c.classList.contains("kint-tab-contents") && (l = c.children));
                if (!(!o || o.length!==l?.length))
                    for (let c = o.length; c--;) {
                        let k = !1,
                            F = !1;
                        o[c].textContent.toUpperCase().includes(e) && (k = !0);
                        let O = l[c].cloneNode(!0);
                        for (let v of O.querySelectorAll(".access-path"))
                            v.remove();
                        if (O.textContent.toUpperCase().includes(e) && (k = !0, F = !0), k && o[c].classList.add("kint-search-match"), F)
                            for (let v of l[c].children)
                                v.tagName === "DL" && n.#s(v, e)
                    }
            }
        }
        ;
        var g = class {
            static sort(t, e)
            {
                let s = t.dataset.kintTableSort,
                    i = parseInt(s) === e ? -1 : 1,
                    r = t.tBodies[0];
                [...r.rows].sort(function(o, l) {
                    o = o.cells[e].textContent.trim().toLocaleLowerCase(),
                    l = l.cells[e].textContent.trim().toLocaleLowerCase();
                    let c = 0;
                    return !isNaN(o) && !isNaN(l) ? (o = parseFloat(o), l = parseFloat(l), c = o - l) : isNaN(o) && !isNaN(l) ? c = 1 : isNaN(l) && !isNaN(o) ? c = -1 : c = ("" + o).localeCompare("" + l), c * i
                }).forEach(o => r.appendChild(o)),
                i < 0 ? t.dataset.kintTableSort = null : t.dataset.kintTableSort = e
            }
        }
        ;
        var a = class n {
                #e;
                #t;
                #s;
                constructor(t)
                {
                    if (!(t instanceof h))
                        throw new Error("Invalid argument to Rich.constructor()");
                    this.#e = t,
                    this.#e.runOnInit(this.#i.bind(this));
                    let e = new q(this, t);
                    new b(this, t.window, e)
                }
                #i()
                {
                    let t = this.#e.window.document;
                    if (d(this.#t) || (this.#t = t.querySelector("style.kint-rich-style")), this.#t && m(this.#t), t.querySelector(".kint-rich.kint-file")) {
                        this.setupFolder(t);
                        let e = this.#s.querySelector("dd.kint-foldout"),
                            s = Array.from(t.querySelectorAll(".kint-rich.kint-file"));
                        for (let i of s)
                            i.parentNode !== e && e.appendChild(i);
                        this.#s.classList.add("kint-show")
                    }
                }
                addToFolder(t)
                {
                    let e = t.closest(".kint-rich");
                    if (!e)
                        throw new Error("Bad addToFolder");
                    let s = this.#e.window.document;
                    if (this.setupFolder(s), this.folder.contains(t))
                        throw new Error("Bad addToFolder");
                    let i = this.#s.querySelector("dd.kint-foldout"),
                        r = t.closest(".kint-parent, .kint-rich"),
                        o = Array.from(e.querySelectorAll(".kint-folder-trigger"));
                    if (e === r || e.querySelectorAll(".kint-rich > dl").length === 1) {
                        for (let l of o)
                            l.remove();
                        e.classList.add("kint-file"),
                        i.insertBefore(e, i.firstChild)
                    } else {
                        let l = s.createElement("div");
                        l.classList.add("kint-rich"),
                        l.classList.add("kint-file"),
                        l.appendChild(r.closest(".kint-rich > dl"));
                        let c = e.lastElementChild;
                        c.matches(".kint-rich > footer") && l.appendChild(c.cloneNode(!0));
                        for (let k of o)
                            k.remove();
                        i.insertBefore(l, i.firstChild)
                    }
                    n.toggle(this.#s.querySelector(".kint-parent"), !0)
                }
                setupFolder(t)
                {
                    if (this.#s)
                        d(this.#s) || (this.#s = t.querySelector(".kint-rich.kint-folder"));
                    else {
                        let e = t.createElement("template");
                        e.innerHTML = '<div class="kint-rich kint-folder"><dl><dt class="kint-parent"><nav></nav>Kint</dt><dd class="kint-foldout"></dd></dl></div>',
                        this.#s = e.content.firstChild,
                        t.body.appendChild(this.#s)
                    }
                }
                get folder()
                {
                    return d(this.#s) || (this.#s = this.#e.window.document.querySelector(".kint-rich.kint-folder")), this.#s && m(this.#s), this.#s
                }
                isFolderOpen()
                {
                    let t=this.#s?.querySelector("dd.kint-foldout");
                    if (t)
                        return t.previousSibling.classList.contains("kint-show")
                }
                static getChildContainer(t)
                {
                    let e = t.nextElementSibling;
                    for (; e && !e.matches("dd");)
                        e = e.nextElementSibling;
                    return e
                }
                static toggle(t, e)
                {
                    let s = n.getChildContainer(t);
                    s && (e = t.classList.toggle("kint-show", e), n.#n(s, e))
                }
                static switchTab(t)
                {
                    t.parentNode.getElementsByClassName("kint-active-tab")[0].classList.remove("kint-active-tab"),
                    t.classList.add("kint-active-tab");
                    let e = t,
                        s = 0;
                    for (; e = e.previousElementSibling;)
                        s++;
                    let i = t.parentNode.nextSibling.children;
                    for (let r = i.length; r--;)
                        r === s ? (i[r].classList.add("kint-show"), n.#n(i[r], !0)) : i[r].classList.remove("kint-show")
                }
                static toggleChildren(t, e)
                {
                    let s = n.getChildContainer(t);
                    if (!s)
                        return;
                    e === void 0 && (e = t.classList.contains("kint-show"));
                    let i = Array.from(s.getElementsByClassName("kint-parent"));
                    for (let r of i)
                        r.classList.toggle("kint-show", e)
                }
                static toggleAccessPath(t, e)
                {
                    let s = t.querySelector(".access-path");
                    s?.classList.toggle("kint-show", e) && f(s)
                }
                static #n(t, e)
                {
                    if (t.children.length === 2 && t.lastElementChild.matches("ul.kint-tab-contents"))
                        for (let s of t.lastElementChild.children)
                            s.matches("li.kint-show") && (t = s);
                    if (t.children.length === 1 && t.firstElementChild.matches("dl")) {
                        let s = t.firstElementChild.firstElementChild;
                        s?.classList?.contains("kint-parent") && n.toggle(s, e)
                    }
                }
            }
            ,
            b = class {
                #e;
                #t;
                #s;
                #i = null;
                #n = null;
                #o = 0;
                constructor(t, e, s)
                {
                    this.#e = t,
                    this.#t = s,
                    this.#s = e,
                    this.#s.addEventListener("click", this.#a.bind(this), !0)
                }
                #r()
                {
                    clearTimeout(this.#i),
                    this.#i = setTimeout(this.#l.bind(this), 250)
                }
                #l()
                {
                    clearTimeout(this.#i),
                    this.#i = null,
                    this.#n = null,
                    this.#o = 0
                }
                #c()
                {
                    let t = this.#n;
                    if (!t.matches(".kint-parent > nav"))
                        return;
                    let e = t.parentNode;
                    if (this.#o === 1)
                        a.toggleChildren(e),
                        this.#t.onTreeChanged(),
                        this.#r(),
                        this.#o = 2;
                    else if (this.#o === 2) {
                        this.#l();
                        let s = e.classList.contains("kint-show"),
                            i=this.#e.folder?.querySelector(".kint-parent"),
                            r = Array.from(this.#s.document.getElementsByClassName("kint-parent"));
                        for (let o of r)
                            o !== i && o.classList.toggle("kint-show", s);
                        this.#t.onTreeChanged(),
                        this.#t.scrollToFocus()
                    }
                }
                #a(t)
                {
                    if (this.#o) {
                        this.#c();
                        return
                    }
                    let e = t.target;
                    if (!e.closest(".kint-rich"))
                        return;
                    if (e.tagName === "DFN" && f(e), e.tagName === "TH") {
                        t.ctrlKey || g.sort(e.closest("table"), e.cellIndex);
                        return
                    }
                    if (e.tagName === "LI" && e.parentNode.className === "kint-tabs") {
                        if (e.className !== "kint-active-tab") {
                            let i = e.closest("dl")?.querySelector(".kint-parent > nav") ?? e;
                            a.switchTab(e),
                            this.#t.onTreeChanged(),
                            this.#t.setCursor(i)
                        }
                        return
                    }
                    let s = e.closest("dt");
                    if (e.tagName === "NAV")
                        e.parentNode.tagName === "FOOTER" ? (this.#t.setCursor(e), e.parentNode.classList.toggle("kint-show")) : s?.classList.contains("kint-parent") && (a.toggle(s), this.#t.onTreeChanged(), this.#t.setCursor(e), this.#r(), this.#o = 1, this.#n = e);
                    else if (e.classList.contains("kint-access-path-trigger"))
                        s && a.toggleAccessPath(s);
                    else if (e.classList.contains("kint-search-trigger"))
                        s?.matches(".kint-rich > dl > dt.kint-parent") && u.toggleSearchBox(s);
                    else if (e.classList.contains("kint-folder-trigger")) {
                        if(s?.matches(".kint-rich > dl > dt.kint-parent"))
                            this.#e.addToFolder(e),
                            this.#t.onTreeChanged(),
                            this.#t.setCursor(s.querySelector("nav")),
                            this.#t.scrollToFocus();
                        else if (e.parentNode.tagName === "FOOTER") {
                            let i = e.closest(".kint-rich").querySelector(".kint-parent > nav, .kint-rich > footer > nav");
                            this.#e.addToFolder(e),
                            this.#t.onTreeChanged(),
                            this.#t.setCursor(i),
                            this.#t.scrollToFocus()
                        }
                    } else
                        e.classList.contains("kint-search") || (e.tagName === "PRE" && t.detail === 3 ? f(e) : e.closest(".kint-source") && t.detail === 3 ? f(e.closest(".kint-source")) : e.classList.contains("access-path") ? f(e) : e.tagName !== "A"&&s?.classList.contains("kint-parent") && (a.toggle(s), this.#t.onTreeChanged(), this.#t.setCursor(s.querySelector("nav"))))
                }
            }
            ,
            j = 65,
            G = 68,
            A = 70,
            S = 72,
            K = 74,
            D = 75,
            p = 76,
            V = 83,
            P = 9,
            T = 13,
            B = 27,
            L = 32,
            N = 37,
            R = 38,
            C = 39,
            H = 40,
            M = ".kint-rich .kint-parent > nav, .kint-rich > footer > nav, .kint-rich .kint-tabs > li:not(.kint-active-tab)",
            q = class {
                #e = [];
                #t = 0;
                #s = !1;
                #i;
                #n;
                constructor(t, e)
                {
                    this.#i = t,
                    this.#n = e.window,
                    this.#n.addEventListener("keydown", this.#c.bind(this), !0),
                    e.runOnInit(this.onTreeChanged.bind(this))
                }
                scrollToFocus()
                {
                    let t = this.#e[this.#t];
                    if (!t)
                        return;
                    let e = this.#i.folder;
                    if (t===e?.querySelector(".kint-parent > nav"))
                        return;
                    let s = x(t);
                    if (this.#i.isFolderOpen()) {
                        let i = e.querySelector("dd.kint-foldout");
                        i.scrollTo(0, s - i.clientHeight / 2)
                    } else
                        this.#n.scrollTo(0, s - this.#n.innerHeight / 2)
                }
                onTreeChanged()
                {
                    let t = this.#e[this.#t];
                    this.#e = [];
                    let e = this.#i.folder,
                        s=e?.querySelector(".kint-parent > nav"),
                        i = this.#n.document;
                    this.#i.isFolderOpen() && (i = e, this.#e.push(s));
                    let r = Array.from(i.querySelectorAll(M));
                    for (let o of r)
                        o.offsetParent !== null && o !== s && this.#e.push(o);
                    if (s && !this.#i.isFolderOpen() && this.#e.push(s), this.#e.length === 0) {
                        this.#s = !1,
                        this.#r();
                        return
                    }
                    t && this.#e.indexOf(t) !== -1 ? this.#t = this.#e.indexOf(t) : this.#r()
                }
                setCursor(t)
                {
                    if (this.#i.isFolderOpen() && !this.#i.folder.contains(t) || !t.matches(M))
                        return !1;
                    let e = this.#e.indexOf(t);
                    if (e === -1 && (this.onTreeChanged(), e = this.#e.indexOf(t)), e !== -1) {
                        if (e !== this.#t)
                            return this.#t = e, this.#r(), !0;
                        this.#e[e]?.classList.remove("kint-weak-focus")
                    } else
                        console.error("setCursor failed to find target in list", t),
                        console.info("Please report this as a bug in Kint at https://github.com/kint-php/kint");
                    return !1
                }
                #o(t)
                {
                    if (this.#e.length === 0)
                        return this.#t = 0, null;
                    for (this.#t += t; this.#t < 0;)
                        this.#t += this.#e.length;
                    for (; this.#t >= this.#e.length;)
                        this.#t -= this.#e.length;
                    return this.#r(), this.#t
                }
                #r()
                {
                    let t = this.#n.document.querySelector(".kint-focused");
                    t && (t.classList.remove("kint-focused"), t.classList.remove("kint-weak-focus")),
                    this.#s&&this.#e[this.#t]?.classList.add("kint-focused")
                }
                #l(t)
                {
                    let e=t.closest(".kint-rich .kint-parent ~ dd")?.parentNode.querySelector(".kint-parent > nav");
                    e && (this.setCursor(e), this.scrollToFocus())
                }
                #c(t)
                {
                    if (t.keyCode === B && t.target.matches(".kint-search")) {
                        t.target.blur(),
                        this.#s && this.#r();
                        return
                    }
                    if (t.target !== this.#n.document.body || t.altKey || t.ctrlKey)
                        return;
                    if (t.keyCode === G) {
                        if (this.#s)
                            this.#s = !1;
                        else {
                            if (this.#s = !0, this.onTreeChanged(), this.#e.length === 0) {
                                this.#s = !1;
                                return
                            }
                            this.scrollToFocus()
                        }
                        this.#r(),
                        t.preventDefault();
                        return
                    } else if (t.keyCode === B) {
                        this.#s && (this.#s = !1, this.#r(), t.preventDefault());
                        return
                    } else if (!this.#s)
                        return;
                    t.preventDefault(),
                    d(this.#e[this.#t]) || this.onTreeChanged();
                    let e = this.#e[this.#t];
                    if ([P, R, D, H, K].includes(t.keyCode)) {
                        t.keyCode === P ? this.#o(t.shiftKey ? -1 : 1) : t.keyCode === R || t.keyCode === D ? this.#o(-1) : (t.keyCode === H || t.keyCode === K) && this.#o(1),
                        this.scrollToFocus();
                        return
                    }
                    if (e.tagName === "LI" && [L, T, C, p, N, S].includes(t.keyCode)) {
                        t.keyCode === L || t.keyCode === T ? (a.switchTab(e), this.onTreeChanged()) : t.keyCode === C || t.keyCode === p ? this.#o(1) : (t.keyCode === N || t.keyCode === S) && this.#o(-1),
                        this.scrollToFocus();
                        return
                    }
                    if (e.parentNode.tagName === "FOOTER" && e.closest(".kint-rich")) {
                        if (t.keyCode === L || t.keyCode === T)
                            e.parentNode.classList.toggle("kint-show");
                        else if (t.keyCode === N || t.keyCode === S)
                            if (e.parentNode.classList.contains("kint-show"))
                                e.parentNode.classList.remove("kint-show");
                            else {
                                this.#l(e.closest(".kint-rich"));
                                return
                            }
                        else if (t.keyCode === C || t.keyCode === p)
                            e.parentNode.classList.add("kint-show");
                        else if (t.keyCode === A && !this.#i.isFolderOpen() && e.matches(".kint-rich > footer > nav")) {
                            let i = e.closest(".kint-rich").querySelector(".kint-parent > nav, .kint-rich > footer > nav");
                            this.#i.addToFolder(e),
                            this.onTreeChanged(),
                            this.setCursor(i),
                            this.scrollToFocus()
                        }
                        return
                    }
                    let s = e.closest(".kint-parent");
                    if (s) {
                        if (t.keyCode === j) {
                            a.toggleAccessPath(s);
                            return
                        }
                        if (t.keyCode === A) {
                            !this.#i.isFolderOpen() && s.matches(".kint-rich:not(.kint-folder) > dl > .kint-parent") && (this.#i.addToFolder(e), this.onTreeChanged(), this.setCursor(e), this.scrollToFocus());
                            return
                        }
                        if (t.keyCode === V) {
                            let i=s.closest(".kint-rich > dl")?.querySelector(".kint-search")?.closest(".kint-parent");
                            if (i) {
                                e.classList.add("kint-weak-focus"),
                                u.toggleSearchBox(i, !0);
                                return
                            }
                        }
                        if (t.keyCode === L || t.keyCode === T) {
                            a.toggle(s),
                            this.onTreeChanged();
                            return
                        }
                        if ([C, p, N, S].includes(t.keyCode)) {
                            let i = s.classList.contains("kint-show");
                            if (t.keyCode === C || t.keyCode === p) {
                                i && a.toggleChildren(s, !0),
                                a.toggle(s, !0),
                                this.onTreeChanged();
                                return
                            } else if (i) {
                                a.toggleChildren(s, !1),
                                a.toggle(s, !1),
                                this.onTreeChanged();
                                return
                            } else {
                                this.#l(s);
                                return
                            }
                        }
                    }
                }
            }
            ;
        var y = class {
            #e;
            #t;
            constructor(t)
            {
                if (!(t instanceof h))
                    throw new Error("Invalid argument to Plain.constructor()");
                this.#e = t.window,
                t.runOnInit(this.#s.bind(this))
            }
            #s()
            {
                d(this.#t) || (this.#t = this.#e.document.querySelector("style.kint-plain-style")),
                this.#t && m(this.#t)
            }
        }
        ;
        var w = class {
            #e;
            constructor(t)
            {
                if (!(t instanceof h))
                    throw new Error("Invalid argument to Microtime.constructor()");
                this.#e = t.window,
                t.runOnInit(this.#t.bind(this))
            }
            #t()
            {
                let t = {},
                    e = this.#e.document.querySelectorAll("[data-kint-microtime-group]");
                for (let s of e) {
                    let i = s.querySelector(".kint-microtime-lap");
                    if (!i)
                        continue;
                    let r = s.dataset.kintMicrotimeGroup,
                        o = parseFloat(i.textContent),
                        l = parseFloat(s.querySelector(".kint-microtime-avg").textContent);
                    t[r] ??= {
                        min: o,
                        max: o,
                        avg: l
                    },
                    t[r].min > o && (t[r].min = o),
                    t[r].max < o && (t[r].max = o),
                    t[r].avg = l
                }
                for (let s of e) {
                    let i = s.querySelector(".kint-microtime-lap");
                    if (!i)
                        continue;
                    let r = parseFloat(i.textContent),
                        o = t[s.dataset.kintMicrotimeGroup];
                    if (s.querySelector(".kint-microtime-avg").textContent = o.avg, !(r === o.min && r === o.max))
                        if (s.classList.add("kint-microtime-js"), r > o.avg) {
                            let l = (r - o.avg) / (o.max - o.avg);
                            i.style.background = "hsl(" + (40 - 40 * l) + ", 100%, 65%)"
                        } else {
                            let l = 0;
                            o.avg !== o.min && (l = (o.avg - r) / (o.avg - o.min)),
                            i.style.background = "hsl(" + (40 + 80 * l) + ", 100%, 65%)"
                        }
                }
            }
        }
        ;
        var U = Symbol(),
            h = class n {
                static #e = null;
                #t;
                #s = [];
                #i = new Set;
                static init(t)
                {
                    return n.#e ??= new n(t, U), n.#e.#n(), n.#e.runOnLoad(n.#r), n.#e
                }
                get window()
                {
                    return this.#t
                }
                constructor(t, e)
                {
                    if (U !== e)
                        throw new Error("Kint constructor is private. Use Kint.init()");
                    if (!(t instanceof Window))
                        throw new Error("Invalid argument to Kint.init()");
                    this.#t = t,
                    this.runOnInit(this.#o.bind(this)),
                    new y(this),
                    new a(this),
                    new w(this)
                }
                runOnLoad(t)
                {
                    if (this.#t.document.readyState === "complete")
                        try {
                            t()
                        } catch {}
                    else
                        this.#t.addEventListener("load", t)
                }
                runOnInit(t)
                {
                    this.#s.push(t)
                }
                #n()
                {
                    this.#t.document.currentScript && (this.#i.add(E(window.document.currentScript)), window.document.currentScript.remove())
                }
                #o()
                {
                    for (let t of this.#i.keys())
                        for (let e of this.#t.document.querySelectorAll(t))
                            e.remove()
                }
                static #r()
                {
                    for (let t of n.#e.#s)
                        t()
                }
            }
            ;
        window.Kint || (window.Kint = h);
        window.Kint.init(window);
    })();
    </script>
    <style class="kint-rich-style">
        .kint-rich {
            --spacing: 4px;
            --nav-size: 15px;
            --backdrop-color: rgba(255, 255, 255, 0.9);
            --main-background: #e0eaef;
            --secondary-background: #c1d4df;
            --text-color: #1d1e1e;
            --variable-name-color: #1d1e1e;
            --variable-type-color: #0092db;
            --variable-type-color-hover: #5cb730;
            --border-color: #b6cedb;
            --border-color-hover: #0092db;
            --border: 1px solid var(--border-color);
            --foldout-max-size: calc(100vh - 100px);
            --foldout-zindex: 999999;
            --caret-image: url("data:image/svg+xml;utf8,
            
        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 150'>
            <g stroke-width='2' fill='%23FFF'>
                <path d='M1 1h28v28H1zm5 14h18m-9 9V6M1 61h28v28H1zm5 14h18' stroke='%23379'/>
                <path d='M1 31h28v28H1zm5 14h18m-9 9V36M1 91h28v28H1zm5 14h18' stroke='%235A3'/>
                <path d='M1 121h28v28H1zm5 5l18 18m-18 0l18-18' stroke='%23CCC'/>
            </g>
        </svg>
        ");--ap-image: url("data:image/svg+xml;utf8,
        
        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'>
            <g stroke='%23000' fill='transparent'>
                <path d='M2 8h3m3 3v3M8 2v3m3 3h3M3 8' stroke-width='2' stroke-linecap='round'/>
                <circle stroke-width='1.5' r='4.5' cx='8' cy='8'/>
            </g>
        </svg>
        ");--folder-image: url("data:image/svg+xml;utf8,
        
        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'>
            <path d='M2 2h4l2 2h6v9H2V2h2' stroke-width='2' stroke='%23000' fill='transparent' stroke-linejoin='round'/>
        </svg>
        ");--search-image: url("data:image/svg+xml;utf8,
        
        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'>
            <g stroke='%23000' fill='transparent'>
                <path d='M2 14l3-3' stroke-linecap='round' stroke-width='3'/>
                <circle stroke-width='2' r='5' cx='9' cy='7'/>
            </g>
        </svg>
        ");font-size:13px;overflow-x:auto;white-space:nowrap;background:var(--backdrop-color);direction:ltr;contain:content}.kint-rich.kint-folder{position:fixed;bottom:0;left:0;right:0;z-index:var(--foldout-zindex);width:100%;margin:0;display:block}.kint-rich.kint-folder dd.kint-foldout{max-height:var(--foldout-max-size);padding-right:calc(var(--spacing)*2);overflow-y:scroll;display:none}.kint-rich.kint-folder dd.kint-foldout.kint-show{display:block}.kint-rich::selection{background:var(--border-color-hover);color:var(--text-color)}.kint-rich .kint-focused{box-shadow:0 0 3px 3px var(--variable-type-color-hover)}.kint-rich .kint-focused.kint-weak-focus{box-shadow:0 0 3px 1px color-mix(in srgb, var(--variable-type-color-hover) 50%, transparent)}.kint-rich,.kint-rich::before,.kint-rich::after,.kint-rich *,.kint-rich *::before,.kint-rich *::after{box-sizing:border-box;border-radius:0;color:var(--text-color);float:none !important;font-family:Consolas,Menlo,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New,monospace,serif;line-height:15px;margin:0;padding:0;text-align:left}.kint-rich{margin:calc(var(--spacing)*2) 0}.kint-rich dt,.kint-rich dl{width:auto}.kint-rich dt,.kint-rich div.access-path{background:var(--main-background);border:var(--border);color:var(--text-color);display:block;font-weight:bold;list-style:none outside none;overflow:auto;padding:var(--spacing)}.kint-rich dt:hover,.kint-rich div.access-path:hover{border-color:var(--border-color-hover)}.kint-rich>dl dl{padding:0 0 0 calc(var(--spacing)*3)}.kint-rich dt.kint-parent>nav,.kint-rich>footer>nav{background:var(--caret-image) no-repeat scroll 0 0/var(--nav-size) 75px rgba(0,0,0,0);cursor:pointer;display:inline-block;height:var(--nav-size);width:var(--nav-size);margin-right:3px;vertical-align:middle}.kint-rich dt.kint-parent:hover>nav,.kint-rich>footer>nav:hover{background-position:0 25%}.kint-rich dt.kint-parent.kint-show>nav,.kint-rich>footer.kint-show>nav{background-position:0 50%}.kint-rich dt.kint-parent.kint-show:hover>nav,.kint-rich>footer.kint-show>nav:hover{background-position:0 75%}.kint-rich dt.kint-parent.kint-locked>nav{background-position:0 100%}.kint-rich dt.kint-parent+dd{display:none;border-left:1px dashed var(--border-color);contain:strict}.kint-rich dt.kint-parent.kint-show+dd{display:block;contain:content}.kint-rich var,.kint-rich var a{color:var(--variable-type-color);font-style:normal}.kint-rich dt:hover var,.kint-rich dt:hover var a{color:var(--variable-type-color-hover)}.kint-rich dfn{font-style:normal;font-family:monospace;color:var(--variable-name-color)}.kint-rich pre{color:var(--text-color);margin:0 0 0 calc(var(--spacing)*3);padding:5px;overflow-y:hidden;border-top:0;border:var(--border);background:var(--main-background);display:block;word-break:normal}.kint-rich .kint-access-path-trigger,.kint-rich .kint-folder-trigger,.kint-rich .kint-search-trigger{background:color-mix(in srgb, var(--text-color) 80%, transparent);border-radius:3px;padding:2px;height:var(--nav-size);width:var(--nav-size);font-size:var(--nav-size);margin-left:5px;font-weight:bold;text-align:center;line-height:1;float:right !important;cursor:pointer;position:relative;overflow:hidden}.kint-rich .kint-access-path-trigger::before,.kint-rich .kint-folder-trigger::before,.kint-rich .kint-search-trigger::before{display:block;content:"";width:100%;height:100%;background:var(--main-background);mask:center/contain no-repeat alpha}.kint-rich .kint-access-path-trigger:hover,.kint-rich .kint-folder-trigger:hover,.kint-rich .kint-search-trigger:hover{background:var(--main-background)}.kint-rich .kint-access-path-trigger:hover::before,.kint-rich .kint-folder-trigger:hover::before,.kint-rich .kint-search-trigger:hover::before{background:var(--text-color)}.kint-rich .kint-access-path-trigger::before{mask-image:var(--ap-image)}.kint-rich .kint-folder-trigger::before{mask-image:var(--folder-image)}.kint-rich .kint-search-trigger::before{mask-image:var(--search-image)}.kint-rich input.kint-search{display:none;border:var(--border);border-top-width:0;border-bottom-width:0;padding:var(--spacing);float:right !important;margin:calc(var(--spacing)*-1) 0;color:var(--variable-name-color);background:var(--secondary-background);height:calc(var(--nav-size) + var(--spacing)*2);width:calc(var(--nav-size)*10);position:relative;z-index:100}.kint-rich input.kint-search.kint-show{display:block}.kint-rich .kint-search-root ul.kint-tabs>li:not(.kint-search-match){background:var(--secondary-background);filter:saturate(0);opacity:.5}.kint-rich .kint-search-root dl:not(.kint-search-match){opacity:.5}.kint-rich .kint-search-root dl:not(.kint-search-match)>dt{background:var(--main-background);filter:saturate(0)}.kint-rich .kint-search-root dl:not(.kint-search-match) dl,.kint-rich .kint-search-root dl:not(.kint-search-match) ul.kint-tabs>li:not(.kint-search-match){opacity:1}.kint-rich div.access-path{background:var(--secondary-background);display:none;margin-top:5px;padding:4px;white-space:pre}.kint-rich div.access-path.kint-show{display:block}.kint-rich footer{padding:0 3px 3px;font-size:9px;background:rgba(0,0,0,0)}.kint-rich footer>.kint-folder-trigger{background:rgba(0,0,0,0)}.kint-rich footer>.kint-folder-trigger::before{background:var(--text-color)}.kint-rich footer nav{height:10px;width:10px;background-size:10px 50px}.kint-rich footer>ol{display:none;margin-left:32px}.kint-rich footer.kint-show>ol{display:block}.kint-rich a{color:var(--text-color);text-shadow:none;text-decoration:underline}.kint-rich a:hover{color:var(--variable-name-color);border-bottom:1px dotted var(--variable-name-color)}.kint-rich ul{list-style:none;padding-left:calc(var(--spacing)*3)}.kint-rich ul:not(.kint-tabs) li{border-left:1px dashed var(--border-color)}.kint-rich ul:not(.kint-tabs) li>dl{border-left:none}.kint-rich ul.kint-tabs{margin:0 0 0 calc(var(--spacing)*3);padding-left:0;background:var(--main-background);border:var(--border);border-top:0}.kint-rich ul.kint-tabs>li{background:var(--secondary-background);border:var(--border);cursor:pointer;display:inline-block;height:calc(var(--spacing)*6);margin:calc(var(--spacing)/2);padding:0 calc(2px + var(--spacing)*2.5);vertical-align:top}.kint-rich ul.kint-tabs>li:hover,.kint-rich ul.kint-tabs>li.kint-active-tab:hover{border-color:var(--border-color-hover);color:var(--variable-type-color-hover)}.kint-rich ul.kint-tabs>li.kint-active-tab{background:var(--main-background);border-top:0;margin-top:-1px;height:27px;line-height:24px}.kint-rich ul.kint-tabs>li:not(.kint-active-tab){line-height:calc(var(--spacing)*5)}.kint-rich ul.kint-tabs li+li{margin-left:0}.kint-rich ul.kint-tab-contents>li{display:none;contain:strict}.kint-rich ul.kint-tab-contents>li.kint-show{display:block;contain:content}.kint-rich dt:hover+dd>ul>li.kint-active-tab{border-color:var(--border-color-hover);color:var(--variable-type-color-hover)}.kint-rich dt>.kint-color-preview{width:var(--nav-size);height:var(--nav-size);display:inline-block;vertical-align:middle;margin-left:10px;border:var(--border);background-color:#ccc;background-image:url('data:image/svg+xml;utf8,
        
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2 2">
            <path fill="%23FFF" d="M0 0h1v2h1V1H0z"/>
        </svg>
        ');background-size:min(20px,100%)}.kint-rich dt>.kint-color-preview:hover{border-color:var(--border-color-hover)}.kint-rich dt>.kint-color-preview>div{width:100%;height:100%}.kint-rich table{border-collapse:collapse;empty-cells:show;border-spacing:0}.kint-rich table *{font-size:12px}.kint-rich table dt{background:none;padding:calc(var(--spacing)/2)}.kint-rich table dt .kint-parent{min-width:100%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.kint-rich table td,.kint-rich table th{border:var(--border);padding:calc(var(--spacing)/2);vertical-align:center}.kint-rich table th{cursor:alias}.kint-rich table td:first-child,.kint-rich table th{font-weight:bold;background:var(--secondary-background);color:var(--variable-name-color)}.kint-rich table td{background:var(--main-background);white-space:pre}.kint-rich table td>dl{padding:0}.kint-rich table pre{border-top:0;border-right:0}.kint-rich table thead th:first-child{background:none;border:0}.kint-rich table tr:hover>td{box-shadow:0 0 1px 0 var(--border-color-hover) inset}.kint-rich table tr:hover var{color:var(--variable-type-color-hover)}.kint-rich table ul.kint-tabs li.kint-active-tab{height:20px;line-height:17px}.kint-rich pre.kint-source{margin-left:-1px}.kint-rich pre.kint-source[data-kint-filename]:before{display:block;content:attr(data-kint-filename);margin-bottom:var(--spacing);padding-bottom:var(--spacing);border-bottom:1px solid var(--secondary-background)}.kint-rich pre.kint-source>div:before{display:inline-block;content:counter(kint-l);counter-increment:kint-l;border-right:1px solid var(--border-color-hover);padding-right:calc(var(--spacing)*2);margin-right:calc(var(--spacing)*2)}.kint-rich pre.kint-source>div.kint-highlight{background:var(--secondary-background)}.kint-rich .kint-microtime-js .kint-microtime-lap{text-shadow:-1px 0 var(--border-color-hover),0 1px var(--border-color-hover),1px 0 var(--border-color-hover),0 -1px var(--border-color-hover);color:var(--main-background);font-weight:bold}.kint-rich{--main-background: #f8f8f8;--secondary-background: #f8f8f8;--variable-type-color: #06f;--variable-type-color-hover: #f00;--border-color: #d7d7d7;--border-color-hover: #aaa;--alternative-background: #fff;--highlight-color: #cfc;--caret-image: url("data:image/svg+xml;utf8,
        
        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 150'>
            <path d='M6 7h18l-9 15zm0 30h18l-9 15zm0 45h18l-9-15zm0 30h18l-9-15zm0 12l18 18m-18 0l18-18' fill='%23555'/>
            <path d='M6 126l18 18m-18 0l18-18' stroke-width='2' stroke='%23555'/>
        </svg>
        ")}.kint-rich .kint-focused{box-shadow:0 0 3px 2px var(--variable-type-color-hover)}.kint-rich dt{font-weight:normal}.kint-rich dt.kint-parent{margin-top:4px}.kint-rich dl dl{margin-top:4px;padding-left:25px;border-left:none}.kint-rich>dl>dt{background:var(--secondary-background)}.kint-rich ul{margin:0;padding-left:0}.kint-rich ul:not(.kint-tabs)>li{border-left:0}.kint-rich ul.kint-tabs{background:var(--secondary-background);border:var(--border);border-width:0 1px 1px 1px;padding:4px 0 0 12px;margin-left:-1px;margin-top:-1px}.kint-rich ul.kint-tabs li,.kint-rich ul.kint-tabs li+li{margin:0 0 0 4px}.kint-rich ul.kint-tabs li{border-bottom-width:0;height:calc(var(--spacing)*6 + 1px)}.kint-rich ul.kint-tabs li:first-child{margin-left:0}.kint-rich ul.kint-tabs li.kint-active-tab{border-top:var(--border);background:var(--alternative-background);font-weight:bold;padding-top:0;border-bottom:1px solid var(--alternative-background) !important;margin-bottom:-1px}.kint-rich ul.kint-tabs li.kint-active-tab:hover{border-bottom:1px solid var(--alternative-background)}.kint-rich ul>li>pre{border:var(--border)}.kint-rich dt:hover+dd>ul{border-color:var(--border-color-hover)}.kint-rich pre{background:var(--alternative-background);margin-top:4px;margin-left:25px}.kint-rich .kint-source{margin-left:-1px}.kint-rich .kint-source .kint-highlight{background:var(--highlight-color)}.kint-rich .kint-parent.kint-show>.kint-search{border-bottom-width:1px}.kint-rich table td{background:var(--alternative-background)}.kint-rich table td>dl{padding:0;margin:0}.kint-rich table td>dl>dt.kint-parent{margin:0}.kint-rich table td:first-child,.kint-rich table td,.kint-rich table th{padding:2px 4px}.kint-rich table dd,.kint-rich table dt{background:var(--alternative-background)}.kint-rich table tr:hover>td{box-shadow:none;background:var(--highlight-color)}
        
    </style>

    <!-- DEBUG-VIEW START 1 APPPATH/Views/layouts/partials/head.php -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spin — CAMPUSS SAVER</title>

    <!-- AdminLTE deps (Bootstrap grid + komponen JS dipertahankan) -->
    <link rel="stylesheet" href="http://localhost:8081/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="http://localhost:8081/adminlte/dist/css/adminlte.min.css">

    <!-- LIBRIS type -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Geist+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost:8081/assets/tabler/tabler-icons.min.css">
    <link rel="icon" type="image/png" href="http://localhost:8081/assets/libris-favicon.png">

    <style>
    /* ════════ LIBRIS — Admin (over AdminLTE) ════════ */
    :root {
        --forest: #224B29;
        --accent: #2F6B3C;
        --tint: #EAF1E9;
        --paper: #FAFAF8;
        --surface: #FFF;
        --ink: #18241B;
        --muted: #6B7280;
        --faint: #9AA29B;
        --border: #ECECEC;
        --border-2: #E2E2DE;
        --amber: #8A5A1A;
        --amber-bg: #F3EAD6;
        --mono: 'Geist Mono', ui-monospace, monospace;
        --r-sm: 9px;
        --r-md: 12px;
        --r-lg: 16px;
        --sh-sm: 0 1px 3px rgba(24, 36, 27, .05);
        --sh-md: 0 8px 24px rgba(24, 36, 27, .06);
        --sh-lg: 0 20px 48px rgba(24, 36, 27, .12);
        /* alias lama supaya inline var() di halaman lama → LIBRIS */
        --y2k-blue: #224B29;
        --y2k-blue-deep: #16331c;
        --y2k-pink: #2F6B3C;
        --y2k-pink-hot: #224B29;
        --y2k-pink-soft: #EAF1E9;
        --y2k-cyan: #EAF1E9;
        --y2k-lime: #EAF1E9;
        --y2k-yellow: #F3EAD6;
        --y2k-peach: #F3EAD6;
        --y2k-bg: #FAFAF8;
        --y2k-surface: #FFF;
        --y2k-ink: #18241B;
        --y2k-ink-soft: #6B7280;
        --y2k-border: #ECECEC;
        --ink-900: #18241B;
        --ink-700: #224B29;
        --ink-500: #6B7280;
        --ink-300: #9AA29B;
        --ink-100: #EAF1E9;
        --ink-50: #FAFAF8;
        --surface: #FFF;
        --border: #ECECEC;
        --accent-2: #2F6B3C;
        --radius: 12px;
    }

    body, .wrapper, .content-wrapper, .main-sidebar, .main-header, .card, .btn, .table, input, select, textarea, .modal, .nav-link, .brand-text, h1, h2, h3, h4, h5, h6, p, a, span, div, td, th, label {
        font-family: 'Geist', system-ui, -apple-system, sans-serif;
    }

    .font-mono, .mono {
        font-family: var(--mono) !important;
    }

    body.hold-transition, .wrapper {
        background: var(--paper) !important;
    }

    body {
        color: var(--ink);
        -webkit-font-smoothing: antialiased;
    }

    ::selection {
        background: var(--tint);
        color: var(--forest);
    }

    a {
        color: var(--forest);
    }/* ── Sidebar (light, Notion-style) ── */

    .main-sidebar {
        background: var(--surface) !important;
        border-right: 1px solid var(--border) !important;
        box-shadow: none !important;
    }

    .main-sidebar .brand-link {
        background: transparent !important;
        border-bottom: 1px solid var(--border) !important;
        padding: 15px 16px !important;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .brand-link .brand-text {
        color: var(--ink) !important;
        font-weight: 600 !important;
        letter-spacing: .18em;
        font-size: 15px;
    }

    .nav-sidebar .nav-header {
        color: var(--faint) !important;
        font-family: var(--mono);
        font-size: 10px !important;
        letter-spacing: .14em !important;
        text-transform: uppercase;
        padding: 16px 18px 7px !important;
        opacity: 1;
    }

    .nav-sidebar .nav-header::before {
        content: none !important;
    }

    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link, .nav-sidebar > .nav-item > .nav-link {
        color: var(--muted) !important;
        font-size: 13.5px !important;
        font-weight: 500 !important;
        border-radius: 9px !important;
        margin: 2px 10px !important;
        padding: 9px 12px !important;
        border: 0 !important;
        transform: none !important;
        transition: background .14s, color .14s;
    }

    .nav-sidebar > .nav-item > .nav-link:hover {
        background: var(--paper) !important;
        color: var(--ink) !important;
        transform: none !important;
    }

    .nav-sidebar > .nav-item > .nav-link.active {
        background: var(--tint) !important;
        color: var(--forest) !important;
        box-shadow: none !important;
        transform: none !important;
        font-weight: 500 !important;
    }

    .nav-sidebar .nav-icon {
        color: inherit !important;
        font-size: 17px !important;
        margin-right: 9px;
    }

    .brand-link img {
        filter: none !important;
    }/* ── Topbar ── */

    .main-header.navbar {
        background: var(--surface) !important;
        border-bottom: 1px solid var(--border) !important;
        box-shadow: none !important;
        min-height: 58px;
    }

    .main-header .nav-link {
        color: var(--muted) !important;
    }

    .main-header .nav-link:hover {
        color: var(--ink) !important;
    }/* ── Content ── */

    .content-wrapper {
        background: var(--paper) !important;
        background-image: none !important;
    }

    .content-header {
        padding: 24px 28px 6px !important;
    }

    .content-header h1, .content-header .page-title {
        font-size: 22px !important;
        font-weight: 600 !important;
        letter-spacing: -.02em !important;
        color: var(--ink) !important;
        text-shadow: none !important;
    }

    .content {
        padding: 10px 28px 36px !important;
    }

    .page-sub {
        color: var(--muted) !important;
    }/* ── Cards ── */

    .card, .lis-card {
        background: var(--surface) !important;
        border: 1px solid var(--border) !important;
        border-radius: var(--r-lg) !important;
        box-shadow: var(--sh-sm) !important;
        margin-bottom: 20px;
        transition: box-shadow .18s, transform .18s;
    }

    .card:hover, .lis-card:hover {
        box-shadow: var(--sh-md) !important;
        transform: none;
    }

    .card-header {
        background: transparent !important;
        border-bottom: 1px solid var(--border) !important;
        padding: 16px 20px !important;
    }

    .card-title, .card-header h3 {
        font-size: 15px !important;
        font-weight: 600 !important;
        color: var(--ink) !important;
        letter-spacing: -.01em;
    }

    .card-body, .lis-card-body {
        padding: 18px 20px !important;
    }

    .card-tools .btn + .btn {
        margin-left: 7px;
    }/* ── Buttons ── */

    .btn {
        border-radius: var(--r-sm) !important;
        font-weight: 500 !important;
        font-size: 13px !important;
        border: 1px solid transparent !important;
        box-shadow: none !important;
        padding: 8px 15px !important;
        transition: transform .14s, background .14s, box-shadow .14s !important;
    }

    .btn:hover {
        transform: translateY(-1px);
    }

    .btn-sm {
        font-size: 12px !important;
        padding: 6px 11px !important;
        border-radius: 8px !important;
    }

    .btn-primary, .btn-success {
        background: var(--forest) !important;
        border-color: var(--forest) !important;
        color: #fff !important;
        box-shadow: 0 4px 12px rgba(34, 75, 41, .18) !important;
    }

    .btn-primary:hover, .btn-success:hover {
        background: #1d4124 !important;
    }

    .btn-secondary, .btn-default, .btn-light {
        background: var(--surface) !important;
        border-color: var(--border-2) !important;
        color: var(--ink) !important;
    }

    .btn-secondary:hover, .btn-default:hover {
        border-color: var(--faint) !important;
        background: var(--paper) !important;
    }

    .btn-info, .btn-warning {
        background: var(--tint) !important;
        border-color: transparent !important;
        color: var(--forest) !important;
    }

    .btn-danger {
        background: var(--amber-bg) !important;
        border-color: transparent !important;
        color: var(--amber) !important;
    }

    .btn-danger:hover {
        background: #ecddc4 !important;
    }/* ── Tables ── */

    .table {
        color: var(--ink) !important;
        margin-bottom: 0;
    }/* Header tabel SELALU putih & modern — netralkan kelas warna bawaan (bg-success/primary/dark/light, text-white) */

    .table thead, .table thead tr, .table thead th {
        background: transparent !important;
        background-color: transparent !important;
    }

    .table thead th {
        color: var(--faint) !important;
        font-family: var(--mono) !important;
        font-size: 11px !important;
        letter-spacing: .05em;
        text-transform: uppercase;
        font-weight: 500 !important;
        border-top: 0 !important;
        border-bottom: 1px solid var(--border) !important;
        padding: 11px 14px !important;
    }

    .table td, .table th {
        border-color: var(--border) !important;
        border-top: 1px solid var(--border) !important;
        vertical-align: middle !important;
        padding: 12px 14px !important;
        font-size: 13.5px;
    }

    .table-hover tbody tr {
        transition: background .12s;
    }

    .table-hover tbody tr:hover {
        background: var(--paper) !important;
    }

    .table-bordered, .table-bordered td, .table-bordered th {
        border-color: var(--border) !important;
    }

    .dataTables_wrapper .dataTables_filter input, .dataTables_wrapper .dataTables_length select {
        border: 1px solid var(--border-2) !important;
        border-radius: 8px !important;
        padding: 6px 10px !important;
    }/* ── Forms ── */

    .form-control, .custom-select, select.form-control {
        border: 1px solid var(--border-2) !important;
        border-radius: var(--r-sm) !important;
        color: var(--ink) !important;
        background: var(--surface) !important;
        box-shadow: none !important;
        height: calc(2.5rem + 2px);
        font-size: 14px;
    }

    textarea.form-control {
        height: auto;
    }

    .form-control:focus, .custom-select:focus {
        border-color: var(--forest) !important;
        box-shadow: 0 0 0 3px var(--tint) !important;
    }

    label {
        font-weight: 500 !important;
        color: var(--ink) !important;
        font-size: 13px;
        margin-bottom: 6px;
    }

    .form-group {
        margin-bottom: 16px;
    }/* ── Modals ── */

    .modal-content {
        border: 1px solid var(--border) !important;
        border-radius: var(--r-lg) !important;
        box-shadow: var(--sh-lg) !important;
    }

    .modal-header {
        background: transparent !important;
        border-bottom: 1px solid var(--border) !important;
        padding: 16px 20px !important;
    }

    .modal-title {
        font-size: 16px !important;
        font-weight: 600 !important;
        color: var(--ink) !important;
    }

    .modal-header .close {
        color: var(--faint) !important;
        text-shadow: none !important;
        opacity: 1;
        font-weight: 400;
    }

    .modal-body {
        padding: 20px !important;
    }

    .modal-footer {
        border-top: 1px solid var(--border) !important;
        padding: 14px 20px !important;
    }

    .modal-backdrop.show {
        background: rgba(24, 36, 27, .4) !important;
        opacity: 1 !important;
    }/* ── Badges / pills ── */

    .badge {
        border-radius: 999px !important;
        font-weight: 500 !important;
        font-family: var(--mono);
        font-size: 10.5px !important;
        letter-spacing: .02em;
        padding: .4em .8em !important;
    }

    .badge-success, .badge-primary {
        background: var(--tint) !important;
        color: var(--forest) !important;
    }

    .badge-danger, .badge-warning {
        background: var(--amber-bg) !important;
        color: var(--amber) !important;
    }

    .badge-secondary, .badge-info {
        background: var(--paper) !important;
        color: var(--muted) !important;
        border: 1px solid var(--border);
    }/* ── Pagination ── */

    .page-link {
        color: var(--ink) !important;
        border-color: var(--border) !important;
        border-radius: 8px !important;
        margin: 0 2px;
    }

    .page-item.active .page-link {
        background: var(--forest) !important;
        border-color: var(--forest) !important;
        color: #fff !important;
    }/* ── Alerts ── */

    .alert {
        border: 1px solid var(--border) !important;
        border-radius: var(--r-md) !important;
        font-size: 14px;
        box-shadow: var(--sh-sm) !important;
    }

    .alert-success {
        background: var(--surface) !important;
        border-left: 3px solid var(--forest) !important;
        color: var(--forest) !important;
    }

    .alert-danger, .alert-warning {
        background: var(--surface) !important;
        border-left: 3px solid var(--amber) !important;
        color: var(--amber) !important;
    }/* ── Footer ── */

    .main-footer {
        background: var(--surface) !important;
        border-top: 1px solid var(--border) !important;
        color: var(--muted) !important;
        font-size: 12px;
        font-family: var(--mono);
        letter-spacing: .03em;
    }

    .main-footer a {
        color: var(--forest) !important;
    }

    .text-muted {
        color: var(--muted) !important;
    }

    .text-dark {
        color: var(--ink) !important;
    }

    ::-webkit-scrollbar {
        width: 11px;
        height: 11px;
    }

    ::-webkit-scrollbar-thumb {
        background: #dcdcd6;
        border: 3px solid var(--paper);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #c8c8c2;
    }
    </style>

    <!-- DEBUG-VIEW ENDED 1 APPPATH/Views/layouts/partials/head.php -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- DEBUG-VIEW START 2 APPPATH/Views/layouts/partials/navbar.php -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="padding:8px 12px">
                        <i class="ti ti-menu-2" style="font-size:20px;color:var(--muted)"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-md-inline-block">
                    <span onclick="if(window.showToast){showToast('Pencarian cepat segera hadir')}else{location='http://localhost:8081/list/books'}" style="display:flex;align-items:center;gap:8px;background:var(--paper);border:1px solid var(--border);border-radius:9px;padding:7px 12px;color:var(--faint);font-size:12.5px;cursor:pointer;min-width:280px">
                        <i class="ti ti-search" style="font-size:14px"></i>
                         Cari buku, anggota, atau perintah…
                                        
                        <span style="margin-left:auto;font-family:var(--mono);font-size:9.5px;border:1px solid var(--border);border-radius:5px;padding:1px 5px">⌘K</span>
                    </span>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto align-items-center" style="gap:6px">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="http://localhost:8081/" class="nav-link" style="font-size:13px;font-weight:500;color:var(--muted);display:inline-flex;align-items:center;gap:6px">
                        <i class="ti ti-external-link" style="font-size:16px"></i>
                         Lihat situs
                                    
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" role="button" title="Notifikasi">
                        <i class="ti ti-bell" style="font-size:18px;color:var(--muted)"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-toggle="dropdown" style="gap:9px;padding:5px 8px 5px 6px">
                        <span style="width:30px;height:30px;border-radius:999px;background:#224B29;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:600;font-size:12px">R</span>
                        <span style="font-size:13.5px;font-weight:500;color:var(--ink)">Rossa</span>
                        <i class="ti ti-chevron-down" style="font-size:14px;color:var(--faint)"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="border:1px solid var(--border);border-radius:12px;box-shadow:var(--sh-lg);padding:6px;min-width:180px;margin-top:8px">
                        <a href="http://localhost:8081/profil" class="dropdown-item" style="border-radius:8px;font-size:13.5px;font-weight:500;padding:9px 12px;color:var(--ink)">
                            <i class="ti ti-user-circle mr-2" style="color:var(--muted)"></i>
                            Profil
                        </a>
                        <div class="dropdown-divider" style="margin:5px 6px;border-top:1px solid var(--border)"></div>
                        <a href="http://localhost:8081/logout" class="dropdown-item" style="border-radius:8px;font-size:13.5px;font-weight:500;padding:9px 12px;color:var(--amber)">
                            <i class="ti ti-logout mr-2"></i>
                            Keluar
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- DEBUG-VIEW ENDED 2 APPPATH/Views/layouts/partials/navbar.php -->

        <!-- DEBUG-VIEW START 3 APPPATH/Views/layouts/partials/sidebar.php -->

        <aside class="main-sidebar sidebar-light-primary elevation-1">

            <a href="http://localhost:8081/dashboard" class="brand-link">
                <span class="brand-text font-weight-bold">CAMPUSS SAVER</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                        <!-- DASHBOARD -->
                        <li class="nav-item">
                            <a href="http://localhost:8081/dashboard" class="nav-link ">
                                <i class="nav-icon ti ti-layout-dashboard"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <!-- KELOMPOK -->
                        <li class="nav-header">KOLABORASI</li>

                        <li class="nav-item">
                            <a href="http://localhost:8081/groups" class="nav-link ">
                                <i class="nav-icon ti ti-users-group"></i>
                                <p>Kelompok</p>
                            </a>
                        </li>

                        <!-- TUGAS -->
                        <li class="nav-item">
                            <a href="http://localhost:8081/tasks" class="nav-link ">
                                <i class="nav-icon ti ti-checkbox"></i>
                                <p>Tugas</p>
                            </a>
                        </li>

                        <!-- CATATAN -->
                        <li class="nav-item">
                            <a href="http://localhost:8081/notes" class="nav-link ">
                                <i class="nav-icon ti ti-notes"></i>
                                <p>Catatan</p>
                            </a>
                        </li>

                        <!-- TEMPLATE -->
                        <li class="nav-header">SUMBER DAYA</li>

                        <li class="nav-item">
                            <a href="http://localhost:8081/templates" class="nav-link ">
                                <i class="nav-icon ti ti-file-description"></i>
                                <p>Template</p>
                            </a>
                        </li>

                        <li class="nav-item">

                            <a href="http://localhost:8081/workspaces" class="nav-link">

                                <i class="nav-icon fas fa-folder-open"></i>

                                <p>
                                            Workspace
                                        </p>

                            </a>

                        </li>

                        <!-- FORUM -->
                        <li class="nav-header">KOMUNITAS</li>

                        <li class="nav-item">
                            <a href="http://localhost:8081/forum" class="nav-link ">
                                <i class="nav-icon ti ti-message-circle"></i>
                                <p>Forum</p>
                            </a>
                        </li>

                        <!-- SPIN -->
                        <li class="nav-item">
                            <a href="http://localhost:8081/spin" class="nav-link active">
                                <i class="nav-icon ti ti-dice-5"></i>
                                <p>Spin Pembagian Tugas</p>
                            </a>
                        </li>

                        <!-- PROFIL -->
                        <li class="nav-header">AKUN</li>

                        <li class="nav-item">
                            <a href="http://localhost:8081/profil" class="nav-link ">
                                <i class="nav-icon ti ti-user"></i>
                                <p>Profil</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="http://localhost:8081/logout" class="nav-link">
                                <i class="nav-icon ti ti-logout"></i>
                                <p>Logout</p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- DEBUG-VIEW ENDED 3 APPPATH/Views/layouts/partials/sidebar.php -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid"></div>
            </section>

            <section class="content">
                <div class="container-fluid">

                    <style>
                    /* =========================================================
                       CAMPUSS SAVER — SPIN
                       ========================================================= */
                    .spin-page {
                        --spin-primary: #6d5dfc;
                        --spin-primary-dark: #5646e8;
                        --spin-soft: #f3f1ff;
                        --spin-border: #e7e5ef;
                        --spin-text: #242336;
                        --spin-muted: #858397;
                        --spin-success: #27b07d;
                        --spin-bg: #f8f8fc;
                        padding: 28px;
                        background: var(--spin-bg);
                        min-height: calc(100vh - 70px);
                    }

                    .spin-header {
                        margin-bottom: 24px;
                    }

                    .spin-header h1 {
                        margin: 0;
                        font-size: 28px;
                        font-weight: 800;
                        color: var(--spin-text);
                    }

                    .spin-header p {
                        margin: 6px 0 0;
                        color: var(--spin-muted);
                    }/* =========================
                       TOP CONTROL
                       ========================= */
                    .spin-settings {
                        background: #fff;
                        border: 1px solid var(--spin-border);
                        border-radius: 20px;
                        padding: 22px;
                        margin-bottom: 22px;
                        box-shadow: 0 8px 30px rgba(50, 40, 100, .04);
                    }

                    .spin-settings-title {
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        font-weight: 750;
                        color: var(--spin-text);
                        margin-bottom: 18px;
                    }

                    .spin-settings-title i {
                        width: 34px;
                        height: 34px;
                        border-radius: 10px;
                        background: var(--spin-soft);
                        color: var(--spin-primary);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .spin-select-grid {
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 16px;
                    }

                    .spin-field label {
                        display: block;
                        font-size: 13px;
                        font-weight: 700;
                        color: #5f5b70;
                        margin-bottom: 7px;
                    }

                    .spin-field select {
                        width: 100%;
                        height: 46px;
                        border: 1px solid #dddbe7;
                        border-radius: 12px;
                        padding: 0 14px;
                        background: #fff;
                        color: var(--spin-text);
                        outline: none;
                        transition: .2s;
                    }

                    .spin-field select:focus {
                        border-color: var(--spin-primary);
                        box-shadow: 0 0 0 4px rgba(109, 93, 252, .10);
                    }/* =========================
                       TASK INFO
                       ========================= */
                    .task-info {
                        margin-top: 18px;
                        padding: 15px 16px;
                        background: #faf9ff;
                        border: 1px solid #ebe8ff;
                        border-radius: 14px;
                        display: none;
                    }

                    .task-info.active {
                        display: flex;
                        gap: 13px;
                        align-items: flex-start;
                    }

                    .task-info-icon {
                        width: 38px;
                        height: 38px;
                        flex: 0 0 38px;
                        border-radius: 11px;
                        background: #e9e5ff;
                        color: var(--spin-primary);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .task-info-title {
                        font-weight: 750;
                        color: var(--spin-text);
                    }

                    .task-info-description {
                        margin-top: 3px;
                        font-size: 13px;
                        color: var(--spin-muted);
                    }/* =========================
                       MAIN GRID
                       ========================= */
                    .spin-main-grid {
                        display: grid;
                        grid-template-columns: minmax(0, 1.3fr) minmax(310px, .7fr);
                        gap: 22px;
                        align-items: start;
                    }

                    .spin-wheel-card, .spin-side-card, .history-card {
                        background: #fff;
                        border: 1px solid var(--spin-border);
                        border-radius: 22px;
                        box-shadow: 0 8px 30px rgba(50, 40, 100, .04);
                    }/* =========================
                       WHEEL
                       ========================= */
                    .spin-wheel-card {
                        padding: 24px;
                        position: relative;
                        overflow: hidden;
                    }

                    .wheel-status {
                        display: flex;
                        justify-content: center;
                        margin-bottom: 12px;
                    }

                    .wheel-status span {
                        display: inline-flex;
                        align-items: center;
                        gap: 7px;
                        background: #f5f4fa;
                        border: 1px solid #eae8f0;
                        color: #777387;
                        padding: 7px 13px;
                        border-radius: 999px;
                        font-size: 12px;
                        font-weight: 700;
                    }

                    .wheel-stage {
                        width: min(500px, 100%);
                        aspect-ratio: 1;
                        margin: 0 auto;
                        position: relative;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    #wheelCanvas {
                        width: 100%;
                        height: 100%;
                        display: block;
                        transform-origin: center center;
                        will-change: transform;
                        filter: drop-shadow(0 15px 30px rgba(70, 60, 120, .12));
                    }

                    .wheel-pointer {
                        position: absolute;
                        z-index: 5;
                        top: -3px;
                        left: 50%;
                        transform: translateX(-50%);
                        width: 0;
                        height: 0;
                        border-left: 17px solid transparent;
                        border-right: 17px solid transparent;
                        border-top: 35px solid #2f2c40;
                        filter: drop-shadow(0 4px 5px rgba(0, 0, 0, .16));
                    }

                    .wheel-center {
                        position: absolute;
                        width: 68px;
                        height: 68px;
                        border-radius: 50%;
                        background: white;
                        border: 7px solid rgba(255, 255, 255, .85);
                        box-shadow: 0 7px 20px rgba(50, 40, 100, .18);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: var(--spin-primary);
                        font-size: 26px;
                        z-index: 3;
                        pointer-events: none;
                    }

                    .spin-button-wrap {
                        text-align: center;
                        margin-top: 14px;
                    }

                    .spin-button {
                        border: 0;
                        background: linear-gradient(135deg, var(--spin-primary), #8878ff);
                        color: #fff;
                        border-radius: 14px;
                        padding: 13px 30px;
                        font-size: 15px;
                        font-weight: 800;
                        cursor: pointer;
                        box-shadow: 0 10px 22px rgba(109, 93, 252, .24);
                        transition: transform .2s, box-shadow .2s, opacity .2s;
                    }

                    .spin-button:hover:not(:disabled) {
                        transform: translateY(-2px);
                        box-shadow: 0 14px 28px rgba(109, 93, 252, .30);
                    }

                    .spin-button:disabled {
                        cursor: not-allowed;
                        opacity: .5;
                        box-shadow: none;
                    }

                    .spin-helper {
                        margin-top: 9px;
                        font-size: 12px;
                        color: var(--spin-muted);
                    }/* =========================
                       SIDE PANEL
                       ========================= */
                    .spin-side-card {
                        padding: 20px;
                    }

                    .side-section + .side-section {
                        margin-top: 24px;
                    }

                    .side-title {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 11px;
                    }

                    .side-title strong {
                        color: var(--spin-text);
                        font-size: 14px;
                    }

                    .side-count {
                        background: #f0eefc;
                        color: var(--spin-primary);
                        border-radius: 999px;
                        padding: 4px 9px;
                        font-size: 11px;
                        font-weight: 800;
                    }

                    .member-list, .option-list {
                        display: flex;
                        flex-direction: column;
                        gap: 8px;
                    }

                    .member-item, .option-item {
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        padding: 10px 11px;
                        border: 1px solid #eceaf1;
                        border-radius: 12px;
                        background: #fff;
                        animation: itemIn .25s ease both;
                    }

                    @keyframes itemIn {
                        from {
                            opacity: 0;
                            transform: translateY(5px);
                        }

                        to {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }

                    .member-avatar {
                        width: 31px;
                        height: 31px;
                        flex: 0 0 31px;
                        border-radius: 50%;
                        background: linear-gradient(135deg, #ece9ff, #dcd7ff);
                        color: var(--spin-primary-dark);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 12px;
                        font-weight: 800;
                    }

                    .member-name, .option-name {
                        font-size: 13px;
                        font-weight: 650;
                        color: #403d4d;
                    }

                    .option-input-row {
                        display: flex;
                        gap: 7px;
                        align-items: center;
                    }

                    .option-input {
                        flex: 1;
                        height: 39px;
                        border: 1px solid #e0dee7;
                        border-radius: 10px;
                        padding: 0 11px;
                        font-size: 13px;
                        outline: none;
                    }

                    .option-input:focus {
                        border-color: var(--spin-primary);
                        box-shadow: 0 0 0 3px rgba(109, 93, 252, .08);
                    }

                    .option-remove {
                        width: 32px;
                        height: 32px;
                        border: 0;
                        background: #f5f3f8;
                        color: #9893a5;
                        border-radius: 9px;
                        cursor: pointer;
                    }

                    .add-option {
                        width: 100%;
                        margin-top: 9px;
                        border: 1px dashed #c9c5d8;
                        background: #faf9fd;
                        color: #706b80;
                        border-radius: 10px;
                        padding: 9px;
                        cursor: pointer;
                        font-size: 12px;
                        font-weight: 700;
                    }

                    .option-warning {
                        margin-top: 10px;
                        font-size: 12px;
                        color: #c26a32;
                        background: #fff8f2;
                        border: 1px solid #f8e1d0;
                        border-radius: 10px;
                        padding: 9px 11px;
                        display: none;
                    }

                    .option-warning.show {
                        display: block;
                    }/* =========================
                       PROGRESS
                       ========================= */
                    .assignment-progress {
                        margin-top: 17px;
                        display: none;
                    }

                    .assignment-progress.show {
                        display: block;
                    }

                    .progress-label {
                        display: flex;
                        justify-content: space-between;
                        font-size: 12px;
                        color: #777286;
                        margin-bottom: 7px;
                    }

                    .progress-track {
                        height: 7px;
                        background: #eeecf3;
                        border-radius: 99px;
                        overflow: hidden;
                    }

                    .progress-fill {
                        height: 100%;
                        width: 0;
                        background: linear-gradient(90deg, #6d5dfc, #9b8fff);
                        border-radius: inherit;
                        transition: width .4s ease;
                    }/* =========================
                       HISTORY
                       ========================= */
                    .history-card {
                        margin-top: 22px;
                        padding: 22px;
                    }

                    .history-header {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 16px;
                    }

                    .history-header h2 {
                        margin: 0;
                        font-size: 17px;
                        color: var(--spin-text);
                    }

                    .history-header p {
                        margin: 4px 0 0;
                        font-size: 12px;
                        color: var(--spin-muted);
                    }

                    .history-empty {
                        padding: 30px 15px;
                        text-align: center;
                        color: #9994a6;
                        font-size: 13px;
                        background: #faf9fc;
                        border-radius: 15px;
                    }

                    .history-session {
                        border: 1px solid #eae8ef;
                        border-radius: 16px;
                        overflow: hidden;
                        margin-bottom: 11px;
                    }

                    .history-session-head {
                        padding: 14px 15px;
                        background: #faf9fd;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        cursor: pointer;
                    }

                    .history-session-title {
                        font-weight: 750;
                        font-size: 13px;
                        color: var(--spin-text);
                    }

                    .history-session-meta {
                        margin-top: 3px;
                        font-size: 11px;
                        color: #9792a3;
                    }

                    .history-complete {
                        font-size: 10px;
                        font-weight: 800;
                        color: #16825d;
                        background: #e8f8f1;
                        border-radius: 999px;
                        padding: 5px 8px;
                    }

                    .history-body {
                        padding: 10px 15px 14px;
                        display: none;
                    }

                    .history-session.open .history-body {
                        display: block;
                    }

                    .history-row {
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 12px;
                        padding: 10px 0;
                        border-bottom: 1px solid #f0eef3;
                        font-size: 12px;
                    }

                    .history-row:last-child {
                        border-bottom: 0;
                    }

                    .history-person {
                        font-weight: 700;
                        color: #484454;
                    }

                    .history-result {
                        color: #716c7c;
                    }/* =========================
                       RESULT MODAL
                       ========================= */
                    .result-overlay {
                        position: fixed;
                        inset: 0;
                        z-index: 9999;
                        background: rgba(27, 24, 42, .56);
                        backdrop-filter: blur(7px);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        padding: 20px;
                        opacity: 0;
                        visibility: hidden;
                        transition: opacity .25s ease, visibility .25s ease;
                    }

                    .result-overlay.show {
                        opacity: 1;
                        visibility: visible;
                    }

                    .result-modal {
                        width: min(420px, 100%);
                        background: #fff;
                        border-radius: 26px;
                        padding: 30px;
                        text-align: center;
                        box-shadow: 0 30px 80px rgba(0, 0, 0, .22);
                        transform: translateY(18px) scale(.94);
                        transition: transform .35s cubic-bezier(.2, .9, .2, 1);
                        position: relative;
                        overflow: hidden;
                    }

                    .result-overlay.show .result-modal {
                        transform: translateY(0) scale(1);
                    }

                    .result-glow {
                        position: absolute;
                        width: 220px;
                        height: 220px;
                        border-radius: 50%;
                        background: rgba(109, 93, 252, .12);
                        filter: blur(25px);
                        left: 50%;
                        top: -120px;
                        transform: translateX(-50%);
                    }

                    .result-icon {
                        position: relative;
                        width: 68px;
                        height: 68px;
                        margin: 0 auto 15px;
                        border-radius: 50%;
                        background: linear-gradient(135deg, #e8e4ff, #f3f1ff);
                        color: var(--spin-primary);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 29px;
                        animation: winnerPop .55s cubic-bezier(.2, 1.4, .4, 1);
                    }

                    @keyframes winnerPop {
                        0% {
                            transform: scale(.4) rotate(-15deg);
                            opacity: 0;
                        }

                        100% {
                            transform: scale(1) rotate(0);
                            opacity: 1;
                        }
                    }

                    .result-small {
                        position: relative;
                        color: #8a8596;
                        font-size: 12px;
                        font-weight: 700;
                    }

                    .result-name {
                        position: relative;
                        margin-top: 4px;
                        font-size: 29px;
                        font-weight: 850;
                        color: var(--spin-text);
                    }

                    .result-sub {
                        position: relative;
                        color: #8b8697;
                        font-size: 13px;
                        margin-top: 3px;
                    }

                    .result-task {
                        position: relative;
                        margin: 20px auto;
                        background: linear-gradient(135deg, #f0edff, #f8f6ff);
                        border: 1px solid #e3dfff;
                        border-radius: 15px;
                        padding: 14px;
                        color: var(--spin-primary-dark);
                        font-size: 16px;
                        font-weight: 800;
                    }

                    .result-button {
                        position: relative;
                        width: 100%;
                        border: 0;
                        background: var(--spin-primary);
                        color: white;
                        border-radius: 13px;
                        padding: 12px 18px;
                        font-weight: 800;
                        cursor: pointer;
                    }

                    .result-button:hover {
                        background: var(--spin-primary-dark);
                    }

                    .confetti {
                        position: fixed;
                        pointer-events: none;
                        z-index: 10001;
                        width: 7px;
                        height: 12px;
                        border-radius: 2px;
                        animation: confettiFall 1.25s ease-out forwards;
                    }

                    @keyframes confettiFall {
                        from {
                            opacity: 1;
                            transform: translate(0, 0) rotate(0deg);
                        }

                        to {
                            opacity: 0;
                            transform: translate(var(--x), var(--y)) rotate(520deg);
                        }
                    }/* =========================
                       CONCLUSION
                       ========================= */
                    .conclusion-section {
                        display: none;
                        margin-top: 22px;
                    }

                    .conclusion-section.show {
                        display: block;
                        animation: conclusionIn .5s ease both;
                    }

                    @keyframes conclusionIn {
                        from {
                            opacity: 0;
                            transform: translateY(15px);
                        }

                        to {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }

                    .conclusion-card {
                        background: #fff;
                        border: 1px solid var(--spin-border);
                        border-radius: 24px;
                        padding: 28px;
                        box-shadow: 0 10px 35px rgba(50, 40, 100, .06);
                    }

                    .conclusion-success {
                        text-align: center;
                        margin-bottom: 22px;
                    }

                    .conclusion-check {
                        width: 62px;
                        height: 62px;
                        margin: 0 auto 12px;
                        border-radius: 50%;
                        background: #e7f8f0;
                        color: #1b9b6e;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 27px;
                    }

                    .conclusion-success h2 {
                        margin: 0;
                        font-size: 22px;
                        color: var(--spin-text);
                    }

                    .conclusion-success p {
                        margin: 5px 0 0;
                        color: var(--spin-muted);
                        font-size: 13px;
                    }

                    .receipt-preview {
                        width: min(520px, 100%);
                        margin: 0 auto;
                        padding: 24px;
                        border-radius: 20px;
                        background:
                        radial-gradient(circle at 10% 0%, rgba(125, 110, 255, .18), transparent 30%), radial-gradient(circle at 100% 100%, rgba(95, 205, 190, .14), transparent 30%), #fbfaff;
                        border: 1px solid #e8e5f2;
                    }

                    .receipt-brand {
                        font-size: 11px;
                        letter-spacing: .12em;
                        font-weight: 900;
                        color: var(--spin-primary);
                        text-transform: uppercase;
                    }

                    .receipt-title {
                        font-size: 22px;
                        font-weight: 850;
                        color: var(--spin-text);
                        margin-top: 8px;
                    }

                    .receipt-task {
                        margin-top: 4px;
                        font-size: 14px;
                        color: #787285;
                    }

                    .receipt-divider {
                        height: 1px;
                        background: #e7e4ee;
                        margin: 19px 0;
                    }

                    .receipt-row {
                        display: grid;
                        grid-template-columns: 1fr 1.15fr;
                        gap: 14px;
                        padding: 10px 0;
                        border-bottom: 1px solid #eeeaf2;
                    }

                    .receipt-row:last-child {
                        border-bottom: 0;
                    }

                    .receipt-member {
                        font-size: 13px;
                        font-weight: 800;
                        color: #454151;
                    }

                    .receipt-result {
                        font-size: 13px;
                        color: #696475;
                    }

                    .receipt-footer {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-top: 17px;
                        color: #9893a3;
                        font-size: 10px;
                    }

                    .conclusion-actions {
                        width: min(520px, 100%);
                        margin: 17px auto 0;
                        display: grid;
                        grid-template-columns: 1.2fr 1fr;
                        gap: 9px;
                    }

                    .action-button {
                        border: 0;
                        border-radius: 12px;
                        padding: 11px 13px;
                        font-size: 12px;
                        font-weight: 800;
                        cursor: pointer;
                    }

                    .action-primary {
                        background: var(--spin-primary);
                        color: #fff;
                    }

                    .action-secondary {
                        background: #f0eef6;
                        color: #5f5a6d;
                    }

                    .action-full {
                        grid-column: 1 / -1;
                    }

                    .action-button:disabled {
                        opacity: .5;
                        cursor: not-allowed;
                    }

                    .note-status {
                        width: min(520px, 100%);
                        margin: 9px auto 0;
                        font-size: 12px;
                        text-align: center;
                        color: #238263;
                        min-height: 18px;
                    }/* =========================
                       EMPTY STATE
                       ========================= */
                    .spin-empty {
                        padding: 35px 20px;
                        text-align: center;
                        color: #938e9f;
                    }

                    .spin-empty i {
                        font-size: 35px;
                        display: block;
                        margin-bottom: 8px;
                    }/* =========================
                       RESPONSIVE
                       ========================= */
                    @media (max-width: 900px) {
                        .spin-main-grid {
                            grid-template-columns: 1fr;
                        }

                        .spin-side-card {
                            order: 2;
                        }
                    }

                    @media (max-width: 650px) {
                        .spin-page {
                            padding: 17px;
                        }

                        .spin-select-grid {
                            grid-template-columns: 1fr;
                        }

                        .spin-wheel-card, .spin-side-card, .history-card, .conclusion-card {
                            border-radius: 18px;
                            padding: 17px;
                        }

                        .spin-header h1 {
                            font-size: 23px;
                        }

                        .conclusion-actions {
                            grid-template-columns: 1fr;
                        }

                        .action-full {
                            grid-column: auto;
                        }
                    }
                    </style>

                    <div class="spin-page">

                        <div class="spin-header">
                            <h1>Spin</h1>
                            <p>Bagi tugas secara acak dan adil untuk anggota kelompok.</p>
                        </div>

                        <!-- =========================
                                 SETTINGS
                                 ========================= -->
                        <div class="spin-settings">

                            <div class="spin-settings-title">
                                <i class="ti ti-adjustments"></i>
                                <span>Pengaturan Spin</span>
                            </div>

                            <div class="spin-select-grid">

                                <div class="spin-field">
                                    <label for="groupSelect">Pilih kelompok</label>

                                    <select id="groupSelect">
                                        <option value="">-- Pilih kelompok --</option>

                                        <option value="3">
                                                                    MJI Kelompok 9                        </option>
                                        <option value="2">
                                                                    kelompok penelitian A                        </option>

                                    </select>
                                </div>

                                <div class="spin-field">
                                    <label for="taskSelect">Pilih tugas</label>

                                    <select id="taskSelect" disabled>
                                        <option value="">-- Pilih tugas --</option>
                                    </select>
                                </div>

                            </div>

                            <div id="taskInfo" class="task-info">

                                <div class="task-info-icon">
                                    <i class="ti ti-file-description"></i>
                                </div>

                                <div>
                                    <div id="taskInfoTitle" class="task-info-title"></div>
                                    <div id="taskInfoDescription" class="task-info-description"></div>
                                </div>

                            </div>

                        </div>

                        <!-- =========================
                                 MAIN
                                 ========================= -->
                        <div class="spin-main-grid">

                            <!-- WHEEL -->
                            <div class="spin-wheel-card">

                                <div class="wheel-status">
                                    <span id="wheelStatus">
                                        <i class="ti ti-circle-check"></i>

                                                            Siap untuk spin
                                                        
                                    </span>
                                </div>

                                <div class="wheel-stage">

                                    <canvas id="wheelCanvas" width="700" height="700">
                                    </canvas>

                                    <div class="wheel-pointer"></div>

                                    <div class="wheel-center">
                                        <i class="ti ti-dice-5"></i>
                                    </div>

                                </div>

                                <div class="spin-button-wrap">

                                    <button type="button" id="spinButton" class="spin-button" disabled>
                                        <i class="ti ti-player-play-filled"></i>

                                                            Mulai Spin
                                                        
                                    </button>

                                    <div class="spin-helper" id="spinHelper">
                                                        Pilih kelompok dan tugas terlebih dahulu.
                                                    </div>

                                </div>

                                <div id="assignmentProgress" class="assignment-progress">

                                    <div class="progress-label">
                                        <span>Pembagian tugas</span>
                                        <span id="progressText">0 / 0</span>
                                    </div>

                                    <div class="progress-track">
                                        <div id="progressFill" class="progress-fill"></div>
                                    </div>

                                </div>

                            </div>

                            <!-- SIDE -->
                            <div class="spin-side-card">

                                <div class="side-section">

                                    <div class="side-title">
                                        <strong>Anggota tersisa</strong>
                                        <span id="memberCount" class="side-count">0</span>
                                    </div>

                                    <div id="memberList" class="member-list">
                                        <div class="spin-empty">
                                            <i class="ti ti-users"></i>

                                                                    Pilih kelompok terlebih dahulu.
                                                                
                                        </div>
                                    </div>

                                </div>

                                <div class="side-section">

                                    <div class="side-title">
                                        <strong>Bagian tugas</strong>
                                        <span id="optionCount" class="side-count">0</span>
                                    </div>

                                    <div id="optionList" class="option-list"></div>

                                    <button type="button" id="addOption" class="add-option">
                                        <i class="ti ti-plus"></i>

                                                            Tambah bagian tugas
                                                        
                                    </button>

                                    <div id="optionWarning" class="option-warning">
                                                        Jumlah bagian tugas harus sama dengan jumlah anggota.
                                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- =========================
                                 CONCLUSION
                                 ========================= -->
                        <div id="conclusionSection" class="conclusion-section">

                            <div class="conclusion-card">

                                <div class="conclusion-success">

                                    <div class="conclusion-check">
                                        <i class="ti ti-check"></i>
                                    </div>

                                    <h2>Pembagian Tugas Selesai!</h2>

                                    <p>
                                                        Semua anggota sudah mendapatkan bagian tugas.
                                                    </p>

                                </div>

                                <div id="receiptPreview" class="receipt-preview">

                                    <div class="receipt-brand">
                                                        CAMPUSS SAVER
                                                    </div>

                                    <div class="receipt-title">
                                                        Hasil Pembagian Tugas
                                                    </div>

                                    <div id="receiptTask" class="receipt-task"></div>

                                    <div class="receipt-divider"></div>

                                    <div id="receiptRows"></div>

                                    <div class="receipt-divider"></div>

                                    <div class="receipt-footer">
                                        <span id="receiptDate"></span>
                                        <span>Dibuat melalui CAMPUSS SAVER</span>
                                    </div>

                                </div>

                                <div class="conclusion-actions">

                                    <button type="button" id="shareResult" class="action-button action-primary">
                                        <i class="ti ti-share-3"></i>

                                                            Bagikan sebagai gambar
                                                        
                                    </button>

                                    <button type="button" id="copyResult" class="action-button action-secondary">
                                        <i class="ti ti-copy"></i>

                                                            Salin
                                                        
                                    </button>

                                    <button type="button" id="saveNote" class="action-button action-secondary action-full">
                                        <i class="ti ti-notes"></i>

                                                            Simpan ke Catatan
                                                        
                                    </button>

                                    <button type="button" id="restartSpin" class="action-button action-secondary action-full">
                                        <i class="ti ti-refresh"></i>

                                                            Spin Ulang
                                                        
                                    </button>

                                </div>

                                <div id="noteStatus" class="note-status"></div>

                            </div>

                        </div>

                        <!-- =========================
                                 HISTORY
                                 ========================= -->
                        <div class="history-card">

                            <div class="history-header">

                                <div>
                                    <h2>Riwayat Spin</h2>
                                    <p>
                                                        Riwayat pembagian ditampilkan berdasarkan sesi.
                                                    </p>
                                </div>

                            </div>

                            <div id="historyContainer">
                                <div class="history-empty">
                                                Pilih kelompok untuk melihat riwayat pembagian.
                                            </div>
                            </div>

                        </div>

                    </div>

                    <!-- =========================
                         RESULT MODAL
                         ========================= -->

                    <div id="resultOverlay" class="result-overlay">

                        <div class="result-modal">

                            <div class="result-glow"></div>

                            <div class="result-icon">
                                <i class="ti ti-trophy"></i>
                            </div>

                            <div class="result-small">
                                        HASIL SPIN
                                    </div>

                            <div id="resultName" class="result-name"></div>

                            <div class="result-sub">
                                        mendapat bagian tugas
                                    </div>

                            <div id="resultTask" class="result-task"></div>

                            <button type="button" id="continueSpin" class="result-button">
                                        Lanjut Spin
                                    </button>

                        </div>

                    </div>

                    <script>

                    document.addEventListener('DOMContentLoaded', function () {

                        /* =====================================================
                           DATA DARI PHP
                           ===================================================== */

                        const tasksData = {"3":[],"2":[{"id_task":4,"id_group":2,"judul":"handle latar belakanng masalah","deskripsi":"","status":"todo","assigned_to":6,"deadline":"2026-09-11","created_at":"2026-09-09 01:20:24","updated_at":"2026-09-09 01:20:24"},{"id_task":3,"id_group":2,"judul":"menentukan topik penelitian","deskripsi":"","status":"done","assigned_to":null,"deadline":null,"created_at":"2026-09-09 01:10:05","updated_at":"2026-09-09 01:10:17"},{"id_task":2,"id_group":2,"judul":"membuat proposal tugas","deskripsi":"","status":"in_progress","assigned_to":null,"deadline":"2026-09-17","created_at":"2026-09-09 01:09:32","updated_at":"2026-09-09 01:10:10"}]};
                        const membersData = {"3":[{"id":4,"id_group":3,"id_user":7,"peran":"ketua","joined_at":"2026-09-17 09:42:58","name":"Rossa","email":"rossanisa78@gmail.com"}],"2":[{"id":2,"id_group":2,"id_user":6,"peran":"ketua","joined_at":"2026-09-09 00:57:56","name":"ihelje","email":"ikdhiha@gmail.com"},{"id":3,"id_group":2,"id_user":7,"peran":"anggota","joined_at":"2026-09-09 00:59:03","name":"Rossa","email":"rossanisa78@gmail.com"}]};


                        /* =====================================================
                           ELEMENT
                           ===================================================== */

                        const groupSelect = document.getElementById('groupSelect');
                        const taskSelect = document.getElementById('taskSelect');

                        const taskInfo = document.getElementById('taskInfo');
                        const taskInfoTitle = document.getElementById('taskInfoTitle');
                        const taskInfoDescription = document.getElementById('taskInfoDescription');

                        const memberList = document.getElementById('memberList');
                        const memberCount = document.getElementById('memberCount');

                        const optionList = document.getElementById('optionList');
                        const optionCount = document.getElementById('optionCount');
                        const addOption = document.getElementById('addOption');
                        const optionWarning = document.getElementById('optionWarning');

                        const wheelCanvas = document.getElementById('wheelCanvas');
                        const wheelCtx = wheelCanvas.getContext('2d');

                        const spinButton = document.getElementById('spinButton');
                        const spinHelper = document.getElementById('spinHelper');
                        const wheelStatus = document.getElementById('wheelStatus');

                        const assignmentProgress = document.getElementById('assignmentProgress');
                        const progressText = document.getElementById('progressText');
                        const progressFill = document.getElementById('progressFill');

                        const resultOverlay = document.getElementById('resultOverlay');
                        const resultName = document.getElementById('resultName');
                        const resultTask = document.getElementById('resultTask');
                        const continueSpin = document.getElementById('continueSpin');

                        const conclusionSection = document.getElementById('conclusionSection');
                        const receiptTask = document.getElementById('receiptTask');
                        const receiptRows = document.getElementById('receiptRows');
                        const receiptDate = document.getElementById('receiptDate');

                        const shareResult = document.getElementById('shareResult');
                        const copyResult = document.getElementById('copyResult');
                        const saveNote = document.getElementById('saveNote');
                        const restartSpin = document.getElementById('restartSpin');
                        const noteStatus = document.getElementById('noteStatus');

                        const historyContainer = document.getElementById('historyContainer');


                        /* =====================================================
                           STATE
                           ===================================================== */

                        let selectedGroupId = null;
                        let selectedTaskId = null;

                        let remainingMembers = [];
                        let remainingOptions = [];

                        let assignments = [];

                        let sessionId = '';
                        let spinning = false;

                        let wheelRotation = 0;

                        let originalMemberCount = 0;

                        let currentWinner = null;


                        /* =====================================================
                           COLORS
                           ===================================================== */

                        const wheelColors = [
                            '#7161ef',
                            '#5b8def',
                            '#4db6ac',
                            '#73c77b',
                            '#f3c969',
                            '#f49b68',
                            '#e97c9f',
                            '#9b7ede'
                        ];


                        /* =====================================================
                           UTILITY
                           ===================================================== */

                        function escapeHtml(value) {

                            return String(value ?? '')
                                .replace(/&/g, '&amp;')
                                .replace(/</g, '&lt;')
                                .replace(/>/g, '&gt;')
                                .replace(/"/g, '&quot;')
                                .replace(/'/g, '&#039;');

                        }


                        function makeSessionId() {

                            return (
                                Date.now().toString(36) +
                                Math.random().toString(36).substring(2, 10)
                            ).toUpperCase();

                        }


                        function getSelectedTask() {

                            if (!selectedGroupId || !selectedTaskId) {
                                return null;
                            }

                            const groupTasks = tasksData[selectedGroupId] || [];

                            return groupTasks.find(function (task) {
                                return Number(task.id_task) === Number(selectedTaskId);
                            }) || null;

                        }


                        function getOptionsFromInputs() {

                            return Array.from(
                                optionList.querySelectorAll('.option-input')
                            )
                            .map(function (input) {
                                return input.value.trim();
                            })
                            .filter(Boolean);

                        }


                        function resetSession() {

                            assignments = [];
                            currentWinner = null;

                            sessionId = makeSessionId();

                            remainingMembers = JSON.parse(
                                JSON.stringify(
                                    membersData[selectedGroupId] || []
                                )
                            );

                            originalMemberCount = remainingMembers.length;

                            remainingOptions = getOptionsFromInputs();

                            conclusionSection.classList.remove('show');

                            updateMemberList();
                            updateCounts();
                            updateProgress();

                            drawWheel();

                            updateSpinAvailability();

                        }


                        /* =====================================================
                           GROUP CHANGE
                           ===================================================== */

                        groupSelect.addEventListener('change', function () {

                            selectedGroupId = this.value || null;

                            selectedTaskId = null;

                            taskSelect.innerHTML =
                                '<option value="">-- Pilih tugas --</option>';

                            taskSelect.disabled = !selectedGroupId;

                            taskInfo.classList.remove('active');

                            if (!selectedGroupId) {

                                remainingMembers = [];
                                remainingOptions = [];
                                assignments = [];

                                updateMemberList();
                                updateCounts();
                                drawWheel();
                                updateSpinAvailability();

                                historyContainer.innerHTML = `
                                    <div class="history-empty">
                                        Pilih kelompok untuk melihat riwayat pembagian.
                                    </div>
                                `;

                                return;
                            }


                            /* =========================
                               TASKS
                               ========================= */

                            const groupTasks =
                                tasksData[selectedGroupId] || [];

                            groupTasks.forEach(function (task) {

                                const option =
                                    document.createElement('option');

                                option.value = task.id_task;
                                option.textContent = task.judul;

                                taskSelect.appendChild(option);

                            });


                            /* =========================
                               MEMBERS
                               ========================= */

                            remainingMembers = JSON.parse(
                                JSON.stringify(
                                    membersData[selectedGroupId] || []
                                )
                            );

                            originalMemberCount = remainingMembers.length;

                            assignments = [];

                            updateMemberList();

                            updateCounts();

                            drawWheel();

                            updateSpinAvailability();

                            loadHistory();

                        });


                        /* =====================================================
                           TASK CHANGE
                           ===================================================== */

                        taskSelect.addEventListener('change', function () {

                            selectedTaskId = this.value || null;

                            const task = getSelectedTask();

                            if (!task) {

                                taskInfo.classList.remove('active');

                                spinHelper.textContent =
                                    'Pilih tugas terlebih dahulu.';

                                updateSpinAvailability();

                                return;

                            }


                            taskInfo.classList.add('active');

                            taskInfoTitle.textContent =
                                task.judul || 'Tugas';

                            taskInfoDescription.textContent =
                                task.deskripsi ||
                                'Tidak ada deskripsi tugas.';


                            /*
                             * Kalau belum ada pilihan tugas,
                             * buat beberapa input awal sesuai jumlah anggota.
                             */
                            if (
                                optionList.querySelectorAll('.option-input').length === 0
                                &&
                                remainingMembers.length > 0
                            ) {

                                for (
                                    let i = 0;
                                    i < remainingMembers.length;
                                    i++
                                ) {
                                    createOptionInput('');
                                }

                            }


                            resetSession();

                            spinHelper.textContent =
                                'Isi bagian tugas, lalu mulai spin.';

                        });


                        /* =====================================================
                           OPTION INPUT
                           ===================================================== */

                        function createOptionInput(value = '') {

                            const wrapper =
                                document.createElement('div');

                            wrapper.className =
                                'option-input-row';

                            wrapper.innerHTML = `
                                <input
                                    type="text"
                                    class="option-input"
                                    placeholder="Contoh: Cari jurnal"
                                    value="${escapeHtml(value)}"
                                >

                                <button
                                    type="button"
                                    class="option-remove"
                                    title="Hapus"
                                >
                                    <i class="ti ti-x"></i>
                                </button>
                            `;

                            const input =
                                wrapper.querySelector('.option-input');

                            const remove =
                                wrapper.querySelector('.option-remove');


                            input.addEventListener('input', function () {

                                if (!spinning) {

                                    remainingOptions =
                                        getOptionsFromInputs();

                                    drawWheel();

                                    updateCounts();

                                    updateSpinAvailability();

                                }

                            });


                            remove.addEventListener('click', function () {

                                if (spinning) {
                                    return;
                                }

                                wrapper.remove();

                                remainingOptions =
                                    getOptionsFromInputs();

                                drawWheel();

                                updateCounts();

                                updateSpinAvailability();

                            });


                            optionList.appendChild(wrapper);

                        }


                        addOption.addEventListener('click', function () {

                            if (spinning) {
                                return;
                            }

                            createOptionInput('');

                            remainingOptions =
                                getOptionsFromInputs();

                            drawWheel();

                            updateCounts();

                            updateSpinAvailability();

                        });


                        /* =====================================================
                           MEMBER LIST
                           ===================================================== */

                        function updateMemberList() {

                            memberList.innerHTML = '';

                            if (!selectedGroupId) {

                                memberList.innerHTML = `
                                    <div class="spin-empty">
                                        <i class="ti ti-users"></i>
                                        Pilih kelompok terlebih dahulu.
                                    </div>
                                `;

                                return;

                            }


                            if (remainingMembers.length === 0) {

                                memberList.innerHTML = `
                                    <div class="spin-empty">
                                        <i class="ti ti-check"></i>
                                        Semua anggota sudah mendapat bagian.
                                    </div>
                                `;

                                return;

                            }


                            remainingMembers.forEach(function (member) {

                                const name =
                                    member.name || 'Anggota';

                                const initial =
                                    name.charAt(0).toUpperCase();

                                const item =
                                    document.createElement('div');

                                item.className = 'member-item';

                                item.innerHTML = `
                                    <div class="member-avatar">
                                        ${escapeHtml(initial)}
                                    </div>

                                    <div class="member-name">
                                        ${escapeHtml(name)}
                                    </div>
                                `;

                                memberList.appendChild(item);

                            });

                        }


                        /* =====================================================
                           COUNTS
                           ===================================================== */

                        function updateCounts() {

                            memberCount.textContent =
                                remainingMembers.length;

                            optionCount.textContent =
                                getOptionsFromInputs().length;

                            const members =
                                remainingMembers.length;

                            const options =
                                getOptionsFromInputs().length;

                            if (
                                members > 0 &&
                                options > 0 &&
                                members !== options
                            ) {

                                optionWarning.classList.add('show');

                                optionWarning.textContent =
                                    `Masih ada ${members} anggota tetapi ${options} bagian tugas. Jumlah harus sama.`;

                            } else {

                                optionWarning.classList.remove('show');

                            }

                        }


                        /* =====================================================
                           PROGRESS
                           ===================================================== */

                        function updateProgress() {

                            const total =
                                originalMemberCount;

                            const done =
                                assignments.length;

                            if (!total) {

                                assignmentProgress.classList.remove('show');

                                return;

                            }

                            assignmentProgress.classList.add('show');

                            progressText.textContent =
                                `${done} / ${total}`;

                            progressFill.style.width =
                                `${Math.min(100, (done / total) * 100)}%`;

                        }


                        /* =====================================================
                           WHEEL DRAW
                           ===================================================== */

                        function drawWheel() {

                            const size = wheelCanvas.width;

                            const center = size / 2;

                            const radius = center - 18;

                            wheelCtx.clearRect(
                                0,
                                0,
                                size,
                                size
                            );


                            const options =
                                getOptionsFromInputs();


                            if (!options.length) {

                                wheelCtx.beginPath();

                                wheelCtx.arc(
                                    center,
                                    center,
                                    radius,
                                    0,
                                    Math.PI * 2
                                );

                                wheelCtx.fillStyle =
                                    '#efedf5';

                                wheelCtx.fill();

                                wheelCtx.fillStyle =
                                    '#aaa6b5';

                                wheelCtx.font =
                                    '700 22px Arial';

                                wheelCtx.textAlign =
                                    'center';

                                wheelCtx.textBaseline =
                                    'middle';

                                wheelCtx.fillText(
                                    'Tambahkan bagian tugas',
                                    center,
                                    center
                                );

                                return;

                            }


                            const slice =
                                (Math.PI * 2) / options.length;


                            options.forEach(function (label, index) {

                                const start =
                                    -Math.PI / 2 +
                                    index * slice;

                                const end =
                                    start + slice;


                                wheelCtx.beginPath();

                                wheelCtx.moveTo(
                                    center,
                                    center
                                );

                                wheelCtx.arc(
                                    center,
                                    center,
                                    radius,
                                    start,
                                    end
                                );

                                wheelCtx.closePath();

                                wheelCtx.fillStyle =
                                    wheelColors[index % wheelColors.length];

                                wheelCtx.fill();


                                wheelCtx.strokeStyle =
                                    'rgba(255,255,255,.8)';

                                wheelCtx.lineWidth = 5;

                                wheelCtx.stroke();


                                /* =========================
                                   LABEL
                                   ========================= */

                                wheelCtx.save();

                                wheelCtx.translate(
                                    center,
                                    center
                                );

                                const angle =
                                    start + slice / 2;

                                wheelCtx.rotate(angle);

                                wheelCtx.textAlign =
                                    'right';

                                wheelCtx.textBaseline =
                                    'middle';

                                wheelCtx.fillStyle =
                                    '#fff';

                                wheelCtx.font =
                                    '800 20px Arial';


                                let text =
                                    String(label);

                                if (text.length > 22) {
                                    text =
                                        text.substring(0, 21) + '…';
                                }


                                wheelCtx.fillText(
                                    text,
                                    radius - 26,
                                    0
                                );

                                wheelCtx.restore();

                            });


                            /* =========================
                               OUTER RING
                               ========================= */

                            wheelCtx.beginPath();

                            wheelCtx.arc(
                                center,
                                center,
                                radius,
                                0,
                                Math.PI * 2
                            );

                            wheelCtx.strokeStyle =
                                '#fff';

                            wheelCtx.lineWidth = 10;

                            wheelCtx.stroke();

                        }


                        /* =====================================================
                           SPIN AVAILABILITY
                           ===================================================== */

                        function updateSpinAvailability() {

                            if (!selectedGroupId) {

                                spinButton.disabled = true;

                                spinHelper.textContent =
                                    'Pilih kelompok terlebih dahulu.';

                                return;

                            }


                            if (!selectedTaskId) {

                                spinButton.disabled = true;

                                spinHelper.textContent =
                                    'Pilih tugas terlebih dahulu.';

                                return;

                            }


                            const options =
                                getOptionsFromInputs();

                            const members =
                                remainingMembers.length;


                            if (!members) {

                                spinButton.disabled = true;

                                spinHelper.textContent =
                                    'Semua anggota sudah mendapat bagian.';

                                return;

                            }


                            if (options.length !== members) {

                                spinButton.disabled = true;

                                spinHelper.textContent =
                                    'Jumlah bagian tugas harus sama dengan jumlah anggota.';

                                return;

                            }


                            if (options.some(function (item) {
                                return !item;
                            })) {

                                spinButton.disabled = true;

                                return;

                            }


                            spinButton.disabled =
                                spinning;


                            spinHelper.textContent =
                                spinning
                                    ? 'Roda sedang berputar...'
                                    : 'Semua siap. Klik Mulai Spin.';

                        }


                        /* =====================================================
                           SPIN
                           ===================================================== */

                        spinButton.addEventListener('click', startSpin);


                        function startSpin() {

                            if (spinning) {
                                return;
                            }


                            const options =
                                getOptionsFromInputs();


                            if (
                                !selectedGroupId ||
                                !selectedTaskId ||
                                remainingMembers.length === 0 ||
                                options.length !== remainingMembers.length
                            ) {

                                updateSpinAvailability();

                                return;

                            }


                            spinning = true;

                            spinButton.disabled = true;

                            wheelStatus.innerHTML = `
                                <i class="ti ti-loader-2"></i>
                                Memutar...
                            `;

                            spinHelper.textContent =
                                'Roda sedang mencari hasil secara acak...';


                            /*
                             * Pilih anggota secara acak.
                             */
                            const memberIndex =
                                Math.floor(
                                    Math.random() *
                                    remainingMembers.length
                                );

                            const selectedMember =
                                remainingMembers[memberIndex];


                            /*
                             * Pilih bagian tugas secara acak.
                             */
                            const optionIndex =
                                Math.floor(
                                    Math.random() *
                                    options.length
                                );

                            const selectedOption =
                                options[optionIndex];


                            /*
                             * Rotasi wheel.
                             *
                             * Kita tambah 5–8 putaran supaya terasa
                             * seperti wheel sungguhan.
                             */
                            const fullTurns =
                                5 +
                                Math.floor(
                                    Math.random() * 4
                                );

                            const slice =
                                360 / options.length;


                            /*
                             * Target posisi agar tengah slice
                             * berhenti tepat di pointer atas.
                             */
                            const targetWithin =
                                360 -
                                (
                                    optionIndex * slice +
                                    slice / 2
                                );


                            const currentNormalized =
                                ((wheelRotation % 360) + 360) % 360;


                            let delta =
                                (
                                    fullTurns * 360
                                ) +
                                (
                                    targetWithin -
                                    currentNormalized
                                );


                            if (delta < fullTurns * 360) {
                                delta += 360;
                            }


                            wheelRotation += delta;


                            /*
                             * Custom cubic-bezier:
                             * cepat di awal → melambat natural.
                             */
                            wheelCanvas.style.transition =
                                'transform 5.8s cubic-bezier(.12,.78,.16,1)';

                            wheelCanvas.style.transform =
                                `rotate(${wheelRotation}deg)`;


                            setTimeout(async function () {

                                spinning = false;

                                currentWinner = {
                                    memberIndex: memberIndex,
                                    member: selectedMember,
                                    option: selectedOption
                                };


                                /*
                                 * Highlight sebentar sebelum popup.
                                 */
                                wheelStatus.innerHTML = `
                                    <i class="ti ti-sparkles"></i>
                                    Hasil ditemukan!
                                `;


                                /*
                                 * Simpan langsung ke DB.
                                 */
                                await saveSpinResult(
                                    selectedMember.name,
                                    selectedOption
                                );


                                showWinnerModal(
                                    selectedMember.name,
                                    selectedOption
                                );


                            }, 5900);

                        }


                        /* =====================================================
                           SAVE SPIN
                           ===================================================== */

                        async function saveSpinResult(
                            memberName,
                            result
                        ) {

                            try {

                                const response =
                                    await fetch(
                                        'http://localhost:8081/spin/save',
                                        {
                                            method: 'POST',

                                            headers: {
                                                'Content-Type':
                                                    'application/x-www-form-urlencoded; charset=UTF-8',

                                                'X-Requested-With':
                                                    'XMLHttpRequest'
                                            },

                                            body:
                                                new URLSearchParams({

                                                     'csrf_test_name':
                                                           '1b9c4c45e8ade691e93fa3491e148a8d',

                                                    id_group:
                                                        selectedGroupId,

                                                    id_task:
                                                        selectedTaskId,

                                                    session_id:
                                                        sessionId,

                                                    anggota:
                                                        selectedMember.name,

                                                    hasil:
                                                         selectedResult

                                                })
                                        }
                                    );


                                const data =
                                    await response.json();


                                if (!response.ok || !data.success) {

                                    console.error(
                                        'Gagal menyimpan spin:',
                                        data
                                    );

                                    return false;

                                }


                                return true;


                            } catch (error) {

                                console.error(
                                    'Spin save error:',
                                    error
                                );

                                return false;

                            }

                        }


                        /* =====================================================
                           RESULT MODAL
                           ===================================================== */

                        function showWinnerModal(
                            memberName,
                            taskName
                        ) {

                            resultName.textContent =
                                memberName;

                            resultTask.textContent =
                                taskName;


                            resultOverlay.classList.add('show');


                            createConfetti();


                            /*
                             * Hapus kandidat hanya setelah
                             * popup muncul dan user melihat hasil.
                             */

                        }


                        function createConfetti() {

                            const pieces = 26;

                            for (
                                let i = 0;
                                i < pieces;
                                i++
                            ) {

                                const confetti =
                                    document.createElement('div');

                                confetti.className =
                                    'confetti';

                                const colors = [
                                    '#6d5dfc',
                                    '#8f7fff',
                                    '#5cc8bd',
                                    '#f2c75c',
                                    '#ee8eaa'
                                ];

                                confetti.style.background =
                                    colors[
                                        Math.floor(
                                            Math.random() *
                                            colors.length
                                        )
                                    ];

                                confetti.style.left =
                                    `${45 + Math.random() * 10}%`;

                                confetti.style.top =
                                    '42%';

                                confetti.style.setProperty(
                                    '--x',
                                    `${(Math.random() - .5) * 500}px`
                                );

                                confetti.style.setProperty(
                                    '--y',
                                    `${100 + Math.random() * 300}px`
                                );

                                confetti.style.animationDelay =
                                    `${Math.random() * .15}s`;

                                document.body.appendChild(
                                    confetti
                                );


                                setTimeout(function () {
                                    confetti.remove();
                                }, 1500);

                            }

                        }


                        /* =====================================================
                           CONTINUE SPIN
                           ===================================================== */

                        continueSpin.addEventListener(
                            'click',
                            continueAfterWinner
                        );


                        async function continueAfterWinner() {

                            if (!currentWinner) {
                                return;
                            }


                            resultOverlay.classList.remove('show');


                            const memberName =
                                currentWinner.member.name;

                            const option =
                                currentWinner.option;


                            /*
                             * Tambahkan assignment lokal.
                             */
                            assignments.push({

                                anggota:
                                    memberName,

                                hasil:
                                    option

                            });


                            /*
                             * Hapus anggota yang baru dapat tugas.
                             */
                            remainingMembers =
                                remainingMembers.filter(
                                    function (member) {

                                        return Number(member.id_user)
                                            !== Number(
                                                currentWinner.member.id_user
                                            );

                                    }
                                );


                            /*
                             * Hapus option dari input.
                             */
                            removeOptionFromInputs(
                                option
                            );


                            remainingOptions =
                                getOptionsFromInputs();


                            currentWinner = null;


                            updateMemberList();

                            updateCounts();

                            updateProgress();

                            drawWheel();


                            if (
                                remainingMembers.length === 0
                            ) {

                                finishSpin();

                                return;

                            }


                            wheelStatus.innerHTML = `
                                <i class="ti ti-player-play"></i>
                                Siap untuk spin berikutnya
                            `;


                            spinHelper.textContent =
                                `${remainingMembers.length} anggota masih menunggu bagian.`;


                            updateSpinAvailability();


                            /*
                             * Scroll sedikit ke wheel.
                             */
                            document.querySelector(
                                '.spin-wheel-card'
                            )?.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });

                        }


                        /* =====================================================
                           REMOVE OPTION
                           ===================================================== */

                        function removeOptionFromInputs(
                            selectedValue
                        ) {

                            const rows =
                                Array.from(
                                    optionList.querySelectorAll(
                                        '.option-input-row'
                                    )
                                );


                            rows.forEach(function (row) {

                                const input =
                                    row.querySelector(
                                        '.option-input'
                                    );


                                if (
                                    input &&
                                    input.value.trim() ===
                                    selectedValue
                                ) {

                                    row.remove();

                                }

                            });

                        }


                        /* =====================================================
                           FINISH
                           ===================================================== */

                        function finishSpin() {

                            spinning = false;

                            wheelStatus.innerHTML = `
                                <i class="ti ti-circle-check"></i>
                                Semua anggota sudah mendapat bagian
                            `;

                            spinHelper.textContent =
                                'Pembagian selesai!';


                            spinButton.disabled = true;


                            buildConclusion();


                            /*
                             * Refresh history setelah semua selesai.
                             */
                            loadHistory();


                            setTimeout(function () {

                                conclusionSection
                                    .scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'start'
                                    });

                            }, 250);

                        }


                        /* =====================================================
                           CONCLUSION
                           ===================================================== */

                        function buildConclusion() {

                            const task =
                                getSelectedTask();


                            receiptTask.textContent =
                                task
                                    ? task.judul
                                    : 'Pembagian tugas';


                            receiptRows.innerHTML = '';


                            assignments.forEach(function (item) {

                                const row =
                                    document.createElement('div');

                                row.className =
                                    'receipt-row';

                                row.innerHTML = `
                                    <div class="receipt-member">
                                        ${escapeHtml(item.anggota)}
                                    </div>

                                    <div class="receipt-result">
                                        ${escapeHtml(item.hasil)}
                                    </div>
                                `;

                                receiptRows.appendChild(row);

                            });


                            receiptDate.textContent =
                                formatDate(
                                    new Date()
                                );


                            conclusionSection.classList.add(
                                'show'
                            );

                        }


                        function formatDate(date) {

                            return date.toLocaleDateString(
                                'id-ID',
                                {
                                    day: '2-digit',
                                    month: 'long',
                                    year: 'numeric'
                                }
                            );

                        }


                        /* =====================================================
                           COPY RESULT
                           ===================================================== */

                        copyResult.addEventListener(
                            'click',
                            async function () {

                                const text =
                                    makeConclusionText();


                                try {

                                    await navigator.clipboard.writeText(
                                        text
                                    );

                                    copyResult.innerHTML =
                                        '<i class="ti ti-check"></i> Tersalin!';


                                    setTimeout(function () {

                                        copyResult.innerHTML =
                                            '<i class="ti ti-copy"></i> Salin';

                                    }, 1600);


                                } catch (error) {

                                    alert(
                                        'Browser tidak mengizinkan penyalinan otomatis.'
                                    );

                                }

                            }
                        );


                        function makeConclusionText() {

                            const task =
                                getSelectedTask();


                            let text =
                                `HASIL PEMBAGIAN TUGAS\n\n`;


                            text +=
                                `${task ? task.judul : 'Pembagian Tugas'}\n`;

                            text +=
                                `${formatDate(new Date())}\n\n`;


                            assignments.forEach(function (item) {

                                text +=
                                    `${item.anggota} — ${item.hasil}\n`;

                            });


                            text +=
                                `\nDibuat melalui CAMPUSS SAVER`;


                            return text;

                        }


                        /* =====================================================
                           RECEIPT IMAGE
                           ===================================================== */

                        async function generateReceiptImage() {

                            const width = 1080;
                            const height = 1350;

                            const canvas =
                                document.createElement('canvas');

                            canvas.width = width;
                            canvas.height = height;

                            const ctx =
                                canvas.getContext('2d');


                            /*
                             * Background.
                             */
                            const background =
                                ctx.createLinearGradient(
                                    0,
                                    0,
                                    width,
                                    height
                                );

                            background.addColorStop(
                                0,
                                '#f8f7ff'
                            );

                            background.addColorStop(
                                1,
                                '#eef8f7'
                            );

                            ctx.fillStyle =
                                background;

                            ctx.fillRect(
                                0,
                                0,
                                width,
                                height
                            );


                            /*
                             * Decorative blobs.
                             */
                            ctx.globalAlpha = .18;

                            ctx.fillStyle = '#7766ff';

                            ctx.beginPath();

                            ctx.arc(
                                90,
                                90,
                                210,
                                0,
                                Math.PI * 2
                            );

                            ctx.fill();


                            ctx.fillStyle = '#55bcb0';

                            ctx.beginPath();

                            ctx.arc(
                                1000,
                                1200,
                                260,
                                0,
                                Math.PI * 2
                            );

                            ctx.fill();

                            ctx.globalAlpha = 1;


                            /*
                             * Receipt card.
                             */
                            const cardX = 70;
                            const cardY = 70;
                            const cardW = 940;
                            const cardH = 1210;


                            roundedRect(
                                ctx,
                                cardX,
                                cardY,
                                cardW,
                                cardH,
                                38
                            );

                            ctx.fillStyle =
                                '#ffffff';

                            ctx.fill();


                            /*
                             * Brand.
                             */
                            ctx.fillStyle =
                                '#6d5dfc';

                            ctx.font =
                                '900 28px Arial';

                            ctx.fillText(
                                'CAMPUSS SAVER',
                                cardX + 70,
                                cardY + 82
                            );


                            ctx.fillStyle =
                                '#242336';

                            ctx.font =
                                '900 46px Arial';

                            ctx.fillText(
                                'Hasil Pembagian Tugas',
                                cardX + 70,
                                cardY + 145
                            );


                            const task =
                                getSelectedTask();


                            ctx.fillStyle =
                                '#7f7a8d';

                            ctx.font =
                                '500 25px Arial';

                            ctx.fillText(
                                task
                                    ? task.judul
                                    : 'Pembagian Tugas',
                                cardX + 70,
                                cardY + 190
                            );


                            ctx.fillText(
                                `${formatDate(new Date())} · ${assignments.length} anggota`,
                                cardX + 70,
                                cardY + 230
                            );


                            /*
                             * Divider.
                             */
                            ctx.strokeStyle =
                                '#e8e5ee';

                            ctx.lineWidth = 2;

                            ctx.beginPath();

                            ctx.moveTo(
                                cardX + 70,
                                cardY + 275
                            );

                            ctx.lineTo(
                                cardX + cardW - 70,
                                cardY + 275
                            );

                            ctx.stroke();


                            /*
                             * Table headings.
                             */
                            ctx.fillStyle =
                                '#9a95a5';

                            ctx.font =
                                '700 20px Arial';

                            ctx.fillText(
                                'ANGGOTA',
                                cardX + 70,
                                cardY + 325
                            );

                            ctx.fillText(
                                'BAGIAN TUGAS',
                                cardX + 500,
                                cardY + 325
                            );


                            let y =
                                cardY + 380;


                            assignments.forEach(function (item) {

                                ctx.strokeStyle =
                                    '#eeeaf2';

                                ctx.lineWidth = 1;

                                ctx.beginPath();

                                ctx.moveTo(
                                    cardX + 70,
                                    y + 35
                                );

                                ctx.lineTo(
                                    cardX + cardW - 70,
                                    y + 35
                                );

                                ctx.stroke();


                                ctx.fillStyle =
                                    '#373342';

                                ctx.font =
                                    '800 24px Arial';

                                ctx.fillText(
                                    truncateText(
                                        item.anggota,
                                        28
                                    ),
                                    cardX + 70,
                                    y
                                );


                                ctx.fillStyle =
                                    '#6e6979';

                                ctx.font =
                                    '500 23px Arial';

                                ctx.fillText(
                                    truncateText(
                                        item.hasil,
                                        31
                                    ),
                                    cardX + 500,
                                    y
                                );


                                y += 85;

                            });


                            /*
                             * Footer.
                             */
                            ctx.fillStyle =
                                '#9a95a5';

                            ctx.font =
                                '500 19px Arial';

                            ctx.fillText(
                                'Dibuat melalui CAMPUSS SAVER',
                                cardX + 70,
                                cardY + cardH - 75
                            );


                            ctx.fillStyle =
                                '#6d5dfc';

                            ctx.font =
                                '800 19px Arial';

                            ctx.fillText(
                                'SPIN',
                                cardX + cardW - 135,
                                cardY + cardH - 75
                            );


                            return new Promise(function (resolve) {

                                canvas.toBlob(
                                    function (blob) {
                                        resolve(blob);
                                    },
                                    'image/png'
                                );

                            });

                        }


                        function roundedRect(
                            ctx,
                            x,
                            y,
                            width,
                            height,
                            radius
                        ) {

                            ctx.beginPath();

                            ctx.moveTo(
                                x + radius,
                                y
                            );

                            ctx.lineTo(
                                x + width - radius,
                                y
                            );

                            ctx.quadraticCurveTo(
                                x + width,
                                y,
                                x + width,
                                y + radius
                            );

                            ctx.lineTo(
                                x + width,
                                y + height - radius
                            );

                            ctx.quadraticCurveTo(
                                x + width,
                                y + height,
                                x + width - radius,
                                y + height
                            );

                            ctx.lineTo(
                                x + radius,
                                y + height
                            );

                            ctx.quadraticCurveTo(
                                x,
                                y + height,
                                x,
                                y + height - radius
                            );

                            ctx.lineTo(
                                x,
                                y + radius
                            );

                            ctx.quadraticCurveTo(
                                x,
                                y,
                                x + radius,
                                y
                            );

                            ctx.closePath();

                        }


                        function truncateText(
                            text,
                            max
                        ) {

                            text =
                                String(text || '');

                            if (text.length <= max) {
                                return text;
                            }

                            return (
                                text.substring(
                                    0,
                                    max - 1
                                ) + '…'
                            );

                        }


                        /* =====================================================
                           SHARE AS IMAGE
                           ===================================================== */

                        shareResult.addEventListener(
                            'click',
                            async function () {

                                shareResult.disabled = true;

                                shareResult.innerHTML =
                                    '<i class="ti ti-loader-2"></i> Menyiapkan gambar...';


                                try {

                                    const blob =
                                        await generateReceiptImage();


                                    const file =
                                        new File(
                                            [
                                                blob
                                            ],
                                            'hasil-pembagian-tugas.png',
                                            {
                                                type: 'image/png'
                                            }
                                        );


                                    /*
                                     * Mobile / browser yang mendukung Web Share.
                                     */
                                    if (
                                        navigator.share &&
                                        navigator.canShare &&
                                        navigator.canShare({
                                            files: [file]
                                        })
                                    ) {

                                        await navigator.share({

                                            title:
                                                'Hasil Pembagian Tugas',

                                            text:
                                                'Hasil pembagian tugas dari CAMPUSS SAVER.',

                                            files: [file]

                                        });


                                    } else {

                                        /*
                                         * Fallback:
                                         * langsung download PNG.
                                         */
                                        const url =
                                            URL.createObjectURL(
                                                blob
                                            );

                                        const link =
                                            document.createElement('a');

                                        link.href = url;

                                        link.download =
                                            'hasil-pembagian-tugas.png';

                                        document.body.appendChild(
                                            link
                                        );

                                        link.click();

                                        link.remove();

                                        URL.revokeObjectURL(
                                            url
                                        );

                                    }


                                } catch (error) {

                                    /*
                                     * User menutup share sheet
                                     * bukan error yang perlu ditampilkan.
                                     */
                                    console.log(
                                        'Share cancelled:',
                                        error
                                    );

                                }


                                shareResult.disabled = false;

                                shareResult.innerHTML =
                                    '<i class="ti ti-share-3"></i> Bagikan sebagai gambar';

                            }
                        );


                        /* =====================================================
                           SAVE TO NOTES
                           ===================================================== */

                        saveNote.addEventListener(
                            'click',
                            async function () {

                                if (!selectedGroupId) {
                                    return;
                                }


                                saveNote.disabled = true;

                                noteStatus.textContent =
                                    'Menyimpan hasil ke Catatan...';


                                try {

                                    const response =
                                        await fetch(
                                            'http://localhost:8081/spin/save-note',
                                            {
                                                method: 'POST',

                                                headers: {
                                                    'Content-Type':
                                                        'application/x-www-form-urlencoded; charset=UTF-8',

                                                    'X-Requested-With':
                                                        'XMLHttpRequest'
                                                },

                                               body:
                        new URLSearchParams({
                            'csrf_test_name':
                                '1b9c4c45e8ade691e93fa3491e148a8d',

                            id_group:
                                selectedGroupId,

                            content:
                                makeConclusionText()
                        })
                                            }
                                        );


                                    const data =
                                        await response.json();


                                    if (
                                        !response.ok ||
                                        !data.success
                                    ) {

                                        throw new Error(
                                            data.message ||
                                            'Gagal menyimpan catatan.'
                                        );

                                    }


                                    noteStatus.textContent =
                                        '✓ Hasil pembagian berhasil disimpan ke Catatan.';


                                    saveNote.innerHTML =
                                        '<i class="ti ti-check"></i> Tersimpan di Catatan';


                                } catch (error) {

                                    console.error(
                                        'Save note error:',
                                        error
                                    );

                                    noteStatus.textContent =
                                        error.message ||
                                        'Gagal menyimpan hasil ke Catatan.';


                                    saveNote.disabled = false;

                                }

                            }
                        );


                        /* =====================================================
                           RESTART
                           ===================================================== */

                        /* =====================================================
                       RESTART
                       ===================================================== */

                    restartSpin.addEventListener(
                        'click',
                        function () {

                            remainingMembers = JSON.parse(
                                JSON.stringify(
                                    membersData[selectedGroupId] || []
                                )
                            );

                            originalMemberCount =
                                remainingMembers.length;

                            optionList.innerHTML = '';

                            const oldOptions =
                                assignments.map(function (item) {
                                    return item.hasil;
                                });

                            oldOptions.forEach(function (option) {
                                createOptionInput(option);
                            });

                            assignments = [];

                            sessionId =
                                makeSessionId();

                            remainingOptions =
                                getOptionsFromInputs();

                            conclusionSection.classList.remove('show');

                            noteStatus.textContent = '';

                            saveNote.disabled = false;

                            saveNote.innerHTML =
                                '<i class="ti ti-notes"></i> Simpan ke Catatan';

                            updateMemberList();
                            updateCounts();
                            updateProgress();
                            drawWheel();

                            wheelStatus.innerHTML =
                                '<i class="ti ti-circle-check"></i> Siap untuk spin baru';

                            updateSpinAvailability();

                            const wheelCard =
                                document.querySelector('.spin-wheel-card');

                            if (wheelCard) {
                                wheelCard.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'center'
                                });
                            }

                        }
                    );

                        /* =====================================================
                           HISTORY
                           ===================================================== */

                        async function loadHistory() {

                            if (!selectedGroupId) {
                                return;
                            }


                            historyContainer.innerHTML = `
                                <div class="history-empty">
                                    <i class="ti ti-loader-2"></i>
                                    Memuat riwayat...
                                </div>
                            `;


                            try {

                                const response =
                                    await fetch(
                                        `http://localhost:8081/spin/history/${selectedGroupId}`,
                                        {
                                            headers: {
                                                'X-Requested-With':
                                                    'XMLHttpRequest'
                                            }
                                        }
                                    );


                                const data =
                                    await response.json();


                                if (
                                    !response.ok ||
                                    !data.success
                                ) {

                                    throw new Error(
                                        data.message ||
                                        'Gagal mengambil riwayat.'
                                    );

                                }


                                renderHistory(
                                    data.history || []
                                );


                            } catch (error) {

                                console.error(
                                    'History error:',
                                    error
                                );


                                historyContainer.innerHTML = `
                                    <div class="history-empty">
                                        Riwayat belum dapat dimuat.
                                    </div>
                                `;

                            }

                        }


                    function renderHistory(history) {

                        if (!history.length) {

                            historyContainer.innerHTML = `
                                <div class="history-empty">
                                    Belum ada riwayat pembagian untuk kelompok ini.
                                </div>
                            `;

                            return;
                        }


                        const sessions = {};


                        history.forEach(function (item) {

                            const session =
                                item.session_id ||
                                'legacy-' + item.id_spin;


                            if (!sessions[session]) {

                                sessions[session] = {

                                    task:
                                        item.task_judul ||
                                        'Pembagian tugas',

                                    created_at:
                                        item.created_at,

                                    items: []

                                };

                            }


                            sessions[session].items.push(item);

                        });


                        historyContainer.innerHTML = '';


                        Object.entries(sessions).forEach(function (
                            [sessionId, session],
                            index
                        ) {

                            const card =
                                document.createElement('div');


                            card.className =
                                'history-session' +
                                (
                                    index === 0
                                        ? ' open'
                                        : ''
                                );


                            const date =
                                session.created_at
                                    ? formatDate(
                                        new Date(
                                            session.created_at
                                        )
                                    )
                                    : 'Tanggal tidak tersedia';


                            const count =
                                session.items.length;


                            card.innerHTML = `

                                <div class="history-session-head">

                                    <div>

                                        <div class="history-session-title">
                                            ${escapeHtml(session.task)}
                                        </div>

                                        <div class="history-session-meta">
                                            ${escapeHtml(date)}
                                            ·
                                            ${count} anggota
                                        </div>

                                    </div>

                                    <span class="history-complete">
                                        Selesai
                                    </span>

                                </div>


                                <div class="history-body">

                                    ${session.items.map(function (item) {

                                        return `

                                            <div class="history-row">

                                                <div class="history-person">
                                                    ${escapeHtml(
                                                        item.anggota ||
                                                        'Anggota'
                                                    )}
                                                </div>

                                                <div class="history-result">
                                                    ${escapeHtml(
                                                        item.hasil ||
                                                        '-'
                                                    )}
                                                </div>

                                            </div>

                                        `;

                                    }).join('')}

                                </div>

                            `;


                            card.querySelector(
                                '.history-session-head'
                            ).addEventListener(
                                'click',
                                function () {

                                    card.classList.toggle(
                                        'open'
                                    );

                                }
                            );


                            historyContainer.appendChild(
                                card
                            );

                        });

                    }




                        /* =====================================================
                           INITIAL
                           ===================================================== */

                        drawWheel();

                        updateMemberList();

                        updateCounts();

                        updateSpinAvailability();

                    });
                    </script>

                </div>
            </section>
        </div>

        <!-- DEBUG-VIEW START 4 APPPATH/Views/layouts/partials/footer.php -->
        <footer class="main-footer" style="font-size:.8rem">
            <strong style="letter-spacing:.14em">LIBRIS</strong>
             &mdash; Perpustakaan Digital &copy; 2026
        </footer>

        <!-- DEBUG-VIEW ENDED 4 APPPATH/Views/layouts/partials/footer.php -->

    </div>

    <!-- DEBUG-VIEW START 5 APPPATH/Views/layouts/partials/script.php -->
    <script src="http://localhost:8081/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="http://localhost:8081/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://localhost:8081/adminlte/dist/js/adminlte.min.js"></script>

    <!-- DEBUG-VIEW ENDED 5 APPPATH/Views/layouts/partials/script.php -->

</body>
</html>

<!-- DEBUG-VIEW ENDED 6 APPPATH/Views/layouts/template.php -->

<!-- DEBUG-VIEW ENDED 7 APPPATH/Views/spinner/index.php -->
