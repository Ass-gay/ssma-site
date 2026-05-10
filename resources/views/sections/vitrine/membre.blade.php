<!-- Section membre -->
     <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="stats-board">

                <!-- Membres -->
                <article class="stat-tile">
                    <div class="tile-head">
                    <i class="bi bi-people-fill"></i>
                    <div class="label">
                        <h6 class="title">Membres</h6>
                        <small class="hint">Communauté active SSMA</small>
                    </div>
                    </div>
                    <div class="tile-metric">
                    <span class="metric-number purecounter"
                            data-purecounter-start="0"
                            data-purecounter-end="{{ $membresCount }}"
                            data-purecounter-duration="2"></span>
                    <span class="metric-suffix">+</span>
                    </div>
                </article>

                <!-- Médias -->
                <article class="stat-tile">
                    <div class="tile-head">
                        <i class="bi bi-images"></i>

                        <div class="label">
                            <h6 class="title">Médias</h6>
                            <small class="hint">Galerie SSMA</small>
                        </div>
                    </div>

                    <div class="tile-metric">

                        <span class="metric-number purecounter"
                            data-purecounter-start="0"
                            data-purecounter-end="{{ $mediaCount }}"
                            data-purecounter-duration="2"></span>

                        <span class="metric-suffix">+</span>

                    </div>
                </article>

                <!-- Events -->
                <article class="stat-tile">
                    <div class="tile-head">

                        <i class="bi bi-calendar-event"></i>

                        <div class="label">
                            <h6 class="title">Événements</h6>
                            <small class="hint">Activités organisées</small>
                        </div>

                    </div>

                    <div class="tile-metric">

                        <span class="metric-number purecounter"
                            data-purecounter-start="0"
                            data-purecounter-end="{{ $eventsCount }}"
                            data-purecounter-duration="2"></span>

                        <span class="metric-suffix">+</span>

                    </div>
                </article>

                </div>
            </div>
            </div>

        </div>

    </section>
