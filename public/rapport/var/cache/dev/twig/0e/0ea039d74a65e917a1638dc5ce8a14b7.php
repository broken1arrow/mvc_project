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
                    <h3>Hur känns det att komma igång med databaser, klienter och SQL - är det något du ser fram emot
                        eller
                        fasar inför?
                    </h3>
                </details>
            </section>
            <section>
                <details id=\"kmom03\">
                    <summary>Click! Kmom03 </summary>
                    <h3>
                    </h3>
                </details>
            </section>
            <section style=\"margin-bottom: 1em;\">
                <details id=\"kmom04\">
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

    // line 157
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

        // line 158
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
        return array (  275 => 158,  262 => 157,  103 => 7,  90 => 6,  65 => 3,  42 => 1,);
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
                    <h3>Hur känns det att komma igång med databaser, klienter och SQL - är det något du ser fram emot
                        eller
                        fasar inför?
                    </h3>
                </details>
            </section>
            <section>
                <details id=\"kmom03\">
                    <summary>Click! Kmom03 </summary>
                    <h3>
                    </h3>
                </details>
            </section>
            <section style=\"margin-bottom: 1em;\">
                <details id=\"kmom04\">
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
{% endblock %}", "./page/report.html.twig", "/home/broken/school_work/dbwebb-kurser/mvc/me/report/public/rapport/templates/page/report.html.twig");
    }
}
