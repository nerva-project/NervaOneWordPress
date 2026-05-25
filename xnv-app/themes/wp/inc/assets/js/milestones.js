(function () {
    'use strict';

    // =========================================================================
    // GOAL CONFIGURATION
    //
    // To add a goal    → add a new entry with enabled: true
    // To disable/hide  → set enabled: false, or comment the line out
    //
    // Goal target types (mutually exclusive):
    //   target: <number>    fixed market cap in USD
    //   type: 'supply'      target = circulating supply × $1 (updated each hour)
    //   coinId: '<id>'      target = that coin's current market cap from CoinGecko
    //                       (coinId must match a key in NERVA_COMPARISON_COINS in PHP)
    // =========================================================================
    var GOALS = [
        { name: 'All Time High',           target:  4466000,  enabled: true  },
        { name: '$10M Market Cap',         target:  10000000, enabled: true  },
        { name: '$1 Per Coin',             type:    'supply', enabled: true  },
        { name: 'Little St. James Island', target:  60000000, enabled: true  },

        // Comparison goals — target is the other coin's live market cap
        // { name: 'Zcash (ZEC) Market Cap',  coinId:  'zcash',  enabled: true  },
        // { name: 'Monero (XMR) Market Cap', coinId:  'monero', enabled: true  },
    ];
    // =========================================================================

    var PROJECT_START      = new Date('2018-05-01');
    var currentSnapshotId  = null;

    // ── Formatters ────────────────────────────────────────────────────────

    function formatPrice(usd) {
        if (usd === null || usd === undefined) return '—';
        return '$' + parseFloat(usd).toLocaleString('en-US', {
            minimumFractionDigits: 4,
            maximumFractionDigits: 4,
        });
    }

    function formatMarketCap(usd) {
        if (!usd) return '—';
        var n = parseFloat(usd);
        if (n >= 1e9) return '$' + (n / 1e9).toFixed(2) + 'B';
        if (n >= 1e6) return '$' + (n / 1e6).toFixed(2) + 'M';
        return '$' + Math.round(n).toLocaleString('en-US');
    }

    function formatChange(pct) {
        if (pct === null || pct === undefined) return '—';
        var n    = parseFloat(pct);
        var sign = n >= 0 ? '+' : '';
        return sign + n.toFixed(2) + '%';
    }

    function changeClass(pct) {
        if (pct === null || pct === undefined) return '';
        return parseFloat(pct) >= 0 ? 'positive' : 'negative';
    }

    function formatAge() {
        var ms   = new Date() - PROJECT_START;
        var days = Math.floor(ms / 86400000);
        var yrs  = Math.floor(days / 365);
        var rem  = days % 365;
        return 'Age: ' + yrs + 'y ' + rem + 'd';
    }

    function formatUpdated(isoString) {
        if (!isoString) return '';
        var d = new Date(isoString.replace(' ', 'T') + 'Z');
        return 'Updated: ' + d.toLocaleString('en-US', {
            month: 'short', day: 'numeric', year: 'numeric',
            hour: '2-digit', minute: '2-digit', hour12: false, timeZoneName: 'short',
        });
    }

    // ── Goal rendering ────────────────────────────────────────────────────

    function renderGoals(snapshot, comparison) {
        var container = document.getElementById('mw-goals');
        container.innerHTML = '';

        var mcap   = parseFloat(snapshot.market_cap_usd)   || 0;
        var supply = parseFloat(snapshot.circulating_supply) || 19160000;

        GOALS.filter(function (g) { return g.enabled; }).forEach(function (goal) {
            var target, targetLabel;

            if (goal.type === 'supply') {
                target      = supply;
                targetLabel = formatMarketCap(supply) + ' market cap';
            } else if (goal.coinId) {
                var coinData = comparison && comparison[goal.coinId];
                target       = coinData ? coinData.usd_market_cap : null;
                targetLabel  = target ? formatMarketCap(target) + ' market cap' : 'Loading…';
            } else {
                target      = goal.target;
                targetLabel = formatMarketCap(target) + ' market cap';
            }

            var pct      = target ? Math.min((mcap / target) * 100, 100) : 0;
            var mult     = target && mcap > 0 ? (target / mcap) : null;
            var achieved = target !== null && mcap >= target;

            var multText  = achieved ? '✓ Achieved' : (mult ? mult.toFixed(2) + 'x' : '—');
            var multClass = 'mw-goal-mult' + (achieved ? ' achieved' : '');

            var div = document.createElement('div');
            div.className = 'mw-goal';
            div.innerHTML =
                '<div class="mw-goal-row">' +
                    '<span class="mw-goal-name">'   + goal.name   + '</span>' +
                    '<span class="mw-goal-target">' + targetLabel + '</span>' +
                    '<span class="' + multClass + '">' + multText + '</span>' +
                '</div>' +
                '<div class="mw-progress">' +
                    '<div class="mw-bar" style="width:' + pct.toFixed(2) + '%"></div>' +
                '</div>';

            container.appendChild(div);
        });
    }

    // ── Populate stats ────────────────────────────────────────────────────

    function populate(snapshot, comparison) {
        currentSnapshotId = snapshot.id;
        document.getElementById('mw-age').textContent     = formatAge();
        document.getElementById('mw-updated').textContent = formatUpdated(snapshot.snapshot_time);
        document.getElementById('mw-price').textContent   = formatPrice(snapshot.price_usd);
        document.getElementById('mw-mcap').textContent    = formatMarketCap(snapshot.market_cap_usd);

        var ch24 = document.getElementById('mw-24h');
        var ch7  = document.getElementById('mw-7d');
        var ch30 = document.getElementById('mw-30d');

        ch24.textContent = formatChange(snapshot.change_24h);
        ch24.className   = 'mw-stat-value ' + changeClass(snapshot.change_24h);
        ch7.textContent  = formatChange(snapshot.change_7d);
        ch7.className    = 'mw-stat-value ' + changeClass(snapshot.change_7d);
        ch30.textContent = formatChange(snapshot.change_30d);
        ch30.className   = 'mw-stat-value ' + changeClass(snapshot.change_30d);

        renderGoals(snapshot, comparison);
    }

    // ── Share flow ────────────────────────────────────────────────────────

    function canvasToBlob(canvas) {
        return new Promise(function (resolve) {
            canvas.toBlob(resolve, 'image/png');
        });
    }

    function blobToDataUrl(blob) {
        return new Promise(function (resolve) {
            var reader = new FileReader();
            reader.onload = function () { resolve(reader.result); };
            reader.readAsDataURL(blob);
        });
    }

    function copyBlobToClipboard(blob) {
        if (!navigator.clipboard || !window.ClipboardItem) {
            return Promise.resolve(false);
        }
        return navigator.clipboard.write([
            new ClipboardItem({ 'image/png': blob })
        ]).then(function () { return true; }).catch(function () { return false; });
    }

    function getScreenshotBlob() {
        return fetch(nervaMilestones.apiBase + '/milestones/screenshot?snapshot_id=' + currentSnapshotId)
            .then(function (r) { return r.json(); })
            .then(function (check) {
                if (check.exists) {
                    return fetch(check.url).then(function (r) { return r.blob(); });
                }

                if (window.getSelection) { window.getSelection().removeAllRanges(); }

                return html2canvas(document.getElementById('milestones-widget'), {
                    backgroundColor: '#1b1a19',
                    scale: 2,
                    useCORS: true,
                    logging: false,
                    onclone: function (clonedDoc) {
                        // html2canvas can't render background-clip:text — use solid colour.
                        var span = clonedDoc.querySelector('.mw-title span');
                        if (!span) return;
                        span.style.background           = 'none';
                        span.style.webkitBackgroundClip = 'border-box';
                        span.style.backgroundClip       = 'border-box';
                        span.style.webkitTextFillColor  = '#8b5cf6';
                        span.style.color                = '#8b5cf6';
                    },
                }).then(function (canvas) {
                    return canvasToBlob(canvas).then(function (blob) {
                        return blobToDataUrl(blob).then(function (dataUrl) {
                            return fetch(nervaMilestones.apiBase + '/milestones/screenshot', {
                                method:  'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-WP-Nonce':   nervaMilestones.nonce,
                                },
                                body: JSON.stringify({ image: dataUrl, snapshot_id: currentSnapshotId }),
                            }).then(function () { return blob; });
                        });
                    });
                });
            });
    }

    function share() {
        var btn          = document.getElementById('mw-share-btn');
        var instructions = document.getElementById('mw-share-instructions');
        btn.disabled     = true;
        btn.textContent  = 'Generating…';
        instructions.style.display = 'none';

        getScreenshotBlob()
            .then(function (blob) {
                return copyBlobToClipboard(blob).then(function (copied) {
                    var price = document.getElementById('mw-price').textContent;
                    var mcap  = document.getElementById('mw-mcap').textContent;
                    var ch24  = document.getElementById('mw-24h').textContent;
                    var tweet =
                        'Nerva $XNV progress update  🚀\n\n' +
                        'Price: ' + price + ' | Market Cap: ' + mcap + ' | 24h: ' + ch24 + '\n\n' +
                        '🔗 ' + nervaMilestones.pageUrl;

                    if (copied) {
                        instructions.innerHTML =
                            '<strong>Screenshot copied to clipboard!</strong><br><br>' +
                            'In the tweet that just opened, paste with ' +
                            '<strong>Ctrl+V</strong> (Windows) or <strong>⌘V</strong> (Mac) to attach the image.<br><br>';
                    } else {
                        instructions.innerHTML =
                            'Your browser does not support clipboard images.<br>' +
                            '<a href="' + URL.createObjectURL(blob) + '" download="nerva-milestones.png">Download the screenshot</a> and attach it manually to your tweet.';
                    }
                    instructions.style.display = 'block';

                    window.open(
                        'https://twitter.com/intent/tweet?text=' + encodeURIComponent(tweet),
                        '_blank', 'noopener'
                    );
                });
            })
            .catch(function (err) {
                console.error('Share error:', err);
                alert('Could not generate the share image. Please try again.');
            })
            .finally(function () {
                btn.disabled  = false;
                btn.innerHTML = '<span class="fab fa-x-twitter"></span>&nbsp; Share on X';
            });
    }

    function copyImage() {
        var btn          = document.getElementById('mw-copy-btn');
        var instructions = document.getElementById('mw-share-instructions');
        btn.disabled     = true;
        btn.textContent  = 'Copying…';
        instructions.style.display = 'none';

        getScreenshotBlob()
            .then(function (blob) {
                return copyBlobToClipboard(blob).then(function (copied) {
                    if (copied) {
                        instructions.innerHTML = '<strong>Screenshot copied to clipboard!</strong><br><br>' +
                            'Paste with <strong>Ctrl+V</strong> (Windows) or <strong>⌘V</strong> (Mac) anywhere you want to share it.';
                    } else {
                        instructions.innerHTML =
                            'Your browser does not support clipboard images.<br>' +
                            '<a href="' + URL.createObjectURL(blob) + '" download="nerva-milestones.png">Download the screenshot</a> instead.';
                    }
                    instructions.style.display = 'block';
                });
            })
            .catch(function (err) {
                console.error('Copy error:', err);
                alert('Could not copy the image. Please try again.');
            })
            .finally(function () {
                btn.disabled  = false;
                btn.textContent = 'Copy Image';
            });
    }

    function saveImage() {
        var btn = document.getElementById('mw-save-btn');
        btn.disabled    = true;
        btn.textContent = 'Saving…';

        getScreenshotBlob()
            .then(function (blob) {
                var url = URL.createObjectURL(blob);
                var a   = document.createElement('a');
                a.href     = url;
                a.download = 'nerva-milestones.png';
                a.click();
                URL.revokeObjectURL(url);
            })
            .catch(function (err) {
                console.error('Save error:', err);
                alert('Could not save the image. Please try again.');
            })
            .finally(function () {
                btn.disabled    = false;
                btn.textContent = 'Save Image';
            });
    }

    // ── Init ─────────────────────────────────────────────────────────────

    document.addEventListener('DOMContentLoaded', function () {
        var loading  = document.getElementById('mw-loading');
        var errorEl  = document.getElementById('mw-error');
        var shareBtn = document.getElementById('mw-share-btn');
        var copyBtn  = document.getElementById('mw-copy-btn');
        var saveBtn  = document.getElementById('mw-save-btn');

        Promise.all([
            fetch(nervaMilestones.apiBase + '/milestones/latest').then(function (r) {
                if (!r.ok) throw new Error('HTTP ' + r.status);
                return r.json();
            }),
            fetch(nervaMilestones.apiBase + '/milestones/comparison').then(function (r) {
                return r.ok ? r.json() : {};
            }),
        ])
        .then(function (results) {
            populate(results[0], results[1]);
            loading.style.display      = 'none';
            shareBtn.style.display     = 'inline-block';
            copyBtn.style.display      = 'inline-block';
            saveBtn.style.display      = 'inline-block';
            var instructions = document.getElementById('mw-share-instructions');
            instructions.innerHTML     =
                'Click <strong>Share on X</strong> to post on X/Twitter, or <strong>Copy Image</strong> to copy the screenshot to your clipboard for sharing anywhere.';
            instructions.style.display = 'block';
        })
        .catch(function (err) {
            console.error('Failed to load milestones data:', err);
            loading.style.display  = 'none';
            errorEl.style.display  = 'block';
        });

        shareBtn.addEventListener('click', share);
        copyBtn.addEventListener('click', copyImage);
        saveBtn.addEventListener('click', saveImage);
    });
}());
