<?php

/* GesEnquiryBundle:Pagination:sliding.html.twig */
class __TwigTemplate_4ea445cd6bd0aa02e1ed1a5f92c0101c7c454a9c55d6b46b4cf1972e352df491 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 3
        if (($this->getContext($context, "pageCount") > 1)) {
            // line 4
            echo "    <div class=\"pagination\">
        <ul>

            ";
            // line 7
            if (array_key_exists("first", $context)) {
                // line 8
                echo "
                ";
                // line 9
                if (($this->getContext($context, "current") != $this->getContext($context, "first"))) {
                    // line 10
                    echo "                    <li>
                        <a href=\"";
                    // line 11
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "first")))), "html", null, true);
                    echo "\">First Page</a>
                    </li>
                ";
                } else {
                    // line 14
                    echo "                    <li class=\"disabled\">
                        <a href=\"";
                    // line 15
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "first")))), "html", null, true);
                    echo "\">First Page</a>
                    </li>
                ";
                }
                // line 18
                echo "            ";
            }
            // line 19
            echo "
            ";
            // line 20
            if (array_key_exists("previous", $context)) {
                // line 21
                echo "                <li>
                    <a href=\"";
                // line 22
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "previous")))), "html", null, true);
                echo "\">Previous Page</a>
                </li>
            ";
            } else {
                // line 25
                echo "                <li class=\"disabled\">
                    <a href=\"javascript:void(0)\">Previous Page</a>
                </li>
            ";
            }
            // line 29
            echo "
            ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "pagesInRange"));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 31
                echo "                ";
                if (($this->getContext($context, "page") != $this->getContext($context, "current"))) {
                    // line 32
                    echo "                    <li>
                        <a href=\"";
                    // line 33
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "page")))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "page"), "html", null, true);
                    echo "</a>
                    </li>
                ";
                } else {
                    // line 36
                    echo "                    <li class=\"active\"><a href=\"javascript:void(0);\"> ";
                    echo twig_escape_filter($this->env, $this->getContext($context, "page"), "html", null, true);
                    echo "</a></li>
                ";
                }
                // line 38
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "
            ";
            // line 41
            if (array_key_exists("next", $context)) {
                // line 42
                echo "                <li>
                    <a href=\"";
                // line 43
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "next")))), "html", null, true);
                echo "\">Next Page</a>
                </li>
            ";
            } else {
                // line 46
                echo "                <li class=\"disabled\"><a href=\"javascript:void(0);\">Next Page</a></li>
            ";
            }
            // line 48
            echo "
            ";
            // line 49
            if (array_key_exists("last", $context)) {
                // line 50
                echo "                ";
                if (($this->getContext($context, "current") != $this->getContext($context, "last"))) {
                    // line 51
                    echo "                    <li>
                        <a href=\"";
                    // line 52
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "last")))), "html", null, true);
                    echo "\">Last Page</a>
                    </li>
                ";
                } else {
                    // line 55
                    echo "                    <li class=\"disabled\">
                        <a href=\"javascript:void(0);\">Last Page</a>
                    </li>
                ";
                }
                // line 59
                echo "            ";
            }
            // line 60
            echo "
        </ul>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "GesEnquiryBundle:Pagination:sliding.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 60,  152 => 59,  146 => 55,  140 => 52,  137 => 51,  134 => 50,  132 => 49,  129 => 48,  125 => 46,  114 => 41,  111 => 40,  104 => 38,  98 => 36,  90 => 33,  87 => 32,  77 => 29,  71 => 25,  65 => 22,  62 => 21,  54 => 18,  48 => 15,  45 => 14,  39 => 11,  36 => 10,  29 => 7,  24 => 4,  22 => 3,  19 => 2,  119 => 43,  116 => 42,  112 => 37,  103 => 34,  94 => 30,  84 => 31,  80 => 30,  76 => 26,  72 => 25,  66 => 24,  60 => 20,  57 => 19,  53 => 21,  34 => 9,  31 => 8,  28 => 3,);
    }
}
