<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* panier/index.html.twig */
class __TwigTemplate_d8c72a1aa2d4ae8bcf1cb322d1a00136fa861e10c51ea3f1a47b9a359f401516 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "panier/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "panier/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "panier/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo " ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Panier.panier"), "html", null, true);
        echo " ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<h1>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Panier.titre"), "html", null, true);
        echo "</h1>

    ";
        // line 8
        if ( !twig_test_empty((isset($context["panier"]) || array_key_exists("panier", $context) ? $context["panier"] : (function () { throw new RuntimeError('Variable "panier" does not exist.', 8, $this->source); })()))) {
            // line 9
            echo "        <table class=\"table\">
            <thead>
                <tr>
                    <th>";
            // line 12
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Panier.nom"), "html", null, true);
            echo "</th>
                    <th>";
            // line 13
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Panier.qte"), "html", null, true);
            echo "</th>
                    <th>";
            // line 14
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Panier.prix"), "html", null, true);
            echo "</th>
                    <th>Prix Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            ";
            // line 21
            $context["prix_total"] = 0;
            // line 22
            echo "            ";
            $context["prix_qte"] = 0;
            // line 23
            echo "
                ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["panier"]) || array_key_exists("panier", $context) ? $context["panier"] : (function () { throw new RuntimeError('Variable "panier" does not exist.', 24, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
                // line 25
                echo "                    ";
                $context["prix_qte"] = (twig_get_attribute($this->env, $this->source, $context["produit"], "qte", [], "any", false, false, false, 25) * twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["produit"], "produit", [], "any", false, false, false, 25), "prix", [], "any", false, false, false, 25));
                echo " 
                    ";
                // line 26
                $context["prix_total"] = ((isset($context["prix_total"]) || array_key_exists("prix_total", $context) ? $context["prix_total"] : (function () { throw new RuntimeError('Variable "prix_total" does not exist.', 26, $this->source); })()) + (isset($context["prix_qte"]) || array_key_exists("prix_qte", $context) ? $context["prix_qte"] : (function () { throw new RuntimeError('Variable "prix_qte" does not exist.', 26, $this->source); })()));
                // line 27
                echo "                    <tr>
                        <td>";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["produit"], "produit", [], "any", false, false, false, 28), "nom", [], "any", false, false, false, 28), "html", null, true);
                echo "</td>
                        <td>";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["produit"], "qte", [], "any", false, false, false, 29), "html", null, true);
                echo "</td>
                        <td>";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["produit"], "produit", [], "any", false, false, false, 30), "prix", [], "any", false, false, false, 30), "html", null, true);
                echo " €</td>
                        <td>
                        ";
                // line 32
                echo twig_escape_filter($this->env, (isset($context["prix_qte"]) || array_key_exists("prix_qte", $context) ? $context["prix_qte"] : (function () { throw new RuntimeError('Variable "prix_qte" does not exist.', 32, $this->source); })()), "html", null, true);
                echo " €
                        </td>
                        <td>
                            <button type=\"button\" class=\"btn btn-danger\">
                                <a href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["produit"], "id", [], "any", false, false, false, 36)]), "html", null, true);
                echo "\">
                                    ";
                // line 37
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Panier.suppr"), "html", null, true);
                echo "
                                </a>
                            </button>
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['produit'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "
            </tbody>
            <td class=\"text-muted\" >";
            // line 45
            echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["panier"]) || array_key_exists("panier", $context) ? $context["panier"] : (function () { throw new RuntimeError('Variable "panier" does not exist.', 45, $this->source); })())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Panier.article"), "html", null, true);
            echo "</td>
            <td></td> <td></td>
            <td class=\"font-weight-bold\" >";
            // line 47
            echo twig_escape_filter($this->env, (isset($context["prix_total"]) || array_key_exists("prix_total", $context) ? $context["prix_total"] : (function () { throw new RuntimeError('Variable "prix_total" does not exist.', 47, $this->source); })()), "html", null, true);
            echo " €</td>
            <td>
                <button type=\"button\" class=\"btn btn-success\">
                    <a href=\"#\">
                        Payer
                    </a>
                </button>
            </td>
        </table>


    ";
        } else {
            // line 59
            echo "        <p>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Panier.noproduit"), "html", null, true);
            echo "</p>
    ";
        }
        // line 61
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "panier/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 61,  205 => 59,  190 => 47,  183 => 45,  179 => 43,  167 => 37,  163 => 36,  156 => 32,  151 => 30,  147 => 29,  143 => 28,  140 => 27,  138 => 26,  133 => 25,  129 => 24,  126 => 23,  123 => 22,  121 => 21,  111 => 14,  107 => 13,  103 => 12,  98 => 9,  96 => 8,  90 => 6,  80 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %} {{ 'Panier.panier'|trans }} {% endblock %}

{% block body %}
<h1>{{ 'Panier.titre'|trans }}</h1>

    {% if panier is not empty %}
        <table class=\"table\">
            <thead>
                <tr>
                    <th>{{ 'Panier.nom'|trans }}</th>
                    <th>{{ 'Panier.qte'|trans }}</th>
                    <th>{{ 'Panier.prix'|trans }}</th>
                    <th>Prix Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            {% set prix_total = 0 %}
            {% set prix_qte = 0 %}

                {% for produit in panier %}
                    {% set prix_qte = produit.qte * produit.produit.prix %} 
                    {% set prix_total = prix_total + prix_qte %}
                    <tr>
                        <td>{{produit.produit.nom}}</td>
                        <td>{{produit.qte}}</td>
                        <td>{{produit.produit.prix}} €</td>
                        <td>
                        {{prix_qte}} €
                        </td>
                        <td>
                            <button type=\"button\" class=\"btn btn-danger\">
                                <a href=\"{{ path('panier_delete', {'id':produit.id}) }}\">
                                    {{ 'Panier.suppr'|trans }}
                                </a>
                            </button>
                        </td>
                    </tr>
                {% endfor %}

            </tbody>
            <td class=\"text-muted\" >{{ panier|length }} {{ 'Panier.article'|trans }}</td>
            <td></td> <td></td>
            <td class=\"font-weight-bold\" >{{prix_total}} €</td>
            <td>
                <button type=\"button\" class=\"btn btn-success\">
                    <a href=\"#\">
                        Payer
                    </a>
                </button>
            </td>
        </table>


    {% else %}
        <p>{{ 'Panier.noproduit'|trans }}</p>
    {% endif %}


{% endblock %}", "panier/index.html.twig", "/Users/eliseknowles/OneDrive - De Vinci/A2/symfony_commercev2/templates/panier/index.html.twig");
    }
}
