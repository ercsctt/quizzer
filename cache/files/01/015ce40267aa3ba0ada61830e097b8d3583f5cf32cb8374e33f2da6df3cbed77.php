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

/* base.twig */
class __TwigTemplate_ec76c37f589ead55bc4025fa432a550f1716598a2da075c54e12698114018cf1 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
\t<head>
\t\t<meta charset=\"utf-8\" />
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
\t\t<title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t<style type=\"text/css\">
\t\t\th1,h2,h3,h4,h5,h6{margin-bottom:10px}*,:after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}html{font-family:sans-serif;font-size:10px;-webkit-tap-highlight-color:transparent;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}body{margin:0;font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#fff}h1,h2,h3,h4,h5,h6{font-family:inherit;font-weight:500;line-height:1.1;color:inherit}h1,h2,h3{margin-top:20px}h4,h5,h6{margin-top:10px}h1{font-size:36px}h2{font-size:30px}h3{font-size:24px}h4{font-size:18px}h5{font-size:14px}h6{font-size:12px}p{margin:0 0 10px}.container{padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.alert{padding:15px;margin-bottom:20px;border:1px solid transparent;border-radius:4px}.alert-success{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}.alert-info{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}.alert-warning{color:#8a6d3b;background-color:#fcf8e3;border-color:#faebcc}.alert-danger{color:#a94442;background-color:#f2dede;border-color:#ebccd1}
\t\t</style>

\t\t<script type=\"text/javascript\">
\t\t\tfunction downloadCSSOnload() {
\t\t\t\tvar el = document.createElement('link');

\t\t\t\tel.rel         = 'stylesheet';
\t\t\t\tel.type        = 'text/css';
\t\t\t\tel.href        = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css';
\t\t\t\tel.media       = 'print,screen';
\t\t\t\tel.integrity   = 'sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u';
\t\t\t\tel.crossOrigin = 'anonymous';

\t\t\t\tdocument.body.appendChild(el);
\t\t\t}

\t\t\tif(window.addEventListener)
\t\t\t\twindow.addEventListener('load', downloadCSSOnload, false);
\t\t\telse if(window.attachEvent)
\t\t\t\twindow.attachEvent('onload', downloadCSSOnload);
\t\t\telse window.onload = downloadCSSOnload;
\t\t</script>
\t</head>
\t<body>
\t\t<div class=\"container\">
\t\t\t";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["flash"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 36
            echo "\t\t\t\t<div class=\"alert alert-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["message"], "type", []), "html", null, true);
            echo "\" role=\"alert\">
\t\t\t\t\t";
            // line 37
            echo twig_get_attribute($this->env, $this->source, $context["message"], "body", []);
            echo "
\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "
\t\t\t";
        // line 41
        $this->displayBlock('body', $context, $blocks);
        // line 42
        echo "\t\t</div>

\t\t";
        // line 44
        $this->displayBlock('scripts', $context, $blocks);
        // line 45
        echo "\t</body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = [])
    {
    }

    // line 41
    public function block_body($context, array $blocks = [])
    {
    }

    // line 44
    public function block_scripts($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 44,  117 => 41,  112 => 7,  106 => 45,  104 => 44,  100 => 42,  98 => 41,  95 => 40,  86 => 37,  81 => 36,  77 => 35,  46 => 7,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.twig", "C:\\xampp\\htdocs\\App\\Templates\\default\\base.twig");
    }
}
