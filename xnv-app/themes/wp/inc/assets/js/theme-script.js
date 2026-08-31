jQuery( function ( $ ) {
    'use strict';

    var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /*-------------------------------------------------------------------
     * WordPress default widget classes (kept from starter)
     *-------------------------------------------------------------------*/
    $( '.comment-reply-link' ).addClass( 'btn btn-primary' );
    $( '#commentsubmit' ).addClass( 'btn btn-primary' );
    $( '.widget_search input.search-field' ).addClass( 'form-control' );
    $( '.widget_search input.search-submit' ).addClass( 'btn btn-default' );
    $( '.variations_form .variations .value > select' ).addClass( 'form-control' );
    $( '.widget_rss ul' ).addClass( 'media-list' );
    $( '.widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul, .widget_product_categories ul' ).addClass( 'nav flex-column' );
    $( '.widget_meta ul li, .widget_recent_entries ul li, .widget_archive ul li, .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_product_categories ul li' ).addClass( 'nav-item' );
    $( '.widget_meta ul li a, .widget_recent_entries ul li a, .widget_archive ul li a, .widget_categories ul li a, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_product_categories ul li a' ).addClass( 'nav-link' );
    $( '.widget_recent_comments ul#recentcomments' ).css( { 'list-style': 'none', 'padding-left': '0' } );
    $( '.widget_recent_comments ul#recentcomments li' ).css( 'padding', '5px 15px' );
    $( 'table#wp-calendar' ).addClass( 'table table-striped' );
    $('.wpcf7-form-control').not(".wpcf7-submit, .wpcf7-acceptance, .wpcf7-file, .wpcf7-radio").addClass('form-control');
    $('.wpcf7-submit').addClass('btn btn-primary');
    $('.woocommerce-Input--text, .woocommerce-Input--email, .woocommerce-Input--password').addClass('form-control');
    $('.woocommerce-Button.button').addClass('btn btn-primary mt-2').removeClass('button');

    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).parent().siblings().removeClass('open');
        $(this).parent().toggleClass('open');
    });

    // Fix woocommerce checkout layout
    $('#customer_details .col-1').addClass('col-12').removeClass('col-1');
    $('#customer_details .col-2').addClass('col-12').removeClass('col-2');
    $('.woocommerce-MyAccount-content .col-1').addClass('col-12').removeClass('col-1');
    $('.woocommerce-MyAccount-content .col-2').addClass('col-12').removeClass('col-2');

    /*-------------------------------------------------------------------
     * Full-width helper (kept from starter)
     *-------------------------------------------------------------------*/
    function fullWidthSection(){
        var screenWidth = $(window).width();
        var leftoffset = $('.entry-content').length ? $('.entry-content').offset().left : 0;
        $('.full-bleed-section').css({
            'position': 'relative',
            'left': '-'+leftoffset+'px',
            'box-sizing': 'border-box',
            'width': screenWidth,
        });
    }
    fullWidthSection();
    $( window ).on('resize', fullWidthSection );

    /*-------------------------------------------------------------------
     * FIXED MENU — frosted header on scroll (rAF-throttled)
     *-------------------------------------------------------------------*/
    function menuscroll() {
        var $navmenu = $('.nav-menu');
        if ($(window).scrollTop() > 24) {
            $navmenu.addClass('is-scrolling');
        } else {
            $navmenu.removeClass('is-scrolling');
        }
    }

    // Shared rAF throttle for the plain scroll handlers
    function onScrollRaf(fn) {
        var ticking = false;
        $(window).on('scroll', function() {
            if (!ticking) {
                ticking = true;
                window.requestAnimationFrame(function() {
                    ticking = false;
                    fn();
                });
            }
        });
    }

    menuscroll();
    onScrollRaf(menuscroll);

    /*-------------------------------------------------------------------
     * SCROLL PROGRESS — hairline indicator pinned to the header
     *-------------------------------------------------------------------*/
    var progressBar = document.querySelector('.nv-scroll-progress span');
    var progressTicking = false;

    function paintProgress() {
        progressTicking = false;
        if (!progressBar) { return; }
        var doc = document.documentElement;
        var max = doc.scrollHeight - window.innerHeight;
        var ratio = max > 0 ? Math.min(1, Math.max(0, window.scrollY / max)) : 0;
        progressBar.style.transform = 'scaleX(' + ratio + ')';
    }

    if (progressBar) {
        $(window).on('scroll resize', function() {
            if (!progressTicking) {
                progressTicking = true;
                window.requestAnimationFrame(paintProgress);
            }
        });
        paintProgress();
    }

    /*-------------------------------------------------------------------
     * HERO NETWORK — canvas visualisation of solo CPU miners
     * Nodes orbit a glowing core on elliptical traces while small
     * data packets (found blocks / transactions) travel to and from it.
     * Pauses off-screen, degrades to a single static frame when the
     * user prefers reduced motion.
     *-------------------------------------------------------------------*/
    (function heroNetwork() {
        var canvas = document.querySelector('.nv-net-canvas');
        var wrap = canvas ? canvas.parentElement : null;
        if (!canvas || !wrap || !canvas.getContext) { return; }

        var ctx = canvas.getContext('2d');
        ctx.lineCap = 'round';
        ctx.lineJoin = 'round';
        var dpr = Math.min(window.devicePixelRatio || 1, 2);
        var w = 0, h = 0, cx = 0, cy = 0, radius = 0;
        var nodes = [];
        var packets = [];
        var running = false;
        var frameHandle = 0;

        var PALETTE = [
            { line: 'rgba(47, 179, 203, ',  node: '#56d5e8' },  // teal
            { line: 'rgba(47, 179, 203, ',  node: '#56d5e8' },
            { line: 'rgba(139, 134, 232, ', node: '#a29df0' },  // violet
            { line: 'rgba(139, 134, 232, ', node: '#a29df0' },
            { line: 'rgba(236, 241, 247, ', node: '#e9eef5' }   // white
        ];

        function buildNodes() {
            nodes = [];
            var rings = [
                { r: 0.36, count: 8,  speed: 0.00016 },
                { r: 0.44, count: 10, speed: -0.00011 },
                { r: 0.52, count: 12, speed: 0.00008 }
            ];
            rings.forEach(function(ring, ri) {
                for (var i = 0; i < ring.count; i++) {
                    nodes.push({
                        ring: ri,
                        angle: (Math.PI * 2 * i) / ring.count + (ri * 0.6) + Math.random() * 0.5,
                        speed: ring.speed * (0.75 + Math.random() * 0.5),
                        orbit: ring.r * (0.94 + Math.random() * 0.12),
                        phase: Math.random() * Math.PI * 2,
                        size: 1.6 + Math.random() * 1.7,
                        color: PALETTE[Math.floor(Math.random() * PALETTE.length)]
                    });
                }
            });
        }

        function nodePosition(n, time) {
            var a = n.angle + n.speed * time;
            var r = radius * n.orbit;
            return {
                x: cx + Math.cos(a) * r,
                y: cy + Math.sin(a) * r * 0.94 - Math.sin(a * 2 + n.phase) * 4
            };
        }

        function spawnPacket(time) {
            // most packets flow toward the core (found blocks / new transactions)
            var inward = Math.random() < 0.6;
            var candidates = nodes;
            if (!candidates.length) { return; }
            var n = candidates[Math.floor(Math.random() * candidates.length)];
            packets.push({
                node: n,
                t: inward ? 0 : 1,
                dir: inward ? 1 : -1,
                speed: 0.00035 + Math.random() * 0.00025,
                start: time,
                color: n.color,
                trail: []
            });
        }

        function drawScene(time) {
            ctx.clearRect(0, 0, w, h);

            // Reactor glow behind everything
            var coreGlow = ctx.createRadialGradient(cx, cy, 0, cx, cy, radius * 0.62);
            coreGlow.addColorStop(0, 'rgba(47, 179, 203, 0.16)');
            coreGlow.addColorStop(0.55, 'rgba(109, 105, 219, 0.07)');
            coreGlow.addColorStop(1, 'rgba(10, 17, 28, 0)');
            ctx.fillStyle = coreGlow;
            ctx.fillRect(0, 0, w, h);

            // Fine technical orbit ring
            ctx.save();
            ctx.setLineDash([1, 7]);
            ctx.beginPath();
            ctx.ellipse(cx, cy, radius * 0.56, radius * 0.56 * 0.94, 0, 0, Math.PI * 2);
            ctx.strokeStyle = 'rgba(236, 241, 247, 0.14)';
            ctx.lineWidth = 1;
            ctx.stroke();
            ctx.restore();

            // Traces + nodes
            nodes.forEach(function(n) {
                var p = nodePosition(n, time);
                var pulse = 0.75 + 0.25 * Math.sin(time * 0.0016 + n.phase);

                // Curved trace to the core
                var mx = (p.x + cx) / 2 + (p.y - cy) * 0.16;
                var my = (p.y + cy) / 2 - (p.x - cx) * 0.16;
                ctx.beginPath();
                ctx.moveTo(p.x, p.y);
                ctx.quadraticCurveTo(mx, my, cx, cy);
                ctx.strokeStyle = n.color.line + (0.11 * pulse) + ')';
                ctx.lineWidth = 1;
                ctx.stroke();

                // Node with soft halo
                ctx.beginPath();
                ctx.arc(p.x, p.y, n.size * 3.4 * pulse, 0, Math.PI * 2);
                ctx.fillStyle = n.color.line + (0.1 * pulse) + ')';
                ctx.fill();

                ctx.beginPath();
                ctx.arc(p.x, p.y, n.size * pulse, 0, Math.PI * 2);
                ctx.fillStyle = n.color.node;
                ctx.shadowColor = n.color.node;
                ctx.shadowBlur = 6;
                ctx.fill();
                ctx.shadowBlur = 0;
            });

            // Packets riding the traces
            packets = packets.filter(function(pk) {
                var age = time - pk.start;
                pk.t = (pk.dir > 0 ? 0 : 1) + pk.dir * age * pk.speed;
                if (pk.t < 0 || pk.t > 1) { return false; }

                var p = nodePosition(pk.node, time);
                var ease = pk.t * pk.t * (3 - 2 * pk.t);
                var x0 = pk.dir > 0 ? p.x : cx;
                var y0 = pk.dir > 0 ? p.y : cy;
                var x1 = pk.dir > 0 ? cx : p.x;
                var y1 = pk.dir > 0 ? cy : p.y;
                var mx = (x0 + x1) / 2 + (y1 - y0) * 0.16;
                var my = (y0 + y1) / 2 - (x1 - x0) * 0.16;
                var t1 = 1 - ease;
                var px = t1 * t1 * x0 + 2 * t1 * ease * mx + ease * ease * x1;
                var py = t1 * t1 * y0 + 2 * t1 * ease * my + ease * ease * y1;

                // Trail ghosts
                for (var g = 1; g <= 4; g++) {
                    var gt = Math.max(0, Math.min(1, pk.t - pk.dir * g * 0.03));
                    var ge = gt * gt * (3 - 2 * gt);
                    var gt1 = 1 - ge;
                    var gx = gt1 * gt1 * x0 + 2 * gt1 * ge * mx + ge * ge * x1;
                    var gy = gt1 * gt1 * y0 + 2 * gt1 * ge * my + ge * ge * y1;
                    ctx.beginPath();
                    ctx.arc(gx, gy, 2.1 - g * 0.4, 0, Math.PI * 2);
                    ctx.fillStyle = pk.color.line + (0.34 - g * 0.08) + ')';
                    ctx.fill();
                }

                ctx.beginPath();
                ctx.arc(px, py, 3, 0, Math.PI * 2);
                ctx.fillStyle = pk.color.node;
                ctx.shadowColor = pk.color.node;
                ctx.shadowBlur = 12;
                ctx.fill();
                ctx.shadowBlur = 0;
                return true;
            });
        }

        function resize() {
            var rect = wrap.getBoundingClientRect();
            if (rect.width < 10) { return; }
            w = rect.width;
            h = rect.height;
            dpr = Math.min(window.devicePixelRatio || 1, 2);
            canvas.width = Math.round(w * dpr);
            canvas.height = Math.round(h * dpr);
            ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
            cx = w / 2;
            cy = h / 2;
            radius = Math.min(w, h) / 2;
        }

        function frame(time) {
            if (!running) { return; }
            drawScene(time);
            if (packets.length < 10 && Math.random() < 0.055) { spawnPacket(time); }
            frameHandle = window.requestAnimationFrame(frame);
        }

        function start() {
            if (running) { return; }
            running = true;
            frameHandle = window.requestAnimationFrame(frame);
        }

        function stop() {
            running = false;
            if (frameHandle) { window.cancelAnimationFrame(frameHandle); }
        }

        buildNodes();
        resize();

        // Seed a few packets mid-flight so the first paint already tells the story.
        // rAF timestamps share the performance.now() time origin, so seeding
        // with it keeps the packets alive on the first animated frame — and the
        // static reduced-motion frame below uses the same reference time.
        var STATIC_T = 4000; // reference time for the single reduced-motion frame
        if (prefersReducedMotion) {
            for (var i = 0; i < 4; i++) { spawnPacket(STATIC_T - 500 - i * 380); }
        } else {
            var seedTime = window.performance && performance.now ? performance.now() : 0;
            for (var j = 0; j < 4; j++) { spawnPacket(seedTime - j * 380); }
        }

        if (prefersReducedMotion) {
            // Single calm frame, no motion
            drawScene(STATIC_T);
        } else {
            // Only animate while visible
            if ('IntersectionObserver' in window) {
                new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) { entry.isIntersecting ? start() : stop(); });
                }, { threshold: 0.05 }).observe(wrap);
            } else {
                start();
            }
        }

        var resizeTicking = false;
        $(window).on('resize', function() {
            if (!resizeTicking) {
                resizeTicking = true;
                window.requestAnimationFrame(function() {
                    resizeTicking = false;
                    resize();
                    if (prefersReducedMotion) { drawScene(STATIC_T); }
                });
            }
        });
    })();

    /*-------------------------------------------------------------------
     * ACTIVE NAV ON SCROLL (one-page) — rAF-throttled
     *-------------------------------------------------------------------*/
    var sectionIds = ['home', 'features', 'roadmap', 'exchanges', 'downloads', 'mining', 'blog'];
    var $allNavLinks = $('#menu-top-menu .nav-link, #menu-top-menu .dropdown-item');

    function updateActiveNav() {
        var headerH = $('#masthead').outerHeight() || 72;
        var scrollTop = $(window).scrollTop() + headerH + 90;
        var activeId = null;

        sectionIds.forEach(function(id) {
            var $section = $('#' + id);
            if ($section.length && $section.offset().top <= scrollTop) {
                activeId = id;
            }
        });

        $allNavLinks.removeClass('active');
        if (!activeId) { return; }

        var $match = $allNavLinks.filter(function() {
            var href = $(this).attr('href') || '';
            return href === '#' + activeId || href.indexOf('/#' + activeId) !== -1;
        });
        $match.addClass('active');
        // light the parent dropdown toggle as well (e.g. Resources while Blog is in view)
        $match.closest('.dropdown').find('> .nav-link.dropdown-toggle').addClass('active');
    }

    updateActiveNav();
    onScrollRaf(updateActiveNav);

    /*-------------------------------------------------------------------
     * NAVBAR CLOSE ON CLICK (mobile)
     *-------------------------------------------------------------------*/
    $('.navbar-nav > li:not(.dropdown) > a').on('click', function() {
        $('.navbar-collapse').collapse('hide');
    });

    var siteNav = $('#navbar');
    siteNav.on('show.bs.collapse', function() {
        $(this).parents('.nav-menu').addClass('menu-is-open');
    });
    siteNav.on('hide.bs.collapse', function() {
        $(this).parents('.nav-menu').removeClass('menu-is-open');
    });
    $('#main-nav').on('show.bs.collapse', function() {
        $(this).parents('.nav-menu').addClass('menu-is-open');
    });
    $('#main-nav').on('hide.bs.collapse', function() {
        $(this).parents('.nav-menu').removeClass('menu-is-open');
    });

    /*-------------------------------------------------------------------
     * ONE PAGE ANCHORS — handled natively by scroll-behavior +
     * scroll-padding-top in style.css, which track --nav-h across
     * breakpoints. No JS handler needed (it would fight the CSS offset).
     *-------------------------------------------------------------------*/

    /*-------------------------------------------------------------------
     * OWL CAROUSEL (testimonials/gallery — only if present)
     *-------------------------------------------------------------------*/
    var $testimonialsDiv = $('.testimonials');
    if ($testimonialsDiv.length && $.fn.owlCarousel) {
        $testimonialsDiv.owlCarousel({
            items: 1,
            nav: true,
            dots: false,
            navText: ['<span class="fa fa-arrow-left"></span>', '<span class="fa fa-arrow-right"></span>']
        });
    }

    var $galleryDiv = $('.img-gallery');
    if ($galleryDiv.length && $.fn.owlCarousel) {
        $galleryDiv.owlCarousel({
            nav: false,
            center: true,
            loop: true,
            autoplay: true,
            dots: true,
            navText: ['<span class="fa fa-arrow-left"></span>', '<span class="fa fa-arrow-right"></span>'],
            responsive: {
                0: { items: 1 },
                768: { items: 3 }
            }
        });
    }

    /*-------------------------------------------------------------------
     * DARK MODE TOGGLE
     *-------------------------------------------------------------------*/
    var $darkBtn = $('#dark-mode-toggle');
    var $darkIcon = $('#dark-mode-icon');

    function syncDarkIcon() {
        var dark = document.documentElement.classList.contains('dark-mode');
        $darkIcon.attr('class', dark ? 'fas fa-sun' : 'fas fa-moon');
    }
    syncDarkIcon();

    $darkBtn.on('click', function() {
        var dark = document.documentElement.classList.contains('dark-mode');
        document.documentElement.classList.toggle('dark-mode', !dark);
        localStorage.setItem('nerva-theme', !dark ? 'dark' : 'light');
        syncDarkIcon();
        // Re-theme the node map iframe if present
        var frame = document.getElementById('nodemap-frame');
        if (frame) {
            frame.src = 'https://map.nerva.one/nodemap.html?theme=' + (!dark ? 'dark' : 'light');
        }
    });

    /*-------------------------------------------------------------------
     * SCROLL REVEAL — sections & cards animate in (IntersectionObserver)
     *-------------------------------------------------------------------*/
    var $revealItems = $('.reveal');

    // The reveal system is opt-in: html.nv-anim is only present while this
    // script is expected to run (set by header.php, removed by a timeout if
    // we never get here). Clear that timeout now that we did.
    if (window.__nvAnimFallback) {
        clearTimeout(window.__nvAnimFallback);
        window.__nvAnimFallback = null;
    }

    if ($revealItems.length && 'IntersectionObserver' in window && !prefersReducedMotion) {
        var revealObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.05 });

        $revealItems.each(function() {
            revealObserver.observe(this);
        });
    } else {
        $revealItems.addClass('revealed');
    }

    /*-------------------------------------------------------------------
     * BACK TO TOP
     *-------------------------------------------------------------------*/
    var $backToTop = $('#nv-back-to-top');
    if (!$backToTop.length) {
        $backToTop = $('<button id="nv-back-to-top" aria-label="Back to top"><span class="fas fa-chevron-up"></span></button>').appendTo('body');
    }
    function toggleBackToTop() {
        $backToTop.toggleClass('visible', $(window).scrollTop() > 600);
    }
    toggleBackToTop();
    onScrollRaf(toggleBackToTop);
    $backToTop.on('click', function() {
        window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
    });

    /*-------------------------------------------------------------------
     * OS DETECTION — highlight recommended downloads
     *-------------------------------------------------------------------*/
    (function detectOS() {
        var ua = navigator.userAgent;
        var os = null;
        if (/Android/i.test(ua)) os = 'android';
        else if (/iPhone|iPad|iPod/i.test(ua)) os = null; // no iOS builds exist — show no recommendation
        else if (/Windows/i.test(ua)) os = 'windows';
        else if (/Mac OS X|Macintosh/i.test(ua)) os = 'mac';
        else if (/Linux|X11/i.test(ua)) os = 'linux';

        if (!os) return;
        $('[data-nv-os="' + os + '"]').each(function() {
            var $badge = $(this).find('.dl-detected');
            if ($badge.length) $badge.removeClass('d-none');
            $(this).find('.card.dl-card').addClass('os-match');
        });
    })();

    /*-------------------------------------------------------------------
     * LIVE PRICE CHIP — first-party data. The server already pulls CoinGecko
     * hourly and caches it (inc/nerva-milestones.php, REST route
     * nerva/v1/milestones/latest), so the browser never contacts a third
     * party. Fails silently if the endpoint is unreachable.
     *-------------------------------------------------------------------*/
    (function livePrice() {
        var $priceWrap = $('#nv-price-chip');
        if (!$priceWrap.length) return;

        var endpoint = (window.nvPrice && window.nvPrice.endpoint) || '/wp-json/nerva/v1/milestones/latest';
        var CACHE_KEY = 'nerva-xnv-price';
        var TTL = 120000; // 2 min

        function render(price, change) {
            if (!isFinite(price) || price <= 0) return;
            var priceStr = price >= 1 ? price.toFixed(3) : price.toFixed(5);
            var html = '$' + priceStr;
            if (typeof change === 'number' && isFinite(change)) {
                var up = change >= 0;
                html += ' <span class="chg ' + (up ? 'up' : 'down') + '">' + (up ? '\u25B2' : '\u25BC') + ' ' + Math.abs(change).toFixed(1) + '%</span>';
            }
            $priceWrap.html(html).removeClass('d-none');
        }

        try {
            var cached = JSON.parse(sessionStorage.getItem(CACHE_KEY) || 'null');
            if (cached && (Date.now() - cached.t) < TTL && cached.p) {
                render(cached.p, cached.c);
                return;
            }
        } catch (e) { /* storage unavailable */ }

        $.getJSON(endpoint)
            .done(function(row) {
                var price = parseFloat(row.price_usd);
                var change = parseFloat(row.change_24h);
                render(price, isNaN(change) ? null : change);
                try { sessionStorage.setItem(CACHE_KEY, JSON.stringify({ t: Date.now(), p: price, c: isNaN(change) ? null : change })); } catch (e) {}
            })
            .fail(function() { $priceWrap.addClass('d-none'); });
    })();

    /*-------------------------------------------------------------------
     * COPY BUTTONS — data-copy attribute (addresses, keys…)
     *-------------------------------------------------------------------*/
    $(document).on('click', '.nv-copy-btn', function() {
        var text = $(this).attr('data-copy') || '';
        var $btn = $(this);
        // capture the label once, before it is ever swapped, so repeated
        // clicks inside the window restore the right text
        if (!$btn.data('nv-original')) { $btn.data('nv-original', $btn.text()); }
        function done() {
            $btn.text('Copied ✓');
            clearTimeout($btn.data('nv-timer'));
            $btn.data('nv-timer', setTimeout(function() {
                $btn.text($btn.data('nv-original'));
            }, 1800));
        }
        function legacyCopy() {
            var $tmp = $('<textarea>').val(text).appendTo('body').css('position', 'fixed').css('opacity', 0);
            $tmp[0].select();
            try { document.execCommand('copy'); } catch (e) { /* no clipboard access */ }
            $tmp.remove();
            done();
        }
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(done, legacyCopy);
        } else {
            legacyCopy();
        }
    });

    /*-------------------------------------------------------------------
     * Paper wallet — copy buttons on the generated key lines only.
     * Skips the safety notice and copies the bare value (label stripped),
     * so the clipboard content can be pasted straight into a wallet.
     *-------------------------------------------------------------------*/
    $(document).on('click', '#generate_paper_wallet', function() {
        setTimeout(function() {
            $('#paperwallet_result p').not('.alert-danger').each(function() {
                var $p = $(this);
                if ($p.find('.nv-copy-btn').length) { return; }
                var value = $p.text().trim().replace(/^(Public|Secret):\s*/i, '');
                if (!value) { return; }
                var $btn = $('<button>', { type: 'button', 'class': 'nv-copy-btn', text: 'Copy' });
                $btn.attr('data-copy', value);
                $p.append(' ').append($btn);
            });
        }, 50);
    });

    /*-------------------------------------------------------------------
     * FAQ: close other panels when opening one (accordion behaviour)
     *-------------------------------------------------------------------*/
    $(document).on('click', '#accordionFourLeft .panel-heading a', function() {
        var target = $(this).attr('data-target');
        $('#accordionFourLeft .panel-collapse.collapse.show').each(function() {
            if ('#' + $(this).attr('id') !== target) {
                $(this).collapse('hide');
            }
        });
    });

});
