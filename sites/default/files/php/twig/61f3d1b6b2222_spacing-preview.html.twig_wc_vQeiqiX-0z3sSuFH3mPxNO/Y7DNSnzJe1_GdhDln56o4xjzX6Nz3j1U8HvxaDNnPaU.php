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

/* modules/bootstrap_styles/templates/spacing-preview.html.twig */
class __TwigTemplate_627c657e68d98ea83bb1736cd228d5c940f694a269beec52367952a560bd9237 extends \Twig\Template
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
        // line 9
        echo "
";
        // line 10
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap_styles/plugins_groups.spacing.spacing_preview"), "html", null, true);
        echo "

<div class=\"spacing-preview\">

  <div class=\"preview-box margin-box\">
    <span class=\"title\">";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Margin"));
        echo "</span>
    <span class=\"left margin-left\">0</span>
    <span class=\"top margin-top\">0</span>
    <span class=\"right margin-right\">0</span>
    <span class=\"bottom margin-bottom\">0</span>


  <div class=\"preview-box padding-box\">
    <span class=\"title\">";
        // line 23
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Padding"));
        echo "</span>
    <span class=\"left padding-left\">0</span>
    <span class=\"top padding-top\">0</span>
    <span class=\"right padding-right\">0</span>
    <span class=\"bottom padding-bottom\">0</span>
  </div>
  </div>

</div>

<div id=\"bs_spacing_preview_calc\"></div> 
";
    }

    public function getTemplateName()
    {
        return "modules/bootstrap_styles/templates/spacing-preview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 23,  50 => 15,  42 => 10,  39 => 9,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/bootstrap_styles/templates/spacing-preview.html.twig", "C:\\xampp\\htdocs\\rad\\modules\\bootstrap_styles\\templates\\spacing-preview.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 10, "t" => 15);
        static $functions = array("attach_library" => 10);

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape', 't'],
                ['attach_library']
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
