<div data-spy="scroll" data-target="#navbar" data-offset="30">

<!-- ════════════════════════ HERO ════════════════════════ -->
<section class="nv-hero" id="home">
    <div class="nv-glow glow-teal" aria-hidden="true"></div>
    <div class="nv-glow glow-violet" aria-hidden="true"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="nv-eyebrow"><span class="nv-pulse" aria-hidden="true"></span> Mainnet live since 2018 &nbsp;&middot;&nbsp; CPU-only &nbsp;&middot;&nbsp; No pools</span>
                <h1>Private money,<br><span class="text-gradient">mineable by anyone.</span></h1>
                <p class="nv-sub">
                    NERVA (XNV) hides the sender, receiver and amount of every transaction by default.
                    Its CPU-only Proof of Work keeps mining fair: no ASICs, no GPU rigs, no pools —
                    just ordinary computers securing the network.
                </p>
                <div class="hero-cta">
                    <a href="#downloads" class="btn btn-primary btn-lg"><span class="fas fa-download" aria-hidden="true"></span> Download NervaOne</a>
                    <a href="#mining" class="btn btn-ghost btn-lg">Start mining <span class="fas fa-arrow-right" aria-hidden="true"></span></a>
                    <span id="nv-price-chip" class="nv-price-chip d-none" title="XNV price — CoinGecko" aria-label="XNV price"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="nv-hero-visual" aria-hidden="true">
                    <div class="nv-net">
                        <canvas class="nv-net-canvas"></canvas>
                        <div class="nv-net-halo"></div>
                        <div class="nv-net-core">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nerva-network-1.png" alt="Nerva — decentralized network of CPU miners">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="nv-specs reveal">
            <div class="spec-row">
                <div class="spec">
                    <div class="spec-label">Cryptocurrency</div>
                    <div class="spec-value">NERVA (XNV)</div>
                </div>
                <div class="spec">
                    <div class="spec-label">Circulating supply</div>
                    <div class="spec-value"><span id="xnv-supply">…</span> XNV</div>
                </div>
                <div class="spec">
                    <div class="spec-label">Annual inflation</div>
                    <div class="spec-value">157,800 XNV (0.82%)</div>
                </div>
                <div class="spec">
                    <div class="spec-label">Consensus</div>
                    <div class="spec-value">PoW — CPU mining</div>
                </div>
                <div class="spec">
                    <div class="spec-label">Hash algorithm</div>
                    <div class="spec-value"><a href="https://docs.nerva.one/about/#cryptonight-adaptive" target="_blank" rel="noopener">Cryptonight Adaptive</a></div>
                </div>
                <div class="spec">
                    <div class="spec-label">Block time</div>
                    <div class="spec-value">60 seconds</div>
                </div>
                <div class="spec">
                    <div class="spec-label">Block reward</div>
                    <div class="spec-value">0.3 XNV</div>
                </div>
                <div class="spec">
                    <div class="spec-label">Premine</div>
                    <div class="spec-value"><a href="https://nerva.one/donate/#treasury-holdings">180,000 XNV (Treasury)</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="nv-hero-fade" aria-hidden="true"></div>
</section>
<!-- Home Ends -->


<!-- ════════════════════════ FEATURES ════════════════════════ -->
<div class="section" id="features">
    <div class="container">
        <div class="section-title reveal">
            <span class="nv-kicker">Why Nerva</span>
            <h2>Features you'll love</h2>
            <p class="nv-lead">A privacy coin that stays true to the original crypto vision: one CPU, one vote.</p>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4 reveal">
                <div class="card features h-100">
                    <div class="card-body">
                        <div class="nv-icon-tile t-teal"><span class="fas fa-microchip" aria-hidden="true"></span></div>
                        <h3 class="card-title">Cryptonight Adaptive</h3>
                        <p class="card-text">NERVA's exclusive Cryptonight Adaptive algorithm resists ASIC and GPU mining. Combined with no pool support, every miner competes individually, keeping the network truly decentralized.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 reveal" style="--reveal-delay:.08s">
                <div class="card features h-100">
                    <div class="card-body">
                        <div class="nv-icon-tile t-amber"><span class="fas fa-balance-scale" aria-hidden="true"></span></div>
                        <h3 class="card-title">Fair launch</h3>
                        <p class="card-text">NERVA launched with no ICO and no investor allocation. A 1% premine went to the project's creator, who left in 2021. All other coins have been earned through mining.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 reveal" style="--reveal-delay:.16s">
                <div class="card features h-100">
                    <div class="card-body">
                        <div class="nv-icon-tile t-green"><span class="fas fa-leaf" aria-hidden="true"></span></div>
                        <h3 class="card-title">Energy efficient</h3>
                        <p class="card-text">No need for expensive GPU rigs or specialized hardware. Mine on your existing computer using resources you already have.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="spacer"></div>

        <div class="row">
            <div class="col-12 col-lg-4 reveal">
                <div class="card features h-100">
                    <div class="card-body">
                        <div class="nv-icon-tile t-violet"><span class="fas fa-bolt" aria-hidden="true"></span></div>
                        <h3 class="card-title">Fast transactions</h3>
                        <p class="card-text">One minute block time means your funds arrive quickly. Fast transactions, combined with low fees, allow you to send and receive NERVA quickly and cost effectively.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 reveal" style="--reveal-delay:.08s">
                <div class="card features h-100">
                    <div class="card-body">
                        <div class="nv-icon-tile t-rose"><span class="fas fa-user-secret" aria-hidden="true"></span></div>
                        <h3 class="card-title">Private by default</h3>
                        <p class="card-text">Every NERVA transaction hides the sender, receiver and amount on the blockchain by default. Your financial activity is private without any extra steps.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 reveal" style="--reveal-delay:.16s">
                <div class="card features h-100">
                    <div class="card-body">
                        <div class="nv-icon-tile t-slate"><span class="fas fa-users" aria-hidden="true"></span></div>
                        <h3 class="card-title">Fair distribution</h3>
                        <p class="card-text">With CPU-only mining and no pool support, no single entity can dominate the network. Every miner participates on equal footing, making NERVA one of the most fairly distributed cryptocurrencies.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->


<!-- ════════════════════════ MISSION ════════════════════════ -->
<div class="section light-bg" id="our-mission">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="reveal">
                    <span class="nv-kicker">Our mission</span>
                    <h2>Crypto that belongs to everyone</h2>
                    <p class="nv-lead mb-4">
                        Sender, receiver and amount are all hidden on the blockchain, so your financial history stays
                        yours alone. Built on proven Cryptonote technology, NERVA works like digital cash: spend it
                        without leaving a trace.
                    </p>
                    <p class="nv-lead mb-4">
                        CPU-only Proof of Work with no pool support means each miner participates independently —
                        strong decentralization and a network that is censorship resistant. Cryptonight Adaptive
                        resists ASIC and GPU rigs, so anyone with a regular computer can take part and help secure
                        the network.
                    </p>
                </div>

                <div class="mission-item reveal">
                    <span class="mission-num">01</span>
                    <h3>Crypto for everyone</h3>
                    <p>
                        Crypto should be accessible to everyone, not just those who can afford specialized hardware.
                        NERVA lets you mine on any standard computer, no elaborate setup required.
                        True decentralization means anyone can participate.
                        <span class="a-color collapsed cursor-pointer" type="" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">Read more</span>
                    </p>
                    <div class="accordion" id="accordion-1">
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordion-1">
                            <p>We back this up with actively maintained software. A PHP API lets developers integrate NERVA into their projects.
                                NervaOne, our open-source desktop wallet and miner, makes it easy to get started on Windows, Linux, and Mac.</p>
                            <p>The NERVA community is active on Discord and Telegram, with people always around to help.
                                This is a community-driven project where every miner, trader and holder is treated equally,
                                working together to keep crypto decentralized and in the hands of individuals.</p>
                        </div>
                    </div>
                </div>

                <div class="mission-item reveal">
                    <span class="mission-num">02</span>
                    <h3>On the cutting edge</h3>
                    <p>
                        NERVA takes a different approach to cryptocurrency. With a custom Proof of Work algorithm,
                        solo CPU-only mining and a fixed emission curve, NERVA challenges conventional thinking about
                        how blockchains are mined and secured.
                        <span class="a-color collapsed cursor-pointer" type="" data-toggle="collapse"
                                            data-target="#collapsetwo" aria-expanded="false"
                                            aria-controls="collapsetwo">Read more</span>
                    </p>
                    <div class="accordion" id="accordion-2">
                        <div id="collapsetwo" class="collapse" aria-labelledby="headingtwo"
                            data-parent="#accordion-2">
                            <p>NERVA was the first cryptocurrency to demonstrate a self-adjusting mining algorithm, changing parameters every block.
                                Cryptonight Adaptive is now in v12, with v13 in development. Every hash relies on randomly selected blockchain data,
                                making the network highly resistant to ASICs, FPGAs and rented hash services like NiceHash,
                                providing strong protection against 51% attacks that have compromised other blockchains.</p>
                            <p>NERVA also completed a milestone no other Cryptonight blockchain had reached: the end of primary coin emission.
                                After approximately three years, the network entered tail emission, a small steady block reward designed to
                                replace lost coins and keep miners incentivized. NERVA proved this transition works, providing a real-world
                                example for other projects to learn from.</p>
                        </div>
                    </div>
                </div>

                <div class="mission-item reveal">
                    <span class="mission-num">03</span>
                    <h3>A simple use case</h3>
                    <p>
                        Our use case is simple: a stable blockchain with fast, low-fee transfers usable by anyone,
                        with a straightforward, no-nonsense interface — plus the tools and resources developers need
                        to integrate NERVA into their systems and use it as an alternate payment method.
                        <span class="a-color collapsed cursor-pointer" type="" data-toggle="collapse"
                                            data-target="#collapsethree" aria-expanded="false"
                                            aria-controls="collapsethree">Read more</span>
                    </p>
                    <div class="accordion" id="accordion-3">
                        <div id="collapsethree" class="collapse" aria-labelledby="headingthree"
                            data-parent="#accordion-3">
                            <p>NERVA provides APIs and developer tools for anyone who wants to build with it,
                                whether that's integrating payments, building applications, or using NERVA as an in-game currency.</p>
                            <p>For non-developers, NervaOne makes it easy to store, send and mine NERVA on any computer.
                                We continue working to expand exchange listings and make NERVA easier to buy, sell and use.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="mission-figure reveal d-none d-lg-block">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nerva-mission-colored.png" alt="The Nerva mission — community driven">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mission Ends -->

<!-- ════════════════════════ NODE MAP ════════════════════════ -->
<div class="section" id="nodemap">
    <div class="container">
        <div class="section-title reveal">
            <span class="nv-kicker">Network</span>
            <h2>Node map</h2>
            <p class="nv-lead">
                Nerva is decentralized through CPU-only mining and no pool support.
                Every miner operates a full node, making the network extremely resistant to 51% attacks.
                1 CPU = 1 Vote, as described in the Bitcoin whitepaper.
            </p>
        </div>
        <div class="row">
            <div class="col-12 reveal">
                <div class="nv-map-frame">
                    <iframe id="nodemap-frame" src="" title="Nerva node map" width="100%" height="100%" style="border:none;" allowfullscreen="" loading="lazy"></iframe>
                    <span class="nv-map-note"><span class="fas fa-network-wired" aria-hidden="true"></span>&nbsp; Live — map.nerva.one</span>
                </div>
                <script>(function(){var dark=document.documentElement.classList.contains('dark-mode');document.getElementById('nodemap-frame').src='https://map.nerva.one/nodemap.html?theme='+(dark?'dark':'light');})();</script>
            </div>
        </div>
    </div>
</div>
<!-- Node Map Ends -->


<!-- ════════════════════════ ROADMAP ════════════════════════ -->
<div class="section light-bg" id="roadmap">
    <div class="container">
        <div class="section-title reveal">
            <span class="nv-kicker">Roadmap</span>
            <h2>Where Nerva is heading</h2>
            <p class="nv-lead">No company, no VC roadmap — just a community building what matters, one release at a time.</p>
        </div>

        <div class="nv-roadmap-grid">
            <div class="reveal">
                <ul class="timeline">
                    <li class="timeline-item period">
                        <div class="timeline-title">The Future</div>
                    </li>

                    <li class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Future</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Community Driven</h4>
                            <p>Nerva is an open-source project with no company, no roadmap handed down from above. What gets built next depends on what the community wants to build. If you have ideas, skills, or just the will to contribute, this project is yours to shape. The future of Nerva is unwritten, and that is intentional.</p>
                        </div>
                    </li>

                    <li class="timeline-item period">
                        <div class="timeline-title">2026</div>
                    </li>

                    <li class="timeline-item marker-active">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q4 / 2026</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Hard Fork 14 <span class="timeline-badge badge-active">In Development</span></h4>
                            <p>Nerva's next planned network upgrade, currently in active development. Three key improvements: stronger transaction privacy through a larger anonymity set; smaller and faster-to-verify transactions via more efficient cryptographic signatures and proofs; and a new mining algorithm that further deepens the memory-bound approach introduced in HF13, keeping mining fair and ASIC/GPU resistant, upholding Nerva's one CPU, one vote principle.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q3 / 2026</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Hard Fork 13 <span class="timeline-badge badge-done">Completed</span></h4>
                            <p>Network upgrade including a redesigned mining algorithm with stronger GPU and ASIC resistance, keeping Nerva CPU-only and pool-resistant, as it has always been. Also included: daemon sync improvements for faster node setup.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q2 / 2026</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Software Development <span class="timeline-badge badge-done">Completed</span></h4>
                            <p>Research and evaluate core software updates aligned with Nerva's long term goals. Begin development on new releases and continue improving existing Nerva services and infrastructure.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-active">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q1 / 2026</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Community Growth <span class="timeline-badge badge-active">Ongoing</span></h4>
                            <p>Launched a new Nerva subreddit and continued growing the broader community through engagement, education, and outreach initiatives.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-active">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q1 / 2026</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Exchange Expansion <span class="timeline-badge badge-active">Ongoing</span></h4>
                            <p>Following the 2025 delistings from XeggeX and TradeOgre, Nerva secured new listings on NonKyc and several smaller exchanges, restoring liquidity and market accessibility.</p>
                        </div>
                    </li>

                    <li class="timeline-item period">
                        <div class="timeline-title">2025</div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q1 / 2025</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Grow Nerva's X Presence</h4>
                            <p>Continue grinding on X and growing Nerva's account.</p>
                        </div>
                    </li>

                    <li class="timeline-item period">
                        <div class="timeline-title">2024</div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q4 / 2024</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Release NervaOne Mobile</h4>
                            <p>Develop, test and release a working version of NervaOne Mobile. Put on hold. Community growth was prioritized over mobile development at the time.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q3 / 2024</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Start working on phase 2 of NervaOne</h4>
                            <p>NervaOne Desktop was developed and it replaced Nerva's old GUI. It's an open-source, non-custodial, multi-coin wallet and miner that currently supports $XNV, $XMR, $WOW and $DASH.
                                Start working on phase 2: mobile wallet that connects to your NervaOne Desktop to provide mobile wallet functionaity without the need to trust 3rd party.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q2 / 2024</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Create new GUI application</h4>
                            <p>Our desktop application is build using no longer supported dotnet 5 technology and some people are having issues running it, especially on Linux and Mac.
                                Create new, slick looking desktop application that will run on Windows, Linux and Mac.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q2 / 2024</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Pursue more exchange listings</h4>
                            <p>Try to get listed on 3rd exchange or a DEX.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q1 / 2024</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Grow Nerva's community</h4>
                            <p>Continue building Nerva's community by engaging with current users and trying to attract new users.
                                Start doing more giveaways.
                                Continue sharing Nerva's vision of privacy and security.
                                Try to help make crypto more accessible to everybody.</p>
                        </div>
                    </li>

                    <li class="timeline-item period">
                        <div class="timeline-title">2023</div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q4 / 2023</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Get listed on 2nd exchange</h4>
                            <p>Get Nerva in front of new users by allowing them to trade on another exchange.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q4 / 2023</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Build X (Twitter) presence</h4>
                            <p>Reach new users by sharing posts related to crypto, privacy and mining on X (Twitter), expanding Nerva's presence and user awareness.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q2 / 2023</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Mobile and Web Wallet</h4>
                            <p>Nerva was added to DogeCash App, a custodial mobile and web wallet service. It's available in Google Play Store and Apple App Store.</p>
                        </div>
                    </li>

                    <li class="timeline-item period">
                        <div class="timeline-title">2022</div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q1 / 2022</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Desktop Wallet Improvements</h4>
                            <p>Desktop wallet (GUI) got stability improvements and one click miner button was added.</p>
                        </div>
                    </li>

                    <li class="timeline-item period">
                        <div class="timeline-title">2021</div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q4 / 2021</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">XNV Treasury Buybacks</h4>
                            <p>Continue the XNV Treasury buyback via Tradeogre. 100100 Coins are currently in the Treasury Wallet.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q4 / 2021</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Rebrand to a New Domain</h4>
                            <p>Set up Nerva services on nerva.one domain, release new version of Nerva software and update outside links.</p>
                        </div>
                    </li>

                    <li class="timeline-item marker-done">
                        <div class="timeline-marker"></div>
                        <div class="timeline-info">Q4 / 2021</div>
                        <div class="timeline-content">
                            <h4 class="timeline-title">Bitbucket to Github Migration</h4>
                            <p>Migrate the Nerva Bitbucket repository to Github making it accessible to more developers.</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="nv-roadmap-side d-none d-lg-block reveal">
                <div class="mission-figure">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nerva-crowdgift-deadline.png" alt="Nerva timeline illustration">
                </div>
                <p class="nv-note">
                    Delivered by volunteers since 2018. Progress on this page is maintained by the community —
                    trade-offs and priorities are discussed openly on Discord.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Roadmap Ends -->

<!-- ════════════════════════ EXCHANGES ════════════════════════ -->
<div class="section" id="exchanges">
    <div class="container">
        <div class="section-title reveal">
            <span class="nv-kicker">Trade</span>
            <h2>Where to trade XNV</h2>
            <p class="nv-lead">NERVA is listed on the following exchanges. Always double-check the pair and network before sending funds.</p>
        </div>
        <div class="row justify-content-center">

            <div class="col-12 col-lg-4 reveal">
                <div class="card exchanges h-100">
                    <div class="card-body">
                        <img class="xchg-logo" src="https://nerva.one/xnv-app/uploads/2026/01/nonkyc_header_new.png" alt="NonKyc exchange" loading="lazy" height="64">
                        <h3 class="card-title">Nerva on NonKyc</h3>
                        <p class="pair-label">Monero (XMR) pair</p>
                        <a class="btn btn-primary btn-block" href="https://nonkyc.io/market/XNV_XMR?ref=697b9a8bf1f764f0c423e239" target="_blank" rel="nofollow noopener"><span class="fas fa-exchange-alt" aria-hidden="true"></span> &nbsp;XNV – XMR</a>
                        <p class="pair-label">Tether (USDT) pair</p>
                        <a class="btn btn-primary btn-block" href="https://nonkyc.io/market/XNV_USDT?ref=697b9a8bf1f764f0c423e239" target="_blank" rel="nofollow noopener"><span class="fas fa-exchange-alt" aria-hidden="true"></span> &nbsp;XNV – USDT</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 reveal" style="--reveal-delay:.08s">
                <div class="card exchanges h-100">
                    <div class="card-body">
                        <img class="xchg-logo" src="https://nerva.one/xnv-app/uploads/2026/02/cexswap_logo.png" alt="CEXSwap exchange" loading="lazy" height="64">
                        <h3 class="card-title">Nerva on CEXSwap</h3>
                        <p class="pair-label">Monero (XMR) pair</p>
                        <a class="btn btn-primary btn-block" href="https://cexswap.cc/trade/XNV-XMR" target="_blank" rel="nofollow noopener"><span class="fas fa-exchange-alt" aria-hidden="true"></span> &nbsp;XNV – XMR</a>
                        <p class="pair-label">Bitcoin (BTC) pair</p>
                        <a class="btn btn-primary btn-block" href="https://cexswap.cc/trade/XNV-BTC" target="_blank" rel="nofollow noopener"><span class="fas fa-exchange-alt" aria-hidden="true"></span> &nbsp;XNV – BTC</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 reveal" style="--reveal-delay:.16s">
                <div class="card exchanges h-100">
                    <div class="card-body">
                        <img class="xchg-logo" src="https://nerva.one/xnv-app/uploads/2026/05/noirtrade_logo.png" alt="NoirTrade exchange" loading="lazy" height="64">
                        <h3 class="card-title">Nerva on NoirTrade</h3>
                        <p class="pair-label">Tether (USDT) pair</p>
                        <a class="btn btn-primary btn-block" href="https://noirtrade.com/trade?pair=XNV_USDT0" target="_blank" rel="nofollow noopener"><span class="fas fa-exchange-alt" aria-hidden="true"></span> &nbsp;XNV – USDT</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Exchanges End -->


<!-- ════════════════════════ DOWNLOADS ════════════════════════ -->
<div class="section light-bg" id="downloads">
    <div class="container">
        <div class="section-title reveal">
            <span class="nv-kicker">Get started</span>
            <h2>Downloads</h2>
            <p class="nv-lead">
                <span class="nv-version-pill"><b>GUI&nbsp;<?php echo GUI_VERSION; ?></b> <?php echo GUI_CODENAME; ?></span>
                <span class="nv-version-pill"><b>CLI&nbsp;<?php echo CLI_VERSION; ?></b> <?php echo CLI_CODENAME; ?></span>
            </p>
            <p class="nv-lead">Nerva One is the all-in-one wallet &amp; miner — pick your platform and you're minutes away from your first block.</p>
        </div>
        <div class="row">

            <div class="col-12 col-lg-4 reveal" data-nv-os="linux">
                <div class="card dl-card h-100">
                    <div class="card-body">
                        <div class="dl-os-head">
                            <span class="nv-icon-tile t-slate"><span class="fab fa-linux" aria-hidden="true"></span></span>
                            <div>
                                <h3 class="card-title mb-0">Linux</h3>
                                <span class="dl-sub">Apps for Linux</span>
                            </div>
                            <span class="dl-detected d-none"><span class="fas fa-check-circle" aria-hidden="true"></span> Your OS</span>
                        </div>
                        <div class="dl-group">
                            <div class="dl-group-label">For new users</div>
                            <a class="btn btn-block" href="<?php echo LINUX_GUI_LINK_X64; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Nerva One (X64)</a>
                            <a class="btn btn-block" href="<?php echo LINUX_GUI_LINK_ARM64; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Nerva One (ARM64)</a>
                        </div>
                        <div class="dl-group">
                            <div class="dl-group-label">For advanced users</div>
                            <a class="btn btn-block" href="<?php echo LINUX_CLI_LINK_X64; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Command line (X64)</a>
                            <a class="btn btn-block" href="<?php echo LINUX_CLI_LINK_ARM; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Command line (ARMV8)</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 reveal" style="--reveal-delay:.08s" data-nv-os="windows">
                <div class="card dl-card h-100">
                    <div class="card-body">
                        <div class="dl-os-head">
                            <span class="nv-icon-tile t-violet"><span class="fab fa-windows" aria-hidden="true"></span></span>
                            <div>
                                <h3 class="card-title mb-0">Windows</h3>
                                <span class="dl-sub">Apps for Windows</span>
                            </div>
                            <span class="dl-detected d-none"><span class="fas fa-check-circle" aria-hidden="true"></span> Your OS</span>
                        </div>
                        <div class="dl-group">
                            <div class="dl-group-label">For new users</div>
                            <a class="btn btn-block" href="<?php echo WINDOWS_GUI_LINK_X64; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Nerva One (X64)</a>
                            <a class="btn btn-block" href="<?php echo WINDOWS_GUI_LINK_ARM64; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Nerva One (ARM64)</a>
                        </div>
                        <div class="dl-group">
                            <div class="dl-group-label">For advanced users</div>
                            <a class="btn btn-block" href="<?php echo WINDOWS_CLI_LINK_X64; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Command line (X64)</a>
                            <a class="btn btn-block" href="<?php echo WINDOWS_CLI_LINK_X32; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Command line (X32)</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 reveal" style="--reveal-delay:.16s" data-nv-os="mac">
                <div class="card dl-card h-100">
                    <div class="card-body">
                        <div class="dl-os-head">
                            <span class="nv-icon-tile t-slate"><span class="fab fa-apple" aria-hidden="true"></span></span>
                            <div>
                                <h3 class="card-title mb-0">macOS</h3>
                                <span class="dl-sub">Apps for Mac</span>
                            </div>
                            <span class="dl-detected d-none"><span class="fas fa-check-circle" aria-hidden="true"></span> Your OS</span>
                        </div>
                        <div class="dl-group">
                            <div class="dl-group-label">For new users</div>
                            <a class="btn btn-block" href="<?php echo MAC_GUI_LINK_ARM64; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Nerva One (ARM)</a>
                            <a class="btn btn-block" href="<?php echo MAC_GUI_LINK_X64; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Nerva One (X64)</a>
                        </div>
                        <div class="dl-group">
                            <div class="dl-group-label">For advanced users</div>
                            <a class="btn btn-block" href="<?php echo MAC_CLI_LINK_ARM; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Command line (ARMV8)</a>
                            <a class="btn btn-block" href="<?php echo MAC_CLI_LINK_X64; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Command line (X64)</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="spacer"></div>

        <div class="row">

            <div class="col-12 col-lg-4 reveal" data-nv-os="android">
                <div class="card dl-card h-100">
                    <div class="card-body">
                        <div class="dl-os-head">
                            <span class="nv-icon-tile t-green"><span class="fab fa-android" aria-hidden="true"></span></span>
                            <div>
                                <h3 class="card-title mb-0">Android</h3>
                                <span class="dl-sub">Apps for Android</span>
                            </div>
                            <span class="dl-detected d-none"><span class="fas fa-check-circle" aria-hidden="true"></span> Your OS</span>
                        </div>
                        <div class="dl-group">
                            <div class="dl-group-label">For new users</div>
                            <a class="btn btn-block" href="<?php echo ANDROID_GUI_LINK_ARM; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Nerva One (ARM)</a>
                        </div>
                        <div class="dl-group">
                            <div class="dl-group-label">For advanced users</div>
                            <a class="btn btn-block" href="<?php echo ANDROID_CLI_LINK_ARM; ?>"><span class="fa fa-download" aria-hidden="true"></span> &nbsp;Command line (ARM)</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 reveal" style="--reveal-delay:.08s">
                <div class="card dl-card h-100">
                    <div class="card-body">
                        <div class="dl-os-head">
                            <span class="nv-icon-tile t-slate"><span class="fab fa-github" aria-hidden="true"></span></span>
                            <div>
                                <h3 class="card-title mb-0">Source code</h3>
                                <span class="dl-sub">Nerva project repositories</span>
                            </div>
                        </div>
                        <div class="dl-group">
                            <div class="dl-group-label">Build from source</div>
                            <a class="btn btn-block" href="https://github.com/nerva-project" target="_blank" rel="noopener"><span class="fab fa-github" aria-hidden="true"></span> &nbsp;GitHub — nerva-project</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 reveal" style="--reveal-delay:.16s">
                <div class="card dl-card h-100">
                    <div class="card-body">
                        <div class="dl-os-head">
                            <span class="nv-icon-tile t-amber"><span class="far fa-file-archive" aria-hidden="true"></span></span>
                            <div>
                                <h3 class="card-title mb-0">Other</h3>
                                <span class="dl-sub">Extras &amp; utilities</span>
                            </div>
                        </div>
                        <div class="dl-group">
                            <div class="dl-group-label">Bootstrap a node fast</div>
                            <a class="btn btn-block" href="<?php echo QUICKSYNC_LINK; ?>"><span class="fas fa-bolt" aria-hidden="true"></span> &nbsp;QuickSync — blockchain snapshot</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Downloads End -->

<!-- ════════════════════════ PAPER WALLET ════════════════════════ -->
<div class="section" id="paper-wallet">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 reveal">
                <span class="nv-kicker">Cold storage</span>
                <h2>Paper wallet</h2>
                <p class="nv-lead mb-4">
                    Just looking to buy some NERVA and stash it away? Generate a paper wallet —
                    your keys are created locally in your browser and never leave this page.
                </p>
                <button class="btn btn-primary btn-lg" type="button" id="generate_paper_wallet">
                    <span class="fas fa-key" aria-hidden="true"></span> &nbsp;Generate wallet
                </button>
                <div class="nv-warn">
                    <span class="fas fa-exclamation-triangle" aria-hidden="true"></span>
                    <span>Always verify your paper wallet before transferring funds. If the keys are wrong or lost, funds cannot be recovered.</span>
                </div>
            </div>
            <div class="col-lg-6 reveal">
                <div class="mission-figure hide-below-768">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nerva-paper-wallet.png" alt="Nerva paper wallet illustration" loading="lazy">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="paperwallet_result"></div>
            </div>
        </div>
    </div>
</div>
<!-- Paper Wallet Ends -->


<!-- ════════════════════════ MINING ════════════════════════ -->
<div class="section light-bg" id="mining">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 reveal d-none d-lg-block">
                <div class="mission-figure">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nerva-start-mining-colored.png" alt="Start mining Nerva illustration" loading="lazy">
                </div>
            </div>
            <div class="col-lg-6 reveal">
                <span class="nv-kicker">Mining</span>
                <h2>Start mining in minutes</h2>
                <p class="nv-lead mb-4">
                    Nerva is super easy to mine. No extra software, no pool setup, no configuration files —
                    download NervaOne, click start, and your CPU does the rest.
                </p>
                <div class="dl-group">
                    <a href="<?php echo MINING_GUI_LINK; ?>" class="btn btn-primary btn-block" target="_blank" rel="noopener">GUI mining tutorial <small>(new users)</small></a>
                    <a href="<?php echo MINING_CLI_LINK; ?>" class="btn btn-primary btn-block" target="_blank" rel="noopener">CLI mining tutorial <small>(advanced users)</small></a>
                </div>
                <div class="dl-group">
                    <div class="dl-group-label">Estimate your rewards</div>
                    <a class="btn btn-block" href="https://nerva.one/nerva-mining-profitability-calculator/" target="_blank" rel="nofollow noopener"><span class="fas fa-calculator" aria-hidden="true"></span> &nbsp;Nerva mining calculator</a>
                    <a class="btn btn-block" href="https://www.cryptunit.com/coin/XNV?hr=1000" target="_blank" rel="nofollow noopener"><span class="fas fa-chart-line" aria-hidden="true"></span> &nbsp;CryptUnit calculator</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mining Ends -->


<!-- ════════════════════════ SOCIAL ════════════════════════ -->
<div class="section" id="stay-tuned">
    <div class="container">
        <div class="section-title reveal">
            <span class="nv-kicker">Community</span>
            <h2>Join the conversation</h2>
            <p class="nv-lead">Nerva is built by its community — ask questions, share ideas, or just hang out.</p>
        </div>
        <div class="social-channels reveal">
            <div class="nv-social-row">
                <a href="https://discord.gg/ufysfvcFwe" class="nv-social s-discord" target="_blank" rel="noopener">
                    <span class="nv-social-ico"><span class="fab fa-discord" aria-hidden="true"></span></span>
                    Discord
                </a>
                <a href="https://twitter.com/NervaCurrency" class="nv-social s-twitter" target="_blank" rel="noopener">
                    <span class="nv-social-ico"><span class="fab fa-twitter" aria-hidden="true"></span></span>
                    X / Twitter
                </a>
                <a href="https://t.me/NervaCrypto" class="nv-social s-telegram" target="_blank" rel="noopener">
                    <span class="nv-social-ico"><span class="fab fa-telegram-plane" aria-hidden="true"></span></span>
                    Telegram
                </a>
                <a href="https://www.youtube.com/channel/UC84v_i1iNZrLUUA9XbhuCAQ" class="nv-social s-youtube" target="_blank" rel="noopener">
                    <span class="nv-social-ico"><span class="fab fa-youtube" aria-hidden="true"></span></span>
                    YouTube
                </a>
                <a href="https://www.reddit.com/r/NervaCrypto/" class="nv-social s-reddit" target="_blank" rel="noopener">
                    <span class="nv-social-ico"><span class="fab fa-reddit-alien" aria-hidden="true"></span></span>
                    Reddit
                </a>
                <a href="https://github.com/nerva-project" class="nv-social s-github" target="_blank" rel="noopener">
                    <span class="nv-social-ico"><span class="fab fa-github" aria-hidden="true"></span></span>
                    GitHub
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Social Networks End -->


<!-- ════════════════════════ FAQ ════════════════════════ -->
<div class="section light-bg" id="faq">
    <div class="container">
        <div class="section-title reveal">
            <span class="nv-kicker">Support</span>
            <h2>Frequently asked questions</h2>
        </div>

        <div class="accordion_one reveal">
            <div class="panel-group" id="accordionFourLeft">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a data-toggle="collapse" data-target="#collapseFiveLeftone" href="#close" aria-expanded="false" class="collapsed"> Where can I find the documentation of Nerva? </a> </h3>
                    </div>
                    <div id="collapseFiveLeftone" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                        <div class="panel-body">
                            <div class="text-accordion">
                                <p>Please refer to the documentation: <a href="https://docs.nerva.one/" target="_blank" rel="noopener">Nerva Wiki</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a class="collapsed" data-target="#collapseFiveLeftTwo" data-toggle="collapse" href="#close" aria-expanded="false"> How can I check the balance of a paper wallet? </a> </h3>
                    </div>
                    <div id="collapseFiveLeftTwo" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                        <div class="panel-body">
                            <div class="text-accordion">
                                <p>
                                    To check a paper wallet's balance you have to restore the wallet: <a href="https://docs.nerva.one/guides/cli/#restoring-a-wallet" target="_blank" rel="noopener">Restoring a wallet</a>.
                                    <br />
                                    There is no way to check a balance offline because Nerva is a privacy coin.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a class="collapsed" data-target="#collapseFiveLeftThree" data-toggle="collapse" href="#close" aria-expanded="false"> How can I calculate my mining rewards? </a> </h3>
                    </div>
                    <div id="collapseFiveLeftThree" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                        <div class="panel-body">
                            <div class="text-accordion">
                                <p>Use the <a href="https://www.cryptunit.com/coin/XNV" target="_blank" rel="nofollow noopener">mining calculator from CryptUnit</a> or our own <a href="https://nerva.one/nerva-mining-profitability-calculator/">Nerva mining calculator</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a class="collapsed" data-target="#collapseFiveLeftFour" data-toggle="collapse" href="#close" aria-expanded="false"> Are there any video tutorials to start mining? </a> </h3>
                    </div>
                    <div id="collapseFiveLeftFour" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                        <div class="panel-body">
                            <div class="text-accordion">
                                <p>Yes, check out the <a href="https://www.youtube.com/channel/UC84v_i1iNZrLUUA9XbhuCAQ/playlists" target="_blank" rel="noopener">Nerva YouTube channel</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a class="collapsed" data-target="#collapseFiveLeftFive" data-toggle="collapse" href="#close" aria-expanded="false"> Is there any other chart than the one from TradeOgre for Nerva (XNV)? </a> </h3>
                    </div>
                    <div id="collapseFiveLeftFive" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                        <div class="panel-body">
                            <div class="text-accordion">
                                <p>Yes, check out the <a href="https://charts.cointrader.pro/charts.html?coin=NERVA%3ABTC" target="_blank" rel="nofollow noopener">Nerva coin chart on Cointrader</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a class="collapsed" data-target="#collapseFiveLeftSix" data-toggle="collapse" href="#close" aria-expanded="false"> What's the max supply of Nerva? </a> </h3>
                    </div>
                    <div id="collapseFiveLeftSix" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                        <div class="panel-body">
                            <div class="text-accordion">
                                <p>There will be around 18.5 million coins issued before "tail emission" occurs, which is a small 1% annual inflation to keep miners incentivized, replace lost coins and provide future liquidity.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a class="collapsed" data-target="#collapseFiveLeftSeven" data-toggle="collapse" href="#close" aria-expanded="false"> Where on my machine is the Nerva blockchain stored? </a> </h3>
                    </div>
                    <div id="collapseFiveLeftSeven" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                        <div class="panel-body">
                            <div class="text-accordion">
                                <p>Windows: <code>C:\ProgramData\nerva</code>
                                    <br />
                                    Linux: <code>~/.nerva</code></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a class="collapsed" data-target="#collapseFiveLeftEight" data-toggle="collapse" href="#close" aria-expanded="false"> My question is not covered here — what should I do? </a> </h3>
                    </div>
                    <div id="collapseFiveLeftEight" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                        <div class="panel-body">
                            <div class="text-accordion">
                                <p>Please join our <a href="https://discord.gg/ufysfvcFwe">active Discord forum</a> and ask for help.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end of /.panel-group-->
        </div>
    </div>
</div>
<!-- FAQ Ends -->


<!-- ════════════════════════ FINAL CTA ════════════════════════ -->
<div class="section" id="get-started">
    <div class="container">
        <div class="nv-cta-band reveal">
            <h2>Your CPU is already a miner.</h2>
            <p>Download Nerva One, keep your keys in your hands, and be part of a network where every computer counts equally.</p>
            <div class="hero-cta" style="justify-content:center;">
                <a href="#downloads" class="btn btn-primary btn-lg"><span class="fas fa-download" aria-hidden="true"></span> Get Nerva One</a>
                <a href="https://discord.gg/ufysfvcFwe" class="btn btn-ghost btn-lg" target="_blank" rel="noopener"><span class="fab fa-discord" aria-hidden="true"></span> Join Discord</a>
            </div>
        </div>
    </div>
</div>
<!-- Final CTA Ends -->


</div>
