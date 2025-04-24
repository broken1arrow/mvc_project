<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* ./page/report.html.twig */
class __TwigTemplate_27ab49a29ef5f63a5f7ade64e5cde754 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "./page/report.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "./page/report.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "./page/report.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 3, $this->source); })()), "html", null, true);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        yield "
<main>
    <div style=\"display: inline-flex;flex-direction: column;justify-items: center;align-items: center;\">


        <h1>Report</h1>
        <div class=\"sections\">
            <section>
                <details id=\"kmom01\">
                    <summary>Click! Kmom01 </summary>
                    <h3>Berätta kort om dina förkunskaper och tidigare erfarenheter kring objektorientering.
                    </h3>
                    <p>Har hållit på med Java i flera år, kan se vad jag gjort senast här: <a
                            href=\"https://github.com/broken1arrow/Utility-Library/blob/main/Database/src/main/java/org/broken/arrow/database/library/MainTestingSQL.java\">
                            Här kan du se lite exempel vad jag testat att göra med just SQL
                        </a>
                        Samt har du just huvuddelen av logiken: <a
                            href=\"https://github.com/broken1arrow/Utility-Library/tree/main/Database/src/main/java/org/broken/arrow/database/library/core\">
                            Huvuddelen av just denna modul.
                        </a>
                    </p>
                    <p>Som sagt jag har tagit min samlade kunskap och försökt göra enkelt gränssnitt där du inte
                        behöver oroa dig över du inte fått till syntax rätt. Den även sätter paranteser runt
                        where till exempel \"where (some = ? and else = ?) or cake = ?\" även hanterar query
                        kommand inne i ett query kommand på enkekt sätt. Så bland annat mixat in del av vad jag lärt mig
                        genom kursen. Men det är inget att komma med om man jämför med detta <a
                            href=\"https://www.jooq.org\"> www.jooq.org</a>, var en som tipsade om detta biblotek och det
                        är på helt annan nivå än vad jag gjort.
                    </p>
                    <p>Vidare till just erfaranheter, så vet jag att de nämndes på kursen att Javascript döptes om för
                        de är liknande Java. Skulle säga att PHP ligger närmare i så fall. Dels för det finns hårt
                        typade klasser. Men de språk jag gillar och samtidigt inte tycker om är Kotlin. Hatar man se
                        massa kod är detta språk perfekt, data klasser och hur den kastar ojeckt till viss klass är
                        betydligt bättre än i java.
                    </p>
                    <p>De har blivit mycket bättre i Java 16/17+, men finns inget
                        motsvarande Data klassen i Kotlin. Record är inte riktigt samma sak där du bara sätter värden
                        när den skapas, helt enkeklt immutable. De jag inte gillar med Kotlin är att du måste använda
                        speciell list och map klass för kunna lägga till ny data efter den skapas. Sen att Kotlin
                        använder [] som PHP och Javascript i stället för en get() för map i flesta lägen gör det något
                        förvirande (är van från Java det är just Array som bara acceptera intrigers).
                    </p>
                    <p>Just med public, protected och private. så kör jag sällan något annat än just private på fields.
                        Har en setter om detta ska ändras senare i så fall. Just protected I Java och tror det gäller
                        även Kotlin (vet inte hur det är i PHP). Så måste alla klasser vara i samma folder/map/packet
                        för man ska kunna använda just protected eller vara en subklass/child klass.
                    </p>
                    <h3>Berätta kort om PHPs modell för klasser och objekt. Vilka är de grunder man behöver veta/förstå
                        för att kunna komma igång och skapa sina första klasser?
                    </h3>
                    <p>Och detta ska vara kort? Nu var det runt 4 år sen jag började min resa. Men första setget är att
                        förstå constructors funtion och hur man använder den. De jag visade högre upp i mitt eget github
                        project, körde jag mycket med dependency injections just för slutanvändaren ska bara få methoder
                        han behöver för skapa ett SQL kommando inget annat (nu behövde jag också några getters inte helt
                        relaterade till just skapande av kommandot, men mest göra det enkeklt att komma åt viss data).
                        Något flesta kan svårt att greppa sen just variabler och fields och klass objekts dessa kräver.
                        Även methods ihop med variabler coh return värden eller void (som java kör med, där andra språk
                        inte har det tydligt skrivet).
                    </p>
                    <p> Så bara förstå sig på så enkeklt sak som hämnta ett klass objekt från annan klass och hur datan
                        laddas, jag körde mycket med static singelton pattern, med den klasiska getInstance(). Så det
                        finns hel del att packa upp, när man ska lära sig ett programerinspråk för första gången.
                    </p>
                    <h3>Reflektera kort över den kodbas, koden, strukturen som användes till uppgiften me/report, hur
                        uppfattar du den?na första klasser?
                    </h3>
                    <p>Det fanns bara knapändigt med information för ens komma igång, just PHP var inte den svåra biten,
                        utan helt saknades en enkel komma igång guiede som tidigare uppgifter på denna kursen för just
                        Symfony. Den officella sidan för Symfony påminner om den wiki för mongodb
                        <a href=\"https://www.mongodb.com/docs/drivers/java/sync/current/get-started/\">
                            www.mongodb.com</a> är mer gjort för sånna som redan är insatta i just dessa API:er. Än för
                        vanligt folk, kod exemplen i Symfony är utspridd utan någon samanfattning och sen länkars det
                        inte till korekt info att vi ska använda just composer och PHP. Samt hur man ska göra. Vidare så
                        har jag
                        ingen aning om hur klasser ska laddas automatiskt, du visade lite info i videon. Men inte
                        hur det funkar när vi använder denna setup när detta sköts automatiskt med hjälp av composer
                        (vist man ska in och pilla i en fil men inte mycket mer).
                    </p>
                    <p>Lite mer text om detta hade varit bra hur det fungerar, om detta måste ändras eller fungerar out
                        of the box. Men
                        märkte att den hittade min klass så länge namespace börjar med App/ i alla fall, men har än så
                        länge bara en fil. Så vet inte än om jag kan komma åt andra klasser, men jag är nöjd så länge de
                        fungerar. Det är något som har genomsyrat hela kursen från i höstas, finns mycket otydlighet och
                        känns inte som bra ide slänga in ena ramverket efter de andra utan upstyrd struktur. De första
                        ramverket Pico var total kaos med halfungerande kod och varken ramverket eller Github behövde
                        inte ens användas för få betyg.
                    </p>
                    <p> Express fungerade mycket bättre, för de var inte tillkrånglat och behövde inte heller ta hänsyn
                        till de fungerar på skolservern. När man fick igång Symfony så fungerar de hyfsat, men få till
                        style och just alla sidor att fungera var del pill och just instalationen fick jag ta till andra
                        källor än just dbwebb.se. För den gav inte mycket information hur man satte upp route, inte i en
                        text förklaring i alla fall. Utan man får läsa koden på github i så fall. Men hittade vägar för
                        få allt förklarat hur de fungerar och testat mig fram. Vidare är ju problemet att Symfony
                        tydligen inte hittar vissa filer och de inte fungerar på skolservern, men har plan B i så fall
                        om ni inte laddar hem detta som i tidigare uppgift.
                    </p>
                    <p> För jag kommer inte spendera timmar på testa mig fram vad som skulle fungera på
                        skolservern.Skulle inte min plan B uppskattas tar jag till plan C. Just till koden fick jag ta
                        till egena källor för lära mig hur man sätter upp Symfony, men vissa saker som style fick jag ta
                        till mindre officella knep för få de att laddas in.
                    </p>
                    <h3>Med tanke på artikeln “PHP The Right Way”, vilka delar in den finner du extra intressanta och
                        värdefulla? Är det några särskilda områden som du känner att du vill veta mer om? Lyft fram
                        några delar av artikeln som du känner mer värdefulla.
                    </h3>
                    <p>Nu har jag redan jobba med programering, så har lite kännsla hur man ska jobba. Sen om de är rätt
                        för detta språk är ju inte lätt att svara på. Brukar inte normalt stöta på problem hur jag
                        jobbar med vist språk. Sen finns det garanterat åsikter om vad för methoder man ska använda och
                        man inte bör använda vissa methoder/funtioner för dessa äter prestanda (dock vanligare i ett API
                        detta kan vara ett problem).
                    </p>
                    <h3>Vilken har du lärt dig i denna kursdelen?
                    </h3>
                    <p>Ja de är ente enkeklt att sätta upp jämfört med Express. Sen att instruktionerna är fortfarande
                        vaga, om inte än värre än tidigare kursdelar har gjort de svårare att sätta upp detta projekt.
                        Som man säger skit in och skit ut.
                    </p>
                </details>
            </section>
            <section>
                <details id=\"kmom02\">
                    <summary>Click! Kmom02 </summary>
                    <h3>Förklara kort de objektorienterade konstruktionerna arv, komposition, interface och trait och
                        hur de används i PHP.
                    </h3>
                    <p>Är bättre vi håller oss till de engelska orden inheritance, composition och interface. Nu när man
                        hållit på så länge så associerar jag inte mitt kodbyggande med namn på mönstret. Bland annat
                        code
                        patterns där det finns build pattern, factory pattern, observer pattern osv. Samma sak är det
                        just med dessa tre, de jag bryr mig om är extends/implements och interface bland annat. Just för
                        dessa är nykelord för bygga valid klass. För du kan inte skriva \"public class something
                        inheritance another\". Just composition är inget jag hört förrut som benämning, utan jag använder
                        de utan att tänka på de har något speciellt namn.
                    </p>
                    <p> Men kort förklaring om inheritance, är att du har en huvudklass (Parent) med methoder/funtioner
                        som ska vara basen för en funtion, sen kanske du vill utöka funtionen. Jag tar det klasiska
                        exemplet med former. Du kanske vill kuna rita alternativt beräkna inte bara fyrkanter, utan
                        också cirklar och rektanglar. Så för minska dubliterande kod där alla objekt delar samma färg
                        eller matimakisk formel. Men kan också vara methoder som antingen du måste ta med i din class
                        (klassen är då abstract, tar detaljer om interface senare) eller vill skriva över i din sub
                        class (child) för ska rita en korrekt cirkel eller beräkna cirekln korrekt. Nu är detta mesta
                        erfarenheter i Java, men PHP bör inte skilja sig så mycket på denna punkten. Så också kul sak i
                        dokumentationen https://www.php.net/manual/en/language.oop5.inheritance.php \" When you define a
                        class with abstract, any attempt to instantiate a separate instance of it will result in a fatal
                        error\" detta går utmärkt att göra i Java, så vet inte om de någon som inte har koll eller unikt
                        för PHP.
                    </p>
                    <p>Just composition hade jag omöjligt kunnat svara på utan en google sökning (första hade varit svår
                        utan någon ledtråd men denna är värre). Helt enkelt en klass har en eller flera
                        koppling/förhållande till en eller flera andra klasser. Men denna koppling är inte lika stark
                        som just inheritance. Största skillnaden är du kan bara ha en inheritance i varje klass (sett
                        lite olika rund detta, men utgår ifrån Java).
                    </p>
                    <p> Just interface, är något jag använder hel del när bygger API för andra ska komma åt methoder
                        från externt/annat program smidigt. Har inte testat detta i PHP, men i Java kan du bygga de som
                        en abstrakt klass bortsett från konstruktorn. Vissa anser just default var ett misstag att
                        implementera. Verkar inte finnas något liknande PHP ännu, men de verkar som du kan sätta en
                        konstruktor. Vidare finns de inte någon begränsning hur många interface en klass kan ha, så man
                        kan komma runt problemet med inheritance, genom att använda interface. Utöver detta så är tanken
                        den ska innehålla metoder din klass ska implementera och beronde på implementering så brukar man
                        kalla (invoke) dessa methoder/funtioner i koden just från interface och många gånger har väg för
                        dig att registera dina klassar som implementera just detta interface. Men finns ju andra områden
                        man kan använda interface också, men är de vanligaste jag använder den till och sen bygga egen
                        lambda function/consumer.
                    </p>
                    <p>Får inte glömma trait, har ingen efarnehet av denna. Så har inte testat den, för kunna se vad
                        för nytta denna har. De har inte behövts för utföra denna uppgioften i alla fall, kanske hade
                        gjort koden snyggare.
                    </p>
                    <h3>Berätta om din implementation från uppgiften. Hur löste du uppgiften, är du nöjd/missnöjd,
                        vilken förbättringspotential ser du i din koden och dina klasser?
                    </h3>
                    <p> Ni lär inte bli nöjda i alla fall, löste de enkeklt med 1 sida. De andra sidorna är mer dit
                        lagda för inte orsaka felmeddelanden. förutom cache delen, som fungerar fint. Vet inte hur max
                        och min är tänkt fungera, men du kommer inte kunna dra mer än den mängt kort som finns kvar (så
                        även om du försöker över max mängd kommer den inte gå över mängden kort du har kvar). Behövdes
                        inte mycket kod för lösa uppgiften, mesta tiden tog skapandet av arrayen med kort och få till
                        knapparna och lösa hur man skulle få knapparna fungera. Krävdes lite mer för få just min och max
                        fungera, dock vet jag inte hur URL alternativet ska fungera realistiskt, så de finns inte som
                        alternativ just nu.
                    </p>
                    <p>Är svårt att bättra på koden, när man inte har mycket kod eller logik. Är bara enkel array eller
                        som jag skulle kalla de \"map\" just för de har en nykel och inte bara ett värde. Ett övergripande
                        drag över denna kursen har varit bristfälligt med information. Så man har fått själv fylla i
                        hålen och som sagt en som jobbat hel del med just kod väljer oftas den kortaste vägen till
                        mål. Inte krånglar till saker i onödan.
                    </p>
                    <h3>Vilka är dina reflektioner så här långt med att jobb i Symfony med applikationskod enligt MVC?
                    </h3>
                    <p>Är bättre än förra ramverket Pico, är renare och färre buggar. Men fungerar ju inte bättre på
                        skolservern, Så får väl gå över till klasiska vägen och skriva sidorna som jag gjort tidigare
                        med just ren html och php. Men kommer kräva mer jobb och vet inte hur man ska hinna med de
                        relalistiskt. För verkar just nu vara de stabilaste alternativet för få allt att faktiskt
                        fungera.
                    </p>
                    <h3>Vilken har du lärt dig i denna kursdelen?
                    </h3>
                    <p>Jag har inte lärt mig så mycket nytt, men vist vissa delar har man fått lite mer informartion om.
                        Jag
                        har inte rört trait, känns lite som en utility class, där man har statiska methoder. Känns ju
                        lite knölare än att jobba med sådant i Java där man kan direkt göra methoderna statiska. Ju mer
                        jag kollar in just trait, känns det mer som ett hack. Jag hade använt composition och kan enkelt
                        återanvända den klassen till andra klasser, den klassen kan ju i sin tur använda interface eller
                        inheritance om så behövs. Du ser ju hur lite faktisk kod som behövs för just dessa simpla
                        funtioner, ser just för dessa delar att de behövs massa små klasser. De kanske behövs i fall man
                        ska bygga ut detta ytterligare. Jag håller de kort och enkeklt, för de gillades inte sist när
                        jag gjorde verktyg för kunna jobba snabbt och smidigt (jag vet inte exakt vad som jag borde
                        gjort om, men men).
                    </p>
                </details>
            </section>
            <section>
                <details id=\"kmom03\">
                    <summary>Click! Kmom03 </summary>
                    <h3>
                    </h3>
                </details>
            </section>
            <section>
                <details id=\"kmom04\">
                    <summary>Click! Kmom04 </summary>
                    <h3>
                    </h3>
                </details>
            </section>
            <section style=\"margin-bottom: 1em;\">
                <details id=\"kmom05\">
                    <summary>Click! Kmom04 </summary>
                    <h3>
                    </h3>
                </details>
            </section>
        </div>
    </div>
</main>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 245
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_script(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "script"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "script"));

        // line 246
        yield "
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const hash = window.location.hash;
        if (hash) {
            const selected = document.querySelector(hash);
            if (selected && selected.tagName.toLocaleLowerCase() == 'details') {
                setTimeout(() =>
                    selected.open = true
                    , 300)
            }
        }

    });
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "./page/report.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  363 => 246,  350 => 245,  103 => 7,  90 => 6,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{title}}
{% endblock %}

{% block body %}

<main>
    <div style=\"display: inline-flex;flex-direction: column;justify-items: center;align-items: center;\">


        <h1>Report</h1>
        <div class=\"sections\">
            <section>
                <details id=\"kmom01\">
                    <summary>Click! Kmom01 </summary>
                    <h3>Berätta kort om dina förkunskaper och tidigare erfarenheter kring objektorientering.
                    </h3>
                    <p>Har hållit på med Java i flera år, kan se vad jag gjort senast här: <a
                            href=\"https://github.com/broken1arrow/Utility-Library/blob/main/Database/src/main/java/org/broken/arrow/database/library/MainTestingSQL.java\">
                            Här kan du se lite exempel vad jag testat att göra med just SQL
                        </a>
                        Samt har du just huvuddelen av logiken: <a
                            href=\"https://github.com/broken1arrow/Utility-Library/tree/main/Database/src/main/java/org/broken/arrow/database/library/core\">
                            Huvuddelen av just denna modul.
                        </a>
                    </p>
                    <p>Som sagt jag har tagit min samlade kunskap och försökt göra enkelt gränssnitt där du inte
                        behöver oroa dig över du inte fått till syntax rätt. Den även sätter paranteser runt
                        where till exempel \"where (some = ? and else = ?) or cake = ?\" även hanterar query
                        kommand inne i ett query kommand på enkekt sätt. Så bland annat mixat in del av vad jag lärt mig
                        genom kursen. Men det är inget att komma med om man jämför med detta <a
                            href=\"https://www.jooq.org\"> www.jooq.org</a>, var en som tipsade om detta biblotek och det
                        är på helt annan nivå än vad jag gjort.
                    </p>
                    <p>Vidare till just erfaranheter, så vet jag att de nämndes på kursen att Javascript döptes om för
                        de är liknande Java. Skulle säga att PHP ligger närmare i så fall. Dels för det finns hårt
                        typade klasser. Men de språk jag gillar och samtidigt inte tycker om är Kotlin. Hatar man se
                        massa kod är detta språk perfekt, data klasser och hur den kastar ojeckt till viss klass är
                        betydligt bättre än i java.
                    </p>
                    <p>De har blivit mycket bättre i Java 16/17+, men finns inget
                        motsvarande Data klassen i Kotlin. Record är inte riktigt samma sak där du bara sätter värden
                        när den skapas, helt enkeklt immutable. De jag inte gillar med Kotlin är att du måste använda
                        speciell list och map klass för kunna lägga till ny data efter den skapas. Sen att Kotlin
                        använder [] som PHP och Javascript i stället för en get() för map i flesta lägen gör det något
                        förvirande (är van från Java det är just Array som bara acceptera intrigers).
                    </p>
                    <p>Just med public, protected och private. så kör jag sällan något annat än just private på fields.
                        Har en setter om detta ska ändras senare i så fall. Just protected I Java och tror det gäller
                        även Kotlin (vet inte hur det är i PHP). Så måste alla klasser vara i samma folder/map/packet
                        för man ska kunna använda just protected eller vara en subklass/child klass.
                    </p>
                    <h3>Berätta kort om PHPs modell för klasser och objekt. Vilka är de grunder man behöver veta/förstå
                        för att kunna komma igång och skapa sina första klasser?
                    </h3>
                    <p>Och detta ska vara kort? Nu var det runt 4 år sen jag började min resa. Men första setget är att
                        förstå constructors funtion och hur man använder den. De jag visade högre upp i mitt eget github
                        project, körde jag mycket med dependency injections just för slutanvändaren ska bara få methoder
                        han behöver för skapa ett SQL kommando inget annat (nu behövde jag också några getters inte helt
                        relaterade till just skapande av kommandot, men mest göra det enkeklt att komma åt viss data).
                        Något flesta kan svårt att greppa sen just variabler och fields och klass objekts dessa kräver.
                        Även methods ihop med variabler coh return värden eller void (som java kör med, där andra språk
                        inte har det tydligt skrivet).
                    </p>
                    <p> Så bara förstå sig på så enkeklt sak som hämnta ett klass objekt från annan klass och hur datan
                        laddas, jag körde mycket med static singelton pattern, med den klasiska getInstance(). Så det
                        finns hel del att packa upp, när man ska lära sig ett programerinspråk för första gången.
                    </p>
                    <h3>Reflektera kort över den kodbas, koden, strukturen som användes till uppgiften me/report, hur
                        uppfattar du den?na första klasser?
                    </h3>
                    <p>Det fanns bara knapändigt med information för ens komma igång, just PHP var inte den svåra biten,
                        utan helt saknades en enkel komma igång guiede som tidigare uppgifter på denna kursen för just
                        Symfony. Den officella sidan för Symfony påminner om den wiki för mongodb
                        <a href=\"https://www.mongodb.com/docs/drivers/java/sync/current/get-started/\">
                            www.mongodb.com</a> är mer gjort för sånna som redan är insatta i just dessa API:er. Än för
                        vanligt folk, kod exemplen i Symfony är utspridd utan någon samanfattning och sen länkars det
                        inte till korekt info att vi ska använda just composer och PHP. Samt hur man ska göra. Vidare så
                        har jag
                        ingen aning om hur klasser ska laddas automatiskt, du visade lite info i videon. Men inte
                        hur det funkar när vi använder denna setup när detta sköts automatiskt med hjälp av composer
                        (vist man ska in och pilla i en fil men inte mycket mer).
                    </p>
                    <p>Lite mer text om detta hade varit bra hur det fungerar, om detta måste ändras eller fungerar out
                        of the box. Men
                        märkte att den hittade min klass så länge namespace börjar med App/ i alla fall, men har än så
                        länge bara en fil. Så vet inte än om jag kan komma åt andra klasser, men jag är nöjd så länge de
                        fungerar. Det är något som har genomsyrat hela kursen från i höstas, finns mycket otydlighet och
                        känns inte som bra ide slänga in ena ramverket efter de andra utan upstyrd struktur. De första
                        ramverket Pico var total kaos med halfungerande kod och varken ramverket eller Github behövde
                        inte ens användas för få betyg.
                    </p>
                    <p> Express fungerade mycket bättre, för de var inte tillkrånglat och behövde inte heller ta hänsyn
                        till de fungerar på skolservern. När man fick igång Symfony så fungerar de hyfsat, men få till
                        style och just alla sidor att fungera var del pill och just instalationen fick jag ta till andra
                        källor än just dbwebb.se. För den gav inte mycket information hur man satte upp route, inte i en
                        text förklaring i alla fall. Utan man får läsa koden på github i så fall. Men hittade vägar för
                        få allt förklarat hur de fungerar och testat mig fram. Vidare är ju problemet att Symfony
                        tydligen inte hittar vissa filer och de inte fungerar på skolservern, men har plan B i så fall
                        om ni inte laddar hem detta som i tidigare uppgift.
                    </p>
                    <p> För jag kommer inte spendera timmar på testa mig fram vad som skulle fungera på
                        skolservern.Skulle inte min plan B uppskattas tar jag till plan C. Just till koden fick jag ta
                        till egena källor för lära mig hur man sätter upp Symfony, men vissa saker som style fick jag ta
                        till mindre officella knep för få de att laddas in.
                    </p>
                    <h3>Med tanke på artikeln “PHP The Right Way”, vilka delar in den finner du extra intressanta och
                        värdefulla? Är det några särskilda områden som du känner att du vill veta mer om? Lyft fram
                        några delar av artikeln som du känner mer värdefulla.
                    </h3>
                    <p>Nu har jag redan jobba med programering, så har lite kännsla hur man ska jobba. Sen om de är rätt
                        för detta språk är ju inte lätt att svara på. Brukar inte normalt stöta på problem hur jag
                        jobbar med vist språk. Sen finns det garanterat åsikter om vad för methoder man ska använda och
                        man inte bör använda vissa methoder/funtioner för dessa äter prestanda (dock vanligare i ett API
                        detta kan vara ett problem).
                    </p>
                    <h3>Vilken har du lärt dig i denna kursdelen?
                    </h3>
                    <p>Ja de är ente enkeklt att sätta upp jämfört med Express. Sen att instruktionerna är fortfarande
                        vaga, om inte än värre än tidigare kursdelar har gjort de svårare att sätta upp detta projekt.
                        Som man säger skit in och skit ut.
                    </p>
                </details>
            </section>
            <section>
                <details id=\"kmom02\">
                    <summary>Click! Kmom02 </summary>
                    <h3>Förklara kort de objektorienterade konstruktionerna arv, komposition, interface och trait och
                        hur de används i PHP.
                    </h3>
                    <p>Är bättre vi håller oss till de engelska orden inheritance, composition och interface. Nu när man
                        hållit på så länge så associerar jag inte mitt kodbyggande med namn på mönstret. Bland annat
                        code
                        patterns där det finns build pattern, factory pattern, observer pattern osv. Samma sak är det
                        just med dessa tre, de jag bryr mig om är extends/implements och interface bland annat. Just för
                        dessa är nykelord för bygga valid klass. För du kan inte skriva \"public class something
                        inheritance another\". Just composition är inget jag hört förrut som benämning, utan jag använder
                        de utan att tänka på de har något speciellt namn.
                    </p>
                    <p> Men kort förklaring om inheritance, är att du har en huvudklass (Parent) med methoder/funtioner
                        som ska vara basen för en funtion, sen kanske du vill utöka funtionen. Jag tar det klasiska
                        exemplet med former. Du kanske vill kuna rita alternativt beräkna inte bara fyrkanter, utan
                        också cirklar och rektanglar. Så för minska dubliterande kod där alla objekt delar samma färg
                        eller matimakisk formel. Men kan också vara methoder som antingen du måste ta med i din class
                        (klassen är då abstract, tar detaljer om interface senare) eller vill skriva över i din sub
                        class (child) för ska rita en korrekt cirkel eller beräkna cirekln korrekt. Nu är detta mesta
                        erfarenheter i Java, men PHP bör inte skilja sig så mycket på denna punkten. Så också kul sak i
                        dokumentationen https://www.php.net/manual/en/language.oop5.inheritance.php \" When you define a
                        class with abstract, any attempt to instantiate a separate instance of it will result in a fatal
                        error\" detta går utmärkt att göra i Java, så vet inte om de någon som inte har koll eller unikt
                        för PHP.
                    </p>
                    <p>Just composition hade jag omöjligt kunnat svara på utan en google sökning (första hade varit svår
                        utan någon ledtråd men denna är värre). Helt enkelt en klass har en eller flera
                        koppling/förhållande till en eller flera andra klasser. Men denna koppling är inte lika stark
                        som just inheritance. Största skillnaden är du kan bara ha en inheritance i varje klass (sett
                        lite olika rund detta, men utgår ifrån Java).
                    </p>
                    <p> Just interface, är något jag använder hel del när bygger API för andra ska komma åt methoder
                        från externt/annat program smidigt. Har inte testat detta i PHP, men i Java kan du bygga de som
                        en abstrakt klass bortsett från konstruktorn. Vissa anser just default var ett misstag att
                        implementera. Verkar inte finnas något liknande PHP ännu, men de verkar som du kan sätta en
                        konstruktor. Vidare finns de inte någon begränsning hur många interface en klass kan ha, så man
                        kan komma runt problemet med inheritance, genom att använda interface. Utöver detta så är tanken
                        den ska innehålla metoder din klass ska implementera och beronde på implementering så brukar man
                        kalla (invoke) dessa methoder/funtioner i koden just från interface och många gånger har väg för
                        dig att registera dina klassar som implementera just detta interface. Men finns ju andra områden
                        man kan använda interface också, men är de vanligaste jag använder den till och sen bygga egen
                        lambda function/consumer.
                    </p>
                    <p>Får inte glömma trait, har ingen efarnehet av denna. Så har inte testat den, för kunna se vad
                        för nytta denna har. De har inte behövts för utföra denna uppgioften i alla fall, kanske hade
                        gjort koden snyggare.
                    </p>
                    <h3>Berätta om din implementation från uppgiften. Hur löste du uppgiften, är du nöjd/missnöjd,
                        vilken förbättringspotential ser du i din koden och dina klasser?
                    </h3>
                    <p> Ni lär inte bli nöjda i alla fall, löste de enkeklt med 1 sida. De andra sidorna är mer dit
                        lagda för inte orsaka felmeddelanden. förutom cache delen, som fungerar fint. Vet inte hur max
                        och min är tänkt fungera, men du kommer inte kunna dra mer än den mängt kort som finns kvar (så
                        även om du försöker över max mängd kommer den inte gå över mängden kort du har kvar). Behövdes
                        inte mycket kod för lösa uppgiften, mesta tiden tog skapandet av arrayen med kort och få till
                        knapparna och lösa hur man skulle få knapparna fungera. Krävdes lite mer för få just min och max
                        fungera, dock vet jag inte hur URL alternativet ska fungera realistiskt, så de finns inte som
                        alternativ just nu.
                    </p>
                    <p>Är svårt att bättra på koden, när man inte har mycket kod eller logik. Är bara enkel array eller
                        som jag skulle kalla de \"map\" just för de har en nykel och inte bara ett värde. Ett övergripande
                        drag över denna kursen har varit bristfälligt med information. Så man har fått själv fylla i
                        hålen och som sagt en som jobbat hel del med just kod väljer oftas den kortaste vägen till
                        mål. Inte krånglar till saker i onödan.
                    </p>
                    <h3>Vilka är dina reflektioner så här långt med att jobb i Symfony med applikationskod enligt MVC?
                    </h3>
                    <p>Är bättre än förra ramverket Pico, är renare och färre buggar. Men fungerar ju inte bättre på
                        skolservern, Så får väl gå över till klasiska vägen och skriva sidorna som jag gjort tidigare
                        med just ren html och php. Men kommer kräva mer jobb och vet inte hur man ska hinna med de
                        relalistiskt. För verkar just nu vara de stabilaste alternativet för få allt att faktiskt
                        fungera.
                    </p>
                    <h3>Vilken har du lärt dig i denna kursdelen?
                    </h3>
                    <p>Jag har inte lärt mig så mycket nytt, men vist vissa delar har man fått lite mer informartion om.
                        Jag
                        har inte rört trait, känns lite som en utility class, där man har statiska methoder. Känns ju
                        lite knölare än att jobba med sådant i Java där man kan direkt göra methoderna statiska. Ju mer
                        jag kollar in just trait, känns det mer som ett hack. Jag hade använt composition och kan enkelt
                        återanvända den klassen till andra klasser, den klassen kan ju i sin tur använda interface eller
                        inheritance om så behövs. Du ser ju hur lite faktisk kod som behövs för just dessa simpla
                        funtioner, ser just för dessa delar att de behövs massa små klasser. De kanske behövs i fall man
                        ska bygga ut detta ytterligare. Jag håller de kort och enkeklt, för de gillades inte sist när
                        jag gjorde verktyg för kunna jobba snabbt och smidigt (jag vet inte exakt vad som jag borde
                        gjort om, men men).
                    </p>
                </details>
            </section>
            <section>
                <details id=\"kmom03\">
                    <summary>Click! Kmom03 </summary>
                    <h3>
                    </h3>
                </details>
            </section>
            <section>
                <details id=\"kmom04\">
                    <summary>Click! Kmom04 </summary>
                    <h3>
                    </h3>
                </details>
            </section>
            <section style=\"margin-bottom: 1em;\">
                <details id=\"kmom05\">
                    <summary>Click! Kmom04 </summary>
                    <h3>
                    </h3>
                </details>
            </section>
        </div>
    </div>
</main>

{% endblock %}

{% block script %}

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const hash = window.location.hash;
        if (hash) {
            const selected = document.querySelector(hash);
            if (selected && selected.tagName.toLocaleLowerCase() == 'details') {
                setTimeout(() =>
                    selected.open = true
                    , 300)
            }
        }

    });
</script>
{% endblock %}", "./page/report.html.twig", "/home/broken/school_work/dbwebb-kurser/mvc/me/report/templates/page/report.html.twig");
    }
}
