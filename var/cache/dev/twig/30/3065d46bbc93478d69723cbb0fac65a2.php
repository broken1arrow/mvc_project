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

/* ./page/cards.html.twig */
class __TwigTemplate_500db652b831b4a227f6d1ed7a4b7ddc extends Template
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
            'cards' => [$this, 'block_cards'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "./page/cards.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "./page/cards.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "./page/cards.html.twig", 1);
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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
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

        // line 5
        yield "
<main>
    ";
        // line 7
        yield from $this->unwrap()->yieldBlock('cards', $context, $blocks);
        // line 46
        yield "</main>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_cards(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "cards"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "cards"));

        // line 8
        yield "    <div>
        ";
        // line 9
        if (array_key_exists("cards", $context)) {
            // line 10
            yield "        <div
            style=\"display: grid; grid-template-columns: repeat(13, 1fr);padding: 1em;row-gap: 1em; column-gap: 0.5em;background-color: #0650103b;\">
            ";
            // line 12
            yield (isset($context["cards"]) || array_key_exists("cards", $context) ? $context["cards"] : (function () { throw new RuntimeError('Variable "cards" does not exist.', 12, $this->source); })());
            yield "
        </div>
        ";
        }
        // line 15
        yield "        <div style=\"display: flex; flex-direction: column; margin-bottom:3em ;padding: 2em;\">
            <form method=\"post\">
                <fieldset>
                    <legend style=\"font-size: 2rem;\">Deck options</legend>
                    <table style=\"width: 100%;\">
                        <tr>

                            <th><input class=\"table_button\" type=\"submit\" name=\"deck\" value=\"deck\"> </th>
                            <th> <input class=\"table_button\" type=\"submit\" name=\"shuffel\" value=\"shuffel\"> </th>
                            <th> <input class=\"table_button\" type=\"submit\" name=\"draw\" value=\"draw\"></th>
                            <th> <input class=\"table_button\" type=\"submit\" name=\"reset\" value=\"reset\"></th>
                        
                        </tr>
                        <tr>
                          
                                <table style=\"width: 40%;\">
                                    <tr>
                                        <th> <input style=\"width: 50%;\" type=\"number\" name=\"draw-amount-min\" min=\"0\" max=\"52\" placeholder=\"min\"></th>
                                        <th> <input style=\"width: 50%;\" type=\"number\" name=\"draw-amount-max\" min=\"1\" max=\"52\" placeholder=\"max\"></th>
                                        <th> <input class=\"table_button\" type=\"submit\" name=\"draw-amount\"
                                                value=\"draw amount\"></th>
                                    </tr>
                                </table>
                           
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </div>
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
        return "./page/cards.html.twig";
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
        return array (  148 => 15,  142 => 12,  138 => 10,  136 => 9,  133 => 8,  120 => 7,  107 => 46,  105 => 7,  101 => 5,  88 => 4,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{title}}{% endblock %}
{% block body %}

<main>
    {% block cards %}
    <div>
        {% if cards is defined %}
        <div
            style=\"display: grid; grid-template-columns: repeat(13, 1fr);padding: 1em;row-gap: 1em; column-gap: 0.5em;background-color: #0650103b;\">
            {{cards|raw}}
        </div>
        {% endif %}
        <div style=\"display: flex; flex-direction: column; margin-bottom:3em ;padding: 2em;\">
            <form method=\"post\">
                <fieldset>
                    <legend style=\"font-size: 2rem;\">Deck options</legend>
                    <table style=\"width: 100%;\">
                        <tr>

                            <th><input class=\"table_button\" type=\"submit\" name=\"deck\" value=\"deck\"> </th>
                            <th> <input class=\"table_button\" type=\"submit\" name=\"shuffel\" value=\"shuffel\"> </th>
                            <th> <input class=\"table_button\" type=\"submit\" name=\"draw\" value=\"draw\"></th>
                            <th> <input class=\"table_button\" type=\"submit\" name=\"reset\" value=\"reset\"></th>
                        
                        </tr>
                        <tr>
                          
                                <table style=\"width: 40%;\">
                                    <tr>
                                        <th> <input style=\"width: 50%;\" type=\"number\" name=\"draw-amount-min\" min=\"0\" max=\"52\" placeholder=\"min\"></th>
                                        <th> <input style=\"width: 50%;\" type=\"number\" name=\"draw-amount-max\" min=\"1\" max=\"52\" placeholder=\"max\"></th>
                                        <th> <input class=\"table_button\" type=\"submit\" name=\"draw-amount\"
                                                value=\"draw amount\"></th>
                                    </tr>
                                </table>
                           
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </div>
    {% endblock %}
</main>

{% endblock %}", "./page/cards.html.twig", "/home/broken/school_work/dbwebb-kurser/mvc/me/report/templates/page/cards.html.twig");
    }
}
