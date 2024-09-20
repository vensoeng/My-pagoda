!(function (t) {
    "object" == typeof exports && "undefined" != typeof module
        ? (module.exports = t())
        : "function" == typeof define && define.amd
        ? define([], t)
        : (("undefined" != typeof window
              ? window
              : "undefined" != typeof global
              ? global
              : "undefined" != typeof self
              ? self
              : this
          ).pica = t());
})(function () {
    return (function o(a, A, s) {
        function u(e, t) {
            if (!A[e]) {
                if (!a[e]) {
                    var i = "function" == typeof require && require;
                    if (!t && i) return i(e, !0);
                    if (h) return h(e, !0);
                    var r = new Error("Cannot find module '" + e + "'");
                    throw ((r.code = "MODULE_NOT_FOUND"), r);
                }
                var n = (A[e] = { exports: {} });
                a[e][0].call(
                    n.exports,
                    function (t) {
                        return u(a[e][1][t] || t);
                    },
                    n,
                    n.exports,
                    o,
                    a,
                    A,
                    s
                );
            }
            return A[e].exports;
        }
        for (
            var h = "function" == typeof require && require, t = 0;
            t < s.length;
            t++
        )
            u(s[t]);
        return u;
    })(
        {
            1: [
                function (t, e, i) {
                    "use strict";
                    var r = t("inherits"),
                        n = t("multimath"),
                        o = t("multimath/lib/unsharp_mask"),
                        a = t("./mm_resize");
                    function A(t) {
                        var e = t || [],
                            i = {
                                js: 0 <= e.indexOf("js"),
                                wasm: 0 <= e.indexOf("wasm"),
                            };
                        n.call(this, i),
                            (this.features = {
                                js: i.js,
                                wasm: i.wasm && this.has_wasm(),
                            }),
                            this.use(o),
                            this.use(a);
                    }
                    r(A, n),
                        (A.prototype.resizeAndUnsharp = function (t, e) {
                            var i = this.resize(t, e);
                            return (
                                t.unsharpAmount &&
                                    this.unsharp_mask(
                                        i,
                                        t.toWidth,
                                        t.toHeight,
                                        t.unsharpAmount,
                                        t.unsharpRadius,
                                        t.unsharpThreshold
                                    ),
                                i
                            );
                        }),
                        (e.exports = A);
                },
                {
                    "./mm_resize": 4,
                    inherits: 15,
                    multimath: 16,
                    "multimath/lib/unsharp_mask": 19,
                },
            ],
            2: [
                function (t, e, i) {
                    "use strict";
                    function w(t) {
                        return t < 0 ? 0 : 255 < t ? 255 : t;
                    }
                    e.exports = {
                        convolveHorizontally: function (t, e, i, r, n, o) {
                            for (
                                var a,
                                    A,
                                    s,
                                    u,
                                    h,
                                    f,
                                    c,
                                    g,
                                    l,
                                    d,
                                    I = 0,
                                    m = 0,
                                    p = 0;
                                p < r;
                                p++
                            ) {
                                for (l = h = 0; l < n; l++) {
                                    for (
                                        f = o[h++],
                                            c = o[h++],
                                            g = (I + 4 * f) | 0,
                                            a = A = s = u = 0;
                                        0 < c;
                                        c--
                                    )
                                        (u = (u + (d = o[h++]) * t[g + 3]) | 0),
                                            (s = (s + d * t[g + 2]) | 0),
                                            (A = (A + d * t[g + 1]) | 0),
                                            (a = (a + d * t[g]) | 0),
                                            (g = (g + 4) | 0);
                                    (e[m + 3] = w((u + 8192) >> 14)),
                                        (e[m + 2] = w((s + 8192) >> 14)),
                                        (e[m + 1] = w((A + 8192) >> 14)),
                                        (e[m] = w((a + 8192) >> 14)),
                                        (m = (m + 4 * r) | 0);
                                }
                                (m = (4 * (p + 1)) | 0),
                                    (I = ((p + 1) * i * 4) | 0);
                            }
                        },
                        convolveVertically: function (t, e, i, r, n, o) {
                            for (
                                var a,
                                    A,
                                    s,
                                    u,
                                    h,
                                    f,
                                    c,
                                    g,
                                    l,
                                    d,
                                    I = 0,
                                    m = 0,
                                    p = 0;
                                p < r;
                                p++
                            ) {
                                for (l = h = 0; l < n; l++) {
                                    for (
                                        f = o[h++],
                                            c = o[h++],
                                            g = (I + 4 * f) | 0,
                                            a = A = s = u = 0;
                                        0 < c;
                                        c--
                                    )
                                        (u = (u + (d = o[h++]) * t[g + 3]) | 0),
                                            (s = (s + d * t[g + 2]) | 0),
                                            (A = (A + d * t[g + 1]) | 0),
                                            (a = (a + d * t[g]) | 0),
                                            (g = (g + 4) | 0);
                                    (e[m + 3] = w((u + 8192) >> 14)),
                                        (e[m + 2] = w((s + 8192) >> 14)),
                                        (e[m + 1] = w((A + 8192) >> 14)),
                                        (e[m] = w((a + 8192) >> 14)),
                                        (m = (m + 4 * r) | 0);
                                }
                                (m = (4 * (p + 1)) | 0),
                                    (I = ((p + 1) * i * 4) | 0);
                            }
                        },
                    };
                },
                {},
            ],
            3: [
                function (t, e, i) {
                    "use strict";
                    e.exports =
                        "AGFzbQEAAAABFAJgBn9/f39/fwBgB39/f39/f38AAg8BA2VudgZtZW1vcnkCAAEDAwIAAQQEAXAAAAcZAghjb252b2x2ZQAACmNvbnZvbHZlSFYAAQkBAArmAwLBAwEQfwJAIANFDQAgBEUNACAFQQRqIRVBACEMQQAhDQNAIA0hDkEAIRFBACEHA0AgB0ECaiESAn8gBSAHQQF0IgdqIgZBAmouAQAiEwRAQQAhCEEAIBNrIRQgFSAHaiEPIAAgDCAGLgEAakECdGohEEEAIQlBACEKQQAhCwNAIBAoAgAiB0EYdiAPLgEAIgZsIAtqIQsgB0H/AXEgBmwgCGohCCAHQRB2Qf8BcSAGbCAKaiEKIAdBCHZB/wFxIAZsIAlqIQkgD0ECaiEPIBBBBGohECAUQQFqIhQNAAsgEiATagwBC0EAIQtBACEKQQAhCUEAIQggEgshByABIA5BAnRqIApBgMAAakEOdSIGQf8BIAZB/wFIG0EQdEGAgPwHcUEAIAZBAEobIAtBgMAAakEOdSIGQf8BIAZB/wFIG0EYdEEAIAZBAEobciAJQYDAAGpBDnUiBkH/ASAGQf8BSBtBCHRBgP4DcUEAIAZBAEobciAIQYDAAGpBDnUiBkH/ASAGQf8BSBtB/wFxQQAgBkEAShtyNgIAIA4gA2ohDiARQQFqIhEgBEcNAAsgDCACaiEMIA1BAWoiDSADRw0ACwsLIQACQEEAIAIgAyAEIAUgABAAIAJBACAEIAUgBiABEAALCw==";
                },
                {},
            ],
            4: [
                function (t, e, i) {
                    "use strict";
                    e.exports = {
                        name: "resize",
                        fn: t("./resize"),
                        wasm_fn: t("./resize_wasm"),
                        wasm_src: t("./convolve_wasm_base64"),
                    };
                },
                {
                    "./convolve_wasm_base64": 3,
                    "./resize": 5,
                    "./resize_wasm": 8,
                },
            ],
            5: [
                function (t, e, i) {
                    "use strict";
                    var I = t("./resize_filter_gen"),
                        m = t("./convolve").convolveHorizontally,
                        p = t("./convolve").convolveVertically;
                    e.exports = function (t) {
                        var e = t.src,
                            i = t.width,
                            r = t.height,
                            n = t.toWidth,
                            o = t.toHeight,
                            a = t.scaleX || t.toWidth / t.width,
                            A = t.scaleY || t.toHeight / t.height,
                            s = t.offsetX || 0,
                            u = t.offsetY || 0,
                            h = t.dest || new Uint8Array(n * o * 4),
                            f = void 0 === t.quality ? 3 : t.quality,
                            c = t.alpha || !1,
                            g = I(f, i, n, a, s),
                            l = I(f, r, o, A, u),
                            d = new Uint8Array(n * r * 4);
                        return (
                            m(e, d, i, r, n, g),
                            p(d, h, r, n, o, l),
                            c ||
                                (function (t, e, i) {
                                    for (
                                        var r = 3, n = (e * i * 4) | 0;
                                        r < n;

                                    )
                                        (t[r] = 255), (r = (r + 4) | 0);
                                })(h, n, o),
                            h
                        );
                    };
                },
                { "./convolve": 2, "./resize_filter_gen": 6 },
            ],
            6: [
                function (t, e, i) {
                    "use strict";
                    var D = t("./resize_filter_info"),
                        r = 14;
                    function U(t) {
                        return Math.round(t * ((1 << r) - 1));
                    }
                    e.exports = function (t, e, i, r, n) {
                        for (
                            var o,
                                a,
                                A,
                                s,
                                u,
                                h,
                                f,
                                c,
                                g,
                                l,
                                d,
                                I,
                                m,
                                p,
                                w,
                                B,
                                b = D[t].filter,
                                y = 1 / r,
                                _ = Math.min(1, r),
                                E = D[t].win / _,
                                C = Math.floor(2 * (1 + E)),
                                Q = new Int16Array((C + 2) * i),
                                v = 0,
                                x = !Q.subarray || !Q.set,
                                M = 0;
                            M < i;
                            M++
                        ) {
                            for (
                                o = (M + 0.5) * y + n,
                                    a = Math.max(0, Math.floor(o - E)),
                                    s =
                                        (A = Math.min(
                                            e - 1,
                                            Math.ceil(o + E)
                                        )) -
                                        a +
                                        1,
                                    u = new Float32Array(s),
                                    h = new Int16Array(s),
                                    c = a,
                                    g = f = 0;
                                c <= A;
                                c++, g++
                            )
                                (f += l = b((c + 0.5 - o) * _)), (u[g] = l);
                            for (g = d = 0; g < u.length; g++)
                                (d += I = u[g] / f), (h[g] = U(I));
                            for (
                                h[i >> 1] += U(1 - d), m = 0;
                                m < h.length && 0 === h[m];

                            )
                                m++;
                            if (m < h.length) {
                                for (p = h.length - 1; 0 < p && 0 === h[p]; )
                                    p--;
                                if (
                                    ((w = a + m),
                                    (B = p - m + 1),
                                    (Q[v++] = w),
                                    (Q[v++] = B),
                                    x)
                                )
                                    for (g = m; g <= p; g++) Q[v++] = h[g];
                                else Q.set(h.subarray(m, p + 1), v), (v += B);
                            } else (Q[v++] = 0), (Q[v++] = 0);
                        }
                        return Q;
                    };
                },
                { "./resize_filter_info": 7 },
            ],
            7: [
                function (t, e, i) {
                    "use strict";
                    e.exports = [
                        {
                            win: 0.5,
                            filter: function (t) {
                                return -0.5 <= t && t < 0.5 ? 1 : 0;
                            },
                        },
                        {
                            win: 1,
                            filter: function (t) {
                                if (t <= -1 || 1 <= t) return 0;
                                if (-1.1920929e-7 < t && t < 1.1920929e-7)
                                    return 1;
                                var e = t * Math.PI;
                                return (
                                    (Math.sin(e) / e) *
                                    (0.54 + 0.46 * Math.cos(e))
                                );
                            },
                        },
                        {
                            win: 2,
                            filter: function (t) {
                                if (t <= -2 || 2 <= t) return 0;
                                if (-1.1920929e-7 < t && t < 1.1920929e-7)
                                    return 1;
                                var e = t * Math.PI;
                                return (
                                    ((Math.sin(e) / e) * Math.sin(e / 2)) /
                                    (e / 2)
                                );
                            },
                        },
                        {
                            win: 3,
                            filter: function (t) {
                                if (t <= -3 || 3 <= t) return 0;
                                if (-1.1920929e-7 < t && t < 1.1920929e-7)
                                    return 1;
                                var e = t * Math.PI;
                                return (
                                    ((Math.sin(e) / e) * Math.sin(e / 3)) /
                                    (e / 3)
                                );
                            },
                        },
                    ];
                },
                {},
            ],
            8: [
                function (t, e, i) {
                    "use strict";
                    var _ = t("./resize_filter_gen");
                    var A = !0;
                    try {
                        A =
                            1 ===
                            new Uint32Array(
                                new Uint8Array([1, 0, 0, 0]).buffer
                            )[0];
                    } catch (t) {}
                    function E(t, e, i) {
                        if (A)
                            e.set(
                                ((r = t),
                                new Uint8Array(r.buffer, 0, r.byteLength)),
                                i
                            );
                        else
                            for (var r, n = i, o = 0; o < t.length; o++) {
                                var a = t[o];
                                (e[n++] = 255 & a), (e[n++] = (a >> 8) & 255);
                            }
                    }
                    e.exports = function (t) {
                        var e = t.src,
                            i = t.width,
                            r = t.height,
                            n = t.toWidth,
                            o = t.toHeight,
                            a = t.scaleX || t.toWidth / t.width,
                            A = t.scaleY || t.toHeight / t.height,
                            s = t.offsetX || 0,
                            u = t.offsetY || 0,
                            h = t.dest || new Uint8Array(n * o * 4),
                            f = void 0 === t.quality ? 3 : t.quality,
                            c = t.alpha || !1,
                            g = _(f, i, n, a, s),
                            l = _(f, r, o, A, u),
                            d = this.__align(
                                0 + Math.max(e.byteLength, h.byteLength)
                            ),
                            I = this.__align(d + r * n * 4),
                            m = this.__align(I + g.byteLength),
                            p = m + l.byteLength,
                            w = this.__instance("resize", p),
                            B = new Uint8Array(this.__memory.buffer),
                            b = new Uint32Array(this.__memory.buffer),
                            y = new Uint32Array(e.buffer);
                        return (
                            b.set(y),
                            E(g, B, I),
                            E(l, B, m),
                            (w.exports.convolveHV || w.exports._convolveHV)(
                                I,
                                m,
                                d,
                                i,
                                r,
                                n,
                                o
                            ),
                            new Uint32Array(h.buffer).set(
                                new Uint32Array(this.__memory.buffer, 0, o * n)
                            ),
                            c ||
                                (function (t, e, i) {
                                    for (
                                        var r = 3, n = (e * i * 4) | 0;
                                        r < n;

                                    )
                                        (t[r] = 255), (r = (r + 4) | 0);
                                })(h, n, o),
                            h
                        );
                    };
                },
                { "./resize_filter_gen": 6 },
            ],
            9: [
                function (t, e, i) {
                    "use strict";
                    function r(t, e) {
                        (this.create = t),
                            (this.available = []),
                            (this.acquired = {}),
                            (this.lastId = 1),
                            (this.timeoutId = 0),
                            (this.idle = e || 2e3);
                    }
                    (r.prototype.acquire = function () {
                        var t,
                            e = this;
                        return (
                            0 !== this.available.length
                                ? (t = this.available.pop())
                                : (((t = this.create()).id = this.lastId++),
                                  (t.release = function () {
                                      return e.release(t);
                                  })),
                            (this.acquired[t.id] = t)
                        );
                    }),
                        (r.prototype.release = function (t) {
                            var e = this;
                            delete this.acquired[t.id],
                                (t.lastUsed = Date.now()),
                                this.available.push(t),
                                0 === this.timeoutId &&
                                    (this.timeoutId = setTimeout(function () {
                                        return e.gc();
                                    }, 100));
                        }),
                        (r.prototype.gc = function () {
                            var e = this,
                                i = Date.now();
                            (this.available = this.available.filter(function (
                                t
                            ) {
                                return (
                                    !(i - t.lastUsed > e.idle) ||
                                    (t.destroy(), !1)
                                );
                            })),
                                0 !== this.available.length
                                    ? (this.timeoutId = setTimeout(function () {
                                          return e.gc();
                                      }, 100))
                                    : (this.timeoutId = 0);
                        }),
                        (e.exports = r);
                },
                {},
            ],
            10: [
                function (t, e, i) {
                    "use strict";
                    e.exports = function (t, e, i, r, n, o) {
                        var a = i / t,
                            A = r / e,
                            s = (2 * o + 2 + 1) / n;
                        if (0.5 < s) return [[i, r]];
                        var u = Math.ceil(
                            Math.log(Math.min(a, A)) / Math.log(s)
                        );
                        if (u <= 1) return [[i, r]];
                        for (var h = [], f = 0; f < u; f++) {
                            var c = Math.round(
                                    Math.pow(
                                        Math.pow(t, u - f - 1) *
                                            Math.pow(i, f + 1),
                                        1 / u
                                    )
                                ),
                                g = Math.round(
                                    Math.pow(
                                        Math.pow(e, u - f - 1) *
                                            Math.pow(r, f + 1),
                                        1 / u
                                    )
                                );
                            h.push([c, g]);
                        }
                        return h;
                    };
                },
                {},
            ],
            11: [
                function (t, e, i) {
                    "use strict";
                    var r = 1e-5;
                    function g(t) {
                        var e = Math.round(t);
                        return Math.abs(t - e) < r ? e : Math.floor(t);
                    }
                    function l(t) {
                        var e = Math.round(t);
                        return Math.abs(t - e) < r ? e : Math.ceil(t);
                    }
                    e.exports = function (t) {
                        var e,
                            i,
                            r,
                            n,
                            o,
                            a = t.toWidth / t.width,
                            A = t.toHeight / t.height,
                            s = g(t.srcTileSize * a) - 2 * t.destTileBorder,
                            u = g(t.srcTileSize * A) - 2 * t.destTileBorder;
                        if (s < 1 || u < 1)
                            throw new Error(
                                "Internal error in pica: target tile width/height is too small."
                            );
                        for (var h, f = [], c = 0; c < t.toHeight; c += u)
                            for (r = 0; r < t.toWidth; r += s)
                                (e = r - t.destTileBorder) < 0 && (e = 0),
                                    e + (n = r + s + t.destTileBorder - e) >=
                                        t.toWidth && (n = t.toWidth - e),
                                    (i = c - t.destTileBorder) < 0 && (i = 0),
                                    i + (o = c + u + t.destTileBorder - i) >=
                                        t.toHeight && (o = t.toHeight - i),
                                    (h = {
                                        toX: e,
                                        toY: i,
                                        toWidth: n,
                                        toHeight: o,
                                        toInnerX: r,
                                        toInnerY: c,
                                        toInnerWidth: s,
                                        toInnerHeight: u,
                                        offsetX: e / a - g(e / a),
                                        offsetY: i / A - g(i / A),
                                        scaleX: a,
                                        scaleY: A,
                                        x: g(e / a),
                                        y: g(i / A),
                                        width: l(n / a),
                                        height: l(o / A),
                                    }),
                                    f.push(h);
                        return f;
                    };
                },
                {},
            ],
            12: [
                function (t, e, i) {
                    "use strict";
                    function r(t) {
                        return Object.prototype.toString.call(t);
                    }
                    (e.exports.isCanvas = function (t) {
                        var e = r(t);
                        return (
                            "[object HTMLCanvasElement]" === e ||
                            "[object Canvas]" === e
                        );
                    }),
                        (e.exports.isImage = function (t) {
                            return "[object HTMLImageElement]" === r(t);
                        }),
                        (e.exports.limiter = function (t) {
                            var r = 0,
                                n = [];
                            function o() {
                                r < t && n.length && (r++, n.shift()());
                            }
                            return function (t) {
                                return new Promise(function (e, i) {
                                    n.push(function () {
                                        t().then(
                                            function (t) {
                                                e(t), r--, o();
                                            },
                                            function (t) {
                                                i(t), r--, o();
                                            }
                                        );
                                    }),
                                        o();
                                });
                            };
                        }),
                        (e.exports.cib_quality_name = function (t) {
                            switch (t) {
                                case 0:
                                    return "pixelated";
                                case 1:
                                    return "low";
                                case 2:
                                    return "medium";
                            }
                            return "high";
                        }),
                        (e.exports.cib_support = function () {
                            return Promise.resolve()
                                .then(function () {
                                    if (
                                        "undefined" ==
                                            typeof createImageBitmap ||
                                        "undefined" == typeof document
                                    )
                                        return !1;
                                    var i = document.createElement("canvas");
                                    return (
                                        (i.width = 100),
                                        (i.height = 100),
                                        createImageBitmap(i, 0, 0, 100, 100, {
                                            resizeWidth: 10,
                                            resizeHeight: 10,
                                            resizeQuality: "high",
                                        }).then(function (t) {
                                            var e = 10 === t.width;
                                            return t.close(), (i = null), e;
                                        })
                                    );
                                })
                                .catch(function () {
                                    return !1;
                                });
                        });
                },
                {},
            ],
            13: [
                function (t, e, i) {
                    "use strict";
                    e.exports = function () {
                        var r,
                            n = t("./mathlib");
                        onmessage = function (t) {
                            var e = t.data.opts,
                                i = (r =
                                    r ||
                                    new n(t.data.features)).resizeAndUnsharp(e);
                            postMessage({ result: i }, [i.buffer]);
                        };
                    };
                },
                { "./mathlib": 1 },
            ],
            14: [
                function (t, e, i) {
                    var A, s, u, h, f;
                    function c(t, e, i, r, n, o) {
                        for (
                            var a, A, s, u, h, f, c, g, l, d, I, m, p, w = 0;
                            w < o;
                            w++
                        ) {
                            for (
                                g = 0,
                                    u = h = (a = t[(f = (c = w) * n)]) * r[6],
                                    d = r[0],
                                    I = r[1],
                                    m = r[4],
                                    p = r[5],
                                    l = 0;
                                l < n;
                                l++
                            )
                                (s = (A = t[f]) * d + a * I + u * m + h * p),
                                    (h = u),
                                    (u = s),
                                    (a = A),
                                    (i[g] = u),
                                    g++,
                                    f++;
                            for (
                                g--,
                                    c += o * (n - 1),
                                    u = h = (a = t[--f]) * r[7],
                                    A = a,
                                    d = r[2],
                                    I = r[3],
                                    l = n - 1;
                                0 <= l;
                                l--
                            )
                                (s = A * d + a * I + u * m + h * p),
                                    (h = u),
                                    (u = s),
                                    (a = A),
                                    (A = t[f]),
                                    (e[c] = i[g] + u),
                                    f--,
                                    g--,
                                    (c -= o);
                        }
                    }
                    e.exports = function (t, e, i, r) {
                        var n, o, a;
                        r &&
                            (c(
                                t,
                                (n = new Uint16Array(t.length)),
                                (o = new Float32Array(Math.max(e, i))),
                                (a = (function (t) {
                                    t < 0.5 && (t = 0.5);
                                    var e = Math.exp(0.527076) / t,
                                        i = Math.exp(-e),
                                        r = Math.exp(-2 * e),
                                        n =
                                            ((1 - i) * (1 - i)) /
                                            (1 + 2 * e * i - r);
                                    return (
                                        (A = n * (e - 1) * i),
                                        (s = n * (1 + e) * i),
                                        (u = -n * r),
                                        (h = 2 * i),
                                        (f = -r),
                                        new Float32Array([
                                            n,
                                            A,
                                            s,
                                            u,
                                            h,
                                            f,
                                            (n + A) / (1 - h - f),
                                            (s + u) / (1 - h - f),
                                        ])
                                    );
                                })(r)),
                                e,
                                i
                            ),
                            c(n, t, o, a, i, e));
                    };
                },
                {},
            ],
            15: [
                function (t, e, i) {
                    "function" == typeof Object.create
                        ? (e.exports = function (t, e) {
                              e &&
                                  ((t.super_ = e),
                                  (t.prototype = Object.create(e.prototype, {
                                      constructor: {
                                          value: t,
                                          enumerable: !1,
                                          writable: !0,
                                          configurable: !0,
                                      },
                                  })));
                          })
                        : (e.exports = function (t, e) {
                              var i;
                              e &&
                                  ((t.super_ = e),
                                  ((i = function () {}).prototype =
                                      e.prototype),
                                  (t.prototype = new i()),
                                  (t.prototype.constructor = t));
                          });
                },
                {},
            ],
            16: [
                function (t, e, i) {
                    "use strict";
                    var o = t("object-assign"),
                        r = t("./lib/base64decode"),
                        n = t("./lib/wa_detect"),
                        a = { js: !0, wasm: !0 };
                    function A(t) {
                        if (!(this instanceof A)) return new A(t);
                        var e = o({}, a, t || {});
                        if (
                            ((this.options = e),
                            (this.__cache = {}),
                            (this.__init_promise = null),
                            (this.__modules = e.modules || {}),
                            (this.__memory = null),
                            (this.__wasm = {}),
                            (this.__isLE =
                                1 ===
                                new Uint32Array(
                                    new Uint8Array([1, 0, 0, 0]).buffer
                                )[0]),
                            !this.options.js && !this.options.wasm)
                        )
                            throw new Error(
                                'mathlib: at least "js" or "wasm" should be enabled'
                            );
                    }
                    (A.prototype.has_wasm = n),
                        (A.prototype.use = function (t) {
                            return (
                                (this.__modules[t.name] = t),
                                this.options.wasm &&
                                this.has_wasm() &&
                                t.wasm_fn
                                    ? (this[t.name] = t.wasm_fn)
                                    : (this[t.name] = t.fn),
                                this
                            );
                        }),
                        (A.prototype.init = function () {
                            if (this.__init_promise) return this.__init_promise;
                            if (
                                !this.options.js &&
                                this.options.wasm &&
                                !this.has_wasm()
                            )
                                return Promise.reject(
                                    new Error(
                                        'mathlib: only "wasm" was enabled, but it\'s not supported'
                                    )
                                );
                            var i = this;
                            return (
                                (this.__init_promise = Promise.all(
                                    Object.keys(i.__modules).map(function (e) {
                                        var t = i.__modules[e];
                                        return !(
                                            i.options.wasm &&
                                            i.has_wasm() &&
                                            t.wasm_fn
                                        ) || i.__wasm[e]
                                            ? null
                                            : WebAssembly.compile(
                                                  i.__base64decode(t.wasm_src)
                                              ).then(function (t) {
                                                  i.__wasm[e] = t;
                                              });
                                    })
                                ).then(function () {
                                    return i;
                                })),
                                this.__init_promise
                            );
                        }),
                        (A.prototype.__base64decode = r),
                        (A.prototype.__reallocate = function (t) {
                            if (!this.__memory)
                                return (
                                    (this.__memory = new WebAssembly.Memory({
                                        initial: Math.ceil(t / 65536),
                                    })),
                                    this.__memory
                                );
                            var e = this.__memory.buffer.byteLength;
                            return (
                                e < t &&
                                    this.__memory.grow(
                                        Math.ceil((t - e) / 65536)
                                    ),
                                this.__memory
                            );
                        }),
                        (A.prototype.__instance = function (t, e, i) {
                            var r, n;
                            return (
                                e && this.__reallocate(e),
                                this.__wasm[t] ||
                                    ((r = this.__modules[t]),
                                    (this.__wasm[t] = new WebAssembly.Module(
                                        this.__base64decode(r.wasm_src)
                                    ))),
                                this.__cache[t] ||
                                    ((n = {
                                        memoryBase: 0,
                                        memory: this.__memory,
                                        tableBase: 0,
                                        table: new WebAssembly.Table({
                                            initial: 0,
                                            element: "anyfunc",
                                        }),
                                    }),
                                    (this.__cache[t] = new WebAssembly.Instance(
                                        this.__wasm[t],
                                        { env: o(n, i || {}) }
                                    ))),
                                this.__cache[t]
                            );
                        }),
                        (A.prototype.__align = function (t, e) {
                            var i = t % (e = e || 8);
                            return t + (i ? e - i : 0);
                        }),
                        (e.exports = A);
                },
                {
                    "./lib/base64decode": 17,
                    "./lib/wa_detect": 23,
                    "object-assign": 24,
                },
            ],
            17: [
                function (t, e, i) {
                    "use strict";
                    e.exports = function (t) {
                        for (
                            var e = t.replace(/[\r\n=]/g, ""),
                                i = e.length,
                                r = new Uint8Array((3 * i) >> 2),
                                n = 0,
                                o = 0,
                                a = 0;
                            a < i;
                            a++
                        )
                            a % 4 == 0 &&
                                a &&
                                ((r[o++] = (n >> 16) & 255),
                                (r[o++] = (n >> 8) & 255),
                                (r[o++] = 255 & n)),
                                (n =
                                    (n << 6) |
                                    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/".indexOf(
                                        e.charAt(a)
                                    ));
                        var A = (i % 4) * 6;
                        return (
                            0 == A
                                ? ((r[o++] = (n >> 16) & 255),
                                  (r[o++] = (n >> 8) & 255),
                                  (r[o++] = 255 & n))
                                : 18 == A
                                ? ((r[o++] = (n >> 10) & 255),
                                  (r[o++] = (n >> 2) & 255))
                                : 12 == A && (r[o++] = (n >> 4) & 255),
                            r
                        );
                    };
                },
                {},
            ],
            18: [
                function (t, e, i) {
                    "use strict";
                    e.exports = function (t, e, i) {
                        for (
                            var r,
                                n,
                                o,
                                a,
                                A,
                                s = e * i,
                                u = new Uint16Array(s),
                                h = 0;
                            h < s;
                            h++
                        )
                            (r = t[4 * h]),
                                (n = t[4 * h + 1]),
                                (o = t[4 * h + 2]),
                                (A =
                                    n <= r && o <= r
                                        ? r
                                        : o <= n && r <= n
                                        ? n
                                        : o),
                                (a =
                                    r <= n && r <= o
                                        ? r
                                        : n <= o && n <= r
                                        ? n
                                        : o),
                                (u[h] = (257 * (A + a)) >> 1);
                        return u;
                    };
                },
                {},
            ],
            19: [
                function (t, e, i) {
                    "use strict";
                    e.exports = {
                        name: "unsharp_mask",
                        fn: t("./unsharp_mask"),
                        wasm_fn: t("./unsharp_mask_wasm"),
                        wasm_src: t("./unsharp_mask_wasm_base64"),
                    };
                },
                {
                    "./unsharp_mask": 20,
                    "./unsharp_mask_wasm": 21,
                    "./unsharp_mask_wasm_base64": 22,
                },
            ],
            20: [
                function (t, e, i) {
                    "use strict";
                    var C = t("glur/mono16"),
                        Q = t("./hsl_l16");
                    e.exports = function (t, e, i, r, n, o) {
                        var a, A, s, u, h, f, c, g, l, d, I, m, p;
                        if (!(0 === r || n < 0.5)) {
                            2 < n && (n = 2);
                            var w = Q(t, e, i),
                                B = new Uint16Array(w);
                            C(B, e, i, n);
                            for (
                                var b = ((r / 100) * 4096 + 0.5) | 0,
                                    y = (257 * o) | 0,
                                    _ = e * i,
                                    E = 0;
                                E < _;
                                E++
                            )
                                (m = 2 * (w[E] - B[E])),
                                    Math.abs(m) >= y &&
                                        ((a = t[(p = 4 * E)]),
                                        (A = t[1 + p]),
                                        (s = t[2 + p]),
                                        (f =
                                            (257 *
                                                ((g =
                                                    A <= a && s <= a
                                                        ? a
                                                        : a <= A && s <= A
                                                        ? A
                                                        : s) +
                                                    (c =
                                                        a <= A && a <= s
                                                            ? a
                                                            : A <= a && A <= s
                                                            ? A
                                                            : s))) >>
                                            1),
                                        (u =
                                            c === g
                                                ? (h = 0)
                                                : ((h =
                                                      f <= 32767
                                                          ? ((4095 * (g - c)) /
                                                                (g + c)) |
                                                            0
                                                          : ((4095 * (g - c)) /
                                                                (510 - g - c)) |
                                                            0),
                                                  a === g
                                                      ? ((65535 * (A - s)) /
                                                            (6 * (g - c))) |
                                                        0
                                                      : A === g
                                                      ? 21845 +
                                                        (((65535 * (s - a)) /
                                                            (6 * (g - c))) |
                                                            0)
                                                      : 43690 +
                                                        (((65535 * (a - A)) /
                                                            (6 * (g - c))) |
                                                            0))),
                                        65535 < (f += (b * m + 2048) >> 12)
                                            ? (f = 65535)
                                            : f < 0 && (f = 0),
                                        0 === h
                                            ? (a = A = s = f >> 8)
                                            : ((l =
                                                  (2 * f -
                                                      (d =
                                                          f <= 32767
                                                              ? (f *
                                                                    (4096 + h) +
                                                                    2048) >>
                                                                12
                                                              : f +
                                                                (((65535 - f) *
                                                                    h +
                                                                    2048) >>
                                                                    12))) >>
                                                  8),
                                              (d >>= 8),
                                              (a =
                                                  43690 <=
                                                  (I = (u + 21845) & 65535)
                                                      ? l
                                                      : 32767 <= I
                                                      ? l +
                                                        ((6 *
                                                            (d - l) *
                                                            (43690 - I) +
                                                            32768) >>
                                                            16)
                                                      : 10922 <= I
                                                      ? d
                                                      : l +
                                                        ((6 * (d - l) * I +
                                                            32768) >>
                                                            16)),
                                              (A =
                                                  43690 <= (I = 65535 & u)
                                                      ? l
                                                      : 32767 <= I
                                                      ? l +
                                                        ((6 *
                                                            (d - l) *
                                                            (43690 - I) +
                                                            32768) >>
                                                            16)
                                                      : 10922 <= I
                                                      ? d
                                                      : l +
                                                        ((6 * (d - l) * I +
                                                            32768) >>
                                                            16)),
                                              (s =
                                                  43690 <=
                                                  (I = (u - 21845) & 65535)
                                                      ? l
                                                      : 32767 <= I
                                                      ? l +
                                                        ((6 *
                                                            (d - l) *
                                                            (43690 - I) +
                                                            32768) >>
                                                            16)
                                                      : 10922 <= I
                                                      ? d
                                                      : l +
                                                        ((6 * (d - l) * I +
                                                            32768) >>
                                                            16))),
                                        (t[p] = a),
                                        (t[1 + p] = A),
                                        (t[2 + p] = s));
                        }
                    };
                },
                { "./hsl_l16": 18, "glur/mono16": 14 },
            ],
            21: [
                function (t, e, i) {
                    "use strict";
                    e.exports = function (t, e, i, r, n, o) {
                        var a, A, s, u, h, f, c, g, l, d, I, m;
                        0 === r ||
                            n < 0.5 ||
                            (2 < n && (n = 2),
                            (d =
                                (l =
                                    (g =
                                        (c =
                                            (f = A = 4 * (a = e * i)) +
                                            (s = 2 * a)) + (u = 2 * a)) + u) +
                                (h = 4 * Math.max(e, i))),
                            (I = this.__instance(
                                "unsharp_mask",
                                A + s + 2 * u + h + 32,
                                { exp: Math.exp }
                            )),
                            (m = new Uint32Array(t.buffer)),
                            new Uint32Array(this.__memory.buffer).set(m),
                            (I.exports.hsl_l16 || I.exports._hsl_l16)(
                                0,
                                f,
                                e,
                                i
                            ),
                            (I.exports.blurMono16 || I.exports._blurMono16)(
                                f,
                                c,
                                g,
                                l,
                                d,
                                e,
                                i,
                                n
                            ),
                            (I.exports.unsharp || I.exports._unsharp)(
                                0,
                                0,
                                f,
                                c,
                                e,
                                i,
                                r,
                                o
                            ),
                            m.set(new Uint32Array(this.__memory.buffer, 0, a)));
                    };
                },
                {},
            ],
            22: [
                function (t, e, i) {
                    "use strict";
                    e.exports =
                        "AGFzbQEAAAABMQZgAXwBfGACfX8AYAZ/f39/f38AYAh/f39/f39/fQBgBH9/f38AYAh/f39/f39/fwACGQIDZW52A2V4cAAAA2VudgZtZW1vcnkCAAEDBgUBAgMEBQQEAXAAAAdMBRZfX2J1aWxkX2dhdXNzaWFuX2NvZWZzAAEOX19nYXVzczE2X2xpbmUAAgpibHVyTW9ubzE2AAMHaHNsX2wxNgAEB3Vuc2hhcnAABQkBAAqJEAXZAQEGfAJAIAFE24a6Q4Ia+z8gALujIgOaEAAiBCAEoCIGtjgCECABIANEAAAAAAAAAMCiEAAiBbaMOAIUIAFEAAAAAAAA8D8gBKEiAiACoiAEIAMgA6CiRAAAAAAAAPA/oCAFoaMiArY4AgAgASAEIANEAAAAAAAA8L+gIAKioiIHtjgCBCABIAQgA0QAAAAAAADwP6AgAqKiIgO2OAIIIAEgBSACoiIEtow4AgwgASACIAegIAVEAAAAAAAA8D8gBqGgIgKjtjgCGCABIAMgBKEgAqO2OAIcCwu3AwMDfwR9CHwCQCADKgIUIQkgAyoCECEKIAMqAgwhCyADKgIIIQwCQCAEQX9qIgdBAEgiCA0AIAIgAC8BALgiDSADKgIYu6IiDiAJuyIQoiAOIAq7IhGiIA0gAyoCBLsiEqIgAyoCALsiEyANoqCgoCIPtjgCACACQQRqIQIgAEECaiEAIAdFDQAgBCEGA0AgAiAOIBCiIA8iDiARoiANIBKiIBMgAC8BALgiDaKgoKAiD7Y4AgAgAkEEaiECIABBAmohACAGQX9qIgZBAUoNAAsLAkAgCA0AIAEgByAFbEEBdGogAEF+ai8BACIIuCINIAu7IhGiIA0gDLsiEqKgIA0gAyoCHLuiIg4gCrsiE6KgIA4gCbsiFKKgIg8gAkF8aioCALugqzsBACAHRQ0AIAJBeGohAiAAQXxqIQBBACAFQQF0ayEHIAEgBSAEQQF0QXxqbGohBgNAIAghAyAALwEAIQggBiANIBGiIAO4Ig0gEqKgIA8iECAToqAgDiAUoqAiDyACKgIAu6CrOwEAIAYgB2ohBiAAQX5qIQAgAkF8aiECIBAhDiAEQX9qIgRBAUoNAAsLCwvfAgIDfwZ8AkAgB0MAAAAAWw0AIARE24a6Q4Ia+z8gB0MAAAA/l7ujIgyaEAAiDSANoCIPtjgCECAEIAxEAAAAAAAAAMCiEAAiDraMOAIUIAREAAAAAAAA8D8gDaEiCyALoiANIAwgDKCiRAAAAAAAAPA/oCAOoaMiC7Y4AgAgBCANIAxEAAAAAAAA8L+gIAuioiIQtjgCBCAEIA0gDEQAAAAAAADwP6AgC6KiIgy2OAIIIAQgDiALoiINtow4AgwgBCALIBCgIA5EAAAAAAAA8D8gD6GgIgujtjgCGCAEIAwgDaEgC6O2OAIcIAYEQCAFQQF0IQogBiEJIAIhCANAIAAgCCADIAQgBSAGEAIgACAKaiEAIAhBAmohCCAJQX9qIgkNAAsLIAVFDQAgBkEBdCEIIAUhAANAIAIgASADIAQgBiAFEAIgAiAIaiECIAFBAmohASAAQX9qIgANAAsLC7wBAQV/IAMgAmwiAwRAQQAgA2shBgNAIAAoAgAiBEEIdiIHQf8BcSECAn8gBEH/AXEiAyAEQRB2IgRB/wFxIgVPBEAgAyIIIAMgAk8NARoLIAQgBCAHIAIgA0kbIAIgBUkbQf8BcQshCAJAIAMgAk0EQCADIAVNDQELIAQgByAEIAMgAk8bIAIgBUsbQf8BcSEDCyAAQQRqIQAgASADIAhqQYECbEEBdjsBACABQQJqIQEgBkEBaiIGDQALCwvTBgEKfwJAIAazQwAAgEWUQwAAyEKVu0QAAAAAAADgP6CqIQ0gBSAEbCILBEAgB0GBAmwhDgNAQQAgAi8BACADLwEAayIGQQF0IgdrIAcgBkEASBsgDk8EQCAAQQJqLQAAIQUCfyAALQAAIgYgAEEBai0AACIESSIJRQRAIAYiCCAGIAVPDQEaCyAFIAUgBCAEIAVJGyAGIARLGwshCAJ/IAYgBE0EQCAGIgogBiAFTQ0BGgsgBSAFIAQgBCAFSxsgCRsLIgogCGoiD0GBAmwiEEEBdiERQQAhDAJ/QQAiCSAIIApGDQAaIAggCmsiCUH/H2wgD0H+AyAIayAKayAQQYCABEkbbSEMIAYgCEYEQCAEIAVrQf//A2wgCUEGbG0MAQsgBSAGayAGIARrIAQgCEYiBhtB//8DbCAJQQZsbUHVqgFBqtUCIAYbagshCSARIAcgDWxBgBBqQQx1aiIGQQAgBkEAShsiBkH//wMgBkH//wNIGyEGAkACfwJAIAxB//8DcSIFBEAgBkH//wFKDQEgBUGAIGogBmxBgBBqQQx2DAILIAZBCHYiBiEFIAYhBAwCCyAFIAZB//8Dc2xBgBBqQQx2IAZqCyIFQQh2IQcgBkEBdCAFa0EIdiIGIQQCQCAJQdWqAWpB//8DcSIFQanVAksNACAFQf//AU8EQEGq1QIgBWsgByAGa2xBBmxBgIACakEQdiAGaiEEDAELIAchBCAFQanVAEsNACAFIAcgBmtsQQZsQYCAAmpBEHYgBmohBAsCfyAGIgUgCUH//wNxIghBqdUCSw0AGkGq1QIgCGsgByAGa2xBBmxBgIACakEQdiAGaiAIQf//AU8NABogByIFIAhBqdUASw0AGiAIIAcgBmtsQQZsQYCAAmpBEHYgBmoLIQUgCUGr1QJqQf//A3EiCEGp1QJLDQAgCEH//wFPBEBBqtUCIAhrIAcgBmtsQQZsQYCAAmpBEHYgBmohBgwBCyAIQanVAEsEQCAHIQYMAQsgCCAHIAZrbEEGbEGAgAJqQRB2IAZqIQYLIAEgBDoAACABQQFqIAU6AAAgAUECaiAGOgAACyADQQJqIQMgAkECaiECIABBBGohACABQQRqIQEgC0F/aiILDQALCwsL";
                },
                {},
            ],
            23: [
                function (t, e, i) {
                    "use strict";
                    var r;
                    e.exports = function () {
                        if (void 0 !== r) return r;
                        if (((r = !1), "undefined" == typeof WebAssembly))
                            return r;
                        try {
                            var t = new Uint8Array([
                                    0, 97, 115, 109, 1, 0, 0, 0, 1, 6, 1, 96, 1,
                                    127, 1, 127, 3, 2, 1, 0, 5, 3, 1, 0, 1, 7,
                                    8, 1, 4, 116, 101, 115, 116, 0, 0, 10, 16,
                                    1, 14, 0, 32, 0, 65, 1, 54, 2, 0, 32, 0, 40,
                                    2, 0, 11,
                                ]),
                                e = new WebAssembly.Module(t);
                            return (
                                0 !==
                                    new WebAssembly.Instance(
                                        e,
                                        {}
                                    ).exports.test(4) && (r = !0),
                                r
                            );
                        } catch (t) {}
                        return r;
                    };
                },
                {},
            ],
            24: [
                function (t, e, i) {
                    "use strict";
                    var s = Object.getOwnPropertySymbols,
                        u = Object.prototype.hasOwnProperty,
                        h = Object.prototype.propertyIsEnumerable;
                    e.exports = (function () {
                        try {
                            if (!Object.assign) return;
                            var t = new String("abc");
                            if (
                                ((t[5] = "de"),
                                "5" === Object.getOwnPropertyNames(t)[0])
                            )
                                return;
                            for (var e = {}, i = 0; i < 10; i++)
                                e["_" + String.fromCharCode(i)] = i;
                            if (
                                "0123456789" !==
                                Object.getOwnPropertyNames(e)
                                    .map(function (t) {
                                        return e[t];
                                    })
                                    .join("")
                            )
                                return;
                            var r = {};
                            return (
                                "abcdefghijklmnopqrst"
                                    .split("")
                                    .forEach(function (t) {
                                        r[t] = t;
                                    }),
                                "abcdefghijklmnopqrst" !==
                                Object.keys(Object.assign({}, r)).join("")
                                    ? void 0
                                    : 1
                            );
                        } catch (t) {
                            return;
                        }
                    })()
                        ? Object.assign
                        : function (t, e) {
                              for (
                                  var i,
                                      r,
                                      n = (function (t) {
                                          if (null == t)
                                              throw new TypeError(
                                                  "Object.assign cannot be called with null or undefined"
                                              );
                                          return Object(t);
                                      })(t),
                                      o = 1;
                                  o < arguments.length;
                                  o++
                              ) {
                                  for (var a in (i = Object(arguments[o])))
                                      u.call(i, a) && (n[a] = i[a]);
                                  if (s) {
                                      r = s(i);
                                      for (var A = 0; A < r.length; A++)
                                          h.call(i, r[A]) &&
                                              (n[r[A]] = i[r[A]]);
                                  }
                              }
                              return n;
                          };
                },
                {},
            ],
            25: [
                function (t, e, i) {
                    var m = arguments[3],
                        p = arguments[4],
                        w = arguments[5],
                        B = JSON.stringify;
                    e.exports = function (t, e) {
                        for (
                            var i, r = Object.keys(w), n = 0, o = r.length;
                            n < o;
                            n++
                        ) {
                            var a = r[n],
                                A = w[a].exports;
                            if (A === t || (A && A.default === t)) {
                                i = a;
                                break;
                            }
                        }
                        if (!i) {
                            i = Math.floor(
                                Math.pow(16, 8) * Math.random()
                            ).toString(16);
                            for (var s = {}, n = 0, o = r.length; n < o; n++) {
                                s[(a = r[n])] = a;
                            }
                            p[i] = [
                                "function(require,module,exports){" +
                                    t +
                                    "(self); }",
                                s,
                            ];
                        }
                        var u = Math.floor(
                                Math.pow(16, 8) * Math.random()
                            ).toString(16),
                            h = {};
                        (h[i] = i),
                            (p[u] = [
                                "function(require,module,exports){var f = require(" +
                                    B(i) +
                                    ");(f.default ? f.default : f)(self);}",
                                h,
                            ]);
                        var f = {};
                        !(function t(e) {
                            f[e] = !0;
                            for (var i in p[e][1]) {
                                var r = p[e][1][i];
                                f[r] || t(r);
                            }
                        })(u);
                        var c =
                                "(" +
                                m +
                                ")({" +
                                Object.keys(f)
                                    .map(function (t) {
                                        return (
                                            B(t) +
                                            ":[" +
                                            p[t][0] +
                                            "," +
                                            B(p[t][1]) +
                                            "]"
                                        );
                                    })
                                    .join(",") +
                                "},{},[" +
                                B(u) +
                                "])",
                            g =
                                window.URL ||
                                window.webkitURL ||
                                window.mozURL ||
                                window.msURL,
                            l = new Blob([c], { type: "text/javascript" });
                        if (e && e.bare) return l;
                        var d = g.createObjectURL(l),
                            I = new Worker(d);
                        return (I.objectURL = d), I;
                    };
                },
                {},
            ],
            "/": [
                function (o, t, e) {
                    "use strict";
                    function I(t, e) {
                        return (
                            (function (t) {
                                if (Array.isArray(t)) return t;
                            })(t) ||
                            (function (t, e) {
                                if (
                                    "undefined" == typeof Symbol ||
                                    !(Symbol.iterator in Object(t))
                                )
                                    return;
                                var i = [],
                                    r = !0,
                                    n = !1,
                                    o = void 0;
                                try {
                                    for (
                                        var a, A = t[Symbol.iterator]();
                                        !(r = (a = A.next()).done) &&
                                        (i.push(a.value), !e || i.length !== e);
                                        r = !0
                                    );
                                } catch (t) {
                                    (n = !0), (o = t);
                                } finally {
                                    try {
                                        r || null == A.return || A.return();
                                    } finally {
                                        if (n) throw o;
                                    }
                                }
                                return i;
                            })(t, e) ||
                            (function (t, e) {
                                if (!t) return;
                                if ("string" == typeof t) return r(t, e);
                                var i = Object.prototype.toString
                                    .call(t)
                                    .slice(8, -1);
                                "Object" === i &&
                                    t.constructor &&
                                    (i = t.constructor.name);
                                if ("Map" === i || "Set" === i)
                                    return Array.from(t);
                                if (
                                    "Arguments" === i ||
                                    /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(
                                        i
                                    )
                                )
                                    return r(t, e);
                            })(t, e) ||
                            (function () {
                                throw new TypeError(
                                    "Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
                                );
                            })()
                        );
                    }
                    function r(t, e) {
                        (null == e || e > t.length) && (e = t.length);
                        for (var i = 0, r = new Array(e); i < e; i++)
                            r[i] = t[i];
                        return r;
                    }
                    var m = o("object-assign"),
                        i = o("webworkify"),
                        a = o("./lib/mathlib"),
                        A = o("./lib/pool"),
                        p = o("./lib/utils"),
                        n = o("./lib/worker"),
                        s = o("./lib/stepper"),
                        w = o("./lib/tiler"),
                        u = {},
                        B = !1;
                    try {
                        "undefined" != typeof navigator &&
                            navigator.userAgent &&
                            (B = 0 <= navigator.userAgent.indexOf("Safari"));
                    } catch (t) {}
                    var h = 1;
                    "undefined" != typeof navigator &&
                        (h = Math.min(navigator.hardwareConcurrency || 1, 4));
                    var b,
                        y,
                        f = {
                            tile: 1024,
                            concurrency: h,
                            features: ["js", "wasm", "ww"],
                            idle: 2e3,
                        },
                        _ = {
                            quality: 3,
                            alpha: !1,
                            unsharpAmount: 0,
                            unsharpRadius: 0,
                            unsharpThreshold: 0,
                        };
                    function c() {
                        return {
                            value: i(n),
                            destroy: function () {
                                var t;
                                this.value.terminate(),
                                    "undefined" == typeof window ||
                                        ((t =
                                            window.URL ||
                                            window.webkitURL ||
                                            window.mozURL ||
                                            window.msURL) &&
                                            t.revokeObjectURL &&
                                            this.value.objectURL &&
                                            t.revokeObjectURL(
                                                this.value.objectURL
                                            ));
                            },
                        };
                    }
                    function g(t) {
                        if (!(this instanceof g)) return new g(t);
                        this.options = m({}, f, t || {});
                        var e = "lk_".concat(this.options.concurrency);
                        (this.__limit =
                            u[e] || p.limiter(this.options.concurrency)),
                            u[e] || (u[e] = this.__limit),
                            (this.features = {
                                js: !1,
                                wasm: !1,
                                cib: !1,
                                ww: !1,
                            }),
                            (this.__workersPool = null),
                            (this.__requested_features = []),
                            (this.__mathlib = null);
                    }
                    (g.prototype.init = function () {
                        var e = this;
                        if (this.__initPromise) return this.__initPromise;
                        if (
                            !1 !== b &&
                            !0 !== b &&
                            ((b = !1),
                            "undefined" != typeof ImageData &&
                                "undefined" != typeof Uint8ClampedArray)
                        )
                            try {
                                new ImageData(
                                    new Uint8ClampedArray(400),
                                    10,
                                    10
                                ),
                                    (b = !0);
                            } catch (t) {}
                        !1 !== y &&
                            !0 !== y &&
                            ((y = !1),
                            "undefined" != typeof ImageBitmap &&
                                (ImageBitmap.prototype &&
                                ImageBitmap.prototype.close
                                    ? (y = !0)
                                    : this.debug(
                                          "ImageBitmap does not support .close(), disabled"
                                      )));
                        var i = this.options.features.slice();
                        if (
                            (0 <= i.indexOf("all") &&
                                (i = ["cib", "wasm", "js", "ww"]),
                            (this.__requested_features = i),
                            (this.__mathlib = new a(i)),
                            0 <= i.indexOf("ww") &&
                                "undefined" != typeof window &&
                                "Worker" in window)
                        )
                            try {
                                o("webworkify")(function () {}).terminate(),
                                    (this.features.ww = !0);
                                var t = "wp_".concat(
                                    JSON.stringify(this.options)
                                );
                                u[t]
                                    ? (this.__workersPool = u[t])
                                    : ((this.__workersPool = new A(
                                          c,
                                          this.options.idle
                                      )),
                                      (u[t] = this.__workersPool));
                            } catch (t) {}
                        var r = this.__mathlib.init().then(function (t) {
                                m(e.features, t.features);
                            }),
                            n = y
                                ? p.cib_support().then(function (t) {
                                      e.features.cib && i.indexOf("cib") < 0
                                          ? e.debug(
                                                "createImageBitmap() resize supported, but disabled by config"
                                            )
                                          : 0 <= i.indexOf("cib") &&
                                            (e.features.cib = t);
                                  })
                                : Promise.resolve(!1);
                        return (
                            (this.__initPromise = Promise.all([r, n]).then(
                                function () {
                                    return e;
                                }
                            )),
                            this.__initPromise
                        );
                    }),
                        (g.prototype.resize = function (t, o, e) {
                            var c = this;
                            this.debug("Start resize...");
                            var a = m({}, _);
                            if (
                                (isNaN(e)
                                    ? e && (a = m(a, e))
                                    : (a = m(a, { quality: e })),
                                (a.toWidth = o.width),
                                (a.toHeight = o.height),
                                (a.width = t.naturalWidth || t.width),
                                (a.height = t.naturalHeight || t.height),
                                0 === o.width || 0 === o.height)
                            )
                                return Promise.reject(
                                    new Error(
                                        "Invalid output size: "
                                            .concat(o.width, "x")
                                            .concat(o.height)
                                    )
                                );
                            2 < a.unsharpRadius && (a.unsharpRadius = 2);
                            var g = !1,
                                l = null;
                            a.cancelToken &&
                                (l = a.cancelToken.then(
                                    function (t) {
                                        throw ((g = !0), t);
                                    },
                                    function (t) {
                                        throw ((g = !0), t);
                                    }
                                ));
                            var d = Math.ceil(
                                Math.max(3, (2.5 * a.unsharpRadius) | 0)
                            );
                            return this.init().then(function () {
                                if (g) return l;
                                if (c.features.cib) {
                                    var n = o.getContext("2d", {
                                        alpha: Boolean(a.alpha),
                                    });
                                    return (
                                        c.debug(
                                            "Resize via createImageBitmap()"
                                        ),
                                        createImageBitmap(t, {
                                            resizeWidth: a.toWidth,
                                            resizeHeight: a.toHeight,
                                            resizeQuality: p.cib_quality_name(
                                                a.quality
                                            ),
                                        }).then(function (t) {
                                            if (g) return l;
                                            if (!a.unsharpAmount)
                                                return (
                                                    n.drawImage(t, 0, 0),
                                                    t.close(),
                                                    (n = null),
                                                    c.debug("Finished!"),
                                                    o
                                                );
                                            c.debug("Unsharp result");
                                            var e =
                                                document.createElement(
                                                    "canvas"
                                                );
                                            (e.width = a.toWidth),
                                                (e.height = a.toHeight);
                                            var i = e.getContext("2d", {
                                                alpha: Boolean(a.alpha),
                                            });
                                            i.drawImage(t, 0, 0), t.close();
                                            var r = i.getImageData(
                                                0,
                                                0,
                                                a.toWidth,
                                                a.toHeight
                                            );
                                            return (
                                                c.__mathlib.unsharp_mask(
                                                    r.data,
                                                    a.toWidth,
                                                    a.toHeight,
                                                    a.unsharpAmount,
                                                    a.unsharpRadius,
                                                    a.unsharpThreshold
                                                ),
                                                n.putImageData(r, 0, 0),
                                                (r = i = e = n = null),
                                                c.debug("Finished!"),
                                                o
                                            );
                                        })
                                    );
                                }
                                function h(o, i, a) {
                                    function r(n) {
                                        return c.__limit(function () {
                                            if (g) return l;
                                            var r, t, e;
                                            p.isCanvas(o)
                                                ? (c.debug(
                                                      "Get tile pixel data"
                                                  ),
                                                  (r = A.getImageData(
                                                      n.x,
                                                      n.y,
                                                      n.width,
                                                      n.height
                                                  )))
                                                : (c.debug(
                                                      "Draw tile imageBitmap/image to temporary canvas"
                                                  ),
                                                  ((t =
                                                      document.createElement(
                                                          "canvas"
                                                      )).width = n.width),
                                                  (t.height = n.height),
                                                  ((e = t.getContext("2d", {
                                                      alpha: Boolean(a.alpha),
                                                  })).globalCompositeOperation =
                                                      "copy"),
                                                  e.drawImage(
                                                      s || o,
                                                      n.x,
                                                      n.y,
                                                      n.width,
                                                      n.height,
                                                      0,
                                                      0,
                                                      n.width,
                                                      n.height
                                                  ),
                                                  c.debug(
                                                      "Get tile pixel data"
                                                  ),
                                                  (r = e.getImageData(
                                                      0,
                                                      0,
                                                      n.width,
                                                      n.height
                                                  )),
                                                  (e = t = null));
                                            var i = {
                                                src: r.data,
                                                width: n.width,
                                                height: n.height,
                                                toWidth: n.toWidth,
                                                toHeight: n.toHeight,
                                                scaleX: n.scaleX,
                                                scaleY: n.scaleY,
                                                offsetX: n.offsetX,
                                                offsetY: n.offsetY,
                                                quality: a.quality,
                                                alpha: a.alpha,
                                                unsharpAmount: a.unsharpAmount,
                                                unsharpRadius: a.unsharpRadius,
                                                unsharpThreshold:
                                                    a.unsharpThreshold,
                                            };
                                            return (
                                                c.debug("Invoke resize math"),
                                                Promise.resolve()
                                                    .then(function () {
                                                        return (
                                                            (t = i),
                                                            Promise.resolve().then(
                                                                function () {
                                                                    return c
                                                                        .features
                                                                        .ww
                                                                        ? new Promise(
                                                                              function (
                                                                                  e,
                                                                                  i
                                                                              ) {
                                                                                  var r =
                                                                                      c.__workersPool.acquire();
                                                                                  l &&
                                                                                      l.catch(
                                                                                          function (
                                                                                              t
                                                                                          ) {
                                                                                              return i(
                                                                                                  t
                                                                                              );
                                                                                          }
                                                                                      ),
                                                                                      (r.value.onmessage =
                                                                                          function (
                                                                                              t
                                                                                          ) {
                                                                                              r.release(),
                                                                                                  t
                                                                                                      .data
                                                                                                      .err
                                                                                                      ? i(
                                                                                                            t
                                                                                                                .data
                                                                                                                .err
                                                                                                        )
                                                                                                      : e(
                                                                                                            t
                                                                                                                .data
                                                                                                                .result
                                                                                                        );
                                                                                          }),
                                                                                      r.value.postMessage(
                                                                                          {
                                                                                              opts: t,
                                                                                              features:
                                                                                                  c.__requested_features,
                                                                                              preload:
                                                                                                  {
                                                                                                      wasm_nodule:
                                                                                                          c
                                                                                                              .__mathlib
                                                                                                              .__,
                                                                                                  },
                                                                                          },
                                                                                          [
                                                                                              t
                                                                                                  .src
                                                                                                  .buffer,
                                                                                          ]
                                                                                      );
                                                                              }
                                                                          )
                                                                        : c.__mathlib.resizeAndUnsharp(
                                                                              t,
                                                                              f
                                                                          );
                                                                }
                                                            )
                                                        );
                                                        var t;
                                                    })
                                                    .then(function (t) {
                                                        if (g) return l;
                                                        var e;
                                                        if (
                                                            ((r = null),
                                                            c.debug(
                                                                "Convert raw rgba tile result to ImageData"
                                                            ),
                                                            b)
                                                        )
                                                            e = new ImageData(
                                                                new Uint8ClampedArray(
                                                                    t
                                                                ),
                                                                n.toWidth,
                                                                n.toHeight
                                                            );
                                                        else if (
                                                            (e =
                                                                u.createImageData(
                                                                    n.toWidth,
                                                                    n.toHeight
                                                                )).data.set
                                                        )
                                                            e.data.set(t);
                                                        else
                                                            for (
                                                                var i =
                                                                    e.data
                                                                        .length -
                                                                    1;
                                                                0 <= i;
                                                                i--
                                                            )
                                                                e.data[i] =
                                                                    t[i];
                                                        return (
                                                            c.debug(
                                                                "Draw tile"
                                                            ),
                                                            B
                                                                ? u.putImageData(
                                                                      e,
                                                                      n.toX,
                                                                      n.toY,
                                                                      n.toInnerX -
                                                                          n.toX,
                                                                      n.toInnerY -
                                                                          n.toY,
                                                                      n.toInnerWidth +
                                                                          1e-5,
                                                                      n.toInnerHeight +
                                                                          1e-5
                                                                  )
                                                                : u.putImageData(
                                                                      e,
                                                                      n.toX,
                                                                      n.toY,
                                                                      n.toInnerX -
                                                                          n.toX,
                                                                      n.toInnerY -
                                                                          n.toY,
                                                                      n.toInnerWidth,
                                                                      n.toInnerHeight
                                                                  ),
                                                            null
                                                        );
                                                    })
                                            );
                                        });
                                    }
                                    var A, s, u;
                                    return Promise.resolve()
                                        .then(function () {
                                            if (
                                                ((u = i.getContext("2d", {
                                                    alpha: Boolean(a.alpha),
                                                })),
                                                p.isCanvas(o))
                                            )
                                                return (
                                                    (A = o.getContext("2d", {
                                                        alpha: Boolean(a.alpha),
                                                    })),
                                                    null
                                                );
                                            if (p.isImage(o))
                                                return y
                                                    ? (c.debug(
                                                          "Decode image via createImageBitmap"
                                                      ),
                                                      createImageBitmap(o)
                                                          .then(function (t) {
                                                              s = t;
                                                          })
                                                          .catch(function (t) {
                                                              return null;
                                                          }))
                                                    : null;
                                            throw new Error(
                                                '".from" should be image or canvas'
                                            );
                                        })
                                        .then(function () {
                                            if (g) return l;
                                            c.debug("Calculate tiles");
                                            var t = w({
                                                width: a.width,
                                                height: a.height,
                                                srcTileSize: c.options.tile,
                                                toWidth: a.toWidth,
                                                toHeight: a.toHeight,
                                                destTileBorder: d,
                                            }).map(r);
                                            function e() {
                                                s && (s.close(), (s = null));
                                            }
                                            return (
                                                c.debug("Process tiles"),
                                                Promise.all(t).then(
                                                    function () {
                                                        return (
                                                            c.debug(
                                                                "Finished!"
                                                            ),
                                                            e(),
                                                            i
                                                        );
                                                    },
                                                    function (t) {
                                                        throw (e(), t);
                                                    }
                                                )
                                            );
                                        });
                                }
                                var f = {};
                                return (function t(e, i, r, n) {
                                    if (g) return l;
                                    var o,
                                        a = I(e.shift(), 2),
                                        A = a[0],
                                        s = a[1],
                                        u = 0 === e.length;
                                    return (
                                        (n = m({}, n, {
                                            toWidth: A,
                                            toHeight: s,
                                            quality: u
                                                ? n.quality
                                                : Math.min(1, n.quality),
                                        })),
                                        u ||
                                            (((o =
                                                document.createElement(
                                                    "canvas"
                                                )).width = A),
                                            (o.height = s)),
                                        h(i, u ? r : o, n).then(function () {
                                            return u
                                                ? r
                                                : ((n.width = A),
                                                  (n.height = s),
                                                  t(e, o, r, n));
                                        })
                                    );
                                })(
                                    s(
                                        a.width,
                                        a.height,
                                        a.toWidth,
                                        a.toHeight,
                                        c.options.tile,
                                        d
                                    ),
                                    t,
                                    o,
                                    a
                                );
                            });
                        }),
                        (g.prototype.resizeBuffer = function (t) {
                            var e = this,
                                i = m({}, _, t);
                            return this.init().then(function () {
                                return e.__mathlib.resizeAndUnsharp(i);
                            });
                        }),
                        (g.prototype.toBlob = function (o, a, A) {
                            return (
                                (a = a || "image/png"),
                                new Promise(function (e) {
                                    if (o.toBlob)
                                        o.toBlob(
                                            function (t) {
                                                return e(t);
                                            },
                                            a,
                                            A
                                        );
                                    else {
                                        for (
                                            var t = atob(
                                                    o
                                                        .toDataURL(a, A)
                                                        .split(",")[1]
                                                ),
                                                i = t.length,
                                                r = new Uint8Array(i),
                                                n = 0;
                                            n < i;
                                            n++
                                        )
                                            r[n] = t.charCodeAt(n);
                                        e(new Blob([r], { type: a }));
                                    }
                                })
                            );
                        }),
                        (g.prototype.debug = function () {}),
                        (t.exports = g);
                },
                {
                    "./lib/mathlib": 1,
                    "./lib/pool": 9,
                    "./lib/stepper": 10,
                    "./lib/tiler": 11,
                    "./lib/utils": 12,
                    "./lib/worker": 13,
                    "object-assign": 24,
                    webworkify: 25,
                },
            ],
        },
        {},
        []
    )("/");
});
