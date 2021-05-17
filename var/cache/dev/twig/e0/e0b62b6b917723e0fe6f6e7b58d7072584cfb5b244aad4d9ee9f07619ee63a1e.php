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

/* cadastro.html.twig */
class __TwigTemplate_8a31ddba2c34c91d393dcb195790ab866a9f4e5207b44ac2692aeb79db6e9fbd extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "cadastro.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "cadastro.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "<div class=\"container\">
<form method=\"POST\" action=\"";
        // line 5
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("salvar");
        echo "\">
    <br>
    Nome <input type=\"text\" name=\"nome\" placeholder=\"Digite o nome\" required><br>
    Telefone <input type=\"tel\" name=\"telefone\" size=\"14\" placeholder=\"Ex: (99)99999-9999\" required><br>
    Email <input type=\"email\" name=\"email\" placeholder=\"Ex: email@menew.com.br\" required><br>
    Cidade <input type=\"text\" name=\"cidade\" placeholder=\"Ex: João Pessoa\" required><br>
    Estado <select name=\"estado\" id=\"uf\">
      <option value=\"CE\">CE</options>
      <option value=\"RN\">RN</options>
      <option value=\"PB\">PB</options>
      <option value=\"PE\">PE</options>
      <option value=\"AL\">AL</options>
    </select><br>
    Categoria <select name=\"categoria\" id=\"cat\">
      <option value=\"Cliente\">Cliente</options>
      <option value=\"Fornecedor\">Fornecedor</options>
      <option value=\"Funcionario\">Funcionário</options>      
    </select>    
    <br><br>
    <button class=\"btn btn-danger\" type=\"sumit\">Salvar</button>
</form>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "cadastro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 5,  59 => 4,  52 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block body %}
<div class=\"container\">
<form method=\"POST\" action=\"{{ url('salvar') }}\">
    <br>
    Nome <input type=\"text\" name=\"nome\" placeholder=\"Digite o nome\" required><br>
    Telefone <input type=\"tel\" name=\"telefone\" size=\"14\" placeholder=\"Ex: (99)99999-9999\" required><br>
    Email <input type=\"email\" name=\"email\" placeholder=\"Ex: email@menew.com.br\" required><br>
    Cidade <input type=\"text\" name=\"cidade\" placeholder=\"Ex: João Pessoa\" required><br>
    Estado <select name=\"estado\" id=\"uf\">
      <option value=\"CE\">CE</options>
      <option value=\"RN\">RN</options>
      <option value=\"PB\">PB</options>
      <option value=\"PE\">PE</options>
      <option value=\"AL\">AL</options>
    </select><br>
    Categoria <select name=\"categoria\" id=\"cat\">
      <option value=\"Cliente\">Cliente</options>
      <option value=\"Fornecedor\">Fornecedor</options>
      <option value=\"Funcionario\">Funcionário</options>      
    </select>    
    <br><br>
    <button class=\"btn btn-danger\" type=\"sumit\">Salvar</button>
</form>
</div>
{% endblock %}

", "cadastro.html.twig", "/home/marcos/menew/templates/cadastro.html.twig");
    }
}
