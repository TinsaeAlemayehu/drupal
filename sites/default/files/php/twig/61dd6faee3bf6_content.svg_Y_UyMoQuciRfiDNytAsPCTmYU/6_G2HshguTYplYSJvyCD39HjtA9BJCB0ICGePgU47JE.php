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

/* modules/bootstrap_styles/images/ui/content.svg */
class __TwigTemplate_68b620d9f2e2bc788643adf22593a1162f70a265e8aace1467e87c38b8b1baaf extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<svg width=\"22\" height=\"24\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
    <path d=\"M7.81395349 22.3255814H21.2093023V24H7.81395349v-1.6744186zM0 24h6.13953488v-1.6744186H0V24zm0-4.4651163h21.2093023v-1.6744186H0v1.6744186zm8.75162791-6.1395349H0v1.6744186h8.7572093v-1.6744186h-.00558139zm1.78046509 1.5460465l-.0334883-4.4651162L17.0232558.20651163l4.1860465 2.79069767-6.5246511 10.292093-4.1525582 1.652093zm6.6976744-11.84930228L18.48 3.90697674l.3683721-.55813953-1.2334884-.8372093-.3851163.58046511zm-3.9069767 6.18976745l1.2334884.82604653 3.092093-4.91720933-1.2334884-.82604651-3.092093 4.91720931zM12.2065116 11.095814v1.3172093l1.2223256-.4855814.3237209-.5134884-1.2111628-.8093023-.3348837.4911628z\" fill-rule=\"nonzero\"/>
</svg>";
    }

    public function getTemplateName()
    {
        return "modules/bootstrap_styles/images/ui/content.svg";
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/bootstrap_styles/images/ui/content.svg", "C:\\xampp\\htdocs\\rad\\modules\\bootstrap_styles\\images\\ui\\content.svg");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
