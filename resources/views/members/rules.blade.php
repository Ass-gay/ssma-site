<!-- ================== SECTION HEAD ================== -->
 @include("sections.vitrine.head")

<!-- ================== SECTION HEADER ================== -->
@include("sections.vitrine.header")

<link rel="stylesheet" href="{{ asset('css/rules.css') }}">

{{-- Baniere --}}
<div class="ssma-hero">
    <div class="overlay"></div>

    <div class="hero-text">
        <h1>Tu peux devenir membre SSMA</h1>
        <p>Rejoins l'association et participe aux activités spirituelles et sociales</p>
    </div>
</div>

{{-- Titre --}}
<div class="title-wrapper">
    <h2 class="title-section">Règlement pour adhérer à SSMA</h2>
</div>

{{-- Audio --}}
<div class="ssma-audio-box">
    <audio controls>
        <source src="{{ asset('audio/audio.ogg') }}" type="audio/mpeg">
        Votre navigateur ne supporte pas l'audio.
    </audio>
</div>

{{-- Regle --}}
<div class="rules-container">

    <h4>Article 1: Croyance et adhésion</h4>
    <p>Les membres doivent adhérer aux croyances et principes fondamentaux de l'association SSMA.</p>

    <h4>Article 2: Respect et tolérance</h4>
    <p>Les membres doivent respecter les croyances et opinions des autres membres.</p>

    <h4>Article 3: Engagement</h4>
    <p> Les membres doivent s'engager à participer activement aux activités et événements organisés par l'association, dans la mesure du possible.</p>

    <h4>Article 4: Confidentialité</h4>
    <p>Les discussions et informations partagées dans le groupe WhatsApp doivent rester confidentielles et ne doivent pas être divulguées à des tiers sans autorisation.</p>

    <h4>Article 5: Comportement approprié</h4>
    <p>Les membres doivent adopter un comportement respectueux et courtois dans toutes les interactions avec les autres membres, que ce soit en personne ou en ligne.</p>

    <h4>Article 6: Conformité aux lois et règlements</h4>
    <p>Les membres doivent respecter toutes les lois et réglementations en vigueur dans leur section concernant les activités religieuses.</p>

    <h4>Article 7: Cotisation</h4>
    <p>Les membres peuvent être tenus de payer une cotisation mensuelle de 500 francs CFA pour soutenir les activités de l'association, si cela est décidé par les responsables</p>

    <h4>Article 8: Procédure de résolution des conflits</h4>
    <p>En cas de conflit ou de désaccord entre les membres, ceux-ci doivent chercher à le résoudre de manière pacifique et respectueuse, en suivant les procédures établies par l'association.</p>

    <h4>Article 9: Carte de membre</h4>
    <p>Les membres doivent s'acquitter de 2000 francs CFA pour obtenir leur carte de membre de l'association SSMA, En plus de la carte de membre, les membres peuvent être tenus de payer 5000 francs CFA pour leur tenue (Lacoste) de l'association
    </p>

</div>

{{-- accepter --}}
<div class="accept-box">
    <a href="{{ route('members.form') }}" class="btn-accept">
        J’accepte les conditions
    </a>
</div>

<!-- ================== SECTION FOOTER ================== -->
@include("sections.vitrine.footer")

<!-- ================== SECTION SCROLL TOP ================== -->
@include("sections.vitrine.scroll")

<!-- Preloader -->
<div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<!-- ================== SECTION SCRIPT ================== -->
@include("sections.vitrine.script")